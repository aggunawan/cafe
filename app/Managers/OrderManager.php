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

    public function addDishToOrder(Order $order, Dish $dish, int $increment = null): Order
    {
        return $order->dishes->contains($dish->id) ?
            $this->updateDishQuantityFromOrder($order, $dish, $increment) :
            $this->addNewDishToOrder($order, $dish);
    }

    protected function addNewDishToOrder(Order $order, Dish $dish): Order
    {
        $order->dishes()->attach($dish->id, ['quantity' => 1, 'price' => $dish->price]);
        $order->save();
        return $order;
    }

    protected function updateDishQuantityFromOrder(Order $order, Dish $dish, int $increment = 1): Order
    {
        $order->dishes()->updateExistingPivot($dish->id, [
            'quantity' => $increment + $order->dishes()->find($dish->id)->pivot->quantity,
            'price' => $dish->price
        ]);
        $order->save();
        return $order;
    }
}
