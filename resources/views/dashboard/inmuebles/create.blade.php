@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header"><h4>Agregar nuevo Inmueble</h4></div>
                    <div class="card-body">                            
                        <div class="row">
                            <div class="col-12">
                                {{-- Formulario de creacion de inmuebles --}}
                                <form action="{{ route('inmuebles.store')}}" action="POST">
                                    @csrf
                                    {{-- Nombre --}}
                                    <div class="form-group">
                                        <label for="">Tipo</label>
                                        <select name="tipo" id="tipo" class="form-control">                                            
                                            <option value="Casa">Casa</option>
                                            <option value="Departamento">Departamento</option>
                                            <option value="Terreno">Terreno</option>
                                            <option value="Local">Local</option>
                                            <option value="Oficina">Oficina</option>
                                            <option value="Bodega">Bodega</option>
                                            <option value="Edificio">Edificio</option>
                                            <option value="Galpón">Galpón</option>
                                            <option value="Lote">Lote</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control">
                                    </div>
                                    {{-- Direccion --}}
                                    <div class="form-group">
                                        <label for="">Dirección</label>
                                        <input type="text" name="direccion" id="direccion" class="form-control">
                                    </div>
                                    {{-- Localidad --}}
                                    <div class="form-group">
                                        <label for="">Localidad</label>
                                        <select name="localidad_id" id="localidad_id" class="form-control">
                                            @foreach ($localidades as $localidad)
                                            <option value="{{ $localidad->id }}">{{ $localidad->nombre .' (' . $localidad->cp . ') - ' .$localidad->provincia}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- Antiguedad --}}
                                    <div class="form-group">
                                        <label for="">Antiguedad</label>
                                        <select name="antiguedad" id="antiguedad" class="form-control">
                                            <option value="nuevo">Edificio Nuevo. (Menor de 10 Años.)</option>
                                            <option value="reciente">Construcción reciente (10 a 50 Años)</option>
                                            <option value="antiguo">Edificio Antiguo ( Más de 50 Años)</option>
                                        </select>
                                    </div>                                    
                                    {{-- Moradores --}}
                                    <div class="form-group">
                                        <label for="">Moradores</label>
                                        <input type="number" name="moradores" id="moradores" class="form-control">
                                    </div>
                                    {{-- Luz --}}
                                    <div class="form-group">
                                        <label for="">Proveedor Luz</label>
                                        {{ Form::select('luz_proveedor_id', $luzProveedores, null,  ['class' => 'form-control']) }}

                                    </div>
                                    {{-- Gas --}}
                                    <div class="form-group">
                                        <label for="">Proveedor Gas</label>
                                        {{ Form::select('gas_proveedor_id', $gasProveedores, null,  ['class' => 'form-control']) }}                                        
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">
                                        <i class="fas fa-save"></i> Guardar
                                    </button>
                                    <a href="{{ route('inmuebles.index') }}" class="btn btn-secondary mt-3">
                                        <i class="fas fa-backward"></i> Volver
                                    </a>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                    

@endsection
