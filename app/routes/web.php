<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/auth', [\App\Http\Controllers\AuthController::class, 'index'])->name('index.auth');

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index.home');

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('index.cart');
Route::get('/cart/add/{slug}/{quantity}', [\App\Http\Controllers\CartController::class, 'add'])->name('add.cart');
Route::get('/cart/update/{slug}/{quantity}', [\App\Http\Controllers\CartController::class, 'update'])->name('update.cart');

Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'index'])->name('index.checkout');
Route::post('/checkout', [\App\Http\Controllers\CheckoutController::class, 'order'])->name('order.checkout');
Route::post('/checkout/token', [\App\Http\Controllers\CheckoutController::class, 'getPaymentToken'])->name('order.checkout.paymentToken');

Route::get('/order/{hash}', [\App\Http\Controllers\OrderController::class, 'index'])->name('order.index');

Route::get('/products/{slug}', [\App\Http\Controllers\ProductController::class, 'index'])->name('index.product');

Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index'])->name('index.shop');

Route::get('/contact', [\App\Http\Controllers\StaticPageController::class, 'contact'])->name('index.contact');

Route::get('/about', [\App\Http\Controllers\StaticPageController::class, 'about'])->name('index.about');

// Admin

Route::get('/dashboard', function () {
    return redirect()->route('admin.orders.index');
})->middleware(['auth']);

Route::group(['prefix'=>'admin','as'=>'admin.', 'middleware' => ['auth:web']], function(){
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders.index');
    Route::get('/orders/{operation}', [AdminController::class, 'orders']);
    Route::get('/orders/{operation}/{id}', [AdminController::class, 'orders']);
    Route::post('/orders', [AdminController::class, 'orders']);
    Route::post('/orders/{operation}', [AdminController::class, 'orders']);
    Route::post('/orders/{operation}/{id}', [AdminController::class, 'orders']);


    Route::get('/products', [AdminController::class, 'products'])->name('products.index');
    Route::get('/products/{operation}', [AdminController::class, 'products']);
    Route::get('/products/{operation}/{id}', [AdminController::class, 'products']);
    Route::post('/products', [AdminController::class, 'products']);
    Route::post('/products/{operation}', [AdminController::class, 'products']);
    Route::post('/products/{operation}/{id}', [AdminController::class, 'products']);
});
