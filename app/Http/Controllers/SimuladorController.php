<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inmueble;
use App\Models\Ambiente;
use App\Models\Artefacto;
use App\Models\ArtefactoTipo;
use App\Models\Localidad;
use App\Models\LuzProveedor;
use App\Models\GasProveedor;
use App\Models\Tarifario;
use Illuminate\Support\Facades\Auth;

class SimuladorController extends Controller
{
    //index
    public function index($inmueble_id, $energia_id, Request $request)
    {
        $user = Auth::user();
        $inmueble = Inmueble::with('ambientes')->find($inmueble_id);
        $artefactos = Artefacto::orderBy('nombre')->pluck('nombre', 'id');                       
        return view('dashboard.simulador.index', compact('inmueble', 'artefactos' , 'energia_id'));
    }

    //resultados
    public function resultados($inmueble_id, $energia_id){
        $inmueble = Inmueble::with('ambientes')->find($inmueble_id);        
        return view('dashboard.simulador.resultados', compact('inmueble'));

    }
}
