<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
            'title' => $this->faker->words(3, true),
            'slug' => $this->faker->slug(),
            'short_description' => $this->faker->sentence(),
            'full_description' => $this->faker->paragraph(),
            'price_text' => 'From $' . $this->faker->numberBetween(50, 200),
            'is_featured' => false,
            'is_signature' => false,
        ];
    }
}
