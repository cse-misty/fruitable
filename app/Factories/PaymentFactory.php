<?php

namespace App\Factories;

use App\Services\RazorpayService;
use App\Services\AamarpayService;
use App\Services\PaystackService;
use Exception;

class PaymentFactory
{
    public static function create(string $gateway)
    {
        switch (strtolower($gateway)) {
            case 'razorpay':
                return new RazorpayService();
            case 'aamarpay':
                return new AamarpayService();
            case 'paystack':
                return new PaystackService();
            default:
                throw new Exception("Unsupported payment gateway selected.");
        }
    }
}
