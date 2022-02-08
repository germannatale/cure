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
            'nombre' => 'Luz',
        ]);
        Energia::create([            
            'nombre' => 'Gas',
        ]);
    }
}
