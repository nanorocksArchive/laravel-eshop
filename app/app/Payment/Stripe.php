<?php

namespace App\Payment;


use App\Basket\Basket;
use Illuminate\Http\Request;

class Stripe implements IPaymentGateway
{

    protected Basket $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
        \Stripe\Stripe::setApiKey(env('STRIPE_PRIVATE_KEY'));
    }

    public function generateToken($request)
    {
        try {
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => (int) $this->basket->subTotal() + 15,
                'currency' => 'usd',
            ]);

            return $paymentIntent->client_secret;

        } catch (\Exception $e) {

            return ['error' => $e->getMessage()];
        }
    }

    public function makePayment(Request $request, float $total)
    {
        return null; // we do the payment from js
    }
}
