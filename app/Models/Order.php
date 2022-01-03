<?php

namespace App\Models;

use App\Enums\OrderPaymentTypeEnum;
use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $customer_name
 * @property int $table_number
 * @property OrderPaymentTypeEnum $payment_type
 * @property OrderStatusEnum $status
 */
class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'payment_type' => OrderPaymentTypeEnum::class,
        'status' => OrderStatusEnum::class,
    ];

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class);
    }
}
