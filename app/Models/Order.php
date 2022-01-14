<?php

namespace App\Models;

use App\Enums\OrderPaymentTypeEnum;
use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * @property int $id
 * @property string $customer_name
 * @property int $table_number
 * @property OrderPaymentTypeEnum $payment_type
 * @property OrderStatusEnum $status
 * @property Collection $dishes
 * @property int $total_price
 */
class Order extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    protected $casts = [
        'payment_type' => OrderPaymentTypeEnum::class,
        'status' => OrderStatusEnum::class,
    ];

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class)->withPivot(['quantity', 'price']);
    }

    public function scopePlaced(Builder $builder): Builder
    {
        return $builder->where('status', OrderStatusEnum::PLACED());
    }

    public function getSimpleDetailAttribute(): string
    {
        $payment = OrderPaymentTypeEnum::from($this->payment_type)->label;
        return "$this->id - $this->customer_name (" . number_format($this->total_price) . ') ' . $payment;
    }

    public function getTotalPriceAttribute()
    {
        $total = 0;

        foreach ($this->dishes as $dish) {
            $total += $dish->pivot->quantity * $dish->pivot->price;
        }

        return $total;
    }
}
