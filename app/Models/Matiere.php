<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'intitule',
        'professeur_id',
        'module_id'
    ];


    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function creneau()
    {
        return $this->hasMany(Creneau::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }
}
