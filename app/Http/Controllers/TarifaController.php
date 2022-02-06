<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarifa;

class TarifaController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'categoria_id' => 'required',
            'subcategoria_id' => 'required',
            'tarifario_id' => 'required',
            'precio_fijo' => 'required|numeric',
            'precio_variable' => 'required|numeric',
            'consumo_maximo' => 'required|numeric',
            'consumo_minimo' => 'required|numeric',    
        ]);
        $tarifa = new Tarifa();
        $tarifa->categoria_id = $request->categoria_id;
        $tarifa->subcategoria_id = $request->subcategoria_id;
        $tarifa->tarifario_id = $request->tarifario_id;
        $tarifa->precio_fijo = $request->precio_fijo;
        $tarifa->precio_variable = $request->precio_variable;
        $tarifa->consumo_maximo = $request->consumo_maximo;
        $tarifa->consumo_minimo = $request->consumo_minimo;
        $tarifa->save();
        return back()->withExito('Tarifa creada correctamente');
    }

    public function destroy($id){
        $tarifa = Tarifa::find($id);
        $tarifa->delete();
        return back()->withExito('Tarifa eliminada correctamente');
    }
}
