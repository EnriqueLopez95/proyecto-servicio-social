<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;

    protected $table = 'instituciones'; 

    protected $fillable = [
        'nombre_institucion',
        'telefono_institucion',
        'correo_institucion',
        'tipo_institucion',
        'direccion_id',
    ];

    // Relación con Direccion (Una institución tiene una dirección)
    public function direccion()
    {
        return $this->belongsTo(Direccion::class);
    }
}