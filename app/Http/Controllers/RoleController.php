<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;



class RoleController extends Controller
{
    public function displayRoles(): JsonResponse
    {
        try {
            $roles = Role::get();
            return response()->json(['roles' => $roles], 201);
        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }


    public function createRole(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'description' => 'required',
        ]);


        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first()
            ]);
        }

       $role = Role::create([
            'nom' => $request->nom,
            'description' => $request->description
        ]);

        if($role){
            return response()->json([
                'message' => "role created successfully"
            ]);
        }else{
            return response()->json([
                'message' => 'role not created'
            ], 500);
        }

    }

    public function deleteRole($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json([
                'message' => 'Role not found'
            ], 404);
        }

        $role->delete();

        return response()->json([
            'message' => 'Role deleted successfully'
        ], 201);
    }


    public function updateRole(Request $request, $id){

        $role = Role::find($id);

        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first()
            ]);
        }

        $role->nom = $request->nom;
        $role->description = $request->description;

        $role->save();

        if(!$role){
            return response()->json([
                'message' => 'role not updated'
            ], 401);
        }

        return response()->json([
            'message' => 'role updated successfully'
        ], 201);

    }

}
