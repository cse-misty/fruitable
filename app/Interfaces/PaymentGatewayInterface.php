<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PaymentGatewayInterface
{
    public function pay($amount, $currency, $orderDetails);
    public function verify(Request $request);
}
