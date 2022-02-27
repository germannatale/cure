<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriaGas;

class CategoriaGasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Residenciales, Comerciales, GNC, Entidades de Bien Pùblico, Grandes Clientes

        CategoriaGas::create([
            'nombre' => 'Residenciales',
        ]);
        CategoriaGas::create([
            'nombre' => 'Comerciales',
        ]);
        CategoriaGas::create([
            'nombre' => 'GNC',
        ]);
        CategoriaGas::create([
            'nombre' => 'Entidades de Bien Público',
        ]);
        CategoriaGas::create([
            'nombre' => 'Grandes Clientes',
        ]);
        
    }
}
