
<div class="col-6">
    <div class="card">
        <div class="card-header">
            <h4>Ambientes de {{$inmueble->nombre}}</h4>
        </div>
        <div class="card-body">
            {{-- Boton Agregar --}}                
            <div class="row">                    
                <div class="col-12 col-md-6 mb-2">                                       
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarAmbiente">
                        <i class="fas fa-plus"></i> Agregar Ambiente
                    </button>                    
                </div>
            </div>
            {{-- Tabla de Tarifas --}}
            @if($inmueble->ambientes->count() == 0)                        
                <p>No hay Ambientes para este inmueble</p>
            @else            
                <table class="table table-sm table-responsive-md table-striped datatable">
                    <thead>
                        <tr>
                            
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>M3</th>
                            <th>Termico</th>                            
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inmueble->ambientes as $ambiente)
                        <tr>
                            <td>{{ $ambiente->nombre }}</td>
                            <td>{{ $ambiente->tipo }}</td>
                            <td>{{ $ambiente->m3 }}</td>
                            <td>{{ $ambiente->termico ? 'Si' : 'No' }}</td>
                            <td class="text-right">
                                <a href="{{ route('ambientes.destroy', ['id' => $ambiente->id ]) }}" 
                                    class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Ambiente">
                                    <i class="fas fa-trash-alt"></i>
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
  
{{-- Modal --}}
<div class="modal fade" id="agregarAmbiente" tabindex="-1" role="dialog" aria-labelledby="agregarAmbienteTitulo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarAmbienteTitulo">Agregar Ambiente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            {{-- Formulario Agregar Ambiente --}}
            <form id="formagregarAmbiente" method="PUT" action={{ route('ambientes.store') }}>
                <div class="modal-body">                    
                    @csrf
                    {{-- inmueble_id --}}
                    <input type="hidden" name="inmueble_id" value="{{ $inmueble->id }}">
                    {{-- nombre --}}
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Ambiente" required>
                    </div>
                     {{-- tipo --}}
                    <div class="form-group">
                        <label for="tipo">Tipo | Clasificación</label>
                        <select name="tipo" id="tipo" class="form-control">
                            <option value="AC">Ambiente climatizado</option>
                            <option value="ANC">Ambiente no climatizado</option>
                            <option value="EXT">Ambiente exterior</option>
                        </select>                        
                    </div>
                    
                    <div class="form-row">
                        {{-- m3 --}}
                        <div class="form-group col-md-6">
                            <label for="categoria">m3</label>
                            <input type="number" min="0" step="0.01" class="form-control" id="m3" name="m3" placeholder="m3" required>                            
                        </div>
                        {{-- Termico --}}
                        <div class="form-group col-md-6">
                            <label for="termico">Térmico</label>                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="termico" name="termico">
                                <label class="form-check-label" for="termico">
                                    Térmico
                                </label>
                            </div>
                        </div>
                    </div>         
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>