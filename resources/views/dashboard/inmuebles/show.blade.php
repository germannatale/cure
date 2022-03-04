@extends('dashboard.base')

@section('css')

@endsection

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header"><h4>Ver {{$inmueble->nombre}}</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-sm table-responsive-md table-striped datatable">
                                    <tbody>
                                        {{-- Para cada dato --}}
                                        {{-- Direccion	Tipo	Moradores	Antiguedad	Ambientes	Localidad	Proveedor Luz	Proveedor Gas --}}
                                        <tr>
                                            <th>Nombre</th>
                                            <td>{{$inmueble->nombre}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tipo</th>
                                            <td>{{$inmueble->tipo}}</td>
                                        </tr>
                                        <tr>
                                            <th>Dirección</th>
                                            <td>{{$inmueble->direccion}}</td>
                                        </tr>
                                        <tr>
                                            <th>Moradores</th>
                                            <td>{{$inmueble->moradores}}</td>
                                        </tr>
                                        <tr>
                                            <th>Antiguedad</th>
                                            <td>{{$inmueble->antiguedad}}</td>
                                        </tr>
                                        <tr>
                                            <th>Ambientes</th>
                                            <td>{{$inmueble->ambientes ? $inmueble->ambientes->count() : ''}}</td>
                                        </tr>
                                        <tr>
                                            <th>Localidad</th>
                                            <td>{{$inmueble->localidad->nombre}}</td>
                                        </tr>
                                        <tr>
                                            <th>Proveedor Luz</th>
                                            <td>{{$inmueble->luz_proveedor ? $inmueble->luz_proveedor->nombre : ''}}</td>
                                        </tr>
                                        <tr>
                                            <th>Proveedor Gas</th>
                                            <td>{{$inmueble->gas_proveedor ? $inmueble->gas_proveedor->nombre : ''}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                                <a href="{{ route('inmuebles.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-backward"></i> Volver
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Ambientes --}}                         
            @include('dashboard.inmuebles.relation.ambientes')
           
        </div>
    </div>
</div>

@endsection

@section('javascript')

@endsection