<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeNiveau',
        'filiere_id',
        'intitule',
    ];

    public function etudiant()
    {
        return $this->hasMany(Etudiant::class);
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function module()
    {
        return $this->hasMany(Module::class);
    }
}
