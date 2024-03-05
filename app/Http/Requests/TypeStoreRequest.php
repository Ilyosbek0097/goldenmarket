<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type_name' => 'required|unique:types'
        ];
    }

    public function attributes()
    {
        return [
            'type_name' => 'Maxsulot Turi'
        ];
    }

    public function messages()
    {
        return [
            'type_name.required' => "Maxsulot Turi Maydonini To'ldiring",
            'type_name.unique' => 'Maxsulot Turi Maydonidagi Qiymat Avval Kiritilgan',
        ];
    }
}
