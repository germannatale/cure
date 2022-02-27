@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-calculator"></i> Simulador</h4>                    
                    </div>
                    <div class="card-body">
                        <p>
                            Desde esta pantalla desplazate por los ambientes que hayas creado y agregales artefactos. 
                            Una vez que tengas todo listo solo presiona simular consumo. Recuerda seleccionar cual es tu categoría.
                        </p>
                        <form class="form-row mb-3" action="{{route('simulador.resultados',[$inmueble->id, $energia->id])}}"" method="post">
                            @csrf
                            <div class="col text-right">
                                <div class="input-group "> 
                                    <div class="input-group-prepend">
                                        <div class="input-group-text input-group-outline-primary"><i class="fas fa-sitemap pr-2"></i> Categoría</div>
                                    </div>
                                    <div class="input-group-appen mr-2">
                                        <select name="categoria_id" class="custom-select" style="height: auto !important; padding-bottom: 8px">
                                            @foreach($categorias as $categoria)
                                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                            @endforeach                                            
                                        </select>
                                    </div>
                                
                                    <button role="submit" class="btn btn-outline-{{$energia->color}}"><i class="fas {{$energia->icono}}"></i> Simular Consumo</button>
                                
                                </div>
                            </div>
                        </form>
                        
                        <div id="accordion"> 
                            @foreach ($inmueble->ambientes as $ambiente)
                            
                                <div class="card mb-1">
                                    <div class="card-header pb-1 pt-1" style="background-color:#ebedef"id="header-ambiente-{{$ambiente->id}}">
                                        <h5 class="mb-0">
                                            <a class="btn btn-link collapsed" role="button" 
                                                data-target="#ambiente-{{$ambiente->id}}" data-toggle="collapse"
                                                aria-expanded="false" aria-controls="ambiente-{{$ambiente->id}}">
                                                <i class="fas fa-chevron-down"></i> {{$ambiente->nombre}}
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="ambiente-{{$ambiente->id}}" class="collapse" aria-labelledby="header-ambiente-{{$ambiente->id}}" data-parent="#accordion">
                                        <div class="card-body">
                                            <button 
                                                class="btn btn-success mb-2"
                                                onclick="{{ $artefactosParaAgregar->count() > 0 ?  'modalAgregarArtefato('. $ambiente->id .')': '' }}">
                                                <i class="fas fa-link"></i> Agregar Artefacto
                                            </button>
                                            @if($artefactosParaAgregar->count() > 0)
                                                <p>
                                                    Añade artefactos con el boton verde o quitalos con el boton rojo. 
                                                    No puedes crear nuevos o eliminarlos desde esta ventana.
                                                </p>
                                            @else
                                                <p>
                                                    Parece que no tienes artefactos para agregar. Carga algunos y vuelve a intentarlo.
                                                </p>
                                            @endif
                                            @php
                                                $energia->nombre == 'Luz' ? $artefactos = $ambiente->luz_artefactos : $artefactos = $ambiente->gas_artefactos;                                                
                                            @endphp

                                            {{-- Tabla de Artefactos --}}
                                            @include('dashboard.simulador.artefactos')
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>                    

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modales --}}
@include('dashboard.simulador.modal.artefacto-agregar')

@endsection

@section('javascript')
    @if($collapse = session()->get('collapse'))
        <script>
            $(document).ready(function(){
                $('#ambiente-{{$collapse}}').collapse('show');
            });
        </script>
    @endif
@endsection