<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutputTypeRequest extends FormRequest
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
//     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'branch_id' => 'required|numeric'
        ];
    }

    public function attributes()
    {
        return [
            'name' => "Chiqim Turi",
            'branch_id' => "Filiali"
        ];

    }

    public function messages()
    {
       return [
           'name.required' => "Chiqim Turi Maydoni Bo'sh",
           'branch_id.required' => "Filiali Maydoni Bo'sh"
       ];
    }


}
