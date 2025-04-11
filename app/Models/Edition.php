<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    use HasFactory;

    public function themes(){
        return $this-> hasmany(Theme::class);
    }

    public function regles(){
            return $this-> hasmany(Regle::class);
    }

    public function inscriptions(){
        return $this-> hasmany(Inscription::class);
    }

    public function equipements(){
        return $this->hasMany(Equipe::class);
    }



}
