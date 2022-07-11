<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        'statut',
        'etudiant_id',
        'creneau_id'
    ];


    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function creneau()
    {
        return $this->belongsTo(Creneau::class);
    }

}
