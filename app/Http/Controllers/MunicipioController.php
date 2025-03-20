<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    
    //Muestra la lista de municipios.
     
    public function index()
    {
        $municipios = Municipio::with('departamento')->get();
        return response()->json($municipios);
    }

    /**
     * Guarda un nuevo municipio.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_municipio' => 'required|string|max:50',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);

        $municipio = Municipio::create($request->all());

        return response()->json([
            'message' => 'Municipio creado con éxito',
            'municipio' => $municipio
        ], 201);
    }

    /**
     * Muestra un municipio específico.
     */
    public function show(Municipio $municipio)
    {
        return response()->json($municipio->load('departamento'));
    }

    /**
     * Actualiza un municipio.
     */
    public function update(Request $request, Municipio $municipio)
    {
        $request->validate([
            'nombre_municipio' => 'sometimes|required|string|max:50',
            'departamento_id' => 'sometimes|required|exists:departamentos,id',
        ]);

        $municipio->update($request->all());

        return response()->json([
            'message' => 'Municipio actualizado con éxito',
            'municipio' => $municipio
        ]);
    }

    /**
     * Elimina un municipio.
     */
    public function destroy(Municipio $municipio)
    {
        $municipio->delete();

        return response()->json([
            'message' => 'Municipio eliminado correctamente'
        ]);
    }
}