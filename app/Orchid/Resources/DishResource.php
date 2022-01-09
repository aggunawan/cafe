<?php

namespace App\Orchid\Resources;

use App\Models\Dish;
use Orchid\Crud\Resource;
use Orchid\Screen\TD;

class DishResource extends Resource
{
    public static $model = Dish::class;

    public function fields(): array
    {
        return [];
    }

    public function columns(): array
    {
        return [
            TD::make('id'),
            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),
        ];
    }

    public function legend(): array
    {
        return [];
    }

    public function filters(): array
    {
        return [];
    }
}
