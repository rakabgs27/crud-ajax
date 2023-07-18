<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Fashion',
            'Home',
            'Sports',
            'Books',
            'Beauty',
            'Toys',
            'Food',
            'Health',
            'Automotive',
        ];

        foreach ($categories as $category) {
            Category::create([
                'nama_category' => $category,
            ]);
        }
    }
}

