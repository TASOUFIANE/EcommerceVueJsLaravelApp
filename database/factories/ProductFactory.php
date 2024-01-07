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
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'quantity'=>20,
            'description' =>fake()->text(),
            'published' =>1,
            'inStock' => 1,
            'price' =>40,
            'category_id' =>4,
            'brand_id' =>1,
        ];
    }
}
