<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedecinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'telephone' => $this->faker->phoneNumber,
        ];
    }
}
