<?php

use App\Http\Controllers\Api\CreatePermissionRolController;

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
    Route::get('/role',[CreatePermissionRolController::class, 'getRole'])->middleware('rol:Super Admin,Admin');
    Route::post('/permissions',[CreatePermissionRolController::class,'createPermissionsAction'])->middleware('rol:Super Admin,Admin');
    Route::post('/role',[CreatePermissionRolController::class,'store'])->middleware('rol:Super Admin');
    
    Route::get('/',[CreatePermissionRolController::class,'showUsers'])->middleware('rol:Super Admin,Admin,User');
    Route::get('/{id}',[CreatePermissionRolController::class,'ShowUser'])->middleware('rol:Super Admin,Admin,User');
    Route::post('/create-user',[CreatePermissionRolController::class,'createUser'])->middleware('rol:Super Admin');
    Route::put('/update-user/{user}',[CreatePermissionRolController::class,'updateUser'])->middleware('rol:Super Admin');
});


Route::middleware('auth:api')->group(function () {
    Route::get('/admin-dashboard', function () {
        return response()->json(['message' => 'Welcome to the admin dashboard']);
    })->middleware('rol:Admin,Super Admin');
});


Route::middleware('auth:api')->prefix('users')->group(function () {
    Route::post('logout', [AuthController::class,'logout']);
});

// Departamentos
Route::middleware('auth:api')->prefix('departamentos')->group(function(){
    Route::get('/', [DepartamentoController::class, 'index'])->middleware('rol:Super Admin,Admin,User');
    Route::get('/{departamento}', [DepartamentoController::class, 'show'])->middleware('rol:Super Admin,Admin,User');
    Route::post('/', [DepartamentoController::class, 'store'])->middleware('rol:Super Admin');
    Route::put('/{departamento}', [DepartamentoController::class, 'update'])->middleware('rol:Super Admin');
    Route::delete('/{departamento}', [DepartamentoController::class, 'destroy'])->middleware('rol:Super Admin');
});

// Municipios
Route::middleware('auth:api')->prefix('municipios')->group(function(){
    Route::get('/', [MunicipioController::class, 'index'])->middleware('rol:Super Admin,Admin,User');
    Route::get('/{municipio}', [MunicipioController::class, 'show'])->middleware('rol:Super Admin,Admin,User');
    Route::post('/', [MunicipioController::class, 'store'])->middleware('rol:Super Admin');
    Route::put('/{municipio}', [MunicipioController::class, 'update'])->middleware('rol:Super Admin');
    Route::delete('/{municipio}', [MunicipioController::class, 'destroy'])->middleware('rol:Super Admin');
});

// Distritos
Route::middleware('auth:api')->prefix('distritos')->group(function(){
    Route::get('/', [DistritoController::class, 'index'])->middleware('rol:Super Admin,Admin,User');
    Route::get('/{distrito}', [DistritoController::class, 'show'])->middleware('rol:Super Admin,Admin,User');
    Route::post('/', [DistritoController::class, 'store'])->middleware('rol:Super Admin');
    Route::put('/{distrito}', [DistritoController::class, 'update'])->middleware('rol:Super Admin');
    Route::delete('/{distrito}', [DistritoController::class, 'destroy'])->middleware('rol:Super Admin');
});

// Coordinaciones
Route::middleware('auth:api')->prefix('coordinaciones')->group(function(){
    Route::get('/', [CoordinacionController::class, 'index'])->middleware('rol:Super Admin,Admin,User');
    Route::get('/{coordinacion}', [CoordinacionController::class, 'show'])->middleware('rol:Super Admin,Admin,User');
    Route::post('/', [CoordinacionController::class, 'store'])->middleware('rol:Super Admin,Admin');
    Route::put('/{coordinacion}', [CoordinacionController::class, 'update'])->middleware('rol:Super Admin,Admin');
    Route::delete('/{coordinacion}', [CoordinacionController::class, 'destroy'])->middleware('rol:Super Admin,Admin');
});

