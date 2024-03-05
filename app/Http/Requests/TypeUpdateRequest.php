<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeUpdateRequest extends FormRequest
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
            'type_name' => 'required|unique:types'
        ];
    }

    public function attributes(): array
    {
        return [
            'type_name' => 'Maxsulot Turi',
        ];
    }

    public function messages(): array
    {
        return [
            'type_name.required' => "Maxsulot Turi Maydonini To'ldiring",
            'type_name.unique' => 'Maxsulot Turi Maydonidagi Qiymat Avval Kiritilgan',
        ];
    }
}
