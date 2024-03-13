<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductStoreRequest extends FormRequest
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
            'register_date' => 'required|date',
            'product_id' => 'required',
            'amount' => 'required|numeric|between:0,9999999999999999.99',
            'body_price_usd' => 'required|numeric|between:0,9999999999999999.99',
            'body_price_uzs' => 'required|numeric|between:0,9999999999999999.99',
            'sales_price' => 'required|numeric|between:0,9999999999999999.99',
            'supplier_id' => 'required',
            'mark_id' => 'required',
            'branch_id' => 'required',
            'invoice_order' => 'required'

        ];
    }



    public function attributes()
    {
        return [
            'register_date' => 'Kiritish Sanasi',
            'product_id' => "Maxsulot",
            'amount' => "Maxsulot Miqdori",
            'body_price_usd' => "Kirim Narxi Dollar",
            'body_price_uzs' => "Kirim Narxi So'm",
            'sales_price' => "Sotish Narxi",
            'supplier_id' => "Contragent",
            'mark_id' => "Natsenka",
            'branch_id' => "Filial",
            'invoice_order' => "Invoice Raqami"
        ];
    }
    public function messages()
    {
        return [
            'register_date.required' => "Kiritish Sanasini To'ldiring",
            'register_date.date' => "Kiritish Sanasini Qiymati To'g'ri Emas",
            'product_id.required' => "Maxsulot Tanlang",
            'amount.required' => "Maxsulot Miqdori Maydonini To'ldiring",
            'amount.numeric' => "Maxsulot Miqdori Maydoni Qiymati To'g'ri Emas",
            'body_price_usd.required' => "Kirim Narxi Dollar Maydonini To'ldiring",
            'body_price_usd.numeric' => "Kirim Narxi Dollar Maydonini Qiymati To'g'ri Emas",
            'body_price_uzs.required' => "Kirim Narxi So'm Maydonini To'ldiring",
            'body_price_uzs.numeric' => "Kirim Narxi So'm Maydonini Qiymati To'g'ri Emas",
            'sales_price.required' => "Sotish Narxi Maydonini To'ldiring",
            'sales_price.numeric' => "Sotish Narxi Maydonini Qiymati To'g'ri Emas",
            'supplier_id.required' => "Contragentni Tanlang",
            'mark_id.required' => "Natsenkani Tanlang",
            'branch_id.required' => "Filialni Tanlang",
            'invoice_order.required' => "Invoice Raqamini Tanlang",
        ];
    }
}
