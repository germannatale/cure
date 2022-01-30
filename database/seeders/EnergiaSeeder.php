<?php

namespace Database\Seeders;

use App\Models\Energia;
use Illuminate\Database\Seeder;

class EnergiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Energia::create([
            'id' => 'luz',
            'nombre' => 'Luz',
        ]);
        Energia::create([
            'id' => 'gas',
            'nombre' => 'Gas',
        ]);
    }
}
