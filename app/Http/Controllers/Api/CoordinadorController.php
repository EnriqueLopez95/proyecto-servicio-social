<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coordinador;
use Illuminate\Http\Request;

class CoordinadorController extends Controller
{
    /**
     * Mostrar todos los coordinadores.
     */
    public function index()
    {
        return response()->json(Coordinador::with(['coordinacion', 'usuario'])->get(), 200);
    }

    /**
     * Guardar un nuevo coordinador.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_coordinador' => 'required|string|max:100',
            'apellido_coordinador' => 'required|string|max:100',
            'correo_coordinador' => 'required|string|email|max:100|unique:coordinadores,correo_coordinador',
            'telefono_coordinador' => 'required|string|max:15',
            'coordinacion_id' => 'required|exists:coordinaciones,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $coordinador = Coordinador::create($request->all());

        return response()->json($coordinador, 201);
    }

    /**
     * Mostrar un coordinador específico.
     */
    public function show(Coordinador $coordinador)
    {
        return response()->json($coordinador->load(['coordinacion', 'usuario']), 200);
    }

    /**
     * Actualizar un coordinador.
     */
    public function update(Request $request, Coordinador $coordinador)
    {
        $request->validate([
            'nombre_coordinador' => 'sometimes|required|string|max:100',
            'apellido_coordinador' => 'sometimes|required|string|max:100',
            'correo_coordinador' => 'sometimes|required|string|email|max:100|unique:coordinadores,correo_coordinador,' . $coordinador->id,
            'telefono_coordinador' => 'sometimes|required|string|max:15',
            'coordinacion_id' => 'sometimes|required|exists:coordinaciones,id',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $coordinador->update($request->all());

        return response()->json($coordinador, 200);
    }

    /**
     * Eliminar un coordinador.
     */
    public function destroy(Coordinador $coordinador)
    {
        $coordinador->delete();
        return response()->json(['message' => 'Coordinador eliminado correctamente'], 200);
    }
}