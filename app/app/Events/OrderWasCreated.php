<?php

namespace App\Events;

use App\Basket\Basket;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderWasCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Order $order;
    public Basket $basket;
    public $transactionId;
    public Customer $customer;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order $order, Basket $basket, Customer $customer, $transactionId=null)
    {
        $this->order = $order;
        $this->basket = $basket;
        $this->transactionId = $transactionId;
        $this->customer = $customer;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
