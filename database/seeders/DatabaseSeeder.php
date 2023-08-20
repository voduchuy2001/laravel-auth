<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory(20)->create();

        // Product::factory()->create([
        //     'name' => 'Product ' . random_int(1, 8),
        //     'price' => random_int(100000, 500000),
        //     'description' => fake()->name(),
        //     'image' => 'upload/product-' . random_int(1, 8) . '.jpg',
        // ]);
    }
}
