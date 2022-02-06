<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Resource Proveedor           
        DB::table('form')->insert([
            'name' => 'Proveedor',
            'table_name' => 'proveedores',
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'pagination' => 1000
        ]);
        $formId = DB::getPdo()->lastInsertId();
        // Campos del Resource Proveedor
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
            'name' => 'Localidad',           
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
        DB::table('form_field')->insert([
            'name' => 'Direccion',
            'validation' => 'nullable|max:255',
            'type' => 'text',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'direccion'
        ]);
        DB::table('form_field')->insert([
            'name' => 'CUIT',
            'validation' => 'nullable|numeric|digits:11',
            'type' => 'text',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'cuit'
        ]);
        DB::table('form_field')->insert([
            'name' => 'energia',
            'validation' => 'required',
            // Relacion con Energia
            'type' => 'relation_select',    
            'relation_table' => 'energias',
            'relation_column' => 'nombre',
            // Fin Relacion con Energia
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'energia_id'
        ]);
        DB::table('form_field')->insert([
            'name' => 'Email',
            'validation' => 'nullable|email',
            'type' => 'text',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'email'
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