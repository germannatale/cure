<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class TarifarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Resource Tarifario                   
        DB::table('form')->insert([
            'name' => 'Tarifario',
            'table_name' => 'tarifarios',
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'pagination' => 1000
        ]);
        $formId = DB::getPdo()->lastInsertId();
        DB::table('form_field')->insert([
            'name' => 'Nombre',
            'validation' => 'required',
            'type' => 'text',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'nombre'
        ]);
        DB::table('form_field')->insert([
            'name' => 'Inicio',
            'validation' => 'required|date',
            'type' => 'date',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'fecha_inicio'
        ]);
        DB::table('form_field')->insert([
            'name' => 'Fin',
            'validation' => 'date',
            'type' => 'date',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'fecha_fin'
        ]);
        DB::table('form_field')->insert([
            'name' => 'Proveedor',
            'validation' => 'required',
            // Relacion con Proveedor
            'type' => 'relation_select',    
            'relation_table' => 'proveedores',
            'relation_column' => 'nombre',
            // Fin Relacion con Proveedor            
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'proveedor_id'
        ]);
        DB::table('form_field')->insert([
            'name' => 'Localidad',
            'validation' => 'required',
            // Relacion con Localidad
            'type' => 'relation_select',    
            'relation_table' => 'localidades',
            'relation_column' => 'nombre',
            // Fin Relacion con Localidad            
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'localidad_id'
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
    }
}
