<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use App\Models\Ambiente;
use App\Models\Artefacto;
use App\Models\ArtefactoTipo;
use App\Models\Localidad;
use App\Models\Proveedor;
use App\Models\LuzProveedor;
use App\Models\GasProveedor;
use App\Models\Tarifario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InmuebleController extends Controller
{
    //index
    public function index()
    {
        $user = Auth::user();
        $inmuebles = Inmueble::where('user_id', $user->id)
            ->with('localidad')
            ->with('luz_proveedor')
            ->with('gas_proveedor')
            ->with('ambientes')
            ->get();            
        return view('dashboard.inmuebles.index', compact('inmuebles'));
    }

    //create
    public function create()
    {
        //localidad ordenada por nombre
        $localidades = Localidad::orderBy('nombre')->get();        
        $luzProveedores = LuzProveedor::orderBy('nombre')->pluck('nombre', 'id');
        $gasProveedores = GasProveedor::orderBy('nombre')->pluck('nombre', 'id');        
        return view('dashboard.inmuebles.create')->with(compact('localidades', 'luzProveedores', 'gasProveedores'));
           
    }

    //store
    public function store(Request $request)
    {
        //Validaciones
        $request->validate([
            'nombre' => 'required|max:255',
            'direccion' => 'required|max:255',
            'localidad_id' => 'required',
            'antiguedad' => 'required',
            'moradores' => 'required',
            'tipo' => 'required',
            'luz_proveedor_id' => 'nullable',
            'gas_proveedor_id' => 'nullable',
            'user_id' => 'rquired',
        ]);
        $user = Auth::user();
        $inmueble = new Inmueble();
        $inmueble->nombre = $request->nombre;
        $inmueble->direccion = $request->direccion;
        $inmueble->localidad_id = $request->localidad_id;
        $inmueble->antiguedad = $request->antiguedad;
        $inmueble->moradores = $request->moradores;
        $inmueble->tipo = $request->tipo;
        $inmueble->luz_proveedor_id = $request->luz_proveedor_id;
        $inmueble->gas_proveedor_id = $request->gas_proveedor_id;
        $inmueble->user_id = $user->id;
        $inmueble->save();
        return redirect()->route('inmuebles.index')->withExito('Inmueble creado correctamente');
    }

    //detroy
    public function destroy($id)
    {
        $inmueble = Inmueble::findOrFail($id);
        $inmueble->delete();
        return redirect()->route('inmuebles.index')->withExito('Inmueble eliminado correctamente');
    }

    //edit
    public function edit($id)
    {
        $inmueble = Inmueble::findOrFail($id);        
        $localidades = Localidad::orderBy('nombre')->get();
        $luzProveedores = LuzProveedor::orderBy('nombre')->pluck('nombre', 'id');
        $gasProveedores = GasProveedor::orderBy('nombre')->pluck('nombre', 'id');
        return view('dashboard.inmuebles.edit')->with(compact('inmueble', 'localidades', 'luzProveedores', 'gasProveedores'));
    }

    //update
    public function update(Request $request, $id)
    {
        //Validaciones       
        $request->validate([
            'nombre' => 'required|max:255',
            'direccion' => 'required|max:255',
            'localidad_id' => 'required',
            'antiguedad' => 'required',
            'moradores' => 'required',
            'tipo' => 'required',
            'luz_proveedor_id' => 'nullable',
            'gas_proveedor_id' => 'nullable',
            'user_id' => 'rquired',
        ]);
        $inmueble = Inmueble::findOrFail($id);
        $inmueble->nombre = $request->nombre;
        $inmueble->direccion = $request->direccion;
        $inmueble->localidad_id = $request->localidad_id;
        $inmueble->antiguedad = $request->antiguedad;
        $inmueble->moradores = $request->moradores;
        $inmueble->tipo = $request->tipo;
        $inmueble->luz_proveedor_id = $request->luz_proveedor_id;
        $inmueble->gas_proveedor_id = $request->gas_proveedor_id;        
        $inmueble->save();
        return redirect()->route('inmuebles.index')->withExito('Inmueble actualizado correctamente');
    }

    //show
    public function show($id)
    {
        $inmueble = Inmueble::with('localidad')
            ->with('luz_proveedor')
            ->with('gas_proveedor')
            ->with('ambientes')
            ->findOrFail($id);      
        
        return view('dashboard.inmuebles.show')->with('inmueble' , $inmueble);
    }
}
