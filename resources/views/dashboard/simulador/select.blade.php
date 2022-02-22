@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header"><h4><i class="fas fa-calculator"></i> Que simulamos?</h4></div>
                    <div class="card-body">
                        @if ($inmuebles->count() == 0)
                            <p class="text-danger" role="alert">
                                <strong>Upps!</strong> Pararece que aun no tienes inmuebles.                                
                            </p>
                            <p>
                                Ve primero a la pantalla de <a href="{{ route('inmuebles.index')}}">inmuebles</a> y carga uno.
                            </p>
                        @else
                            <p>
                                Elegí el imnueble del cual deseas simular su consumo. 
                                Para hacerlo solo preciona el boton correspodiente a la 
                                simulación que deseas realizar (luz ó gas).
                            </p> 

                            <table class="table table-striped table-sm datatable mt-3">                                
                                <thead>
                                    <tr>                                    
                                        <th>Nombre</th>
                                        <th>Tipo</th>                                        
                                        <th>Dirección</th>
                                        <th class="text-right">Simular</th>             
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inmuebles as $inmueble)                                            
                                        <tr>                                   
                                            <td>{{$inmueble->nombre}}</td>
                                            <td>{{$inmueble->tipo}}</td>
                                            <td>{{$inmueble->direccion}}</td>
                                            <td class="text-right">
                                                <a href="{{ route('simulador.index', [$inmueble->id, 1]) }}" 
                                                    data-toggle="tooltip" data-placement="top" title="Simular Consumo Luz"
                                                    class="btn btn-sm btn-outline-primary {{$inmueble->luz_proveedor ? '' : 'disable'}}">
                                                    <i class="fas fa-bolt"></i>
                                                </a>
                                                <a href="{{ route('simulador.index', [$inmueble->id, 2]) }}" 
                                                    data-toggle="tooltip" data-placement="top" title="Simular Consumo Gas"
                                                    class="btn btn-sm btn-outline-danger {{$inmueble->luz_proveedor ? '' : 'disable'}}">
                                                    <i class="fas fa-fire"></i>
                                                </a>
                                            </td> 
                                        </tr>
                                    @endforeach                                                                         
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection

