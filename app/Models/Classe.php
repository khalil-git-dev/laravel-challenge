<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Universite;
use App\Models\Etudiant;

class Classe extends Model
{
    use HasFactory;

    function universite()
    {
        return $this->belongsTo(Universite::class, 'universite_id');
    }

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
}
