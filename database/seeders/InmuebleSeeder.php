<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class InmuebleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Resource Inmueble
        DB::table('form')->insert([
            'name' => 'Inmueble',
            'description' => '',
            'table_name' => 'inmuebles',
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'pagination' => 1000
        ]);
        $formId = DB::getPdo()->lastInsertId();

        // Campos del Resource Inmueble
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
            'name' => 'Direccion',
            'validation' => 'required|max:255',
            'type' => 'text',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'direccion'
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
        DB::table('form_field')->insert([
            'name' => 'Antiguedad',
            'validation' => 'required|max:255',
            'type' => 'text',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'antiguedad'
        ]);
        DB::table('form_field')->insert([
            'name' => 'Moradores',
            'validation' => 'required|numeric|min:1',
            'type' => 'number',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'moradores'
        ]);
        DB::table('form_field')->insert([
            'name' => 'Tipo',
            'validation' => 'required',
            'type' => 'select',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'tipo'
        ]);
        DB::table('form_field')->insert([
            'name' => 'Luz Proveedor',
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
            'column_name' => 'luz_proveedor_id'
        ]);
        DB::table('form_field')->insert([
            'name' => 'Gas Proveedor',
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
            'column_name' => 'gas_proveedor_id'
        ]);        
        DB::table('form_field')->insert([
            'name' => 'User Id',
            'validation' => 'nullable',
            'type' => 'hidden',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'user_id'
        ]);
        // Permisos del Resource Inmueble
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
