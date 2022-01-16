<?php

namespace App\Services;

use App\Enums\OrderPaymentTypeEnum;
use App\Models\Order;
use App\Models\Payment;

class PaymentService
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function pay(Order $order, int $pay = null): Payment
    {
        $payment = new Payment();
        $payment->change = 0;
        $payment->order()->associate($order);

        if ($order->payment_type->equals(OrderPaymentTypeEnum::CASH())) {
            $payment->change = $pay - $order->total_price;
            $payment->paid = $pay;
        } else {
            $payment->paid = $order->total_price;
        }

        $payment->save();
        $this->orderService->verify($order);

        return $payment;
    }

    public function delete(Payment $payment)
    {
        $this->orderService->place($payment->order);
        $payment->delete();
    }
}
