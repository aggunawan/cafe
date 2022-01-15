<?php

namespace App\Orchid\Resources;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class CategoryResource extends Resource
{
    public static $model = Category::class;

    public static function permission(): ?string
    {
        return 'platform.app.categories';
    }

    public function fields(): array
    {
        return [
            Input::make('name')->title('Name')->required(),
        ];
    }

    public function columns(): array
    {
        return [
            TD::make('id'),
            TD::make('name'),
            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),
        ];
    }

    public function legend(): array
    {
        return [
            Sight::make('id'),
            Sight::make('name'),
            Sight::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),
        ];
    }

    public function filters(): array
    {
        return [];
    }

    public function rules(Model $model): array
    {
        return [
            'name' => [
                'required',
                'min:1',
                'max:255'
            ]
        ];
    }
}
