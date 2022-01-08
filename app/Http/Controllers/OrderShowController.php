<?php

namespace App\Http\Controllers;

use App\Enums\OrderPaymentTypeEnum;
use App\Models\Order;
use App\Repositories\OrderRepository;

class OrderShowController extends Controller
{
    public function __invoke(int $id, OrderRepository $orderRepository)
    {
        $order = $orderRepository->getCreatedOrder($id);

        if ($order instanceof Order) {
            $order->load(['dishes']);
            $paymentMethods = collect(OrderPaymentTypeEnum::toArray())
                ->except(OrderPaymentTypeEnum::CREATED()->value);
            return view('orders.show', [
                'order' => $order,
                'paymentMethods' => $paymentMethods->toArray(),
            ]);
        }

        return abort(404);
    }
}
