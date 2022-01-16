<?php

namespace App\Http\Controllers;

use App\Enums\OrderPaymentTypeEnum;
use App\Models\Order;
use App\Repositories\CategoryRepository;
use App\Repositories\OrderRepository;

class OrderShowController extends Controller
{
    public function __invoke(int $id, OrderRepository $orderRepository, CategoryRepository $categoryRepository)
    {
        $order = $orderRepository->getCreatedOrder($id);

        if ($order instanceof Order) {
            $order->load(['dishes']);
            $paymentMethods = collect(OrderPaymentTypeEnum::toArray())
                ->except(OrderPaymentTypeEnum::CREATED()->value);

            return view('orders.show', [
                'order' => $order,
                'categories' => $categoryRepository->getCategories(),
                'paymentMethods' => $paymentMethods->toArray(),
            ]);
        }

        return abort(404);
    }
}
