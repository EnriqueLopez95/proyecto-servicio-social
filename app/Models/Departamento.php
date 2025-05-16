<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos';

    protected $fillable = [
        'nombre_departamento', 
    ];

    // Relación con municipios (un departamento tiene muchos municipios)
    public function municipios()
    {
        return $this->hasMany(Municipio::class, 'id_departamento');
    } 
}