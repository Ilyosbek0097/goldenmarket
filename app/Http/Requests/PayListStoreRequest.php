<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayListStoreRequest extends FormRequest
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
            'pay_sum' => 'required|numeric|min:1000',
            'pay_type' => 'required|string',
            'comment' => 'required|string',
            'output_type_id' => 'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            'pay_sum.required' => "Chiqim Summa Maydonini To'ldiring",
            'pay_sum.min' => "Chiqim Summa Maydonini Eng Kam Miqdori 1000 So'm",
            'pay_type.required' => "To'lov Turi Maydonini Tanlang",
            'comment.required' => "Izoxi Maydoni Bo'sh",
            'output_type_id.required' => "Chiqim Sababini Tanlang"
        ];
    }
}
