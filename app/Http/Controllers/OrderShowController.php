<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Repositories\OrderRepository;

class OrderShowController extends Controller
{
    public function __invoke(int $id, OrderRepository $orderRepository)
    {
        $order = $orderRepository->getCreatedOrder($id);
        $order->load(['dishes']);

        return ($order instanceof Order) ?
            view('orders.show', ['order' => $order]) :
            abort(404);
    }
}
