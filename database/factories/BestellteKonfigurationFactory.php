<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use \App\Models\BestellPosition;
use \App\Models\Inhalt;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class BestellteKonfigurationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bestell_position_id' => BestellPosition::all()->random()->id,
            'inhalt_id' => Inhalt::all()->random()->id,
        ];
    }
}
