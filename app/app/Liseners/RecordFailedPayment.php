<?php

namespace App\Liseners;

use App\Events\OrderFailed;
use App\Models\Payment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RecordFailedPayment
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
     * @param  OrderFailed $event
     * @return void
     */
    public function handle(OrderFailed $event)
    {
        $event->order->payment()->create([
           Payment::FAILED => true
        ]);
    }
}
