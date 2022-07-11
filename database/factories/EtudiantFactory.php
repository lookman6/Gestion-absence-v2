<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'cne'=>$this->faker->numberBetween(1,10000),
           'codeApoge'=>$this->faker->numberBetween(100000,999999),
           'niveaux_id'=>1,
           'user_id'=>4,
        ];
    }
}
