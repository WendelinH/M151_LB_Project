<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use \App\Models\Artikel;
use \App\Models\Inhalt;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class KonfigurationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'artikel_id' => Artikel::all()->random()->id,
            'inhalt_id' => Inhalt::all()->random()->id,
        ];
    }
}
