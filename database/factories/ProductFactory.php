<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Product ' . random_int(1, 8),
            'price' => random_int(100000, 500000),
            'description' => fake()->name(),
            'image' => 'upload/product-' . random_int(1, 8) . '.jpg',
        ];
    }
}
