<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Creneau>
 */
class CreneauFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'dateCreneau'=>$this->faker->date(),
        'heureDebut'=>"9:00:00",
        'heureFin'=>"10:30:00",
        'matiere_id'=>1,
        'professeur_id'=>1
        ];
    }
}
