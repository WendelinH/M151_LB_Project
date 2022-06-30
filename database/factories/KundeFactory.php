<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use \App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class KundeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kunde_seit' => $this->faker->date(),
            'user_id' => User::all()->random()->id,
            'nachname' => $this->faker->lastName,
            'ort' => $this->faker->sentence(1),
            'plz' => $this->faker->sentence(1),
            'strasse' => $this->faker->sentence(1),
            'tel' => $this->faker->phoneNumber,
            'vorname' => $this->faker->firstName,
        ];
    }
}
