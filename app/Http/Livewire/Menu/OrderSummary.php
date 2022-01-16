<?php

namespace App\Http\Livewire\Menu;

use App\Managers\OrderManager;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class OrderSummary extends Component
{
    public ?Order $order;

    public int $paymentMethod = 2;

    protected $listeners = [
        'cartUpdated' => 'setOrder'
    ];

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.menu.order-summary');
    }

    public function setOrder($order, OrderRepository $orderRepository)
    {
        $this->order = $orderRepository->getCreatedOrder($order);
        if ($this->order instanceof Order) $this->order->load(['dishes']);
    }

    public function setPaymentMethod(int $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function submitOrder(OrderManager $orderManager)
    {
        $orderManager->placeOrder($this->order, $this->paymentMethod);
        Alert::success('Order Placed', 'Please paid Your Order at Cashier');
        return redirect()->route('orders.states.index', $this->order->id);
    }
}
