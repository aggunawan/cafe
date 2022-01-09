<?php

namespace App\Orchid\Resources;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class DishResource extends Resource
{
    public static $model = Dish::class;

    public function with(): array
    {
        return [
            'category',
        ];
    }

    /**
     * @throws BindingResolutionException
     */
    public function fields(): array
    {
        return [
            Input::make('name')->title('Name')->required(),
            Input::make('description')->title('Description')->required(),
            Input::make('price')->title('Price')->type('number')->required(),
            Picture::make('picture')->title('Picture')->required(),
            Relation::make('category_id')->title('Category')->fromModel(Category::class, 'name')->required(),
        ];
    }

    public function rules(Model $model): array
    {
        return [
            'name' => ['required', 'min:1', 'max:255'],
            'description' => ['required', 'min:1', 'max:255'],
            'price' => ['required', 'min:1', 'numeric'],
            'picture' => ['required'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }

    public function columns(): array
    {
        return [
            TD::make('id'),
            TD::make('name'),
            TD::make('price')->render(function ($model) {
                return number_format($model->price);
            }),
            TD::make('category')->render(function ($model) {
                return $model->category->name;
            }),
            TD::make('created_at', 'Date of creation')->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
        ];
    }

    public function legend(): array
    {
        return [
            Sight::make('id'),
            Sight::make('name'),
            Sight::make('description'),
            Sight::make('price')->render(function ($model) {
                return number_format($model->price);
            }),
            Sight::make('category')->render(function ($model) {
                return $model->category->name;
            }),
            Sight::make('picture')->render(function ($model) {
                return "<img src='$model->picture' alt='$model->name' class='mw-100 d-block img-fluid'>";
            }),
            Sight::make('created_at', 'Date of creation')->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
        ];
    }

    public function filters(): array
    {
        return [];
    }
}
