<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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
            'date_of_birth' => 'required|date|max:255',
            'branch_id' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'first_name' => 'Ismi',
            'last_name' => 'Familyasi',
            'phone' => 'Telefon raqami',
            'date_of_birth' => "Tug'ilgan sanasi",
            'image' => 'Rasmi',
            'branch_id' => 'Filiali'
        ];
    }
    public function messages()
    {
//        dd($this->attributes()['first_name']);
//        dd($this->rules());
        return [
            'first_name.required' => $this->attributes()['first_name'] . " maydonini to`ldiring.",
            'last_name.required' => $this->attributes()['last_name'] . " maydonini to`ldiring.",
            'date_of_birth.required' => $this->attributes()['date_of_birth'] . " maydonini to`ldiring.",
            'phone.required' => $this->attributes()['phone'] . " maydonini to`ldiring.",
            'phone.min' => $this->attributes()['phone'] . " maydoni kamida 4 ta belgidan iborat bo`lishi kerak.",
            'branch_id.required' => $this->attributes()['branch_id'] . " maydonini tanlang.",
        ];
    }
}
