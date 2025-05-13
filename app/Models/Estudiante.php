<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_estudiante',
        'apellido_estudiante',
        'carnet',
        'correo_estudiante',
        'telefono_estudiante',
        'carrera_id',
        'proyectos_id',
        'user_id',
    ];


    //Relación con Carrera.
     
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    
    //Relación con Proyecto.
    
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyectos_id');
    }

    //Relación con usuario.
    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}