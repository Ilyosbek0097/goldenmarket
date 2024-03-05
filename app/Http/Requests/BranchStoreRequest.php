<?php

namespace App\Http\Requests;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BranchStoreRequest extends FormRequest
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
            'name' => 'required|unique:branches|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255|min:4',
            'image' => 'required|file',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Nomi',
            'phone' => 'Telefon raqami',
            'address' => 'Manzili',
            'image' => 'Rasmi'
        ];
    }
    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => "Filial nomi maydonini to`ldiring.",
            'name.max' => 'Ushbu Qator Toldirilishi shart.',
            'address.required' => "Manzili maydonini to`ldiring.",
            'phone.required' => "Telefon raqami maydonini to`ldiring.",
            'phone.min' => "Telefon raqami maydoni kamida 4 ta belgidan iborat bo`lishi kerak.",
            'image.required' => "Rasmi maydonini to`ldiring.",
        ];
    }


}
