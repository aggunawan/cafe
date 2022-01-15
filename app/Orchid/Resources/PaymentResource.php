<?php

namespace App\Orchid\Resources;

use App\Enums\OrderPaymentTypeEnum;
use App\Models\Order;
use App\Models\Payment;
use App\Repositories\OrderRepository;
use App\Services\PaymentService;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class PaymentResource extends Resource
{
    public static $model = Payment::class;

    private $paymentService;
    private $orderRepository;

    public function __construct(PaymentService $paymentService, OrderRepository $orderRepository)
    {
        $this->paymentService = $paymentService;
        $this->orderRepository = $orderRepository;
    }

    public function with(): array
    {
        return [
            'order'
        ];
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function fields(): array
    {
        return [
            Relation::make('order_id')
                ->fromModel(Order::class, 'id')->required()
                ->applyScope('placed')
                ->displayAppend('simpleDetail')
                ->required()
                ->title('Order'),
            Input::make('paid')->type('number')->title('Paid')->help('* Leave empty if Cashless'),
        ];
    }


    public function columns(): array
    {
        return [
            TD::make('order_id', 'Order'),
            TD::make('paid')
                ->render(function ($model) {
                    return number_format($model->paid);
                }),
            TD::make('change')
                ->render(function ($model) {
                    return number_format($model->change);
                }),
            TD::make('customer')
                ->render(function ($model) {
                    return $model->order->customer_name;
                }),
            TD::make('method')
                ->render(function ($model) {
                    return OrderPaymentTypeEnum::from($model->order->payment_type)->label;
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
            Sight::make('order_id', 'Order'),
            Sight::make('paid')
                ->render(function ($model) {
                    return number_format($model->paid);
                }),
            Sight::make('change')
                ->render(function ($model) {
                    return number_format($model->change);
                }),
            Sight::make('customer')
                ->render(function ($model) {
                    return $model->order->customer_name;
                }),
            Sight::make('method')
                ->render(function ($model) {
                    return OrderPaymentTypeEnum::from($model->order->payment_type)->label;
                }),
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

    /** @noinspection PhpUnhandledExceptionInspection */
    public function rules(Model $model): array
    {
        $order = $this->orderRepository->getPlacedOrder(request()->get('model')['order_id']);
        $paidRules = ['nullable'];

        if ($order instanceof Order) {
            $paid = $order->total_price;

            if ($order->payment_type->equals(OrderPaymentTypeEnum::CASH())) {
                $paidRules = ['numeric', "min:$paid", 'required'];
            }
        }

        return [
            'order_id' => ['required', 'exists:orders,id'],
            'paid' => $paidRules,
        ];
    }

    public function onSave(ResourceRequest $request, Model $model)
    {
        $order = $this->orderRepository->getPlacedOrder($request->validated()['model']['order_id']);
        if ($order instanceof Order) $this->paymentService->pay($order, $request->all()['paid']);
    }

    public function onDelete(Model $model)
    {
        if ($model instanceof Payment) $this->paymentService->delete($model);
    }
}
