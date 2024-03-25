<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TotalSaleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sales_order' => 'required',
            'total_sales' => 'required',
            'discount_id' => 'required',
            'final_sales' => 'required',
            'pay_cash' => 'required',
            'pay_plastic' => 'required',

        ];
    }
}
