<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classe;

class Etudiant extends Model
{
    use HasFactory;
    // la fonction permetant d'avoir access a l'objet classe dans etudiant
    function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    function universite()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
        //return $classe->code;
    }
    // recuperation de l'avatar du produit
    public function avatarUser()
    {
        return asset("storage/images/$this->avatar");
    }

}
