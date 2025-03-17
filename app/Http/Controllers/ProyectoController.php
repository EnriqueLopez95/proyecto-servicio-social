<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Mostrar todos los proyectos.
     */
    public function index()
    {
        return response()->json(Proyecto::with('institucion')->get(), 200);
    }

    /**
     * Guardar un nuevo proyecto.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_proyecto' => 'required|string|max:50',
            'descripcion' => 'required|string',
            'institucion_id' => 'required|exists:instituciones,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $proyecto = Proyecto::create($request->all());

        return response()->json($proyecto, 201);
    }

    /**
     * Mostrar un proyecto específico.
     */
    public function show(Proyecto $proyecto)
    {
        return response()->json($proyecto->load('institucion'), 200);
    }

    /**
     * Actualizar un proyecto.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'nombre_proyecto' => 'sometimes|required|string|max:50',
            'descripcion' => 'sometimes|required|string',
            'institucion_id' => 'sometimes|required|exists:instituciones,id',
            'fecha_inicio' => 'sometimes|required|date',
            'fecha_fin' => 'sometimes|required|date|after_or_equal:fecha_inicio',
        ]);

        $proyecto->update($request->all());

        return response()->json($proyecto, 200);
    }

    /**
     * Eliminar un proyecto.
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return response()->json(['message' => 'Proyecto eliminado correctamente'], 200);
    }
}