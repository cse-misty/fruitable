<?php

namespace App\Services;

use App\Interfaces\PaymentGatewayInterface;
use Illuminate\Http\Request;

class AamarpayService implements PaymentGatewayInterface
{
    public function pay($amount, $currency, $orderDetails)
    {
        // ১. নতুন API গাইডলাইন অনুযায়ী index.php ব্যবহার করা হয়েছে
        $url = env('AAMARPAY_BASE_URL') . "/index.php";

        $fields = array(
            'store_id' => env('AAMARPAY_STORE_ID'),
            'signature_key' => env('AAMARPAY_SIGNATURE_KEY'),
            'amount' => $amount,
            'payment_type' => 'VISA',
            'currency' => $currency ?? 'BDT',
            'tran_id' => 'TXN_' . uniqid(),
            'cus_name' => $orderDetails['name'] ?? 'Test Customer',
            'cus_email' => $orderDetails['email'] ?? 'customer@mail.com',
            'cus_phone' => $orderDetails['phone'] ?? '01700000000',

            // ২. এই ২টি ফিল্ড বাধ্যতামূলক, না দিলে aamarpay এরর দেয়
            'cus_add1' => $orderDetails['address'] ?? 'Dhaka, Bangladesh',
            'cus_city' => $orderDetails['city'] ?? 'Dhaka',
            'cus_country' => 'Bangladesh',

            // পেমেন্ট শেষে কাস্টমার যেখানে ব্যাক করবে
            'success_url' => url('/payment/success'),
            'fail_url' => url('/payment/fail'),
            'cancel_url' => url('/payment/cancel'),
            'type' => 'json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = curl_exec($ch);
        curl_close($ch);

        $res = json_decode($response, true);

        // aamarpay সফল হলে 'payment_url' এর জায়গায় সরাসরি 'payment_url' অথবা 'url' অবজেক্ট রিটার্ন করে
        if (isset($res['payment_url']) && $res['payment_url'] != null) {
            return $res['payment_url'];
        }

        // যদি কোনো কারণে এপিআই থেকে এরর আসে, তা ডিবাগ করার জন্য থ্রো করা হচ্ছে
        throw new \Exception('aamarpay connection failed: ' . json_encode($res));
    }

    public function verify(Request $request)
    {
        // পেমেন্ট সফল হওয়ার পর ভেরিফিকেশন লজিক এখানে আসবে
    }
}
