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
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur maiores eius neque laudantium tempora? 
                            Atque cupiditate consectetur a nihil sapiente nisi dolor perspiciatis! Ipsam, labore. Minima unde ex possimus. 
                            Odit.Voluptates voluptatum modi necessitatibus inventore.
                        </p>
                        <form class="form-row mb-3" action="{{route('simulador.resultados',[$inmueble->id, $energia_id])}}"" method="post">
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
                                
                                    <button role="submit" class="btn btn-outline-primary"><i class="fas fa-bolt"></i> Simular Consumo</button>
                                
                                </div>
                            </div>
                        </form>
                        
                        
                        {{-- <a href="{{route('simulador.resultados',[$inmueble->id, $energia_id])}}" class="btn btn-primary mb-3"><i class="fas fa-bolt"></i> Simular Consumo</a> --}}
                    
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
                                            <button class="btn btn-success mb-2" onclick="modalAgregarArtefato({{ $ambiente->id }})">
                                                <i class="fas fa-link"></i> Agregar Artefacto
                                            </button>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                Voluptates, quisquam.
                                            </p>

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