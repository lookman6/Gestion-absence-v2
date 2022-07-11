<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creneau extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateCreneau',
        'heureDebut',
        'heureFin'
    ];


    public function absence()
    {
        return $this->hasMany(Absence::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }
}
