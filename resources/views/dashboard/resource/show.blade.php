@extends('dashboard.base')

@section('css')

@endsection

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header"><h4>Ver {{ $form->name }}</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-sm table-responsive-md table-striped datatable">
                                    <tbody>
                                        @foreach($columns as $column)
                                            <tr>
                                                <td>
                                                    {{ $column['name'] }}
                                                </td>
                                                <td>
                                                    <?php
                                                      if( $column['type'] == 'default'){
                                                        echo $column['value'];
                                                      }elseif( $column['type'] == 'file'){
                                                        echo '<a href="' . $column['value'] . '" class="btn btn-primary" target="_blank">Open file</a>';
                                                      }elseif( $column['type'] == 'image' ){
                                                        echo '<img src="' . $column['value'] . '" style="max-width:200px;max-height:200px;">';
                                                      }
                                                    ?>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <a 
                                    href="{{ route('resource.index', $form->id) }}"                                    
                                    class="btn btn-secondary"
                                >
                                    Volver
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Relacion Tarifario - Tarifas --}}
            @if ($form->name == 'Tarifario')                
                @include('dashboard.resource.relation.tarifas')
            @endif
        </div>
    </div>
</div>

@endsection

@section('javascript')

@endsection