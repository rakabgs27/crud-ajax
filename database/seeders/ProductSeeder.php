<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'nama_product' => 'Product A',
            'qty_product' => 10,
            'harga_product' => 100000,
            'id_category' => 1,
        ]);

        Product::create([
            'nama_product' => 'Product B',
            'qty_product' => 5,
            'harga_product' => 50000,
            'id_category' => 2,
        ]);

        Product::create([
            'nama_product' => 'Product C',
            'qty_product' => 6,
            'harga_product' => 20000,
            'id_category' => 2,
        ]);

        Product::create([
            'nama_product' => 'Product D',
            'qty_product' => 7,
            'harga_product' => 55000,
            'id_category' => 3,
        ]);

        Product::create([
            'nama_product' => 'Product E',
            'qty_product' => 8,
            'harga_product' => 35000,
            'id_category' => 4,
        ]);

        Product::create([
            'nama_product' => 'Product F',
            'qty_product' => 9,
            'harga_product' => 12000,
            'id_category' => 5,
        ]);

        Product::create([
            'nama_product' => 'Product G',
            'qty_product' => 10,
            'harga_product' => 23000,
            'id_category' => 6,
        ]);

        Product::create([
            'nama_product' => 'Product H',
            'qty_product' => 11,
            'harga_product' => 45000,
            'id_category' => 7,
        ]);

        Product::create([
            'nama_product' => 'Product I',
            'qty_product' => 12,
            'harga_product' => 29000,
            'id_category' => 8,
        ]);

        Product::create([
            'nama_product' => 'Product J',
            'qty_product' => 13,
            'harga_product' => 15000,
            'id_category' => 9,
        ]);

        Product::create([
            'nama_product' => 'Product K',
            'qty_product' => 14,
            'harga_product' => 17000,
            'id_category' => 10,
        ]);

        Product::create([
            'nama_product' => 'Product L',
            'qty_product' => 15,
            'harga_product' => 19000,
            'id_category' => 1,
        ]);

        Product::create([
            'nama_product' => 'Product M',
            'qty_product' => 16,
            'harga_product' => 9000,
            'id_category' => 2,
        ]);

        Product::create([
            'nama_product' => 'Product N',
            'qty_product' => 17,
            'harga_product' => 50000,
            'id_category' => 3,
        ]);

        Product::create([
            'nama_product' => 'Product O',
            'qty_product' => 18,
            'harga_product' => 120000,
            'id_category' => 4,
        ]);

        Product::create([
            'nama_product' => 'Product P',
            'qty_product' => 19,
            'harga_product' => 350000,
            'id_category' => 5,
        ]);

        Product::create([
            'nama_product' => 'Product Q',
            'qty_product' => 20,
            'harga_product' => 550000,
            'id_category' => 6,
        ]);
    }
}
