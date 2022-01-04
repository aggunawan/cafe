<?php

namespace App\Managers;

use App\Enums\OrderPaymentTypeEnum;
use App\Models\Dish;
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

    public function addDishToOrder(Order $order, Dish $dish): Order
    {
        $order->dishes()->attach($dish->id, ['quantity' => 1, 'price' => $dish->price]);
        $order->save();

        return $order;
    }
}
