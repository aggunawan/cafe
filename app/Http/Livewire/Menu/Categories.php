<?php

namespace App\Http\Livewire\Menu;

use Livewire\Component;

class Categories extends Component
{
    public $tab;
    public $categories;

    public function mount($categories, $tab)
    {
        $this->categories = $categories;
        $this->tab = $tab;
    }

    public function setTab(int $id)
    {
        $this->tab = $id;
        $this->emit('categorySelected', $id);
    }

    public function render()
    {
        return view('livewire.menu.categories');
    }

}
