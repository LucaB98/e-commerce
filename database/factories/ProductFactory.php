<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Stringable;

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

        //  TITOLO 
        $title = fake()->text(20);

        // SLUG 
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'description' => fake()->paragraphs(15, true),
            'image' => fake()->imageUrl(640, 480, 'hats', true),
            'status' => fake()->boolean(),
            'price' => fake()->randomFloat(2, 1, 100), // Genera un prezzo tra 1 e 100 con 2 decimali

        ];
    }
}
