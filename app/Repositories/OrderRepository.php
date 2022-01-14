<?php

namespace App\Repositories;

use App\Enums\OrderPaymentTypeEnum;
use App\Enums\OrderStatusEnum;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;

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

    public function getPlacedOrder(int $id)
    {
        return Order::query()
            ->where('payment_type','!=', OrderPaymentTypeEnum::CREATED())
            ->where('status', OrderStatusEnum::PLACED())
            ->where('id', $id)
            ->first();
    }

    public function getPlacedOrdersQuery(): Builder
    {
        return Order::query()
            ->where('payment_type','!=', OrderPaymentTypeEnum::CREATED())
            ->where('status', OrderStatusEnum::PLACED());
    }

    public function getConfirmedOrder(int $id)
    {
        return Order::query()
            ->where('payment_type','!=', OrderPaymentTypeEnum::CREATED())
            ->whereIn('status', [OrderStatusEnum::PLACED(), OrderStatusEnum::VERIFIED()])
            ->where('id', $id)
            ->first();
    }

    public function getVerifiedOrder(int $id)
    {
        return Order::query()
            ->where('payment_type','!=', OrderPaymentTypeEnum::CREATED())
            ->whereIn('status', [OrderStatusEnum::VERIFIED()])
            ->where('id', $id)
            ->first();
    }

    public function getVerifiedOrdersQuery(): Builder
    {
        return Order::query()
            ->where('payment_type','!=', OrderPaymentTypeEnum::CREATED())
            ->whereIn('status', [OrderStatusEnum::VERIFIED()]);
    }
}
