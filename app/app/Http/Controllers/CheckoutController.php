<?php

namespace App\Http\Controllers;

use App\Basket\Basket;
use App\Models\Address;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    protected $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    public function index()
    {

        $this->basket->refresh();

        $basket = $this->basket->all();

        if(empty($basket))
        {
            return redirect()->to('/cart');
        }

        return view('pages.checkout', compact('basket'));
    }


    public function order(Request $request)
    {
        // TODO validate order

        $customer = Customer::firstOrCreate([
            Customer::FIRST_NAME => $request->firstname,
            Customer::LAST_NAME => $request->lastname,
            Customer::EMAIL => $request->email,
            Customer::PHONE => $request->phone
        ]);

        $address = Address::firstOrCreate([
            Address::ADDRESS1 => $request->address1,
            Address::ADDRESS2 => $request->address2,
            Address::CITY => $request->city,
            Address::POST_CODE => $request->post_code,
            Address::COUNTRY => $request->country,
            Address::STATE => $request->state
        ]);

        $hash = bin2hex(random_bytes(32));

        $order = $customer->orders()->create([
            Order::HASH => $hash,
            Order::PAID => false,
            Order::TOTAL => $this->basket->subTotal() + 15, // 15 is shipping
            Order::ADDRESS_ID => $address->id
        ]);

        $products = $this->basket->all();

        foreach ($products as $product)
        {
            OrderProduct::create([
               OrderProduct::ORDER_ID => $order->id,
               OrderProduct::PRODUCT_ID => $product->id,
               OrderProduct::QUANTITY => $product->quantity
            ]);
        }


        return ['success' => 200];
    }
}
