@php                                               
    $tarifario = App\Models\Tarifario::find($id)->with('proveedor')->with('tarifas')->first();    
    $energia = App\Models\Energia::find($tarifario->proveedor->energia_id)->first();   
    if ($energia->id == 'luz') {
        //luz
        $categorias = App\Models\CategoriaLuz::pluck('nombre', 'id');
        $subcategorias = App\Models\SubcategoriaLuz::pluck('nombre', 'id');
    } else {
        //gas
        $categorias = App\Models\CategoriaGas::pluck('nombre', 'id');
        $subcategorias = App\Models\SubcategoriaGas::pluck('nombre', 'id');
    }
   
@endphp

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Tarifas</h4>
        </div>
        <div class="card-body">
            {{-- Boton Agregar --}}                
            <div class="row">                    
                <div class="col-12 col-md-6 mb-2">                                       
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarTarifa">
                        <i class="fas fa-plus"></i> Agregar Tarifa
                    </button>                    
                </div>
            </div>
            {{-- Tabla de Tarifas --}}
            @if($tarifario->tarifas->count() == 0)                        
                <p>No hay tarifas asignadas a este Tarifario</p>
            @else            
                <table class="table table-sm table-responsive-md table-striped datatable">
                    <thead>
                        <tr>
                            <th>Categoría {{ $energia->nombre }}</th>
                            <th>SubCategoria {{ $energia->nombre }}</th>
                            <th>Precio Fijo</th>
                            <th>Precio Var</th>                            
                            <th>Consumo Min ({{ $energia->unidad }})</th>
                            <th>Consumo Max ({{ $energia->unidad }})</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tarifario->tarifas as $tarifa)
                        <tr>
                            <td>{{ $tarifa->categoria->nombre }}</td>
                            <td>{{ $tarifa->subcategoria->nombre }}</td>
                            <td>{{ $tarifa->precio_fijo }}</td>
                            <td>{{ $tarifa->precio_variable }}</td>
                            <td>{{ $tarifa->consumo_minimo }}</td>
                            <td>{{ $tarifa->consumo_maximo }}</td>                            
                            <td class="text-right">
                                <a href="{{ route('tarifas.destroy', ['id' => $tarifa->id ]) }}" 
                                    class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Tarifa">
                                    <i class="fas fa-trash"></i>
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
<div class="modal fade" id="agregarTarifa" tabindex="-1" role="dialog" aria-labelledby="agregarTarifaTitulo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarTarifaTitulo">Agregar Tarifa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <!-- Formulario Agregar Tarifa-->
            <form id="formAgregarTarifa" method="PUT" action={{ route('tarifas.store') }}>
                <div class="modal-body">                    
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="categoria">Categoria {{ $energia->nombre }}</label>
                            {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'id' => 'categoria_id']) !!}
                            
                        </div>
                        <div class="form-group col-md-6">
                            <label for="subcategoria">SubCategoria {{ $energia->nombre }}</label>
                            {!! Form::select('subcategoria_id', $subcategorias, null, ['class' => 'form-control', 'id' => 'subcategoria_id']) !!}
                        </div>
                    </div>                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="consumo_minimo">Consumo Minimo ({{ $energia->unidad }})</label>
                            <input type="number" class="form-control" name="consumo_minimo" id="consumo_minimo" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="consumo_maximo">Consumo Maximo ({{ $energia->unidad }})</label>
                            <input type="number" class="form-control" name="consumo_maximo" id="consumo_maximo" placeholder="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="precio_fijo">Precio Fijo</label>
                            <input type="number" class="form-control" name="precio_fijo" id="precio_fijo" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="precio_variable">Precio Variable</label>
                            <input type="number" class="form-control" name="precio_variable" id="precio_variable" placeholder="">
                        </div>                        
                    </div>
                    <input type="hidden" name="tarifario_id" value="{{ $tarifario->id }}">                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>