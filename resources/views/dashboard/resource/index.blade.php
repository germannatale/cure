@extends('dashboard.base')

{{-- @section('css')

@endsection --}}

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>{{ $form->name }}</h4></div>
            <div class="card-body">                
                <div class="row">
                    <p>{{ $form->description }}</p>
                    {{-- Boton Agregar --}}
                    <div class="col-12 col-md-6 mt-2">
                        @if( $enableButtons['add'] == 1 )                    
                            <a 
                                href="{{ route('resource.create', $form->id ) }}"
                                class="btn btn-success mb-3"
                            ><i class="fas fa-plus"></i>
                            Agregar {{ $form->name }}
                            </a>
                        @endif
                    </div>
                    {{-- Filtro de busqueda --}}
                    <div class="col-12 col-md-6 mt-2">                        
                        <div class="input-group"> 
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="ipt_filtrar_icon"><i class="fas fa-filter"></i></div>
                            </div>
                            <input type="text" id="ipt_filtrar" class="form-control" aria-describedby="ipt_filtrar_icon" placeholder="Escriba para filtrar por texto" onkeyup="aplicar_filtro()">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="quitar_filtro()"><span class="text-dark">Limpiar</span></button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-12"> --}}
                        <table class="table table-sm table-responsive-md table-striped datatable">
                            <thead>
                                <tr>
                                    @foreach($header as $head)
                                        <th>{{ $head->name }}</th>
                                    @endforeach
                                    <?php
                                        // if($enableButtons['read'] == 1){
                                        //     echo '<th></th>';
                                        // }
                                        // if($enableButtons['edit'] == 1){
                                        //     echo '<th></th>';
                                        // }
                                        // if($enableButtons['delete'] == 1){
                                        //     echo '<th></th>';
                                        // }
                                    ?>
                                    <th class="text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($datas as $data){
                                        echo '<tr class="item-row">';
                                        foreach($header as $head){
                                            if(!empty($head->relation_table)){
                                                echo '<td>' . $data['relation_' . $head->column_name] . '</td>';
                                            }else{
                                                echo '<td>' . $data[$head->column_name] . '</td>';
                                            }
                                        }
                                        echo '<td class="text-right">';
                                        echo '<form action="' . route("resource.destroy", ['table' => $form->id, 'resource' => $data['id'] ] )  . '" method="POST">';
                                        if($enableButtons['read'] == 1){
                                            //echo '<td>';
                                            echo '<a href="' . route("resource.show", ['table' => $form->id, 'resource' => $data['id'] ] ) . '" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Ver '. $form->name.'"><i class="fas fa-eye"></i></a>';
                                            //echo '</td>';
                                        }
                                        if($enableButtons['edit'] == 1){
                                            //echo '<td>';
                                            echo '<a href="' . route("resource.edit", ['table' => $form->id, 'resource' => $data['id'] ] ) . '" class="btn btn-sm btn-secondary ml-1" data-toggle="tooltip" data-placement="top" title="Editar '. $form->name.'"><i class="fas fa-edit"></i></a>';
                                            //echo '</td>';
                                        }
                                        if($enableButtons['delete'] == 1){
                                            //echo '<td>';
                                        ?>    
                                            @csrf
                                            @method('DELETE')
                                        <?php     
                                            echo '<button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar '. $form->name.'"><i class="fas fa-trash-alt"></i></button>';
                                            echo '</form>';
                                            //echo '</td>';
                                        }
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                        {!! $pagination !!}
                    {{-- </div>
                </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')


@endsection