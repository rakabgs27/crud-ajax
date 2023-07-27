<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_product' => $this->nama_product,
            'qty_product' => $this->qty_product,
            'harga_product' => $this->harga_product,
            'id_category' => $this->id_category
        ];
    }
}
