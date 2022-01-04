<?php

namespace App\Repositories;

use App\Models\Dish;

class DishRepository
{
    public function getDish(int $id)
    {
        return Dish::query()->find($id);
    }
}
