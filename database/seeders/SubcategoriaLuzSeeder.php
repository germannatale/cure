<?php

namespace Database\Seeders;

use App\Models\SubcategoriaLuz;
use Illuminate\Database\Seeder;

class SubcategoriaLuzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubcategoriaLuz::create([
            'nombre' => 'T1-R1',
        ]);
        SubcategoriaLuz::create([
            'nombre' => 'T1-R2',
        ]);
        SubcategoriaLuz::create([
            'nombre' => 'T1-G1',
        ]);
        SubcategoriaLuz::create([
            'nombre' => 'T1-G2',
        ]);
        SubcategoriaLuz::create([
            'nombre' => 'T1-G3',
        ]);

    }
}
