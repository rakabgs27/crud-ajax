<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_product' => $this->nama_product,
            'qty_product' => $this->qty_product,
            'harga_product' => $this->harga_product,
            'id_category' => $this->id_category,
            'nama_category' => $this->nama_category,

        ];
    }
}
