<?php

use App\Http\Controllers\EquipeController;
use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\RegleController;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

//Role
Route::get('/roles', [RoleController::class, 'displayRoles']);
Route::post('/role', [RoleController::class, 'createRole']);
Route::delete('/role/delete/{id}', [RoleController::class, 'deleteRole']);
Route::put('/role/update/{id}', [RoleController::class, 'updateRole']);

//Theme
Route::get('/themes', [ThemeController::class, 'displayThemes']);
Route::post('/theme', [ThemeController::class, 'createTheme']);
Route::delete('/theme/delete/{id}', [ThemeController::class, 'deleteTheme']);
Route::put('/theme/update/{id}', [ThemeController::class, 'updateTheme']);

//Regles
Route::get('/regles', [RegleController::class, 'displayRegles']);
Route::post('/regle', [RegleController::class, 'createRegle']);
Route::delete('/regle/delete/{id}', [RegleController::class, 'deleteRegle']);
Route::put('/regle/update/{id}', [RegleController::class, 'updateRegle']);

//Projects
Route::get('/projects', [ProjectController::class, 'displayProjects']);
Route::post('/project', [ProjectController::class, 'createProject']);
Route::delete('/project/delete/{id}', [ProjectController::class, 'deleteProject']);
Route::put('/project/update/{id}', [ProjectController::class, 'updateProject']);

//Equipe
Route::get('/equipes', [EquipeController::class, 'displayEquipe']);
