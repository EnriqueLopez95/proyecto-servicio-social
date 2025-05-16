<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Institucion;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    /**
     * Mostrar listado de instituciones.
     */
    public function index()
    {
        return response()->json(Institucion::with('direccion.distrito.municipio.departamento')->get());
    }

    /**
     * Almacenar una nueva institución.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_institucion' => 'required|string|max:255',
            'telefono_institucion' => 'required|string|max:20',
            'correo_institucion' => 'required|string|email|max:50|unique:instituciones',
            'tipo_institucion' => 'required|string|max:50',
            'direccion_id' => 'required|exists:direcciones,id',
        ]);

        $institucion = Institucion::create($request->all());

        return response()->json(['message' => 'Institución creada con éxito', 'institucion' => $institucion], 201);
    }

    /**
     * Mostrar una institución específica.
     */
    public function show(Institucion $institucion)
    {
        return response()->json($institucion->load('direccion'));
    }

    /**
     * Actualizar una institución.
     */
    public function update(Request $request, Institucion $institucion)
    {
        $request->validate([
            'nombre_institucion' => 'sometimes|string|max:255',
            'telefono_institucion' => 'sometimes|string|max:20',
            'correo_institucion' => 'sometimes|string|email|max:50|unique:instituciones,correo_institucion,' . $institucion->id,
            'tipo_institucion' => 'sometimes|string|max:50',
            'direccion_id' => 'sometimes|exists:direcciones,id',
        ]);

        $institucion->update($request->all());

        return response()->json(['message' => 'Institución actualizada con éxito', 'institucion' => $institucion]);
    }

    /**
     * Eliminar una institución.
     */
    public function destroy(Institucion $institucion)
    {
        $institucion->delete();

        return response()->json(['message' => 'Institución eliminada con éxito']);
    }
}