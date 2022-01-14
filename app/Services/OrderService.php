<?php

namespace App\Services;

use App\Enums\OrderStatusEnum;
use App\Models\Order;

class OrderService
{
    public function serve(Order $order)
    {
        $order->status = OrderStatusEnum::SERVED();
        $order->save();
    }
}
