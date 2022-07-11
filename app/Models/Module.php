<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeModule',
        'professeur_id',
        'semestre',
        'intitule',
        'level_id',
    ];


    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function matiere()
    {
        return $this->hasMany(Matiere::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }
}
