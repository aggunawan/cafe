<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * @property string name
 */
class Category extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    public function dishes(): HasMany
    {
        return $this->hasMany(Dish::class);
    }
}
