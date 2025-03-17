<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('departamentos')->insert([
            ['nombre_departamento' => 'Ahuachapán'],
            ['nombre_departamento' => 'Cabañas'],
            ['nombre_departamento' => 'Chalatenango'],
            ['nombre_departamento' => 'Cuscatlán'],
            ['nombre_departamento' => 'La Libertad'],
            ['nombre_departamento' => 'La Paz'],
            ['nombre_departamento' => 'La Unión'],
            ['nombre_departamento' => 'Morazán'],
            ['nombre_departamento' => 'San Miguel'],
            ['nombre_departamento' => 'San Salvador'],
            ['nombre_departamento' => 'San Vicente'],
            ['nombre_departamento' => 'Santa Ana'],
            ['nombre_departamento' => 'Sonsonate'],
            ['nombre_departamento' => 'Usulután']
        ]);
    }
}