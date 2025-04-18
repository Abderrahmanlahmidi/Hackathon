<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom'
    ];

    public function editions(){
        return $this->belongsToMany(Edition::class);
    }


}
