@extends('dashboard.base')

@section('content')

@php
    $consumoTotal = $inmueble->ambientes->sum('consumo_mensual') / 1000; // en Kwh
    foreach ( $tarifas as $tarifa ){
        // busco la tarifa que corresponde al consumo total del inmueble
        if ( $tarifa->consumo_minimo <= $consumoTotal && $tarifa->consumo_maximo >= $consumoTotal ){
            $tarifaSeleccionada = $tarifa;
            $gastoTotal = $tarifa->precio_fijo + $consumoTotal * $tarifa->precio_variable;
        }
    }
@endphp

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            
            {{-- Consumo --}}
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-header"><h4><i class="fas fa-bolt"></i> Consumo de {{$energia->nombre . ': ' . $inmueble->nombre}}</h4></div>
                        <div class="card-body">
                            <p>
                                Resultados mensuales de la simulacion electrica de todos tus artefactos.
                            </p>
                            
                            {{-- Tabla --}}
                            <table class="table table-striped table-sm datatable mt-3">                                
                                <thead>
                                    <tr>                                    
                                        <th>Artefacto</th>
                                        <th>Categoría</th>                                        
                                        <th>Energia</th>
                                        <th class="text-right">Consumo Mes</th>             
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inmueble->ambientes as $ambiente)
                                        @foreach($ambiente->artefactos as $artefacto)
                                            <tr>                                   
                                                <td>{{$artefacto->nombre}}</td>
                                                <td>{{$artefacto->tipo->nombre}}</td>
                                                <td>{{$artefacto->energia->nombre}}</td>
                                                <td class="text-right">
                                                    {{$artefacto->consumoMensual() . ' ' .$energia->unidad_minima}}
                                                </td> 
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    <tr>
                                        <td>Total</td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right text-bold">
                                            {{ $inmueble->ambientes->sum('consumo_mensual') . ' ' . $energia->unidad_minima }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('simulador.store',[$inmueble->id, $energia->id]) }}" class="btn btn-primary mt-3">
                                <i class="fas fa-save"></i> Guardar
                            </a>
                            <a href="{{ route('simulador.index',[$inmueble->id, $energia->id]) }}" class="btn btn-secondary mt-3">
                                <i class="fas fa-backward"></i> Volver
                            </a>
                
                        </div>
                </div>
            </div>

            {{-- Chart --}}
            <div class="col-sm-6 col-md-2">
                <div class="card text-white bg-primary">
                  <div class="card-body">
                    <div class="text-muted text-right mb-4">
                        <i class="fas {{ $energia->icono }}"></i>
                    </div>
                    <div class="text-value-lg">
                        {{ $consumoTotal }} {{ $energia->unidad }}
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Consumo Total</small>
                    <div class="text-value-lg">
                        $ {{ $gastoTotal }}
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Gasto Total</small>
                    <div class="progress progress-white progress-xs mt-3">
                        <div class="progress-bar" role="progressbar" 
                            style="width: {{ $consumoTotal * 100 / $tarifaSeleccionada->consumo_maximo }}%" 
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                  </div>
                </div>
            </div>

            {{-- Tarifas --}}
            <div class="col-sm-6 col-md-4">
                <div class="card">
                    <div class="card-header"><h4><i class="fas fa-dollar-sign"></i> Tarifas</h4></div>
                    <div class="card-body">
                        <p>
                            Tarifas para la categoría {{$tarifa->categoria->nombre}} de tu Proveedor
                        </p>
                        
                        {{-- Tabla --}}
                        <table class="table table-striped table-sm datatable mt-3">                                
                            <thead>
                                <tr>                                    
                                    <th>Consumo</th>
                                    <th>Precio Fijo</th>
                                    <th>Precio Variable</th>                                        
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tarifas as $tarifa)
                                    <tr class="{{ $tarifa->id == $tarifaSeleccionada->id ? 'table-' . $energia->color : ''}}">                                   
                                        <td>
                                            {{ $tarifa->consumo_minimo . ' a ' . $tarifa->consumo_maximo }} {{ $energia->unidad }}
                                        </td>
                                        <td>$ {{ $tarifa->precio_fijo }}</td>
                                        <td>$ {{ $tarifa->precio_variable }}</td>                                            
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

