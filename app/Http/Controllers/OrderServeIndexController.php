<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;

class OrderServeIndexController extends Controller
{
    public function __invoke(OrderRepository $orderRepository)
    {
        $orders = $orderRepository->getVerifiedOrdersQuery()->with(['dishes'])->get();

        return view('orders.servers.index', [
            'orders' => $orders
        ]);
    }
}
