<?php
namespace App\Services;
use App\Interfaces\PaymentGatewayInterface;
use Illuminate\Http\Request;

class PaystackService implements PaymentGatewayInterface {
    public function pay($amount, $currency, $orderDetails) {
        // Paystack API calling code here
        return "Processing Paystack payment of " . $amount;
    }
    public function verify(Request $request) {
        // Paystack verification logic
    }
}
