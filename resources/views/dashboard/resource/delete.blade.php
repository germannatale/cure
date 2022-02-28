@extends('dashboard.base')

@section('css')

@endsection

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="card">
          <div class="card-header"><h4>Borrar {{ $formName .' #' . $id }}</h4></div> 
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="{{ route('resource.destroy', ['table' => $table, 'resource' => $id ]) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="marker" value="true">
                            <p>Esta seguro de eliminarlo?</p>
                            <button type="submit" class="btn btn-danger mt-3">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                            <a href="{{ route('resource.index', $table) }}" class="btn btn-secondary mt-3">
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
</div>

@endsection

@section('javascript')


@endsection