<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;

class OrderController extends Controller
{
    public function index(string $hash)
    {
        $order = Order::where(Order::HASH, $hash)
            ->join('addresses', 'orders.address_id', '=', 'addresses.id')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->first();

        if(is_null($order))
        {
            return redirect()->route('index.home');
        }

        $products = OrderProduct::where(OrderProduct::ORDER_ID, $order->id)
            ->join('products', 'products.id', '=', 'orders_products.product_id')
            ->get();

        return view('pages.order', compact('order', 'products'));
    }
}
