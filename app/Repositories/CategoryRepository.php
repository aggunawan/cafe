<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getCategories()
    {
        return Category::query()
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getCategory(int $id)
    {
        return Category::query()->find($id);
    }
}
