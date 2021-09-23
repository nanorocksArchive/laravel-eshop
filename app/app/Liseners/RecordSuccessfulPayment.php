<?php

namespace App\Liseners;

use App\Events\OrderWasCreated;
use App\Models\Payment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RecordSuccessfulPayment
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
     * @param  OrderWasCreated  $event
     * @return void
     */
    public function handle(OrderWasCreated $event)
    {
        $event->order->payment()->create([
            Payment::FAILED => false,
            Payment::TRANSACTION_ID => $event->transactionId
        ]);
    }
}
