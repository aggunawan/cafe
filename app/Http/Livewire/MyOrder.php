<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class MyOrder extends Component
{
    public Order $order;

    public function render()
    {
        return view('livewire.my-order');
    }

    public function mount(Order $order)
    {
        $this->order = $order;
    }
}
