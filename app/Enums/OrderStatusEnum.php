<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self CREATED()
 * @method static self PLACED()
 * @method static self VERIFIED()
 * @method static self SERVED()
 */
final class OrderStatusEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'CREATED' => 1,
            'PLACED' => 2,
            'VERIFIED' => 3,
            'SERVED' => 4,
        ];
    }
}
