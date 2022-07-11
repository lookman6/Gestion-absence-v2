<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeFiliere',
        'professeur_id',
        'intitule',
    ];


    public function niveau()
    {
        return $this->hasMany(Level::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

}
