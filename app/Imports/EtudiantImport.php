<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Etudiant;
use App\Models\role_user;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class EtudiantImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row)
        {
            $user=[

                    'cin'=>$row['cin'],
                    'firstname'=>$row['firstname'],
                    'lastname'=>$row['lastname'],
                    'birthday'=>$row['birthday'],
                    'sex'=>$row['sex'],
                    'phone'=>$row['phone'],
                    'email'=>$row['email'],
                    'password'=>Hash::make($row['password']),
            ];

           $user2 = User::create($user);

            $etudiant=[

                    'codeApoge'=>$row['code'],
                    'cne'=>$row['cne'],
                    'user_id'=>$user2->id,
                    'level_id'=>$row['niveaux_id'],

            ];

           $user2->role()->attach(3);
            Etudiant::create($etudiant);

        }
    }
}
