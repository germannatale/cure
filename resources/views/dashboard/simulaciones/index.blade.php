@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            
            {{-- Simaulciones --}}
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-header"><h4><i class="fas fa-bolt">
                        </i> Mis Simulaciones</h4>
                    </div>
                    <div class="card-body">
                        <p>Navega desde aquí tus simulaciones guardadas</p>
                        
                        {{-- Tabla --}}
                        <table class="table table-hover table-sm datatable mt-3">                                
                            <thead>
                                <tr>
                                    <th>Fecha</th>                                  
                                    <th>Detalle</th>
                                    <th>Ambientes</th>
                                    <th class="text-right">Consumo Mensual</th>
                                    <th class="text-right">Gasto Mensual</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($simulaciones as $simulacion)
                                    <tr class="item-row">
                                        <td>{{ $simulacion->created_at->format('d/m/Y H:i:s') }}</td>
                                        <td>{{ $simulacion->inmueble }}</td>
                                        <td>{{ $simulacion->ambientes }}</td>
                                        <td class="text-right">{{ number_format($simulacion->consumo_total, 2) }} kwh</td>
                                        <td class="text-right">$ {{ number_format($simulacion->gasto_total, 2) }} </td>                                       
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-secondary" title="Ver Transacciones Conciliadas" 
                                                data-toggle="tooltip" data-placement="top" 
                                                onclick="toggleSubClassOfClass('{{'simulacion-' .$simulacion->id}}', 'item-detail')">
                                                <i class="fas fa-bars"></i>
                                            </a>                                                                        

                                        </td>
                                    </tr>
                                    @foreach($simulacion->detalles as $detalle)

                                        <tr class="item-detail simulacion-{{$simulacion->id }} table-secondary d-none">                                            
                                            <td>{{ $simulacion->created_at->format('d/m/Y H:i:s') }}</td>                                  
                                            <td>{{ $detalle->artefacto }}</td>
                                            <td>{{ $detalle->ambiente }}</td>
                                            <td class="text-right">{{$detalle->consumo_artefacto}} Wh</td>
                                            <td class="text-right">-</td>
                                            <td><td>
                                        </tr>

                                    @endforeach
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
