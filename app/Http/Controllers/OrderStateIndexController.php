<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Repositories\OrderRepository;

class OrderStateIndexController extends Controller
{
    public function __invoke(
        int $id,
        OrderRepository $orderRepository
    )
    {
        $order = $orderRepository->getPlacedOrder($id);
        if ($order instanceof Order) {
            $order->load(['dishes']);
            return view('orders.states.index', [
                'order' => $order
            ]);
        }
        return abort(404);
    }
}
