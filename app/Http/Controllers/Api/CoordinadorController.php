<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Response\ApiResponse;
use App\Models\Coordinador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CoordinadorController extends Controller
{
    /**
     * Mostrar todos los coordinadores.
     */
    public function index()
    {
        try {
            $coordinadores = Coordinador::with(['coordinacion', 'usuario'])->get();
            return ApiResponse::success('Coordinadores obtenidos', 200, $coordinadores);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al obtener los coordinadores: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Guardar un nuevo coordinador.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $message = [
                'nombre_coordinador.required' => 'El nombre es obligatorio.',
                'nombre_coordinador.string' => 'El nombre debe ser una cadena.',
                'nombre_coordinador.max' => 'El nombre debe tener un máximo de 100 caracteres.',
                'apellido_coordinador.required' => 'El apellido es obligatorio.',
                'apellido_coordinador.string' => 'El apellido debe ser una cadena.',
                'apellido_coordinador.max' => 'El apellido debe tener un máximo de 100 caracteres.',
                'correo_coordinador.required' => 'El correo electrónico es obligatorio.',
                'correo_coordinador.email' => 'El correo electrónico no es válido.',
                'correo_coordinador.max' => 'El correo electrónico debe tener un máximo de 100 caracteres.',
                'correo_coordinador.unique' => 'El correo electrónico ya está en uso.',
                'telefono_coordinador.required' => 'El teléfono es obligatorio.',
                'telefono_coordinador.string' => 'El teléfono debe ser una cadena.',
                'telefono_coordinador.max' => 'El teléfono debe tener un máximo de 8 caracteres.',
                'coordinacion_id.required' => 'La coordinación es obligatoria.',
                'coordinacion_id.exists' => 'La coordinación no existe.',
                'user_id.required' => 'El usuario es obligatorio.',
                'user_id.exists' => 'El usuario no existe.',
            ];

            $validator = Validator::make($request->all(), [
                'nombre_coordinador' => 'required|string|max:100',
                'apellido_coordinador' => 'required|string|max:100',
                'correo_coordinador' => 'required|email|max:100|unique:coordinadores,correo_coordinador',
                'telefono_coordinador' => 'required|string|max:8',
                'coordinacion_id' => 'required|exists:coordinaciones,id',
                'user_id' => 'required|exists:users,id',
            ], $message);

            if ($validator->fails()) {
                return ApiResponse::error('Error de validación ' . $validator->messages()->first(), 422);
            }

            $coordinador = Coordinador::create($request->all());
            $coordinador->load(['coordinacion', 'usuario']);

            DB::commit();
            return ApiResponse::success('Coordinador creado', 201, $coordinador);
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::error('Error al crear el coordinador: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Mostrar un coordinador específico.
     */
    public function show(Coordinador $coordinador)
    {
        try {
            return ApiResponse::success('Coordinador obtenido', 200, $coordinador->load(['coordinacion', 'usuario']));
        } catch (\Exception $e) {
            return ApiResponse::error('Error al obtener el coordinador: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Actualizar un coordinador.
     */
    public function update(Request $request, Coordinador $coordinador)
    {
        DB::beginTransaction();
        try {
            $message = [
                'nombre_coordinador.required' => 'El nombre es obligatorio.',
                'nombre_coordinador.string' => 'El nombre debe ser una cadena.',
                'nombre_coordinador.max' => 'El nombre debe tener un máximo de 100 caracteres.',
                'apellido_coordinador.required' => 'El apellido es obligatorio.',
                'apellido_coordinador.string' => 'El apellido debe ser una cadena.',
                'apellido_coordinador.max' => 'El apellido debe tener un máximo de 100 caracteres.',
                'correo_coordinador.required' => 'El correo electrónico es obligatorio.',
                'correo_coordinador.email' => 'El correo electrónico no es válido.',
                'correo_coordinador.max' => 'El correo electrónico debe tener un máximo de 100 caracteres.',
                'correo_coordinador.unique' => 'El correo electrónico ya está en uso.',
                'telefono_coordinador.required' => 'El teléfono es obligatorio.',
                'telefono_coordinador.string' => 'El teléfono debe ser una cadena.',
                'telefono_coordinador.max' => 'El teléfono debe tener un máximo de 8 caracteres.',
                'coordinacion_id.required' => 'La coordinación es obligatoria.',
                'coordinacion_id.exists' => 'La coordinación no existe.',
                'user_id.required' => 'El usuario es obligatorio.',
                'user_id.exists' => 'El usuario no existe.',
            ];

            $validator = Validator::make($request->all(), [
                'nombre_coordinador' => 'sometimes|required|string|max:100',
                'apellido_coordinador' => 'sometimes|required|string|max:100',
                'correo_coordinador' => 'sometimes|required|email|max:100|unique:coordinadores,correo_coordinador,' . $coordinador->id,
                'telefono_coordinador' => 'sometimes|required|string|max:8',
                'coordinacion_id' => 'sometimes|required|exists:coordinaciones,id',
                'user_id' => 'sometimes|required|exists:users,id',
            ], $message);

            if ($validator->fails()) {
                return ApiResponse::error('Error de validación ' . $validator->messages()->first(), 422);
            }

            $coordinador->update($request->all());
            $coordinador->load(['coordinacion', 'usuario']);

            DB::commit();
            return ApiResponse::success('Coordinador actualizado', 200, $coordinador);
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::error('Error al actualizar el coordinador: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Eliminar un coordinador.
     */
    public function destroy(Coordinador $coordinador)
    {
        DB::beginTransaction();
        try {
            $coordinador->delete();
            DB::commit();
            return ApiResponse::success('Coordinador eliminado correctamente', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::error('Error al eliminar el coordinador: ' . $e->getMessage(), 500);
        }
    }
}
?>