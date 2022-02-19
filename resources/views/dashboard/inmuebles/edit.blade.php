@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header"><h4>Editar Inmueble: {{ $inmueble->nombre }}</h4></div>
                    <div class="card-body">                            
                        <div class="row">
                            <div class="col-12">
                                {{-- Formulario de creacion de inmuebles --}}
                                <form action="{{ route('inmuebles.update', $inmueble->id)}}" action="POST">
                                    @csrf
                                    {{-- Nombre --}}
                                    <div class="form-group">
                                        <label for="tipo">Tipo</label>
                                        <select name="tipo" id="tipo" class="form-control">                                            
                                            <option value="Casa" {{ $inmueble->tipo == 'Casa' ? 'selected' : '' }}>Casa</option>
                                            <option value="Departamento" {{ $inmueble->tipo == 'Departamento' ? 'selected' : '' }}>Departamento</option>
                                            <option value="Terreno" {{ $inmueble->tipo == 'Terreno' ? 'selected' : '' }}>Terreno</option>
                                            <option value="Local" {{ $inmueble->tipo == 'Local' ? 'selected' : '' }}>Local</option>
                                            <option value="Oficina" {{ $inmueble->tipo == 'Oficina' ? 'selected' : '' }}>Oficina</option>
                                            <option value="Bodega" {{ $inmueble->tipo == 'Bodega' ? 'selected' : '' }}>Bodega</option>
                                            <option value="Edificio" {{ $inmueble->tipo == 'Edificio' ? 'selected' : '' }}>Edificio</option>
                                            <option value="Galpón" {{ $inmueble->tipo == 'Galpón' ? 'selected' : '' }}>Galpón</option>
                                            <option value="Lote" {{ $inmueble->tipo == 'Lote' ? 'selected' : '' }}>Lote</option>
                                            <option value="Otro" {{ $inmueble->tipo == 'Otro' ? 'selected' : '' }}>Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text"  value="{{ $inmueble->nombre }}"name="nombre" id="nombre" class="form-control">
                                    </div>
                                    {{-- Direccion --}}
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <input type="text" value="{{ $inmueble->direccion }}" name="direccion" id="direccion" class="form-control">
                                    </div>
                                    {{-- Localidad --}}
                                    <div class="form-group">
                                        <label for="localidad_id">Localidad</label>
                                        <select name="localidad_id" id="localidad_id" class="form-control">
                                            @foreach ($localidades as $localidad)                                                
                                                <option value="{{ $localidad->id }}" {{ $localidad->id == $inmueble->localidad_id ? 'selected' : ''}}>
                                                    {{ $localidad->nombre .' (' . $localidad->cp . ') - ' .$localidad->provincia}}
                                                </option>                                               
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- Antiguedad --}}
                                    <div class="form-group">
                                        <label for="antiguedad">Antiguedad</label>
                                        <select name="antiguedad" id="antiguedad" class="form-control">
                                            <option value="nuevo"{{ $inmueble->antiguedad == 'nuevo' ? 'selected' : '' }}>Edificio Nuevo. (Menor de 10 Años.)</option>
                                            <option value="reciente"{{ $inmueble->antiguedad == 'reciente' ? 'selected' : '' }}>Construcción reciente (10 a 50 Años)</option>
                                            <option value="antiguo"{{ $inmueble->antiguedad == 'antiguo' ? 'selected' : '' }}>Edificio Antiguo ( Más de 50 Años)</option>
                                        </select>
                                    </div>                                    
                                    {{-- Moradores --}}
                                    <div class="form-group">
                                        <label for="moradores">Moradores</label>
                                        <input type="number" name="moradores" value="{{ $inmueble->moradores }}" id="moradores" class="form-control">
                                    </div>                                    
                                    {{-- Luz --}}
                                    <div class="form-group">
                                        <label for="">Proveedor Luz</label>
                                        {{ Form::select('luz_proveedor_id', $luzProveedores, $inmueble->luz_proveedor_id,  ['class' => 'form-control']) }}

                                    </div>
                                    {{-- Gas --}}
                                    <div class="form-group">
                                        <label for="">Proveedor Gas</label>
                                        {{ Form::select('gas_proveedor_id', $gasProveedores, $inmueble->gas_proveedor_id,  ['class' => 'form-control']) }}                                        
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
