{{-- withExito en la session cuando se manda en la ruta --}}
@if(session()->get('exito'))
    @if(is_array(session()->get('exito')))                                                                      
        @foreach (session()->get('exito') as $exito)
        <div class="alert alert-success alert-dismissible fade show mb-0">            
            <i class="fa fa-check"> </i>
            {{ $exito }}
            <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
        @endforeach                                    
    @else                                    
        <div class="alert alert-success alert-dismissible fade show mb-0">            
            <i class="fa fa-check"> </i>
            {!! session()->get('exito') !!}
            <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    @endif    
@endif

{{-- whitMensaje en la session cuando se manda en la ruta --}}
@if(session()->get('mensaje'))
    @if(is_array(session()->get('mensaje')))                                                                      
        @foreach (session()->get('mensaje') as $mensaje)       
        <div class="alert alert-info alert-dismissible fade show mb-0">            
            <i class="fa fa-warning"> </i>
            {{ $mensaje }}
            <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
        @endforeach                                    
    @else                                    
        <div class="alert alert-info alert-dismissible fade show mb-0">
            <i class="fa fa-warning"> </i>
            {!! session()->get('mensaje') !!}
            <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    @endif    
@endif

{{-- Errores de Validacion --}}
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <i class="fa fa-times-circle"> </i>
            {{ $error }}
            <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    @endforeach
{{-- withErrors en la session cuando se manda en la ruta --}}
@elseif (session()->get('error'))
    @if(is_array(session()->get('error')))                                                                      
        @foreach (session()->get('error') as $mensaje)
        <div class="alert alert-danger alert-dismissible fade show mb-0">            
            <i class="fa fa-times-circle"> </i>
            {{ $mensaje }}
            <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
        @endforeach                                    
    @else                                    
        <div class="alert alert-danger alert-dismissible fade show mb-0">            
            <i class="fa fa-times-circle"> </i>
            {!! session()->get('error') !!}
            <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    @endif    
@endif