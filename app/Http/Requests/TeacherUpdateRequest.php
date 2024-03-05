<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required|max:255|min:4',
            'degree' => 'required|max:255',
            'image' => 'file',
        ];
    }
    public function attributes()
    {
        return [
            'first_name' => 'Ismi',
            'last_name' => 'Familyasi',
            'phone' => 'Telefon raqami',
            'degree' => "Ma'lumoti",
            'image' => 'Rasmi'
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => $this->attributes()['first_name']." maydonini to`ldiring.",
            'last_name.required' => $this->attributes()['last_name']." maydonini to`ldiring.",
            'degree.required' => $this->attributes()['degree']." maydonini to`ldiring.",
            'phone.required' => $this->attributes()['phone']." maydonini to`ldiring.",
            'phone.min' => $this->attributes()['phone']." maydoni kamida 4 ta belgidan iborat bo`lishi kerak.",
        ];
    }
}
