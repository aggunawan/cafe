<?php

namespace App\Repositories;

use App\Enums\OrderPaymentTypeEnum;
use App\Enums\OrderStatusEnum;
use App\Models\Order;

class OrderRepository
{
    public function getCreatedOrder(int $id)
    {
        return Order::query()
            ->where('payment_type', OrderPaymentTypeEnum::CREATED())
            ->where('status', OrderStatusEnum::CREATED())
            ->where('id', $id)
            ->first();
    }
}
