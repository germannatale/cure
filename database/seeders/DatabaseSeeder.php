<?php

namespace Database\Seeders;

use App\Models\Inmueble;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        $this->call([
            UsersSeeder::class,
            MenusTableSeeder::class,
            FolderTableSeeder::class,
            LocalidadesSeeder::class, 
            EnergiaSeeder::class,
            ProveedoresSeeder::class,
            CategoriaSeeder::class,
            SubcategoriaSeeder::class,
            CategoriaLuzSeeder::class,
            SubcategoriaLuzSeeder::class,
            CategoriaGasSeeder::class,
            SubcategoriaGasSeeder::class,            
            TarifarioSeeder::class,
            ArtefactoSeeder::class,
            ArtefactoTipo::class,
            MisArtefactosSeeder::class,
            //InmuebleSeeder::class,
            //BREADSeeder::class,
        ]);
    }
}
