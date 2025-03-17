<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = 'municipios';
    
    protected $fillable = ['nombre_municipio', 'departamento_id'];

    
    //Relación con Departamento (Muchos municipios pertenecen a un departamento)
     
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }
}