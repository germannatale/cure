<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inmueble;
use App\Models\Ambiente;
use App\Models\Artefacto;
use App\Models\Energia;
use App\Models\ArtefactoTipo;
use App\Models\Categoria;
use App\Models\Localidad;
use App\Models\LuzProveedor;
use App\Models\GasProveedor;
use App\Models\Tarifario;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class SimuladorController extends Controller
{
    //select
    public function select(){
        $inmuebles = Inmueble::where('user_id', Auth::user()->id)->get();
        $energia = Energia::all();
        return view('dashboard.simulador.select', compact('inmuebles', 'energia'));
    }

    //index
    public function index($inmueble_id, $energia_id, Request $request)
    {
        $energia = Energia::find($energia_id);       
        $inmueble = Inmueble::with('ambientes')->find($inmueble_id);
        $artefactosParaAgregar = Artefacto::where('energia_id', $energia->id)->orderBy('nombre')->pluck('nombre', 'id');
        $categorias = Categoria::where('energia_id', $energia->id)->orderBy('nombre')->get();
        return view('dashboard.simulador.index', compact('inmueble', 'artefactosParaAgregar' , 'energia', 'categorias'));

    }

    //resultados
    public function resultados($inmueble_id, $energia_id, Request $request){  
        $categoria_id = $request->categoria_id;      
        $inmueble = Inmueble::with('ambientes')->find($inmueble_id);
        $energia = Energia::find($energia_id);
        if ($energia->nombre == 'Luz'){
            // obtengo las el tarifario de luz de del proveedor para esa localidad
            $tarifario = Tarifario::where('localidad_id', $inmueble->localidad_id)
                ->where('proveedor_id', $inmueble->luz_proveedor_id)                
                ->with('tarifas')
                ->first(); 
        }
        else{
            // obtengo las el tarifario de gas de del proveedor para esa localidad
            $tarifario = Tarifario::where('localidad_id', $inmueble->localidad_id)
            ->where('proveedor_id', $inmueble->gas_proveedor_id)
            ->with('tarifas')
            ->first();            
        }
        $tarifario ?  $tarifas = $tarifario->tarifas->where('categoria_id', $categoria_id) : $tarifas = collect();
        $tarifas->count() > 0 ?? session()->flash('error', 'Upps!!! No hay tarifas para la categoría seleccionada. Consulte al administrador del sistema. No se calculará el costo del consumo.');
        return view('dashboard.simulador.resultados', compact('inmueble', 'energia', 'tarifas'));
        
    }
}
