<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Mostrar todos los estudiantes.
     */
    public function index()
    {
        return response()->json(Estudiante::with(['carrera', 'proyecto'])->get(), 200);
    }

    /**
     * Guardar un nuevo estudiante.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_estudiante' => 'required|string|max:100',
            'apellido_estudiante' => 'required|string|max:100',
            'carnet' => 'required|string|max:20|unique:estudiantes,carnet',
            'correo_estudiante' => 'required|string|email|max:100|unique:estudiantes,correo_estudiante',
            'telefono_estudiante' => 'required|string|max:15',
            'carrera_id' => 'required|exists:carreras,id',
            'proyectos_id' => 'required|exists:proyectos,id',
        ]);

        $estudiante = Estudiante::create($request->all());

        return response()->json($estudiante, 201);
    }

    /**
     * Mostrar un estudiante específico.
     */
    public function show(Estudiante $estudiante)
    {
        return response()->json($estudiante->load(['carrera', 'proyecto']), 200);
    }

    /**
     * Actualizar un estudiante.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre_estudiante' => 'sometimes|required|string|max:100',
            'apellido_estudiante' => 'sometimes|required|string|max:100',
            'carnet' => 'sometimes|required|string|max:20|unique:estudiantes,carnet,' . $estudiante->id,
            'correo_estudiante' => 'sometimes|required|string|email|max:100|unique:estudiantes,correo_estudiante,' . $estudiante->id,
            'telefono_estudiante' => 'sometimes|required|string|max:15',
            'carrera_id' => 'sometimes|required|exists:carreras,id',
            'proyectos_id' => 'sometimes|required|exists:proyectos,id',
        ]);

        $estudiante->update($request->all());

        return response()->json($estudiante, 200);
    }

    /**
     * Eliminar un estudiante.
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        return response()->json(['message' => 'Estudiante eliminado correctamente'], 200);
    }
}