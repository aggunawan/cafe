<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self CREATED()
 */
final class OrderStatusEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'CREATED' => 1
        ];
    }
}