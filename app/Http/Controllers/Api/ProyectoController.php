<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    public function index()
    {
        return response()->json(Proyecto::with(['institucion', 'coordinador', 'estudiante'])->get(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_proyecto' => 'required|string|max:200',
            'descripcion' => 'required|string',
            'estado' => 'required|in:En proceso,Finalizado',
            'estudiante_id' => 'required|exists:estudiantes,id',
            'coordinador_id' => 'required|exists:coordinadores,id',
            'institucion_id' => 'required|exists:instituciones,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $proyecto = Proyecto::create($request->all());

        return response()->json($proyecto, 201);
    }

    public function show(Proyecto $proyecto)
    {
        return response()->json($proyecto->load(['institucion', 'coordinador', 'estudiante']), 200);
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'nombre_proyecto' => 'sometimes|required|string|max:200',
            'descripcion' => 'sometimes|required|string',
            'estado' => 'sometimes|required|in:En proceso,Finalizado',
            'estudiante_id' => 'sometimes|required|exists:estudiantes,id',
            'coordinador_id' => 'sometimes|required|exists:coordinadores,id',
            'institucion_id' => 'sometimes|required|exists:instituciones,id',
            'fecha_inicio' => 'sometimes|required|date',
            'fecha_fin' => 'sometimes|required|date|after_or_equal:fecha_inicio',
        ]);

        $proyecto->update($request->all());

        return response()->json($proyecto, 200);
    }

    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return response()->json(['message' => 'Proyecto eliminado correctamente'], 200);
    }

    public function searchEstudiantes(Request $request)
    {
        $query = $request->query('q', '');
        $estudiantes = Estudiante::where('nombre_estudiante', 'LIKE', "%{$query}%")
            ->orWhere('apellido_estudiante', 'LIKE', "%{$query}%")
            ->select('id', 'nombre_estudiante', 'apellido_estudiante')
            ->get();
        return response()->json($estudiantes, 200);
    }

    public function userProjects()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Usuario no autenticado'], 401);
        }

        $estudiante = $user->estudiante;
        if (!$estudiante) {
            return response()->json(['message' => 'El usuario no está asociado a ningún estudiante', 'data' => []], 200);
        }

        $proyectos = Proyecto::where('estudiante_id', $estudiante->id)
            ->with(['institucion', 'coordinador', 'estudiante'])
            ->get();

        if ($proyectos->isEmpty()) {
            return response()->json(['message' => 'El estudiante no está asociado a ningún proyecto', 'data' => []], 200);
        }

        return response()->json(['message' => 'Proyectos obtenidos', 'data' => $proyectos], 200);
    }
}
