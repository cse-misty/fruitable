<?php

namespace App\Http\Controllers;

use App\Factories\PaymentFactory;
use Illuminate\Http\Request;
use Exception;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {

        $request->validate([
            'payment_method' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        try {

            $gatewayName = strtolower($request->payment_method);


            $paymentGateway = PaymentFactory::create($gatewayName);


            $currency = ($gatewayName === 'aamarpay') ? 'BDT' : 'USD';


            $result = $paymentGateway->pay($request->amount, $currency, $request->all());


            if (filter_var($result, FILTER_VALIDATE_URL)) {
                return redirect()->away($result);
            }


            return response()->json(['success' => true, 'message' => $result]);

        } catch (Exception $e) {

            return back()->with('error', 'Payment Error: ' . $e->getMessage());
        }
    }

    public function paymentSuccess(Request $request)
{

    $tran_id = $request->input('mer_txnid');
    $amount = $request->input('amount');
    $currency = $request->input('currency');
    $pay_status = $request->input('pay_status');
    $pg_txnid = $request->input('pg_txnid');


    $url = env('AAMARPAY_BASE_URL') . "/api/v1/trxcheck/request.php";
    $fields = array(
        'store_id' => env('AAMARPAY_STORE_ID'),
        'signature_key' => env('AAMARPAY_SIGNATURE_KEY'),
        'request_id' => $tran_id,
        'type' => 'json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $res = json_decode($response, true);


    if (isset($res['pay_status']) && $res['pay_status'] === 'Successful') {



        return redirect()->route('order.success')
            ->with('success', 'Payment successful and verified via aamarpay!');
    }

    return redirect()->route('checkout')
        ->with('error', 'Payment verification failed or unauthorized request.');
}

public function paymentFail(Request $request)
{

    return redirect()->route('checkout')
        ->with('error', 'Your payment was failed. Please try again or select another method.');
}

public function paymentCancel(Request $request)
{

    return redirect()->route('checkout')
        ->with('error', 'Payment process was canceled by the user.');
}
}
