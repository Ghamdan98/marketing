<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [

            'title' => 'New Order',

            'message' => 'Order #' . $this->order->id . ' has been placed.',

            'icon' => 'shopping-cart',

            'url' => route('order.details', $this->order),

            'order_id' => $this->order->id,

        ];
    }
}