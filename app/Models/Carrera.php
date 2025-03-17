<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_carrera', 'coordinacion_id'];

    //Relación con Coordinacion.
     
    public function coordinacion()
    {
        return $this->belongsTo(Coordinacion::class);
    }
}
