<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
            'student_code' => 'required|unique:students|max:255',
            'image' => 'required|file',
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
            'student_code' => "ID raqami",
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
            'student_code.required' => $this->attributes()['student_code'] . " maydonini to`ldiring.",
            'student_code.unique' => $this->attributes()['student_code'] . " maydonidagi ma'lumot bazada bor. Takroran kiriting.",
            'phone.min' => $this->attributes()['phone'] . " maydoni kamida 4 ta belgidan iborat bo`lishi kerak.",
            'image.required' => $this->attributes()['image'] . " maydonini to`ldiring.",
            'branch_id.required' => $this->attributes()['branch_id'] . " maydonini tanlang.",
        ];
    }
}
