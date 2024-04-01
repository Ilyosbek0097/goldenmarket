<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPayListStoreRequest extends FormRequest
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
            'pay_list_id' => 'required|numeric',
            'check_status' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'pay_list_id' => "Pay List Bo'sh",
            'check_status' => "Tasdiqlash Elementi Bo'sh"
        ];
    }
}
