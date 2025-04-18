<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regle extends Model
{
    use HasFactory;

    protected $fillable = [
        'regle'
    ];

    public function editions(){
        return $this->belongsToMany(Edition::class);
    }

}
