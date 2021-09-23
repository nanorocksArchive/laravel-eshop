<?php

namespace App\Payment;

use Braintree\Gateway;
use Illuminate\Http\Request;

class BrainTree
{
    public Gateway $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => env('BT_ENVIRONMENT'),
            'merchantId' => env('BT_MERCHANT_ID'),
            'publicKey' => env('BT_PUBLIC_KEY'),
            'privateKey' => env('BT_PRIVATE_KEY')
        ]);
    }

    public function generateToken(): string
    {
        return $this->gateway->clientToken()->generate();
    }

    public function makePayment(Request $request, float $total)
    {
        return $this->gateway->transaction()->sale([
            'amount' => $total,
            'paymentMethodNonce' =>  $request->paymentMethodNonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);
    }
}
