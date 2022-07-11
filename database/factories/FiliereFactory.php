<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FiliereFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // return [
        //     'intitule'=>'Genie info',
        //     'codeFiliere'=>"GINF",
        //     'professeur_id'=>1,
        // ];

        return [
            'intitule'=>'Genie reseaux',
            'codeFiliere'=>"GSTR",
            'professeur_id'=>1,
        ];
    }
}
