<?php

namespace App\Orchid\Resources;

use App\Enums\OrderPaymentTypeEnum;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class OrderResource extends Resource
{
    public static $model = Order::class;
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function paginationQuery(ResourceRequest $request, Model $model): Builder
    {
        return $this->orderRepository->getPlacedOrdersQuery();
    }

    public function modelQuery(ResourceRequest $request, Model $model): Builder
    {
        return $this->orderRepository->getPlacedOrdersQuery();
    }

    public function fields(): array
    {
        return [];
    }

    public function with(): array
    {
        return ['dishes'];
    }

    public function columns(): array
    {
        return [
            TD::make('id'),
            TD::make('customer_name', 'Customer'),
            TD::make('table_number', 'Table'),
            TD::make('items', 'Items')->render(function ($model) {
                return number_format($model->dishes()->sum('quantity'));
            }),
            TD::make('total_price', 'Total Price')->render(function ($model) {
                $total = 0;
                foreach ($model->dishes as $dish) {
                    $total += $dish->pivot->quantity * $dish->pivot->price;
                }
                return number_format($total);
            }),
            TD::make('payment_type', 'Payment')->render(function ($model) {
                return OrderPaymentTypeEnum::from($model->payment_type)->label;
            }),
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
            Sight::make('customer_name', 'Customer name'),
            Sight::make('table_number', 'Table'),
            Sight::make('items', 'Items')->render(function ($model) {
                return number_format($model->dishes()->sum('quantity'));
            }),
            Sight::make('total_price', 'Total Price')->render(function ($model) {
                $total = 0;
                foreach ($model->dishes as $dish) {
                    $total += $dish->pivot->quantity * $dish->pivot->price;
                }
                return number_format($total);
            }),
            Sight::make('payment_type', 'Payment')->render(function ($model) {
                return OrderPaymentTypeEnum::from($model->payment_type)->label;
            }),
            Sight::make('dishes')->render(function ($model) {
                $dishes = collect();

                foreach ($model->dishes as $dish) {
                    $dishes->push("$dish->name x {$dish->pivot->quantity} @ {$dish->pivot->price}");
                }

                return $dishes->join(', ');
            }),
        ];
    }

    public function filters(): array
    {
        return [];
    }
}
