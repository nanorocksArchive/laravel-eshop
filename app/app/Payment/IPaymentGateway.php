<?php

namespace App\Payment;

use Illuminate\Http\Request;

interface IPaymentGateway
{
    public function generateToken($request);

    public function makePayment(Request $request, float $total);
}
