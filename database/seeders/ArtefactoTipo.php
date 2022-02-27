<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtefactoTipo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Iluminación | Refrigeración | Linea Blanca | Cocina | Climatización | Electrónica, Audio y Video | Cuidado Personal | Agua 

        DB::table('artefacto_tipos')->insert([
            'nombre' => 'Iluminación',
        ]);
        DB::table('artefacto_tipos')->insert([
            'nombre' => 'Refrigeración',
        ]);
        DB::table('artefacto_tipos')->insert([
            'nombre' => 'Linea Blanca',
        ]);
        DB::table('artefacto_tipos')->insert([
            'nombre' => 'Cocina',
        ]);
        DB::table('artefacto_tipos')->insert([
            'nombre' => 'Climatización',
        ]);
        DB::table('artefacto_tipos')->insert([
            'nombre' => 'Electrónica, Audio y Video',
        ]);
        DB::table('artefacto_tipos')->insert([
            'nombre' => 'Cuidado Personal',
        ]);
        DB::table('artefacto_tipos')->insert([
            'nombre' => 'Agua',
        ]);

    }
}
