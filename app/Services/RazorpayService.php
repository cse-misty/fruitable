<?php
namespace App\Services;
use App\Interfaces\PaymentGatewayInterface;
use Illuminate\Http\Request;

class RazorpayService implements PaymentGatewayInterface {
    public function pay($amount, $currency, $orderDetails) {
        // Razorpay API calling code here
        return "Processing Razorpay payment of " . $amount;
    }
    public function verify(Request $request) {
        // Razorpay payment verification logic
    }
}
