<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderPlaceStoreRequest;
use App\Managers\OrderManager;
use App\Models\Order;
use App\Repositories\OrderRepository;

class OrderPlaceStoreController extends Controller
{
    public function __invoke(
        int $id,
        OrderPlaceStoreRequest $request,
        OrderManager $orderManager,
        OrderRepository $orderRepository
    )
    {
        $order = $orderRepository->getCreatedOrder($id);
        if ($order instanceof Order) {
            $orderManager->placeOrder($order, $request->get('payment_method'));
            return redirect()->route('orders.create');
        }
        return abort(404);
    }
}
