<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubcategoriaGas;

class SubcategoriaGasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // R1, R2-1,R2-3
        SubcategoriaGas::create([
            'nombre' => 'R1',
        ]);
        SubcategoriaGas::create([
            'nombre' => 'R2-1',
        ]);
        SubcategoriaGas::create([
            'nombre' => 'R2-3',
        ]);

    }
}
