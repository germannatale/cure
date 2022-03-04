@extends('dashboard.base')

@section('content')

@php
    $consumoTotal = $inmueble->consumoMensual($energia->id); // en Wh
    $consumoTotalkWh = $consumoTotal / 1000; // en kWh
    $gastoTotal = 0;
    $tarifaSeleccionada = null;    
    foreach ( $tarifas as $tarifa ){
        // busco la tarifa que corresponde al consumo total del inmueble
        if ( $tarifa->consumo_minimo <= $consumoTotalkWh && $tarifa->consumo_maximo >= $consumoTotalkWh ){
            $tarifaSeleccionada = $tarifa;
            $gastoTotal = $tarifa->precio_fijo + $consumoTotalkWh * $tarifa->precio_variable;
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
                            @if($gastoTotal)
                                <p>
                                    Resultados mensuales de la simulacion electrica de todos tus artefactos.
                                </p>                                
                            @else
                                <p class="text-danger">
                                    <strong>Upps! </strong>Parece que ninguna de las tarifas cargadas se aplica a tu caso.                                     
                                </p>
                                <p>
                                    Solo simularemos el consumo pero no podremos calcular su costo
                                </p>                            
                            @endif
                            
                            {{-- Tabla --}}
                            <table class="table table-hover table-sm datatable mt-3">                                
                                <thead>
                                    <tr>                                    
                                        <th>Artefacto</th>
                                        <th>Categoría</th>
                                        <th class="text-right">Consumo Mensual</th>
                                        <th class="text-right">Gasto Mensual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inmueble->ambientes as $ambiente)
                                        @php
                                            $energia->nombre == 'Luz' ? $artefactos = $ambiente->luz_artefactos : $artefactos = $ambiente->gas_artefactos;                                            
                                        @endphp
                                        @foreach($artefactos as $artefacto)
                                            <tr>                                   
                                                <td>{{$artefacto->nombre}}</td>
                                                <td>{{$artefacto->tipo->nombre}}</td>                                                
                                                <td class="text-right">
                                                    {{$artefacto->consumoMensual() . ' ' .$energia->unidad_minima}}
                                                </td>
                                                <td class="text-right">
                                                    {{ $tarifaSeleccionada ? '$' . $artefacto->consumoMensual() / 1000 * $tarifaSeleccionada->precio_variable : '-' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    <tr class="table-secondary">
                                        <td>Cargo Fijo</td>
                                        <td></td>
                                        <td class="text-right text-bold">-</td>                                        
                                        <td class="text-right text-bold">
                                            {{ $tarifaSeleccionada ? '$' . $tarifaSeleccionada->precio_fijo : '-' }}
                                        </td>
                                    </tr>
                                    <tr class="table-dark">                                        
                                        <th>Total</th>
                                        <th></th>
                                        <th class="text-right">
                                            {{ $consumoTotal . ' ' . $energia->unidad_minima }}
                                        </th>
                                        <th class="text-right">
                                            $ {{ $gastoTotal }}
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="{{route('simulacion.store',[$inmueble->id, $energia->id])}}" method="POST">
                                @csrf
                                <input type="hidden" name="consumo_total_kwh" value="{{$consumoTotalkWh}}">
                                <input type="hidden" name="gasto_total" value="{{$gastoTotal}}">
                                <a href="{{ route('simulador.index',[$inmueble->id, $energia->id]) }}" class="btn btn-secondary mt-3">
                                    <i class="fas fa-backward"></i> Volver
                                </a>                                
                                <button type="submit" class="btn btn-primary mt-3">
                                    <i class="fas fa-save"></i> Guardar
                                </button>
                            </form>                
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
                        {{ $energia->nombre == 'Luz' ? $consumoTotalkWh : 8837.298 / $consumoTotal  }} {{ $energia->unidad }}
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Consumo Total</small>
                    <div class="text-value-lg">
                        $ {{ $gastoTotal ?? 0 }}
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Gasto Total</small>
                    <div class="progress progress-white progress-xs mt-3">
                        <div class="progress-bar" role="progressbar" 
                            style="width: {{ $gastoTotal ? $consumoTotalkWh * 100 / $tarifaSeleccionada->consumo_maximo : 0 }}%" 
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                  </div>
                </div>
            </div>

            {{-- Tarifas --}}
            @if($tarifas->count() > 0)
                <div class="col-sm-6 col-md-4">
                    <div class="card">
                        <div class="card-header"><h4><i class="fas fa-dollar-sign"></i> Tarifas</h4></div>
                        <div class="card-body">
                            <p>
                                Tarifas para la categoría {{$tarifas->first()->categoria->nombre}} de tu Proveedor
                            </p>
                            
                            {{-- Tabla --}}
                            <table class="table table-hover table-sm datatable mt-3">                                
                                <thead>
                                    <tr>                                    
                                        <th>Consumo</th>
                                        <th>Precio Fijo</th>
                                        <th>Precio Variable</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tarifas as $tarifa)
                                        @if ($tarifaSeleccionada) 
                                            <tr class="{{ $tarifa->id == $tarifaSeleccionada->id ? 'table-secondary' : ''}}">   
                                        @else
                                            <tr>
                                        @endif                                                                        
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
            @endif        

        </div>
    </div>
</div>


@endsection

