<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Resource Categoria           
        DB::table('form')->insert([
            'name' => 'Categoría',
            'table_name' => 'categorias',
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'pagination' => 1000
        ]);
        $formId = DB::getPdo()->lastInsertId();
        // Campos del Resource Categoria
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
            'name' => 'Energia',
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
