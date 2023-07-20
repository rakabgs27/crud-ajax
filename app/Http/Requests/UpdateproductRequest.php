<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // TODO: Add logic to check if the user has permission to update the product
        // For now, we'll assume all users can update products
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama_product' => 'required|string|max:255',
            'qty_product' => 'required|integer',
            'harga_product' => 'required|numeric',
            'id_category' => 'required|exists:categories,id',  // Assuming 'id' is the primary key of the 'categories' table
        ];
    }
}
