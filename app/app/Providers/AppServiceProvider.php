<?php

namespace App\Providers;

use App\Basket\Basket;
use App\Support\Storage\CartStorage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->singleton(Basket::class, function ($app) {
//            $basket = new Basket();
//
//            View::share('basket', $basket);
//
//            return $basket;
//        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        CartStorage::init();
    }
}
