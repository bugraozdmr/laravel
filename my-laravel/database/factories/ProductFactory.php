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
        // php artisan tinker
        // App\Models\Product::factory(30)->create();
        return [
            'name' => fake()->name(),
            'description' => fake()->paragraph(),
            'price' => rand(100,500),
        ];
    }
}
