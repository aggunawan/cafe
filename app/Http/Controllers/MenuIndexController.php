<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;

class MenuIndexController extends Controller
{
    public function __invoke(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->getCategories();

        return view('menus.index', [
            'categories' => $categories,
        ]);
    }
}
