<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseStoreRequest extends FormRequest
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
            'addproduct_id' => 'required|numeric'
        ];
    }

    public function attributes()
    {
        return [
            'addproduct_id' => "Maxsulot Ma'lumoti"
        ];
    }

    public function messages()
    {
        return [
            'addproduct_id.required' => "Maxsulot Qabul Qilishda Xatolik Sodir Bo'ldi Iltimos Qaytadan Urinib Ko'ring!",
            'addproduct_id.numeric' => "Maxsulot Qabul Qilishda Xatolik Sodir Bo'ldi Iltimos Qaytadan Urinib Ko'ring!"
        ];
    }
}
