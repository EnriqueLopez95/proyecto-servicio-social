<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinador extends Model
{
    use HasFactory;

    protected $table = 'coordinadores'; 

    protected $fillable = [
        'nombre_coordinador',
        'apellido_coordinador',
        'correo_coordinador',
        'telefono_coordinador',
        'coordinacion_id',
        'user_id',
    ];

    
    //Relación con la Coordinación (Un Coordinador pertenece a una Coordinación)
    
    public function coordinacion()
    {
        return $this->belongsTo(Coordinacion::class, 'coordinacion_id');
    }

    
    //Relación con el Usuario (Un Coordinador está asociado a un Usuario)
    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}