<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderDishStoreRequest;
use App\Managers\OrderManager;
use App\Models\Dish;
use App\Models\Order;
use App\Repositories\DishRepository;
use App\Repositories\OrderRepository;
use Illuminate\Http\RedirectResponse;

class OrderDishStoreController extends Controller
{
    public function __invoke(
        int $order,
        OrderDishStoreRequest $request,
        OrderManager $orderManager,
        OrderRepository $orderRepository,
        DishRepository $dishRepository
    ): RedirectResponse
    {
        $order = $orderRepository->getCreatedOrder($order);
        $dish = $dishRepository->getDish($request->get('dish_id'));

        if ($order instanceof Order && $dish instanceof Dish) {
            $orderManager->addDishToOrder($order, $dish);
        }

        return redirect()->route('orders.show', $order->id);
    }
}
