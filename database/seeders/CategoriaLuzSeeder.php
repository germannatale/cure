<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriaLuz;

class CategoriaLuzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriaLuz::create([
            'nombre' => 'T1-R: Uso Residencial',
        ]);
        CategoriaLuz::create([
            'nombre' => 'T1-R: Uso Residencial. Tarifa Social',
        ]);
        CategoriaLuz::create([
            'nombre' => 'T1-G: Uso General',
        ]);
        CategoriaLuz::create([
            'nombre' => 'T4-R: Pequeñas Demandas Rurales Residenciales',
        ]);
        CategoriaLuz::create([
            'nombre' => 'T4-R: Pequeñas Demandas Rurales Residenciales. Tarifa Social',
        ]);
        CategoriaLuz::create([
            'nombre' => 'T4-NR: Pequeñas Demandas Rurales No Residenciales',
        ]);
        CategoriaLuz::create([
            'nombre' => 'T1-AP: Alumbrado Público',
        ]);
    }
}
