<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyStoreRequest extends FormRequest
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
     *
     */
    public function rules()
    {
        return [
            'uzs' => 'required|numeric|between:0,9999999999999999.99',
            'usd' => 'required|numeric|between:0,9999999999999999.99'
        ];
    }
    public function attributes()
    {
        return [
            'uzs' => "SO`M Qiymati",
            'usd' => "Dollar Qiymati"
        ];
    }

    public function messages()
    {
        return [
            'uzs.required' => "SO`M Qiymati Maydonini To'ldiring",
            'uzs.numeric' => "SO`M Qiymati To'g'ri Emas",
            'usd.required' => "Dollar Qiymati Maydonini To'ldiring",
            'usd.numeric' => "Dollar Qiymati To'g'ri Emas",

        ];

    }
}
