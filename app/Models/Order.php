<?php

namespace App\Models;

use App\Enums\OrderPaymentTypeEnum;
use App\Enums\OrderStatusEnum;
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
}
