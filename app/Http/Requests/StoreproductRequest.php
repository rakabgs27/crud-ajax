<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreproductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_product' => 'required',
            'id_category' => 'required',
            'qty_product' => 'required|numeric',
            'harga_product' => 'required|numeric',
        ];
    }

    public function messages()
{
    return [
        'nama_product.required' => 'Nama Produk field is required.',
        'id_category.required' => 'Kategori field is required.',
        'qty_product.required' => 'Jumlah field is required.',
        'qty_product.numeric' => 'Jumlah field must be a number.',
        'harga_product.required' => 'Harga field is required.',
        'harga_product.numeric' => 'Harga field must be a number.',
    ];
}

}
