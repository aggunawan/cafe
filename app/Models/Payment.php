<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * @property Order $order
 */
class Payment extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
