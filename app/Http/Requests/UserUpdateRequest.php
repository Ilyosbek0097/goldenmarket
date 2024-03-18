<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:'.User::class,
            'role' => 'required|string',
            'branch_id' => 'required|numeric',
            'current_password' => ['required', 'confirmed', Password::defaults()]
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Xodim Ismi',
            'email' => 'Email Manzili',
            'role' => "Mavqeyi",
            'branch_id' => "Filiali",
            'password' => "Paroli",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Xodim Ismi Bo'sh",
            'name.string' => "Xodim Ismi Maydoni To'g'ri Emas",
            'emil.required' => "Email Manzili Bo'sh",
            'emil.unique' => "Email Manzili Qiymati Bazada Bor",
            'emil.email' => "Email Manzili Maydoni Qiymati To'g'ri Emas",
            'role.required' => "Mavqeyi Bo'sh",
            'branch_id.required' => "Filialni Tanlang",
            'password.required' => "Parolni Kiriting",
            'password.confirmed' => "Parolni Tasdiqlash Maydoni Xato Kiritilgan"
        ];
    }
}
