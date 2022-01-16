<?php

namespace App\Http\Livewire\Menu\Dishes;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'categorySelected' => 'getDishes'
    ];

    public ?Category $category;

    public function mount(CategoryRepository $categoryRepository, $tab)
    {
        $this->getDishes($tab, $categoryRepository);
    }

    public function render()
    {
        return view('livewire.menu.dishes.index');
    }

    public function getDishes(int $id, CategoryRepository $categoryRepository)
    {
        $this->category = $categoryRepository->getCategory($id)->load(['dishes']);
    }
}