// Carreras
Route::middleware('auth:api')->prefix('carreras')->group(function(){
    Route::get('/', [CarreraController::class, 'index'])->middleware('rol:Super Admin,Admin,User');
    Route::get('/{carrera}', [CarreraController::class, 'show'])->middleware('rol:Super Admin,Admin,User');
    Route::post('/', [CarreraController::class, 'store'])->middleware('rol:Super Admin, Admin');
    Route::put('/{carrera}', [CarreraController::class, 'update'])->middleware('rol:Super Admin,Admin');
    Route::delete('/{carrera}', [CarreraController::class, 'destroy'])->middleware('rol:Super Admin,Admin');
});

// Direcciones
Route::middleware('auth:api')->prefix('direcciones')->group(function(){
    Route::get('/', [DireccionController::class, 'index'])->middleware('rol:Super Admin,Admin,User');
    Route::get('/{direccion}', [DireccionController::class, 'show'])->middleware('rol:Super Admin,Admin,User');
    Route::post('/', [DireccionController::class, 'store'])->middleware('rol:Super Admin,Admin');
    Route::put('/{direccion}', [DireccionController::class, 'update'])->middleware('rol:Super Admin,Admin');
    Route::delete('/{direccion}', [DireccionController::class, 'destroy'])->middleware('rol:Super Admin,Admin');
});

// Instituciones
Route::middleware('auth:api')->prefix('instituciones')->group(function(){
    Route::get('/', [InstitucionController::class, 'index'])->middleware('rol:Super Admin,Admin,User');
    Route::get('/{institucion}', [InstitucionController::class, 'show'])->middleware('rol:Super Admin,Admin,User');
    Route::post('/', [InstitucionController::class, 'store'])->middleware('rol:Super Admin,Admin');
    Route::put('/{institucion}', [InstitucionController::class, 'update'])->middleware('rol:Super Admin,Admin');
    Route::delete('/{institucion}', [InstitucionController::class, 'destroy'])->middleware('rol:Super Admin,Admin');
});

// Coordinadores
Route::middleware('auth:api')->prefix('coordinadores')->group(function () {
    Route::get('/', [CoordinadorController::class, 'index'])->middleware('rol:Super Admin,Admin,User');
    Route::get('/{coordinador}', [CoordinadorController::class, 'show'])->middleware('rol:Super Admin,Admin,User');
    Route::post('/', [CoordinadorController::class, 'store'])->middleware('rol:Super Admin,Admin');
    Route::put('/{coordinador}', [CoordinadorController::class, 'update'])->middleware('rol:Super Admin,Admin');
    Route::delete('/{coordinador}', [CoordinadorController::class, 'destroy'])->middleware('rol:Super Admin,Admin');
    Route::get('/{coordinador}/send-email', [CoordinadorController::class, 'sendEmail'])->middleware('rol:Super Admin,Admin');
});

// Proyectos
Route::middleware('auth:api')->prefix('proyectos')->group(function () {
    Route::get('/', [ProyectoController::class, 'index'])->middleware('rol:Super Admin,Admin,User');
    Route::get('/user', [ProyectoController::class, 'userProjects'])->middleware('rol:User');
    Route::get('/{proyecto}', [ProyectoController::class, 'show'])->middleware('rol:Super Admin,Admin,User');
    Route::post('/', [ProyectoController::class, 'store'])->middleware('rol:Super Admin');
    Route::put('/{proyecto}', [ProyectoController::class, 'update'])->middleware('rol:Super Admin');
    Route::delete('/{proyecto}', [ProyectoController::class, 'destroy'])->middleware('rol:Super Admin');
    Route::get('/estudiantes/search', [ProyectoController::class, 'searchEstudiantes'])->middleware('rol:Super Admin,Admin,User');
});


// Estudiantes
Route::middleware('auth:api')->prefix('estudiantes')->group(function(){
    Route::get('/', [EstudianteController::class, 'index'])->middleware('rol:Super Admin,Admin,User');
    Route::get('/{estudiante}', [EstudianteController::class, 'show'])->middleware('rol:Super Admin,Admin,User');
    Route::post('/', [EstudianteController::class, 'store'])->middleware('rol:Super Admin');
    Route::put('/{estudiante}', [EstudianteController::class, 'update'])->middleware('rol:Super Admin,Admin');
    Route::delete('/{estudiante}', [EstudianteController::class, 'destroy'])->middleware('rol:Super Admin,Admin');
    Route::get('{id}/send-email', [EstudianteController::class, 'sendEmail'])->middleware('rol:Super Admin');
});