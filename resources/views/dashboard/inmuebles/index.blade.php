@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4><i class="fas fa-home"></i> Inmuebles</h4></div>
            <div class="card-body">
                <p>
                    Desde esta pantalla administre sus inmuebles. Puede agregar cuantos quiera. 
                    Luego desde el boton agregar ambientes puede agregar ambientes y artefactos.
                </p>
                <div class="row">                    
                    {{-- Boton Agregar --}}
                    <div class="col-12 col-md-6 mt-2">                                     
                        <a  href="{{ route('inmuebles.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Agregar Inmueble</a>
                    </div>
                    {{-- Filtro de busqueda --}}
                    <div class="col-12 col-md-6 mt-2">                        
                        <div class="input-group"> 
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="ipt_filtrar_icon"><i class="fas fa-filter"></i></div>
                            </div>
                            <input type="text" id="ipt_filtrar" class="form-control" aria-describedby="ipt_filtrar_icon" placeholder="Escriba para filtrar por texto" onkeyup="aplicar_filtro()">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="quitar_filtro()"><span class="text-dark">Limpiar</span></button>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-sm datatable mt-3">                                
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>                                        
                            <th>Direccion</th>                                                                
                            <th>Moradores</th>
                            <th>Antiguedad</th>
                            <th>Ambientes</th>
                            <th>Localidad</th>
                            <th>Proveedor Luz</th>   
                            <th>Proveedor Gas</th>                            
                            <th class="text-right">Acciones</th>                                
                        </tr>
                    </thead>
                    <tbody>                        
                        @foreach ($inmuebles as $inmueble)
                            <tr>
                                <td>{{ $inmueble->nombre }}</td>
                                <td>{{ $inmueble->tipo }}</td>                                   
                                <td>{{ $inmueble->direccion }}</td>                                
                                <td>{{ $inmueble->moradores }}</td>
                                <td>{{ $inmueble->antiguedad }}</td>
                                <td>{{ $inmueble->ambientes ? $inmueble->ambientes->count() : '0' }}</td>
                                <td>{{ $inmueble->localidad->nombre }}</td>
                                <td>{{ $inmueble->luz_proveedor ? $inmueble->luz_proveedor->nombre : '' }}</td>
                                <td>{{ $inmueble->gas_proveedor ? $inmueble->gas_proveedor->nombre : '' }}</td>
                                <td class="text-right">
                                    <a href="{{ route('inmuebles.show', $inmueble->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('inmuebles.edit', $inmueble->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>                                        
                                    <a href="{{ route('inmuebles.destroy', $inmueble->id) }}" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach                                            
                    </tbody>
                </table>
                
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection