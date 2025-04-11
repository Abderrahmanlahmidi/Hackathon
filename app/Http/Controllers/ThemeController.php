<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;





class ThemeController extends Controller{

    public function displayThemes(){

        $themes = Theme::get();

        if(!$themes){
            return response()->json([
                'message' => 'themes not found'
            ]);
        }

        return response()->json([
            'message' => 'themes get successfully',
            'themes' => $themes
        ]);

    }

    public function createTheme(Request $request){

        $validate = Validator::make($request->all(), [
            'nom' => 'required'
        ]);

        if($validate->fails()){
            return response()->json([
                'message' => "not found"
            ]);
        }

        $theme = Theme::create([
            'nom' => $request->nom
        ]);

        if($theme){
            return response()->json([
                'message' => 'theme created successfully',
            ], 201);
        }else{
            return response()->json([
                'message' => 'theme not created'
            ], 404);
        }

    }

    public function deleteTheme($id){

        $theme = Theme::find($id);

        if(!$theme){
            return response()->json([
                'message' => 'not found'
            ], 404);
        }

        $theme->delete();

        return response()->json([
            'message' => 'theme deleted successfully'
        ], 201);
    }

    public function updateTheme(Request $request, $id){

        $theme = Theme::find($id);

        $validator = Validator::make($request->all(), [
            'nom' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first()
            ]);
        }

        $theme -> nom = $request->nom;
        $theme->save();


        if(!$theme){
            return response()->json([
                'message' => 'theme not updated'
            ], 404);
        }

        return response()->json([
            'message' => 'theme updated successfully'
        ], 201);

    }



}
