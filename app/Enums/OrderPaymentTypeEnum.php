<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self CREATED()
 * @method static self CASH()
 * @method static self CASHLESS()
 */
final class OrderPaymentTypeEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'CREATED' => 1,
            'CASH' => 2,
            'CASHLESS' => 3,
        ];
    }
}
