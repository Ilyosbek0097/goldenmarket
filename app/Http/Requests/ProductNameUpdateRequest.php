<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductNameUpdateRequest extends FormRequest
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
     *
     */
    public function rules()
    {
        return [
            'type_id' => 'required',
            'brand_id' => 'required',
            'model_name' => 'required|max:60',
            'barcode' => 'requiredsss'
        ];
    }

    public function attributes()
    {
        return [
            'type_id' => "Maxsulot Turi",
            'brand_id' => "Maxsulot Brendi",
            'old_barcode' => 'Maxsulotning Eski Kodi',
            'model_name' => "Maxsulot Modeli",
            'barcode' => "Maxsulot Barcodi",

        ];
    }

    public function messages()
    {
        return [
            'type_id.required' => "Maxsulot Turini To'ldiring",
            'brand_id.required' => "Maxsulot Brendini To'ldiring",
            'model_name.required' => "Maxsulot Modelini To'ldiring",
            'barcode.required' => "Maxsulot Barcodini To'ldiring",
            'barcode.unique' => "Maxsulot Barcodi Bazada Bor",
        ];
    }
}
