<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Managers\OrderManager;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class OrderStoreController extends Controller
{
    public function __invoke(OrderStoreRequest $request, OrderManager $orderManager): RedirectResponse
    {
        $order = $orderManager->bookOrder($request->get('customer_name'), $request->get('table_number'));
        /** @noinspection PhpUndefinedMethodInspection */
        Alert::success('Order Created');
        return redirect()->route('orders.show', $order->id);
    }
}
