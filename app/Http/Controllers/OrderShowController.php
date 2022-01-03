<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Repositories\OrderRepository;

class OrderShowController extends Controller
{
    public function __invoke(int $id, OrderRepository $orderRepository)
    {
        $order = $orderRepository->getCreatedOrder($id);
        return ($order instanceof Order) ? view('orders.show') : abort(404);
    }
}
