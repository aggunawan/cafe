<?php

namespace App\Http\Livewire\Menu\Dishes;

use App\Managers\OrderManager;
use App\Models\Dish;
use App\Models\Order;
use App\Repositories\DishRepository;
use Livewire\Component;

class Cart extends Component
{
    public ?Dish $dish;

    public int $quantity = 0;

    public int $price;

    public array $orders = [];

    public ?Order $order;

    protected $listeners = [
        'setDish' => 'setDish'
    ];

    public function render()
    {
        return view('livewire.menu.dishes.cart');
    }

    public function mount($dish, $order)
    {
        $this->dish = $dish;
        $this->order = $order;

        foreach ($this->order->dishes as $dish) {
            $this->orders[$dish->id] = $dish->pivot->quantity;
        }
    }

    public function add(OrderManager $orderManager)
    {
        if ($this->order instanceof Order && $this->dish instanceof Dish) {
            $this->order = $orderManager->addDishToOrder($this->order, $this->dish);
            /** @noinspection PhpUndefinedFieldInspection */
            if ($this->order->dishes->find($this->dish->id)->pivot->quantity == $this->quantity + 1) {
                $this->quantity++;
                $this->calc();
            }
        }
    }

    public function sub(OrderManager $orderManager)
    {
        if ($this->quantity > 0) {
            if ($this->order instanceof Order && $this->dish instanceof Dish) {
                $this->order = $orderManager->removeDishFromOrder($this->order, $this->dish);
                /** @noinspection PhpUndefinedFieldInspection */
                if ($this->order->dishes->find($this->dish->id)->pivot->quantity == $this->quantity - 1) {
                    $this->quantity--;
                    $this->calc();
                }
            }
        }
    }

    protected function calc(): void
    {
        $this->price = $this->quantity * $this->dish->price;
        if ($this->quantity > 0) {
            $orders = collect($this->orders);
            $orders->put($this->dish->id, $this->quantity);
            $this->orders = $orders->toArray();
            $this->emit('cartUpdated', $this->order->id);
        }
    }

    public function setDish($dish, DishRepository $dishRepository)
    {
        $this->dish = $dishRepository->getDish($dish);
        $this->quantity = collect($this->orders)->get($this->dish->id, 0);
        $this->calc();
    }
}
