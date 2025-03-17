<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoordinacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('coordinaciones')->insert([
            ['nombre_coordinacion' => 'Coordinación de la Licenciatura en Ciencias Jurídicas'],
            ['nombre_coordinacion' => 'Coordinación de la Licenciatura en Trabajo Social y Licenciatura en Teología'],
            ['nombre_coordinacion' => 'Coordinación de la Licenciatura en Administración de Empresas y Contaduría Pública'],
            ['nombre_coordinacion' => 'Coordinación de la Licenciatura en Ciencias de la Computación y Técnico en Desarrollo de Aplicaciones Informáticas'],
            ['nombre_coordinacion' => 'Coordinación de la Ingeniería en Agroecología y Técnico en Ingeniería Agroecológica'],
            ['nombre_coordinacion' => 'Coordinación de la Licenciatura en Idioma Inglés'],
            ['nombre_coordinacion' => 'Coordinación de la Licenciatura en Psicología'],
        ]);
    }
}