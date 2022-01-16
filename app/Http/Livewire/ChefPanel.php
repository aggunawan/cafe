<?php

namespace App\Http\Livewire;

use App\Repositories\OrderRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ChefPanel extends Component
{
    public Collection $orders;

    public function render()
    {
        return view('livewire.chef-panel');
    }

    public function mount($orders)
    {
        $this->orders = $orders;
    }

    public function fetchOrders(OrderRepository $orderRepository)
    {
        $this->orders = $orderRepository->getVerifiedOrdersQuery()->with(['dishes'])->get();
    }
}
