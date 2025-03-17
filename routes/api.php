<?php

use App\Http\Controllers\Api\CreatePermissionRolController;
use App\Http\Controllers\Api\CreatePrimissionRolController;

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\CoordinacionController;
use App\Http\Controllers\CoordinadorController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\EstudianteController;



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('auth')->group(function (){
    Route::post('login', [AuthController::class,'login']);
    
    Route::post('refresh-token', [AuthController::class,'refresh']);
    Route::post('register',[AuthController::class,'register']);
});

Route::middleware('auth:api')->prefix('users')->group(function (){
    Route::get('/role',[CreatePermissionRolController::class, 'getRole'])->middleware('rol:Super Admin');
    Route::post('/permissions',[CreatePermissionRolController::class,'createPermissionsAction'])->middleware('rol:Super Admin,Admin');
    Route::post('/role',[CreatePermissionRolController::class,'store'])->middleware('rol:Super Admin');
   
});


Route::middleware('auth:api')->group(function () {
    Route::get('/admin-dashboard', function () {
        return response()->json(['message' => 'Welcome to the admin dashboard']);
    })->middleware('rol:Admin,Super Admin');
});


Route::middleware('auth:api')->prefix('users')->group(function () {
    Route::post('logout', [AuthController::class,'logout']);
});



Route::apiResource('departamentos', DepartamentoController::class);
Route::apiResource('municipios', MunicipioController::class);
Route::apiResource('distritos', DistritoController::class);
Route::apiResource('direcciones', DireccionController::class);
Route::apiResource('instituciones', InstitucionController::class);
Route::apiResource('coordinaciones', CoordinacionController::class);
Route::apiResource('coordinadores', CoordinadorController::class);
Route::apiResource('carreras', CarreraController::class);
Route::apiResource('proyectos', ProyectoController::class);
Route::apiResource('estudiantes', EstudianteController::class);