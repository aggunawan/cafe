<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderDishDeleteRequest;
use App\Managers\OrderManager;
use App\Models\Dish;
use App\Models\Order;
use App\Repositories\DishRepository;
use App\Repositories\OrderRepository;

class OrderDishDeleteController extends Controller
{
    public function __invoke(
        int $id,
        int $dish,
        OrderDishDeleteRequest $request,
        OrderManager $orderManager,
        OrderRepository $orderRepository,
        DishRepository $dishRepository
    )
    {
        $order = $orderRepository->getCreatedOrder($id);
        $dish = $dishRepository->getDish($dish);

        if ($order instanceof Order && $dish instanceof Dish) {
            $order->load(['dishes']);
            $orderManager->removeDishFromOrder($order, $dish, $request->get('decrement') ?? 1);
            return redirect()->route('orders.show', $id);
        }

        return abort(404);
    }
}
