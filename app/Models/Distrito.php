<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $table = 'distritos';

    protected $fillable = ['nombre_distrito', 'municipio_id'];

    
    //Relación con Municipio (Muchos distritos pertenecen a un municipio)

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }
}