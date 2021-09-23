<?php

namespace App\Providers;

use App\Events\OrderFailed;
use App\Events\OrderWasCreated;
use App\Liseners\EmptyBasket;
use App\Liseners\MarkOrderPaid;
use App\Liseners\RecordFailedPayment;
use App\Liseners\RecordSuccessfulPayment;
use App\Liseners\SendEmailForOrder;
use App\Liseners\UpdateStock;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

class EventServiceProvider extends ServiceProvider
{

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderWasCreated::class => [
            UpdateStock::class,
            MarkOrderPaid::class,
            RecordSuccessfulPayment::class,
            SendEmailForOrder::class,
            EmptyBasket::class,
        ],
        OrderFailed::class => [
            RecordFailedPayment::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

    }
}
