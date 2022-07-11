<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'grade',
        'statut',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creneau()
    {
        return $this->hasMany(Creneau::class);
    }

    public function matiere()
    {
        return $this->hasMany(Matiere::class);
    }

    public function module()
    {
        return $this->hasMany(Module::class);
    }

    public function filiere()
    {
        return $this->hasMany(Filiere::class);
    }
}
