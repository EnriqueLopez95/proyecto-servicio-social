<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Response\ApiResponse;
use App\Mail\EstudianteWelcomeEmail;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Log;

class EstudianteController extends Controller
{
    /**
     * Mostrar todos los estudiantes.
     */
    public function index()
    {
        try {
            $estudiantes = Estudiante::with(['carrera', 'usuario'])->get();
            return ApiResponse::success('Estudiantes obtenidos', 200, ['data' => $estudiantes]);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al obtener los estudiantes: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Guardar un nuevo estudiante.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $messages = [
                'nombre_estudiante.required' => 'El nombre es obligatorio.',
                'nombre_estudiante.string' => 'El nombre debe ser una cadena.',
                'nombre_estudiante.max' => 'El nombre debe tener un máximo de 100 caracteres.',
                'apellido_estudiante.required' => 'El apellido es obligatorio.',
                'apellido_estudiante.string' => 'El apellido debe ser una cadena.',
                'apellido_estudiante.max' => 'El apellido debe tener un máximo de 100 caracteres.',
                'carnet.required' => 'El carnet es obligatorio.',
                'carnet.string' => 'El carnet debe ser una cadena.',
                'carnet.max' => 'El carnet debe tener un máximo de 20 caracteres.',
                'carnet.unique' => 'El carnet ya está en uso.',
                'correo_estudiante.required' => 'El correo electrónico es obligatorio.',
                'correo_estudiante.email' => 'El correo electrónico no es válido.',
                'correo_estudiante.max' => 'El correo electrónico debe tener un máximo de 100 caracteres.',
                'correo_estudiante.unique' => 'El correo electrónico ya está en uso.',
                'telefono_estudiante.required' => 'El teléfono es obligatorio.',
                'telefono_estudiante.string' => 'El teléfono debe ser una cadena.',
                'telefono_estudiante.max' => 'El teléfono debe tener un máximo de 8 caracteres.',
                'carrera_id.required' => 'La carrera es obligatoria.',
                'carrera_id.exists' => 'La carrera no existe.',
                'user_id.required' => 'El usuario es obligatorio.',
                'user_id.exists' => 'El usuario no existe.',
            ];

            $validator = Validator::make($request->all(), [
                'nombre_estudiante' => 'required|string|max:100',
                'apellido_estudiante' => 'required|string|max:100',
                'carnet' => 'required|string|max:20|unique:estudiantes,carnet',
                'correo_estudiante' => 'required|email|max:100|unique:estudiantes,correo_estudiante',
                'telefono_estudiante' => 'required|string|max:8',
                'carrera_id' => 'required|exists:carreras,id',
                'user_id' => 'required|exists:users,id',
            ], $messages);

            if ($validator->fails()) {
                return ApiResponse::error('Error de validación: ' . $validator->messages()->first(), 422);
            }

            $estudiante = Estudiante::create($request->all());
            $estudiante->load(['carrera', 'usuario']);

            DB::commit();
            return ApiResponse::success('Estudiante creado', 201, $estudiante);
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::error('Error al crear el estudiante: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Mostrar un estudiante específico.
     */
    public function show(Estudiante $estudiante)
    {
        try {
            return ApiResponse::success('Estudiante obtenido', 200, $estudiante->load(['carrera', 'usuario']));
        } catch (\Exception $e) {
            return ApiResponse::error('Error al obtener el estudiante: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Actualizar un estudiante.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        DB::beginTransaction();
        try {
            $messages = [
                'nombre_estudiante.required' => 'El nombre es obligatorio.',
                'nombre_estudiante.string' => 'El nombre debe ser una cadena.',
                'nombre_estudiante.max' => 'El nombre debe tener un máximo de 100 caracteres.',
                'apellido_estudiante.required' => 'El apellido es obligatorio.',
                'apellido_estudiante.string' => 'El apellido debe ser una cadena.',
                'apellido_estudiante.max' => 'El apellido debe tener un máximo de 100 caracteres.',
                'carnet.required' => 'El carnet es obligatorio.',
                'carnet.string' => 'El carnet debe ser una cadena.',
                'carnet.max' => 'El carnet debe tener un máximo de 20 caracteres.',
                'carnet.unique' => 'El carnet ya está en uso.',
                'correo_estudiante.required' => 'El correo electrónico es obligatorio.',
                'correo_estudiante.email' => 'El correo electrónico no es válido.',
                'correo_estudiante.max' => 'El correo electrónico debe tener un máximo de 100 caracteres.',
                'correo_estudiante.unique' => 'El correo electrónico ya está en uso.',
                'telefono_estudiante.required' => 'El teléfono es obligatorio.',
                'telefono_estudiante.string' => 'El teléfono debe ser una cadena.',
                'telefono_estudiante.max' => 'El teléfono debe tener un máximo de 8 caracteres.',
                'carrera_id.required' => 'La carrera es obligatoria.',
                'carrera_id.exists' => 'La carrera no existe.',
                'user_id.required' => 'El usuario es obligatorio.',
                'user_id.exists' => 'El usuario no existe.',
            ];

            $validator = Validator::make($request->all(), [
                'nombre_estudiante' => 'sometimes|required|string|max:100',
                'apellido_estudiante' => 'sometimes|required|string|max:100',
                'carnet' => 'sometimes|required|string|max:20|unique:estudiantes,carnet,' . $estudiante->id,
                'correo_estudiante' => 'sometimes|required|email|max:100|unique:estudiantes,correo_estudiante,' . $estudiante->id,
                'telefono_estudiante' => 'sometimes|required|string|max:8',
                'carrera_id' => 'sometimes|required|exists:carreras,id',
                'user_id' => 'sometimes|required|exists:users,id',
            ], $messages);

            if ($validator->fails()) {
                return ApiResponse::error('Error de validación: ' . $validator->messages()->first(), 422);
            }

            $estudiante->update($request->all());
            $estudiante->load(['carrera', 'usuario']);

            DB::commit();
            return ApiResponse::success('Estudiante actualizado', 200, $estudiante);
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::error('Error al actualizar el estudiante: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Eliminar un estudiante.
     */
    public function destroy(Estudiante $estudiante)
    {
        DB::beginTransaction();
        try {
            $estudiante->delete();
            DB::commit();
            return ApiResponse::success('Estudiante eliminado correctamente', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::error('Error al eliminar el estudiante: ' . $e->getMessage(), 500);
        }
    }

    public function sendEmail($id)
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return ApiResponse::error('Estudiante no encontrado', 404);
        }

        if (!$estudiante->correo_estudiante) {
            return ApiResponse::error('El estudiante no tiene un correo registrado', 400);
        }

        if (!$estudiante->usuario) {
            return ApiResponse::error('El estudiante no tiene un usuario asociado', 400);
        }

        DB::beginTransaction();
        try {
            $password = $estudiante->carnet . 'uls';

            // Actualizar la contraseña del usuario asociado
            $estudiante->usuario->update(['password' => bcrypt($password)]);

            // Enviar el correo
            Mail::to($estudiante->correo_estudiante)->send(new EstudianteWelcomeEmail($estudiante, $password));

            DB::commit();
            return ApiResponse::success('Correo enviado correctamente', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al enviar correo a estudiante ID ' . $id . ': ' . $e->getMessage());
            return ApiResponse::error('Error al enviar el correo: ' . $e->getMessage(), 500);
        }
    }
}
