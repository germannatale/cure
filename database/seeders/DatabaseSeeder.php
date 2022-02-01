<?php

namespace Database\Seeders;

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
            CategoriaLuzSeeder::class,
            SubcategoriaLuzSeeder::class,
            CategoriaGasSeeder::class,
            SubcategoriaGasSeeder::class,
            ProveedoresSeeder::class,
            TarifarioSeeder::class,
            //BREADSeeder::class,           
        ]);
    }
}
