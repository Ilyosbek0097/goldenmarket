<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarkUpdateRequest extends FormRequest
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
            'mark_name' => 'required',
            'type' => 'required',
            'value' => 'required|float',
        ];
    }

    public function attributes()
    {
        return [
            'mark_name' => "Natsenkasi Nomi",
            'type' => "Natsenka Tipi",
            'value' => "Natsenka Qiymati"
        ];
    }
    public function messages()
    {
        return [
            'mark_name.required' => "Natsenka Nomini Kiriting",
            'type.required' => "Natsenka Tipini Tanlang",
            'value.required' => "Natsenka Qiymatini Kiriting",
        ];
    }
}
