<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Direccion;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    /**
     * Muestra la lista de direcciones.
     */
    public function index()
    {
        $direcciones = Direccion::with('distrito')->get();
        return response()->json($direcciones);
    }

    /**
     * Guarda una nueva dirección.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_calle' => 'required|string|max:100',
            'numero_calle' => 'required|string|max:20',
            'distrito_id' => 'required|exists:distritos,id',
        ]);

        $direccion = Direccion::create($request->all());

        return response()->json([
            'message' => 'Dirección creada con éxito',
            'direccion' => $direccion
        ], 201);
    }

    /**
     * Muestra una dirección específica.
     */
    public function show(Direccion $direccion)
    {
        return response()->json($direccion->load('distrito'));
    }

    /**
     * Actualiza una dirección.
     */
    public function update(Request $request, Direccion $direccion)
    {
        $request->validate([
            'nombre_calle' => 'sometimes|required|string|max:100',
            'numero_calle' => 'sometimes|required|string|max:20',
            'distrito_id' => 'sometimes|required|exists:distritos,id',
        ]);

        $direccion->update($request->all());

        return response()->json([
            'message' => 'Dirección actualizada con éxito',
            'direccion' => $direccion
        ]);
    }

    /**
     * Elimina una dirección.
     */
    public function destroy(Direccion $direccion)
    {
        $direccion->delete();

        return response()->json([
            'message' => 'Dirección eliminada correctamente'
        ]);
    }
}