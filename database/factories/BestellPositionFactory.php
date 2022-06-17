<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use \App\Models\Artikel;
use \App\Models\Bestellung;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class BestellPositionFactory extends Factory
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
            'bestellung_id' => Bestellung::all()->random()->id,
        ];
    }
}
