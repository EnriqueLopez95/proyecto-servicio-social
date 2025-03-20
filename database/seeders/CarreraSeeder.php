<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('carreras')->insert([
            ['nombre_carrera' => 'Ingeniería Agroecológica', 'coordinacion_id' => 5],
            ['nombre_carrera' => 'Licenciatura en Administración de Empresas', 'coordinacion_id' => 3],
            ['nombre_carrera' => 'Licenciatura en Ciencias Jurídicas', 'coordinacion_id' => 1],
            ['nombre_carrera' => 'Licenciatura en Contaduría Pública', 'coordinacion_id' => 3],
            ['nombre_carrera' => 'Licenciatura en Ciencias de la Computación', 'coordinacion_id' => 4],
            ['nombre_carrera' => 'Técnico en Desarrollo de Aplicaciones Informáticas', 'coordinacion_id' => 4],
            ['nombre_carrera' => 'Técnico en Ingeniería Agroecológica', 'coordinacion_id' => 5],
            ['nombre_carrera' => 'Licenciatura en Idioma Inglés', 'coordinacion_id' => 6],
            ['nombre_carrera' => 'Licenciatura en Psicología', 'coordinacion_id' => 7],
            ['nombre_carrera' => 'Licenciatura en Trabajo Social', 'coordinacion_id' => 2],
            ['nombre_carrera' => 'Licenciatura en Teología', 'coordinacion_id' => 2],
        ]);
    }
}