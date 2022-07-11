<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MatiereFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // return [
        //     'intitule'=>'SQL',
        //     'module_id'=>1,
        //     'professeur_id'=>1,
        // ];

        return [
            'intitule'=>'TCP',
            'module_id'=>1,
            'professeur_id'=>1,
        ];
    }
}
