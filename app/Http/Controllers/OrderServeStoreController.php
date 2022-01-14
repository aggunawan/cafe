<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Http\Requests\OrderServeStoreRequest;
use App\Models\Order;
use App\Repositories\OrderRepository;
use App\Services\OrderService;
use Illuminate\Http\RedirectResponse;

class OrderServeStoreController extends Controller
{
    public function __invoke(
        OrderServeStoreRequest $request,
        OrderService $orderService,
        OrderRepository $orderRepository
    ): RedirectResponse
    {
        $order = $orderRepository->getConfirmedOrder($request->get('order_id'));

        if ($order instanceof Order) {
            if ($order->status->equals(OrderStatusEnum::VERIFIED())) {
                $orderService->serve($order);
                return redirect()->route('orders.servers.index');
            }
        }

        return abort(404);
    }
}
