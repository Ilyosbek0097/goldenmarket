<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashSaleStoreRequest extends FormRequest
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
            'product_id' => 'required|integer',
            'amount' => 'required|min:0'
        ];
    }
    public function messages()
    {
        return [
            'product_id.required' => "Maxsulot Maydoni Bo'sh",
            'amount.required' => "Maxsulot Miqdori Bo'sh"
        ];
    }
}
