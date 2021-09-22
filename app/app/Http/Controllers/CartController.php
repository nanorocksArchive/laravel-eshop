<?php

namespace App\Http\Controllers;

use App\Basket\Basket;
use App\Basket\Exceptions\QuantityExceededException;
use App\Models\Product;

class CartController extends Controller
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

        return view('pages.cart', compact('basket'));
    }

    /**
     * @param string $slug
     * @param int $quantity
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(string $slug, int $quantity)
    {
        $product = Product::where(Product::SLUG, $slug)->first();

        if(!$product) {
           return redirect('/');
        }

        try{
            $this->basket->add($product, $quantity);
        }catch (QuantityExceededException $e)
        {

        }

        return redirect()->back();
    }

    /**
     * @param string $slug
     * @param int $quantity
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(string $slug, int $quantity): \Illuminate\Http\RedirectResponse
    {
        $product = Product::where(Product::SLUG, $slug)->first();

        if(!$product) {
            return redirect()->back();
        }

        try{
            $this->basket->update($product, $quantity);
        }catch (QuantityExceededException $e)
        {

        }

        return redirect()->back();
    }
}
