<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->realText(20),
            'description' => fake()->realText(50),
            'category' => fake()->word(),
            'price' => fake()->randomFloat(2, 5, 50),
            'stock' => fake()->randomNumber(2)
        ];
    }
}
