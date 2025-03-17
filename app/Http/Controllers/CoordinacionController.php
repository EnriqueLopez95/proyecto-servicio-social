<?php

namespace App\Http\Controllers;

use App\Models\Coordinacion;
use Illuminate\Http\Request;

class CoordinacionController extends Controller
{
    /**
     * Mostrar todas las coordinaciones.
     */
    public function index()
    {
        return response()->json(Coordinacion::all(), 200);
    }

    /**
     * Guardar una nueva coordinación.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_coordinacion' => 'required|string|max:100',
        ]);

        $coordinacion = Coordinacion::create($request->all());

        return response()->json($coordinacion, 201);
    }

    /**
     * Mostrar una coordinación específica.
     */
    public function show(Coordinacion $coordinacion)
    {
        return response()->json($coordinacion, 200);
    }

    /**
     * Actualizar una coordinación.
     */
    public function update(Request $request, Coordinacion $coordinacion)
    {
        $request->validate([
            'nombre_coordinacion' => 'sometimes|required|string|max:100',
        ]);

        $coordinacion->update($request->all());

        return response()->json($coordinacion, 200);
    }

    /**
     * Eliminar una coordinación.
     */
    public function destroy(Coordinacion $coordinacion)
    {
        $coordinacion->delete();
        return response()->json(['message' => 'Coordinación eliminada correctamente'], 200);
    }
}