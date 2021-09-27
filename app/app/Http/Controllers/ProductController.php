<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index(string $slug)
    {
        $product = Product::where(Product::SLUG, $slug)->with('productImages')->first();
        if($product == null)
        {
            return redirect()->to('/');
        }

        $products = Product::all()->random(6)->chunk(3);
        $random = Product::all()->random(3)->chunk(1);
        $best = Product::all()->random(3);
        return view('pages.product', compact('products', 'random', 'best', 'product'));
    }
}
