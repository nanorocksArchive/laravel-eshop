<?php

namespace App\Payment;

use Illuminate\Http\Request;

class PaymentGateway
{
    public BrainTree $brainTree;

    public Stripe $stripe;

    const STRIPE = 'stripe';
    const BRAIN_TREE = 'braintree';

    public function __construct(BrainTree $brainTree, Stripe $stripe)
    {
        $this->brainTree = $brainTree;
        $this->stripe = $stripe;
    }

    public function generateToken($request)
    {
        if(self::STRIPE == $request->type)
        {
            return $this->stripe->generateToken($request);
        }
        else if(self::BRAIN_TREE == $request->type)
        {
            return $this->brainTree->generateToken($request);
        }

        return null;
    }

    public function makePayment(Request $request, float $total)
    {
        if(self::BRAIN_TREE == $request->type)
        {
            return $this->brainTree->makePayment($request, $total);
        }

        return null;
    }
}
