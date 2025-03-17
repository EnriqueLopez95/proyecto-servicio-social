<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direcciones';

    protected $fillable = ['nombre_calle', 'numero_calle', 'distrito_id'];

    
    //Relación con Distrito (Muchas direcciones pertenecen a un distrito)
     
    public function distrito()
    {
        return $this->belongsTo(Distrito::class, 'distrito_id');
    }
}