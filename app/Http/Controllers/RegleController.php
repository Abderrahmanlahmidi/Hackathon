<?php

namespace App\Http\Controllers;

use App\Models\Regle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegleController extends Controller
{
    public function displayRegles(){
        $regles = Regle::get();

        if(!$regles){
            return response()->json([
                'message' => 'themes not found'
            ]);
        }

        return response()->json([
            'message' => 'themes get successfully',
            'themes' => $regles
        ]);
    }

    public function createRegle(Request $request){

        $validator = Validator::make($request->all(), [
            'regle' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first()
            ]);
        }

        $regle = Regle::create([
            'regle' => $request->regle,
        ]);

        if($regle){
            return response()->json([
                'message' => 'regle created successfully'
            ], 201);
        }

        if(!$regle){
            return response()->json([
                'message' => 'regle not found'
            ], 404);
        }
    }

    public function deleteRegle($id){

        $regle = Regle::find($id);

        if(!$regle){
            return response()->json([
                'message' => 'regle not found'
            ]);
        }

        $regle->delete();

        return response()->json([
            'message' => 'regle deleted successfully'
        ], 201);

    }

    public function updateRegle(Request $request, $id){
        $regle = Regle::find($id);

        $validator = Validator::make($request->all(), [
            'regle' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first()
            ]);
        }
        $regle->regle = $request->regle;

        $regle->save();

        return response()->json([
            'message' => 'regle updated successfully'
        ], 201);
    }

}
