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
            ProveedoresSeeder::class,
            //BREADSeeder::class,           
        ]);
    }
}
