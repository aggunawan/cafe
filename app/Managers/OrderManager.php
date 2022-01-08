<?php

namespace App\Managers;

use App\Enums\OrderPaymentTypeEnum;
use App\Enums\OrderStatusEnum;
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

    public function addDishToOrder(Order $order, Dish $dish, int $increment = 1): Order
    {
        return $order->dishes->contains($dish->id) ?
            $this->incrementDishQuantityFromOrder($order, $dish, $increment) :
            $this->addNewDishToOrder($order, $dish);
    }

    protected function addNewDishToOrder(Order $order, Dish $dish): Order
    {
        $order->dishes()->attach($dish->id, ['quantity' => 1, 'price' => $dish->price]);
        $order->save();
        return $order;
    }

    protected function incrementDishQuantityFromOrder(Order $order, Dish $dish, int $increment = 1): Order
    {
        $order->dishes()->updateExistingPivot($dish->id, [
            'quantity' => $increment + $order->dishes()->find($dish->id)->pivot->quantity,
            'price' => $dish->price
        ]);
        $order->save();
        return $order;
    }

    protected function decrementDishQuantityFromOrder(Order $order, Dish $dish, int $decrement = 1): Order
    {
        $order->dishes()->updateExistingPivot($dish->id, [
            'quantity' => $order->dishes()->find($dish->id)->pivot->quantity - $decrement,
            'price' => $dish->price
        ]);
        $order->save();
        return $order;
    }

    public function removeDishFromOrder(Order $order, Dish $dish, int $decrement = 1): Order
    {
        return $order->dishes()->find($dish->id)->pivot->quantity == 1 ||
            $decrement >= $order->dishes()->find($dish->id)->pivot->quantity ?
            $this->removeExistingDishFromOrder($order, $dish) :
            $this->decrementDishQuantityFromOrder($order, $dish, $decrement);
    }

    protected function removeExistingDishFromOrder(Order $order, Dish $dish): Order
    {
        $order->dishes()->detach($dish->id);
        $order->save();
        return $order;
    }

    public function placeOrder(Order $order, int $paymentMethod): Order
    {
        $order->status = OrderStatusEnum::PLACED()->value;
        $order->payment_type = $paymentMethod;

        foreach ($order->dishes as $dish) {
            $order->dishes()->updateExistingPivot($dish->id, ['price' => $dish->price]);
        }

        $order->save();
        return $order;
    }
}
