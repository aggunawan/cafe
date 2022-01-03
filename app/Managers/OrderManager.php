<?php

namespace App\Managers;

use App\Enums\OrderPaymentTypeEnum;
use App\Models\Order;

class OrderManager
{
    public function bookOrder(string $customer, int $table): Order
    {
        $order = new Order();
        $order->customer_name = $customer;
        $order->table_number = $table;
        $order->payment_type = OrderPaymentTypeEnum::CREATED();
        $order->status = 1;
        $order->save();

        return $order;
    }
}
