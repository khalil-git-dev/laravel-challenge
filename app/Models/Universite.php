<?php

namespace App\Models;
use App\Models\Classe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universite extends Model
{
    use HasFactory;

    public function classes()
    {
        return $this->hasMany(Classe::class);
    }
}
