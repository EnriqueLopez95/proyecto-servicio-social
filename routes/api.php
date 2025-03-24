<?php

use App\Http\Controllers\Api\CreatePermissionRolController;
use App\Http\Controllers\Api\CreatePrimissionRolController;

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\DepartamentoController;
use App\Http\Controllers\Api\MunicipioController;
use App\Http\Controllers\Api\DistritoController;
use App\Http\Controllers\Api\DireccionController;
use App\Http\Controllers\Api\InstitucionController;
use App\Http\Controllers\Api\CoordinacionController;
use App\Http\Controllers\Api\CoordinadorController;
use App\Http\Controllers\Api\CarreraController;
use App\Http\Controllers\Api\ProyectoController;
use App\Http\Controllers\Api\EstudianteController;



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

//Departamentos
Route::prefix('departamentos')->group(function(){
    Route::get('/', [DepartamentoController::class, 'index']);
    Route::get('/{departamento}', [DepartamentoController::class, 'show']);
    Route::post('/', [DepartamentoController::class, 'store']);
    Route::put('/{departamento}', [DepartamentoController::class, 'update']);
    Route::delete('/{departamento}', [DepartamentoController::class, 'destroy']);
});

//Municipios
Route::prefix('municipios')->group(function(){
    Route::get('/', [MunicipioController::class, 'index']);
    Route::get('/{municipio}', [MunicipioController::class, 'show']);
    Route::post('/', [MunicipioController::class, 'store']);
    Route::put('/{municipio}', [MunicipioController::class, 'update']);
    Route::delete('/{municipio}', [MunicipioController::class, 'destroy']);
});

//Distritos
Route::prefix('distritos', DistritoController::class)->group(function(){
    Route::get('/', [DistritoController::class, 'index']);
    Route::get('/{distrito}', [DistritoController::class, 'show']);
    Route::post('/', [DistritoController::class, 'store']);
    Route::put('/{distrito}', [DistritoController::class, 'update']);
    Route::delete('/{distrito}', [DistritoController::class, 'destroy']);
});

//Coordinaciones
Route::prefix('coordinaciones')->group(function(){
    Route::get('/', [CoordinacionController::class, 'index']);
    Route::get('/{coordinacion}', [CoordinacionController::class, 'show']);
    Route::post('/', [CoordinacionController::class, 'store']);
    Route::put('/{coordinacion}', [CoordinacionController::class, 'update']);
    Route::delete('/{coordinacion}', [CoordinacionController::class, 'destroy']);
});

//Carreras
Route::prefix('carreras')->group(function(){
    Route::get('/', [CarreraController::class, 'index']);
    Route::get('/{carrera}', [CarreraController::class, 'show']);
    Route::post('/', [CarreraController::class, 'store']);
    Route::put('/{carrera}', [CarreraController::class, 'update']);
    Route::delete('/{carrera}', [CarreraController::class, 'destroy']);
});

//Direcciones
Route::prefix('direcciones')->group(function(){
    Route::get('/', [DireccionController::class, 'index']);
    Route::get('/{direccion}', [DireccionController::class, 'show']);
    Route::post('/', [DireccionController::class, 'store']);
    Route::put('/{direccion}', [DireccionController::class, 'update']);
    Route::delete('/{direccion}', [DireccionController::class, 'destroy']);
});

//Instituciones
Route::prefix('instituciones')->group(function(){
    Route::get('/', [InstitucionController::class, 'index']);
    Route::get('/{institucion}', [InstitucionController::class, 'show']);
    Route::post('/', [InstitucionController::class, 'store']);
    Route::put('/{institucion}', [InstitucionController::class, 'update']);
    Route::delete('/{institucion}', [InstitucionController::class, 'destroy']);
});

//Coordinadores
Route::prefix('coordinadores')->group(function(){
    Route::get('/', [CoordinadorController::class, 'index']);
    Route::get('/{coordinador}', [CoordinadorController::class, 'show']);
    Route::post('/', [CoordinadorController::class, 'store']);
    Route::put('/{coordinador}', [CoordinadorController::class, 'update']);
    Route::delete('/{coordinador}', [CoordinadorController::class, 'destroy']);
});

//Proyectos
Route::prefix('proyectos')->group(function(){
    Route::get('/', [ProyectoController::class, 'index']);
    Route::get('/{proyecto}', [ProyectoController::class, 'show']);
    Route::post('/', [ProyectoController::class, 'store']);
    Route::put('/{proyecto}', [ProyectoController::class, 'update']);
    Route::delete('/{proyecto}', [ProyectoController::class, 'destroy']);
});

//Estudiantes
Route::prefix('estudiantes')->group(function(){
    Route::get('/', [EstudianteController::class, 'index']);
    Route::get('/{estudiante}', [EstudianteController::class, 'show']);
    Route::post('/', [EstudianteController::class, 'store']);
    Route::put('/{estudiante}', [EstudianteController::class, 'update']);
    Route::delete('/{estudiante}', [EstudianteController::class, 'destroy']);
});