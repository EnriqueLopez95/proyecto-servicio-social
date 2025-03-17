<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('municipios')->insert([
            // Ahuachapán (ID 1)
            ['nombre_municipio' => 'Ahuachapán Norte', 'departamento_id' => 1],
            ['nombre_municipio' => 'Ahuachapán Centro', 'departamento_id' => 1],
            ['nombre_municipio' => 'Ahuachapán Sur', 'departamento_id' => 1],

            // Cabañas (ID 2)
            ['nombre_municipio' => 'Cabañas Este', 'departamento_id' => 2],
            ['nombre_municipio' => 'Cabañas Oeste', 'departamento_id' => 2],

            // Chalatenango (ID 3)
            ['nombre_municipio' => 'Chalatenango Norte', 'departamento_id' => 3],
            ['nombre_municipio' => 'Chalatenango Centro', 'departamento_id' => 3],
            ['nombre_municipio' => 'Chalatenango Sur', 'departamento_id' => 3],

            // Cuscatlán (ID 4)
            ['nombre_municipio' => 'Cuscatlán Norte', 'departamento_id' => 4],
            ['nombre_municipio' => 'Cuscatlán Sur', 'departamento_id' => 4],

            // La Libertad (ID 5)
            ['nombre_municipio' => 'La Libertad Norte', 'departamento_id' => 5],
            ['nombre_municipio' => 'La Libertad Centro', 'departamento_id' => 5],
            ['nombre_municipio' => 'La Libertad Oeste', 'departamento_id' => 5],
            ['nombre_municipio' => 'La Libertad Este', 'departamento_id' => 5],
            ['nombre_municipio' => 'La Libertad Costa', 'departamento_id' => 5],
            ['nombre_municipio' => 'La Libertad Sur', 'departamento_id' => 5],

            // La Paz (ID 6)
            ['nombre_municipio' => 'La Paz Oeste', 'departamento_id' => 6],
            ['nombre_municipio' => 'La Paz Centro', 'departamento_id' => 6],
            ['nombre_municipio' => 'La Paz Este', 'departamento_id' => 6],

            // La Unión (ID 7)
            ['nombre_municipio' => 'La Unión Norte', 'departamento_id' => 7],
            ['nombre_municipio' => 'La Unión Sur', 'departamento_id' => 7],

            // Morazán (ID 8)
            ['nombre_municipio' => 'Morazán Norte', 'departamento_id' => 8],
            ['nombre_municipio' => 'Morazán Sur', 'departamento_id' => 8],

            // San Miguel (ID 9)
            ['nombre_municipio' => 'San Miguel Norte', 'departamento_id' => 9],
            ['nombre_municipio' => 'San Miguel Centro', 'departamento_id' => 9],
            ['nombre_municipio' => 'San Miguel Oeste', 'departamento_id' => 9],

            // San Salvador (ID 10)
            ['nombre_municipio' => 'San Salvador Norte', 'departamento_id' => 10],
            ['nombre_municipio' => 'San Salvador Oeste', 'departamento_id' => 10],
            ['nombre_municipio' => 'San Salvador Este', 'departamento_id' => 10],
            ['nombre_municipio' => 'San Salvador Centro', 'departamento_id' => 10],
            ['nombre_municipio' => 'San Salvador Sur', 'departamento_id' => 10],

            // San Vicente (ID 11)
            ['nombre_municipio' => 'San Vicente Norte', 'departamento_id' => 11],
            ['nombre_municipio' => 'San Vicente Sur', 'departamento_id' => 11],

            // Santa Ana (ID 12)
            ['nombre_municipio' => 'Santa Ana Norte', 'departamento_id' => 12],
            ['nombre_municipio' => 'Santa Ana Centro', 'departamento_id' => 12],
            ['nombre_municipio' => 'Santa Ana Este', 'departamento_id' => 12],
            ['nombre_municipio' => 'Santa Ana Oeste', 'departamento_id' => 12],

            // Sonsonate (ID 13)
            ['nombre_municipio' => 'Sonsonate Norte', 'departamento_id' => 13],
            ['nombre_municipio' => 'Sonsonate Centro', 'departamento_id' => 13],
            ['nombre_municipio' => 'Sonsonate Este', 'departamento_id' => 13],
            ['nombre_municipio' => 'Sonsonate Oeste', 'departamento_id' => 13],


            // Usulután (ID 14)
            ['nombre_municipio' => 'Usulután Norte', 'departamento_id' => 14],
            ['nombre_municipio' => 'Usulután Este', 'departamento_id' => 14],
            ['nombre_municipio' => 'Usulután Oeste', 'departamento_id' => 14],
        ]);
    }
}