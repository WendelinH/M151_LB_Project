<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use \App\Models\Kunde;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class BestellungFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bemerkungen' => $this->faker->sentence(10),
            'datum' => $this->faker->date(),
            'kunde_id' => Kunde::all()->random()->id,
        ];
    }
}
