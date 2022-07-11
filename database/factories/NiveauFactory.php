<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NiveauFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // return [
        //     'codeNiveau' => 'GINF11',
        //     'intitule' => 'Genie info1',
        //     'filiere_id'=> 1
        // ];

        return [
            'codeNiveau' => 'GSTR11',
            'intitule' => 'Genie res1',
            'filiere_id'=> 1
        ];
    }
}
