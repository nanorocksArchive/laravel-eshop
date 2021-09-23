<?php

namespace App\Liseners;

use App\Events\OrderWasCreated;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStock
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param OrderWasCreated $event
     * @return void
     */
    public function handle(OrderWasCreated $event)
    {
        foreach ($event->basket->all() as $product) {
            $product->decrement(Product::STOCK, $product->quantity);
        }
    }
}
