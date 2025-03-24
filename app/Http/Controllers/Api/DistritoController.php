<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Distrito;
use Illuminate\Http\Request;

class DistritoController extends Controller
{
    /**
     * Muestra la lista de distritos.
     */
    public function index()
    {
        $distritos = Distrito::with('municipio')->get();
        return response()->json($distritos);
    }

    /**
     * Guarda un nuevo distrito.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_distrito' => 'required|string|max:50',
            'municipio_id' => 'required|exists:municipios,id',
        ]);

        $distrito = Distrito::create($request->all());

        return response()->json([
            'message' => 'Distrito creado con éxito',
            'distrito' => $distrito
        ], 201);
    }

    /**
     * Muestra un distrito específico.
     */
    public function show(Distrito $distrito)
    {
        return response()->json($distrito->load('municipio'));
    }

    /**
     * Actualiza un distrito.
     */
    public function update(Request $request, Distrito $distrito)
    {
        $request->validate([
            'nombre_distrito' => 'sometimes|required|string|max:50',
            'municipio_id' => 'sometimes|required|exists:municipios,id',
        ]);

        $distrito->update($request->all());

        return response()->json([
            'message' => 'Distrito actualizado con éxito',
            'distrito' => $distrito
        ]);
    }

    /**
     * Elimina un distrito.
     */
    public function destroy(Distrito $distrito)
    {
        $distrito->delete();

        return response()->json([
            'message' => 'Distrito eliminado correctamente'
        ]);
    }
}