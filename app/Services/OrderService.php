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

    public function verify(Order $order)
    {
        $order->status = OrderStatusEnum::VERIFIED();
        $order->save();
    }

    public function place(Order $order)
    {
        $order->status = OrderStatusEnum::PLACED();
        $order->save();
    }
}
