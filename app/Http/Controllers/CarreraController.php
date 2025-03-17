<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Mostrar todas las carreras.
     */
    public function index()
    {
        return response()->json(Carrera::with('coordinacion')->get(), 200);
    }

    /**
     * Guardar una nueva carrera.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_carrera' => 'required|string|max:100',
            'coordinacion_id' => 'required|exists:coordinaciones,id',
        ]);

        $carrera = Carrera::create($request->all());

        return response()->json($carrera, 201);
    }

    /**
     * Mostrar una carrera específica.
     */
    public function show(Carrera $carrera)
    {
        return response()->json($carrera->load('coordinacion'), 200);
    }

    /**
     * Actualizar una carrera.
     */
    public function update(Request $request, Carrera $carrera)
    {
        $request->validate([
            'nombre_carrera' => 'sometimes|required|string|max:100',
            'coordinacion_id' => 'sometimes|required|exists:coordinaciones,id',
        ]);

        $carrera->update($request->all());

        return response()->json($carrera, 200);
    }

    /**
     * Eliminar una carrera.
     */
    public function destroy(Carrera $carrera)
    {
        $carrera->delete();
        return response()->json(['message' => 'Carrera eliminada correctamente'], 200);
    }
}