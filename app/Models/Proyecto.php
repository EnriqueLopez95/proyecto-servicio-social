<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_proyecto',
        'descripcion',
        'estado',
        'estudiante_id',
        'coordinador_id',
        'institucion_id',
        'fecha_inicio',
        'fecha_fin'
    ];

    
    //Relación con Coordinador
    public function coordinador()
    {
        return $this->belongsTo(Coordinador::class);
    }

    //Relación con Estudiantes
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
    //Relación con Institución
    public function institucion()
    {
        return $this->belongsTo(Institucion::class);
    }
}
