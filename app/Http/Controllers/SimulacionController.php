<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simulacion;
use App\Models\SimulacionDetalle;
use App\Models\User;
use App\Models\Inmueble;
use App\Models\Ambiente;
use App\Models\Artefacto;
use App\Models\Energia;
use App\Models\Tarifario;


class SimulacionController extends Controller
{
    //index
    public function index()
    {
        $simulaciones = Simulacion::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->with('detalles')
            ->get();
        
        return view('dashboard.simulaciones.index', compact('simulaciones'));
    }
    
    //store 
    public function store($inmueble_id, $energia_id, Request $request)
    {              
        $inmueble = Inmueble::with('ambientes')->find($inmueble_id);
        $energia = Energia::find($energia_id);
        $consumo_total_kwh = $request->consumo_total_kwh;
        $gasto_total = $request->gasto_total;
        
        // Simulacion
        $simulacion = new Simulacion();
        $simulacion->user_id = auth()->user()->id;
        $simulacion->inmueble = $inmueble->nombre;
        $simulacion->ambientes = $inmueble->ambientes->count();
        $simulacion->consumo_total = $consumo_total_kwh;
        $simulacion->gasto_total = $gasto_total;
        $simulacion->save();

        // Simualcion Detalle
        foreach ($inmueble->ambientes as $ambiente) {
            if ($energia->nombre == 'Luz'){
                $artefactos = $ambiente->luz_artefactos;
            }
            else{
                $artefactos = $ambiente->gas_artefactos;
            }
            foreach ($artefactos as $artefacto){
                $simulacion_detalle = new SimulacionDetalle();
                $simulacion_detalle->simulacion_id = $simulacion->id;
                $simulacion_detalle->ambiente = $ambiente->nombre;
                $simulacion_detalle->artefacto = $artefacto->nombre;               
                $simulacion_detalle->consumo_artefacto = $artefacto->consumo_hora * $artefacto->horas_uso_prom;
                $simulacion_detalle->gasto_artefacto = 0;
                $simulacion_detalle->save();
            }
        }
        return redirect()->route('simulaciones.index')->withExito('La simulación fue guardada correctamente.');
    }
}
