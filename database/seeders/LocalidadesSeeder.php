<?php

namespace Database\Seeders;

use App\Models\Localidad;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class LocalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Resource Localidad           
        DB::table('form')->insert([
            'name' => 'Localidad',
            'table_name' => 'localidades',
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'pagination' => 1000
        ]);
        $formId = DB::getPdo()->lastInsertId();
        // Campos del Resource Localidad
        DB::table('form_field')->insert([
            'name' => 'Nombre',
            'validation' => 'required|max:255',
            'type' => 'text',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'nombre'
        ]);              
        DB::table('form_field')->insert([
            'name' => 'Provincia',
            'validation' => 'required|max:255',
            'type' => 'text',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'provincia'
        ]);
        DB::table('form_field')->insert([
            'name' => 'CP',
            'validation' => 'required|max:255',
            'type' => 'text',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'cp'
        ]);        
        $role = Role::where('name', '=', 'guest')->first();
        Permission::create(['name' => 'browse bread '   . $formId]); 
        Permission::create(['name' => 'read bread '     . $formId]); 
        Permission::create(['name' => 'edit bread '     . $formId]); 
        Permission::create(['name' => 'add bread '      . $formId]); 
        Permission::create(['name' => 'delete bread '   . $formId]); 
        $role->givePermissionTo('browse bread '     . $formId);
        $role->givePermissionTo('read bread '       . $formId);
        $role->givePermissionTo('edit bread '       . $formId);
        $role->givePermissionTo('add bread '        . $formId);
        $role->givePermissionTo('delete bread '     . $formId);

        // Datos de prueba        
        $localidades = 10;
        $faker = Faker::create('es_AR');       
        for($i = 0; $i<$localidades; $i++){
            Localidad::create([ 
                'nombre'        => $faker->city,
                'provincia'        => $faker->state,
                'cp'            => $faker->postcode,                
            ]);
        }
    }
}