<?php

namespace App\Listeners;

use App\Events\OrderPlacedNotificationEvent;
use App\Mail\OrderNotifyEmail;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class OrderPlacedNotificationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderPlacedNotificationEvent $event): void
    {
        $orderId = $event->orderId;
        $order = Order::with('user')->find($orderId);
        Mail::send(new OrderNotifyEmail($order));

    }
}
