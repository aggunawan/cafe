<?php

namespace App\Http\Requests;

use App\Enums\OrderPaymentTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderPlaceStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'payment_method' => [
                'required',
                Rule::in([
                    OrderPaymentTypeEnum::CASH()->value,
                    OrderPaymentTypeEnum::CASHLESS()->value,
                ])
            ]
        ];
    }
}
