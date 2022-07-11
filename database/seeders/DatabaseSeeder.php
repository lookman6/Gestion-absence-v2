<?php

namespace Database\Seeders;


use App\Models\Etudiant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\user::factory(20)->create();
         \App\Models\Professeur::factory(1)->create();
       \App\Models\Filiere::factory(1)->create();
       \App\Models\Niveau::factory(1)->create();
        \App\Models\Module::factory(1)->create();
        \App\Models\Matiere::factory(1)->create();
    \App\Models\Etudiant::factory(10)->create();
    \App\Models\Creneau::factory(1)->create();




        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
