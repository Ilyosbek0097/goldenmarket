<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPayListOutputstoreRequest extends FormRequest
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
            'output_type_id' => 'required',
            'pay_type' => 'required|string',
            'pay_sum' => 'required|numeric|min:1000',
            'comment' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'output_type_id' => "Contragent",
            'pay_type' => "Summa Turi",
            'pay_sum' => "Summa Qiymatini ",
            'comment' => "Izox",
        ];
    }

    public function messages()
    {
        return [
            'output_type_id.required' => "Contragentni Tanlang",
            'pay_type.required' => "Summa Turi Maydonini Tanlang",
            'pay_sum.required' => "Summa Qiymati Maydonini To'ldiring",
            'pay_sum.min' => "Summa Qiymati Maydoni Eng Kam Miqdori 1000 SO'M",
            'comment.required' => "Izox Maydoniga Nimadir Kiriting!",
        ];
    }
}
