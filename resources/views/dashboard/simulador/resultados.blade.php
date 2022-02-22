@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            
            <!-- Tabla -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h4><i class="fas fa-bolt"></i> Consumos Totales</h4></div>
                        <div class="card-body">
                            <p>
                                Resultados mensuales de la simulacion electrica de todos tus artefactos.
                            </p>
                            
                           

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
                                                <td class="text-right">{{$artefacto->consumoMensual() . $artefacto->energia->unidad}}</td> 
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    <tr>
                                        <td>Total</td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right text-danger text-bold">{{$inmueble->ambientes->sum('consumo_mensual')}}</td>
                                    </tr>
                                </tbody>
                            </table>
                
                        </div>
                </div>
            </div>

            <!-- Chart -->
            <div class="col-sm-6 col-md-2">
                <div class="card text-white bg-danger">
                  <div class="card-body">
                    <div class="text-muted text-right mb-4">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div class="text-value-lg">{{$inmueble->ambientes->sum('consumo_mensual')}}</div><small class="text-muted text-uppercase font-weight-bold">Consumo Total</small>
                    <div class="progress progress-white progress-xs mt-3">
                      <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>

        </div>
    </div>
</div>


@endsection

