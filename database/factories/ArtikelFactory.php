<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bezeichnung' => $this->faker->sentence(2),
            'preis' => $this->faker->randomFloat(2, 10, 30),
            'image_path' => $this->faker->sentence(2),
        ];
    }
}
