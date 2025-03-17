<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistritoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('distritos')->insert([
            // DEPARTAMENTO DE AHUACHAPÁN
            // Ahuachapán Norte (ID 1)
            ['nombre_distrito' => 'Atiquizaya', 'municipio_id' => 1],
            ['nombre_distrito' => 'El Refugio', 'municipio_id' => 1],
            ['nombre_distrito' => 'San Lorenzo', 'municipio_id' => 1],
            ['nombre_distrito' => 'Turín', 'municipio_id' => 1],
            
            // Ahuachapán Centro (ID 2)
            ['nombre_distrito' => 'Ahuachapán', 'municipio_id' => 2],
            ['nombre_distrito' => 'Apaneca', 'municipio_id' => 2],
            ['nombre_distrito' => 'Concepción de Ataco', 'municipio_id' => 2],
            ['nombre_distrito' => 'Tacuba', 'municipio_id' => 2],
            
            // Ahuachapán Sur (ID 3)
            ['nombre_distrito' => 'Guaymango', 'municipio_id' => 3],
            ['nombre_distrito' => 'Jujutla', 'municipio_id' => 3],
            ['nombre_distrito' => 'San Francisco Menendez', 'municipio_id' => 3],
            ['nombre_distrito' => 'San Pedro Puxtla', 'municipio_id' => 3],
            
            // DEPARTAMENTO DE CABAÑAS
            // Cabañas Este (ID 4)
            ['nombre_distrito' => 'Sensuntepeque', 'municipio_id' => 4],
            ['nombre_distrito' => 'Victoria', 'municipio_id' => 4],
            ['nombre_distrito' => 'Dolores', 'municipio_id' => 4],
            ['nombre_distrito' => 'Guacotecti', 'municipio_id' => 4],
            ['nombre_distrito' => 'San Isidro', 'municipio_id' => 4],
            
            // Cabañas Oeste (ID 5)
            ['nombre_distrito' => 'llobasco', 'municipio_id' => 5],
            ['nombre_distrito' => 'Tejutepeque', 'municipio_id' => 5],
            ['nombre_distrito' => 'Jutiapa', 'municipio_id' => 5],
            ['nombre_distrito' => 'Cinquera', 'municipio_id' => 5],
            
            // DEPARTAMENTO DE CHALATENANGO
            // Chalatenango Norte (ID 6)
            ['nombre_distrito' => 'La Palma', 'municipio_id' => 6],
            ['nombre_distrito' => 'Citalá', 'municipio_id' => 6],
            ['nombre_distrito' => 'San Ignacio', 'municipio_id' => 6],
            
            // Chalatenango Centro (ID 7)
            ['nombre_distrito' => 'Nueva Concepción', 'municipio_id' => 7],
            ['nombre_distrito' => 'Tejutla', 'municipio_id' => 7],
            ['nombre_distrito' => 'La Reina', 'municipio_id' => 7],
            ['nombre_distrito' => 'Agua Caliente', 'municipio_id' => 7],
            ['nombre_distrito' => 'Dulce Nombre de María', 'municipio_id' => 7],
            ['nombre_distrito' => 'El Paraíso', 'municipio_id' => 7],
            ['nombre_distrito' => 'San Francisco Morazán', 'municipio_id' => 7],
            ['nombre_distrito' => 'San Rafael', 'municipio_id' => 7],
            ['nombre_distrito' => 'Santa Rita', 'municipio_id' => 7],
            ['nombre_distrito' => 'San Fernando', 'municipio_id' => 7],
            
            // Chalatenango Sur (ID 8)
            ['nombre_distrito' => 'Chalatenango', 'municipio_id' => 8],
            ['nombre_distrito' => 'Arcatao', 'municipio_id' => 8],
            ['nombre_distrito' => 'Azacualpa', 'municipio_id' => 8],
            ['nombre_distrito' => 'Comalapa', 'municipio_id' => 8],
            ['nombre_distrito' => 'Concepción Quezaltepeque', 'municipio_id' => 8],
            ['nombre_distrito' => 'El Carrizal', 'municipio_id' => 8],
            ['nombre_distrito' => 'La Laguna', 'municipio_id' => 8],
            ['nombre_distrito' => 'Las Vueltas', 'municipio_id' => 8],
            ['nombre_distrito' => 'Nombre de Jesús', 'municipio_id' => 8],
            ['nombre_distrito' => 'Nueva Trinidad', 'municipio_id' => 8],
            ['nombre_distrito' => 'Ojos de Agua', 'municipio_id' => 8],
            ['nombre_distrito' => 'Potonico', 'municipio_id' => 8],
            ['nombre_distrito' => 'San Antonio de La Cruz', 'municipio_id' => 8],
            ['nombre_distrito' => 'San Antonio Los Ranchos', 'municipio_id' => 8],
            ['nombre_distrito' => 'San Francisco Lempa', 'municipio_id' => 8],
            ['nombre_distrito' => 'San Isidro Labrador', 'municipio_id' => 8],
            ['nombre_distrito' => 'San José Cancasque', 'municipio_id' => 8],
            ['nombre_distrito' => 'San Miguel de Mercedes', 'municipio_id' => 8],
            ['nombre_distrito' => 'San José Las Flores', 'municipio_id' => 8],
            ['nombre_distrito' => 'San Luis del Carmen', 'municipio_id' => 8],
            
            // DEPARTAMENTO DE CUSCATLÁN
            // Cuscatlán Norte (ID 9)
            ['nombre_distrito' => 'Suchitoto', 'municipio_id' => 9],
            ['nombre_distrito' => 'San José Guayabal', 'municipio_id' => 9],
            ['nombre_distrito' => 'Oratorio de Concepción', 'municipio_id' => 9],
            ['nombre_distrito' => 'San Bartolomé Perulapán', 'municipio_id' => 9],
            ['nombre_distrito' => 'San Pedro Perulapán', 'municipio_id' => 9],
            
            // Cuscatlán Sur (ID 10)
            ['nombre_distrito' => 'Cojutepeque', 'municipio_id' => 10],
            ['nombre_distrito' => 'San Rafael Cedros', 'municipio_id' => 10],
            ['nombre_distrito' => 'Candelaria', 'municipio_id' => 10],
            ['nombre_distrito' => 'Monte San Juan', 'municipio_id' => 10],
            ['nombre_distrito' => 'El Carmen', 'municipio_id' => 10],
            ['nombre_distrito' => 'San Cristóbal', 'municipio_id' => 10],
            ['nombre_distrito' => 'Santa Cruz Michapa', 'municipio_id' => 10],
            ['nombre_distrito' => 'San Ramón', 'municipio_id' => 10],
            ['nombre_distrito' => 'El Rosario', 'municipio_id' => 10],
            ['nombre_distrito' => 'Santa Cruz Analquito', 'municipio_id' => 10],
            ['nombre_distrito' => 'Tenancingo', 'municipio_id' => 10],

             // La Libertad Norte (ID 11)
             ['nombre_distrito' => 'Quezaltepeque', 'municipio_id' => 11],
             ['nombre_distrito' => 'San Matías', 'municipio_id' => 11],
             ['nombre_distrito' => 'San Pablo Tacachico', 'municipio_id' => 11],
             
             // La Libertad Centro (ID 12)
             ['nombre_distrito' => 'San Juan Opico', 'municipio_id' => 12],
             ['nombre_distrito' => 'Ciudad Arce', 'municipio_id' => 12],
             
             // La Libertad Oeste (ID 13)
             ['nombre_distrito' => 'Colón', 'municipio_id' => 13],
             ['nombre_distrito' => 'Jayaque', 'municipio_id' => 13],
             ['nombre_distrito' => 'Sacacoyo', 'municipio_id' => 13],
             ['nombre_distrito' => 'Tepecoyo', 'municipio_id' => 13],
             ['nombre_distrito' => 'Talnique', 'municipio_id' => 13],
             
             // La Libertad Este (ID 14)
             ['nombre_distrito' => 'Antiguo Cuscatlán', 'municipio_id' => 14],
             ['nombre_distrito' => 'Huizucar', 'municipio_id' => 14],
             ['nombre_distrito' => 'Nuevo Cuscatlán', 'municipio_id' => 14],
             ['nombre_distrito' => 'San José Villanueva', 'municipio_id' => 14],
             ['nombre_distrito' => 'Zaragoza', 'municipio_id' => 14],
             
             // La Libertad Costa (ID 15)
             ['nombre_distrito' => 'Chiltuipán', 'municipio_id' => 15],
             ['nombre_distrito' => 'Jicalapa', 'municipio_id' => 15],
             ['nombre_distrito' => 'La Libertad', 'municipio_id' => 15],
             ['nombre_distrito' => 'Tamanique', 'municipio_id' => 15],
             ['nombre_distrito' => 'Teotepeque', 'municipio_id' => 15],
             
             // La Libertad Sur (ID 16)
             ['nombre_distrito' => 'Comasagua', 'municipio_id' => 16],
             ['nombre_distrito' => 'Santa Tecla', 'municipio_id' => 16],
             
             // DEPARTAMENTO DE LA PAZ
             // La Paz Oeste (ID 17)
             ['nombre_distrito' => 'Cuyultitán', 'municipio_id' => 17],
             ['nombre_distrito' => 'Olocuilta', 'municipio_id' => 17],
             ['nombre_distrito' => 'San Juan Talpa', 'municipio_id' => 17],
             ['nombre_distrito' => 'San Luis Talpa', 'municipio_id' => 17],
             ['nombre_distrito' => 'San Pedro Masahuat', 'municipio_id' => 17],
             ['nombre_distrito' => 'Tapalhuaca', 'municipio_id' => 17],
             ['nombre_distrito' => 'San Francisco Chinameca', 'municipio_id' => 17],
             
             // La Paz Centro (ID 18)
             ['nombre_distrito' => 'El Rosario', 'municipio_id' => 18],
             ['nombre_distrito' => 'Jerusalén', 'municipio_id' => 18],
             ['nombre_distrito' => 'Mercedes La Ceiba', 'municipio_id' => 18],
             ['nombre_distrito' => 'Paraíso de Osorio', 'municipio_id' => 18],
             ['nombre_distrito' => 'San Antonio Masahuat', 'municipio_id' => 18],
             ['nombre_distrito' => 'San Emigdio', 'municipio_id' => 18],
             ['nombre_distrito' => 'San Juan Tepezontes', 'municipio_id' => 18],
             ['nombre_distrito' => 'San Luis La Herradura', 'municipio_id' => 18],
             ['nombre_distrito' => 'San Miguel Tepezontes', 'municipio_id' => 18],
             ['nombre_distrito' => 'San Pedro Nonualco', 'municipio_id' => 18],
             ['nombre_distrito' => 'Santa María Ostuma', 'municipio_id' => 18],
             ['nombre_distrito' => 'Santiago Nonualco', 'municipio_id' => 18],
             
             // La Paz Oeste (ID 17)
            ['nombre_distrito' => 'Cuyultitán', 'municipio_id' => 17],
            ['nombre_distrito' => 'Olocuilta', 'municipio_id' => 17],
            ['nombre_distrito' => 'San Juan Talpa', 'municipio_id' => 17],
            ['nombre_distrito' => 'San Luis Talpa', 'municipio_id' => 17],
            ['nombre_distrito' => 'San Pedro Masahuat', 'municipio_id' => 17],
            ['nombre_distrito' => 'Tapalhuaca', 'municipio_id' => 17],
            ['nombre_distrito' => 'San Francisco Chinameca', 'municipio_id' => 17],
            
            // La Paz Centro (ID 18)
            ['nombre_distrito' => 'El Rosario', 'municipio_id' => 18],
            ['nombre_distrito' => 'Jerusalén', 'municipio_id' => 18],
            ['nombre_distrito' => 'Mercedes La Ceiba', 'municipio_id' => 18],
            ['nombre_distrito' => 'Paraíso de Osorio', 'municipio_id' => 18],
            ['nombre_distrito' => 'San Antonio Masahuat', 'municipio_id' => 18],
            ['nombre_distrito' => 'San Emigdio', 'municipio_id' => 18],
            ['nombre_distrito' => 'San Juan Tepezontes', 'municipio_id' => 18],
            ['nombre_distrito' => 'San Luis La Herradura', 'municipio_id' => 18],
            ['nombre_distrito' => 'San Miguel Tepezontes', 'municipio_id' => 18],
            ['nombre_distrito' => 'San Pedro Nonualco', 'municipio_id' => 18],
            ['nombre_distrito' => 'Santa María Ostuma', 'municipio_id' => 18],
            ['nombre_distrito' => 'Santiago Nonualco', 'municipio_id' => 18],
            
            // La Paz Este (ID 19)
            ['nombre_distrito' => 'San Juan Nonualco', 'municipio_id' => 19],
            ['nombre_distrito' => 'San Rafael Obrajuelo', 'municipio_id' => 19],
            ['nombre_distrito' => 'Zacatecoluca', 'municipio_id' => 19],
            
            // La Unión Norte (ID 20)
            ['nombre_distrito' => 'Anamorós', 'municipio_id' => 20],
            ['nombre_distrito' => 'Bolivar', 'municipio_id' => 20],
            ['nombre_distrito' => 'Concepción de Oriente', 'municipio_id' => 20],
            ['nombre_distrito' => 'El Sauce', 'municipio_id' => 20],
            ['nombre_distrito' => 'Lislique', 'municipio_id' => 20],
            ['nombre_distrito' => 'Nueva Esparta', 'municipio_id' => 20],
            ['nombre_distrito' => 'Pasaquina', 'municipio_id' => 20],
            ['nombre_distrito' => 'Polorós', 'municipio_id' => 20],
            ['nombre_distrito' => 'San José La Fuente', 'municipio_id' => 20],
            ['nombre_distrito' => 'Santa Rosa de Lima', 'municipio_id' => 20],
            
            // La Unión Sur (ID 21)
            ['nombre_distrito' => 'Conchagua', 'municipio_id' => 21],
            ['nombre_distrito' => 'El Carmen', 'municipio_id' => 21],
            ['nombre_distrito' => 'lntipucá', 'municipio_id' => 21],
            ['nombre_distrito' => 'La Unión', 'municipio_id' => 21],
            ['nombre_distrito' => 'Meanguera del Golfo', 'municipio_id' => 21],
            ['nombre_distrito' => 'San Alejo', 'municipio_id' => 21],
            ['nombre_distrito' => 'Yayantique', 'municipio_id' => 21],
            ['nombre_distrito' => 'Yucuaiquín', 'municipio_id' => 21],
            
            // Morazán Norte (ID 22)
            ['nombre_distrito' => 'Arambala', 'municipio_id' => 22],
            ['nombre_distrito' => 'Cacaopera', 'municipio_id' => 22],
            ['nombre_distrito' => 'Corinto', 'municipio_id' => 22],
            ['nombre_distrito' => 'El Rosario', 'municipio_id' => 22],
            ['nombre_distrito' => 'Joateca', 'municipio_id' => 22],
            ['nombre_distrito' => 'Jocoaitique', 'municipio_id' => 22],
            ['nombre_distrito' => 'Meanguera', 'municipio_id' => 22],
            ['nombre_distrito' => 'Perquín', 'municipio_id' => 22],
            ['nombre_distrito' => 'San Fernando', 'municipio_id' => 22],
            ['nombre_distrito' => 'San Isidro', 'municipio_id' => 22],
            ['nombre_distrito' => 'Torola', 'municipio_id' => 22],
            
            // Morazán Sur (ID 23)
            ['nombre_distrito' => 'Chilanga', 'municipio_id' => 23],
            ['nombre_distrito' => 'Delicias de Concepción', 'municipio_id' => 23],
            ['nombre_distrito' => 'El Divisadero', 'municipio_id' => 23],
            ['nombre_distrito' => 'Gualococti', 'municipio_id' => 23],
            ['nombre_distrito' => 'Guatajiagua', 'municipio_id' => 23],
            ['nombre_distrito' => 'Jocoro', 'municipio_id' => 23],
            ['nombre_distrito' => 'Lolotiquillo', 'municipio_id' => 23],
            ['nombre_distrito' => 'Osicala', 'municipio_id' => 23],
            ['nombre_distrito' => 'San Carlos', 'municipio_id' => 23],
            ['nombre_distrito' => 'San Francisco Gotera', 'municipio_id' => 23],
            ['nombre_distrito' => 'San Simón', 'municipio_id' => 23],
            ['nombre_distrito' => 'Sensembra', 'municipio_id' => 23],
            ['nombre_distrito' => 'Sociedad', 'municipio_id' => 23],
            ['nombre_distrito' => 'Yamabal', 'municipio_id' => 23],
            ['nombre_distrito' => 'Yoloaiquín', 'municipio_id' => 23],
            
            // San Miguel Norte (ID 24)
            ['nombre_distrito' => 'Ciudad Barrios', 'municipio_id' => 24],
            ['nombre_distrito' => 'Sesori', 'municipio_id' => 24],
            ['nombre_distrito' => 'Nuevo Edén de San Juan', 'municipio_id' => 24],
            ['nombre_distrito' => 'San Gerardo', 'municipio_id' => 24],
            ['nombre_distrito' => 'San Luis de La Reina', 'municipio_id' => 24],
            ['nombre_distrito' => 'Carolina', 'municipio_id' => 24],
            ['nombre_distrito' => 'San Antonio del Mosco', 'municipio_id' => 24],
            ['nombre_distrito' => 'Chapeltique', 'municipio_id' => 24],
            
            // San Miguel Centro (ID 25)
            ['nombre_distrito' => 'San Miguel', 'municipio_id' => 25],
            ['nombre_distrito' => 'Comacarán', 'municipio_id' => 25],
            ['nombre_distrito' => 'Uluazapa', 'municipio_id' => 25],
            ['nombre_distrito' => 'Moncagua', 'municipio_id' => 25],
            ['nombre_distrito' => 'Quelepa', 'municipio_id' => 25],
            ['nombre_distrito' => 'Chirilagua', 'municipio_id' => 25],
            
            // San Miguel Oeste (ID 26)
            ['nombre_distrito' => 'Chinameca', 'municipio_id' => 26],
            ['nombre_distrito' => 'Nueva Guadalupe', 'municipio_id' => 26],
            ['nombre_distrito' => 'Lolotique', 'municipio_id' => 26],
            ['nombre_distrito' => 'San Jorge', 'municipio_id' => 26],
            ['nombre_distrito' => 'San Rafael Oriente', 'municipio_id' => 26],
            ['nombre_distrito' => 'El Tránsito', 'municipio_id' => 26],
            
            // San Salvador Norte (ID 27)
            ['nombre_distrito' => 'Aguilares', 'municipio_id' => 27],
            ['nombre_distrito' => 'El Paisnal', 'municipio_id' => 27],
            ['nombre_distrito' => 'Guazapa', 'municipio_id' => 27],
            
            // San Salvador Oeste (ID 28)
            ['nombre_distrito' => 'Apopa', 'municipio_id' => 28],
            ['nombre_distrito' => 'Nejapa', 'municipio_id' => 28],
            
            // San Salvador Este (ID 29)
            ['nombre_distrito' => 'llopango', 'municipio_id' => 29],
            ['nombre_distrito' => 'San Martín', 'municipio_id' => 29],
            ['nombre_distrito' => 'Soyapango', 'municipio_id' => 29],
            ['nombre_distrito' => 'Tonacatepeque', 'municipio_id' => 29],
            
            // San Salvador Centro (ID 30)
            ['nombre_distrito' => 'Ayutuxtepeque', 'municipio_id' => 30],
            ['nombre_distrito' => 'Mejicanos', 'municipio_id' => 30],
            ['nombre_distrito' => 'San Salvador', 'municipio_id' => 30],
            ['nombre_distrito' => 'Cuscatancingo', 'municipio_id' => 30],
            ['nombre_distrito' => 'Ciudad Delgado', 'municipio_id' => 30],
            
            // San Salvador Sur (ID 31)
            ['nombre_distrito' => 'Panchimalco', 'municipio_id' => 31],
            ['nombre_distrito' => 'Rosario de Mora', 'municipio_id' => 31],
            ['nombre_distrito' => 'San Marcos', 'municipio_id' => 31],
            ['nombre_distrito' => 'Santo Tomás', 'municipio_id' => 31],
            ['nombre_distrito' => 'Santiago Texacuangos', 'municipio_id' => 31],
            
            // San Vicente Norte (ID 32)
            ['nombre_distrito' => 'Apastepeque', 'municipio_id' => 32],
            ['nombre_distrito' => 'Santa Clara', 'municipio_id' => 32],
            ['nombre_distrito' => 'San Ildefonso', 'municipio_id' => 32],
            ['nombre_distrito' => 'San Esteban Catarina', 'municipio_id' => 32],
            ['nombre_distrito' => 'San Sebastián', 'municipio_id' => 32],
            ['nombre_distrito' => 'San Lorenzo', 'municipio_id' => 32],
            ['nombre_distrito' => 'Santo Domingo', 'municipio_id' => 32],
            
            // San Vicente Sur (ID 33)
            ['nombre_distrito' => 'San Vicente', 'municipio_id' => 33],
            ['nombre_distrito' => 'Guadalupe', 'municipio_id' => 33],
            ['nombre_distrito' => 'Verapaz', 'municipio_id' => 33],
            ['nombre_distrito' => 'Tepetitán', 'municipio_id' => 33],
            ['nombre_distrito' => 'Tecoluca', 'municipio_id' => 33],
            ['nombre_distrito' => 'San Cayetano lstepeque', 'municipio_id' => 33],
            
            // Santa Ana Norte (ID 34)
            ['nombre_distrito' => 'Masahuat', 'municipio_id' => 34],
            ['nombre_distrito' => 'Metapán', 'municipio_id' => 34],
            ['nombre_distrito' => 'Santa Rosa Guachipilín', 'municipio_id' => 34],
            ['nombre_distrito' => 'Texistepeque', 'municipio_id' => 34],
            
            // Santa Ana Centro (ID 35)
            ['nombre_distrito' => 'Santa Ana', 'municipio_id' => 35],
            
            // Santa Ana Este (ID 36)
            ['nombre_distrito' => 'Coatepeque', 'municipio_id' => 36],
            ['nombre_distrito' => 'El Congo', 'municipio_id' => 36],
            
            // Santa Ana Oeste (ID 37)
            ['nombre_distrito' => 'Candelaria de la Frontera', 'municipio_id' => 37],
            ['nombre_distrito' => 'Chalchuapa', 'municipio_id' => 37],
            ['nombre_distrito' => 'El Porvenir', 'municipio_id' => 37],
            ['nombre_distrito' => 'San Antonio Pajonal', 'municipio_id' => 37],
            ['nombre_distrito' => 'San Sebastián Salitrillo', 'municipio_id' => 37],
            ['nombre_distrito' => 'Santiago de La Frontera', 'municipio_id' => 37],

            // Sonsonate Norte (ID 38)
            ['nombre_distrito' => 'Juayúa', 'municipio_id' => 38],
            ['nombre_distrito' => 'Nahuizalco', 'municipio_id' => 38],
            ['nombre_distrito' => 'Salcoatitán', 'municipio_id' => 38],
            ['nombre_distrito' => 'Santa Catarina Masahuat', 'municipio_id' => 38],
            
            // Sonsonate Centro (ID 39)
            ['nombre_distrito' => 'Sonsonate', 'municipio_id' => 39],
            ['nombre_distrito' => 'Sonzacate', 'municipio_id' => 39],
            ['nombre_distrito' => 'Nahulingo', 'municipio_id' => 39],
            ['nombre_distrito' => 'San Antonio del Monte', 'municipio_id' => 39],
            ['nombre_distrito' => 'Santo Domingo de Guzmán', 'municipio_id' => 39],
            
            // Sonsonate Este (ID 40)
            ['nombre_distrito' => 'lzalco', 'municipio_id' => 40],
            ['nombre_distrito' => 'Armenia', 'municipio_id' => 40],
            ['nombre_distrito' => 'Caluco', 'municipio_id' => 40],
            ['nombre_distrito' => 'San Julián', 'municipio_id' => 40],
            ['nombre_distrito' => 'Cuisnahuat', 'municipio_id' => 40],
            ['nombre_distrito' => 'Santa Isabel lshuatán', 'municipio_id' => 40],
            
            // Sonsonate Oeste (ID 41)
            ['nombre_distrito' => 'Acajutla', 'municipio_id' => 41],
            
            // Usulután Norte (ID 42)
            ['nombre_distrito' => 'Santiago de María', 'municipio_id' => 42],
            ['nombre_distrito' => 'Alegría', 'municipio_id' => 42],
            ['nombre_distrito' => 'Berlín', 'municipio_id' => 42],
            ['nombre_distrito' => 'Mercedes Umana', 'municipio_id' => 42],
            ['nombre_distrito' => 'Jucuapa', 'municipio_id' => 42],
            ['nombre_distrito' => 'El Triunfo', 'municipio_id' => 42],
            ['nombre_distrito' => 'Estanzuelas', 'municipio_id' => 42],
            ['nombre_distrito' => 'San Buenaventura', 'municipio_id' => 42],
            ['nombre_distrito' => 'Nueva Granada', 'municipio_id' => 42],
            
            // Usulután Este (ID 43)
            ['nombre_distrito' => 'Usulután', 'municipio_id' => 43],
            ['nombre_distrito' => 'Jucuarán', 'municipio_id' => 43],
            ['nombre_distrito' => 'San Dionisio', 'municipio_id' => 43],
            ['nombre_distrito' => 'Concepción Batres', 'municipio_id' => 43],
            ['nombre_distrito' => 'Santa María', 'municipio_id' => 43],
            ['nombre_distrito' => 'Ozatlán', 'municipio_id' => 43],
            ['nombre_distrito' => 'Tecapán', 'municipio_id' => 43],
            ['nombre_distrito' => 'Santa Elena', 'municipio_id' => 43],
            ['nombre_distrito' => 'California', 'municipio_id' => 43],
            ['nombre_distrito' => 'Ereguayquín', 'municipio_id' => 43],
            
            // Usulután Oeste (ID 44)
            ['nombre_distrito' => 'Jiquilisco', 'municipio_id' => 44],
            ['nombre_distrito' => 'Puerto El Triunfo', 'municipio_id' => 44],
            ['nombre_distrito' => 'San Agustín', 'municipio_id' => 44],
            ['nombre_distrito' => 'San Francisco Javier', 'municipio_id' => 44],

        ]);
    }
}