<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ambiente;

class AmbienteController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',            
            'tipo' => 'required|max:255',
            'm3' => 'required|numeric',            
        ]);
        $ambiente = new Ambiente;
        $ambiente->nombre = $request->nombre;        
        $ambiente->tipo = $request->tipo;
        $ambiente->m3 = $request->m3;
        $request->has('termico') ? $ambiente->termico = 1 : $ambiente->termico = 0;       
        $ambiente->inmueble_id = $request->inmueble_id;
        $ambiente->save();        
        return redirect()->route('inmuebles.show',$ambiente->inmueble_id)->withExito('Ambiente creado correctamente');
    }

    public function destroy($id)
    {
        $ambiente = Ambiente::findOrFail($id);
        $inmueble_id = $ambiente->inmueble_id;
        $ambiente->delete();
        return redirect()->route('inmuebles.show',$inmueble_id)->withExito('Ambiente eliminado exitosamente');        
    }
}
