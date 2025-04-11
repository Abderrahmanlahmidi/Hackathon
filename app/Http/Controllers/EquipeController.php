<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function displayEquipe()
    {
        $equipe = Equipe::with(['projects', 'users'])->get();

        if($equipe->isEmpty()){
            return response()->json([
                'message' => "the equipe is empty"
            ]);
        }

        return response()->json([
            'equipe' => $equipe,
        ]);
    }

}
