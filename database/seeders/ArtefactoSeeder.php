<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ArtefactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        
        // Resource Artefacto
        DB::table('form')->insert([
            'name' => 'Artefactos Genericos',
            'table_name' => 'artefactos',
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'pagination' => 1000
        ]);             
        $formId = DB::getPdo()->lastInsertId();
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
        // Campos del Resource Artefacto
        DB::table('form_field')->insert([
            'name' => 'Tipo',
            'validation' => 'required',
            // Relacion con ArtefactoTipo
            'type' => 'relation_select',    
            'relation_table' => 'artefacto_tipos',
            'relation_column' => 'nombre',
            // Fin Relacion con ArtefactoTipo            
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'artefacto_tipo_id'
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
        DB::table('form_field')->insert([
            'name' => 'Consumo (Wh) ó (kCal/h)',
            'validation' => 'required|numeric',
            'type' => 'text',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'consumo_hora'
        ]);
        DB::table('form_field')->insert([
            'name' => 'Horas Uso Prom',
            'validation' => 'required|numeric',
            'type' => 'text',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'horas_uso_prom'
        ]);        
        DB::table('form_field')->insert([
            'name' => 'Calor Residual (kCal/h)',
            'validation' => 'nullable|numeric',
            'type' => 'text',
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'calor_residual'
        ]);
        DB::table('form_field')->insert([
            'name' => 'User Id',
            'validation' => 'nullable',
            'type' => 'hidden',
            'browse' => 0,
            'read' => 0,
            'edit' => 0,
            'add' => 1,
            'form_id' => $formId,
            'column_name' => 'user_id'
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
