<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all()->chunk(4);
        return view('pages.home', compact('products'));
    }
}
