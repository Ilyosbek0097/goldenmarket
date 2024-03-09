<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierStoreRequest extends FormRequest
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
            'full_name' => 'required|string|max:60|min:2',
            'address' => 'required|string|max:200|min:2',
            'phone1' => 'required|string|min:14',
            'code' => 'required|max:5',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'full_name' => "To'liq Ismi",
            'address' => "Manzili",
            'phone1' => "Telefon Raqami 1",
            'phone2' => "Telefon Raqami 2",
            'code' => "Contragent Kodi",
            'passport_image' => "Pasport Rasmi"
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'full_name.required' => "To'liq Ismi Maydonini To'ldiring!",
            'full_name.string' => "To'liq Ismi Maydoni Matn Ko'rinishida!",
            'full_name.max' => "To'liq Ismi Maydoni Qiymati Oshib Ketti!",
            'full_name.min' => "To'liq Ismi Maydoni Qiymati Eng Kamida 2 Ta Qiymat Bo'lishi Kerak!",
            'address.required' => "Manzili Maydonini To'ldiring",
            'phone1.required' => "Telefon Raqami 1 Maydonini To'ldiring!",
            'phone1.min' => "Telefon Raqami 1 Maydonini To'liq To'ldiring!",
            'code' => "Contragent Kodi Maydonini To'ldiring",

        ];
    }
}
