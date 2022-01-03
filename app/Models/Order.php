<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string customer_name
 * @property int table_number
 * @property int payment_type
 * @property int status
 */
class Order extends Model
{
    use HasFactory;

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class);
    }
}
