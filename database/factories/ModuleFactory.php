<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // return [
        //     'codeModule' => 'GINF11',
        //     'intitule' => 'C++',
        //     'semestre' => 1,
        //     'niveaux_id'=> 1,
        //     'professeur_id'=>1
        // ];

        return [
            'codeModule' => 'GSTR11',
            'intitule' => 'protocoles',
            'semestre' => 1,
            'niveaux_id'=> 1,
            'professeur_id'=>1
        ];
    }
}
