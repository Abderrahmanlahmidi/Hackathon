<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    public function editions(){
        return $this -> belongsTo(Edition::class);
    }

    public function projects(){
        return $this->hasMany(Project::class, "equipe_id");
    }

    public function users(){
        return $this->hasMany(User::class);
    }

}
