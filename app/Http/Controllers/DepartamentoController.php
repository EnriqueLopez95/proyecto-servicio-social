<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Mostrar todos los departamentos.
     */
    public function index()
    {
        $departamentos = Departamento::all();
        return response()->json($departamentos);
    }

    /**
     * Almacenar un nuevo departamento.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_departamento' => 'required|string|max:50|unique:departamentos,nombre_departamento',
        ]);

        $departamento = Departamento::create($request->all());

        return response()->json([
            'message' => 'Departamento creado exitosamente.',
            'departamento' => $departamento
        ], 201);
    }

    /**
     * Mostrar un departamento específico.
     */
    public function show(Departamento $departamento)
    {
        return response()->json($departamento);
    }

    /**
     * Actualizar un departamento existente.
     */
    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nombre_departamento' => 'required|string|max:50|unique:departamentos,nombre_departamento,' . $departamento->id,
        ]);

        $departamento->update($request->all());

        return response()->json([
            'message' => 'Departamento actualizado exitosamente.',
            'departamento' => $departamento
        ]);
    }

    /**
     * Eliminar un departamento.
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();

        return response()->json(['message' => 'Departamento eliminado correctamente.']);
    }
}