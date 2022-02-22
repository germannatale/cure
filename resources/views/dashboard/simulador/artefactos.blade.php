<table class="table table-striped table-sm datatable mt-3">                                
    <thead>
        <tr>            
            <th>Artefacto</th>                                        
            <th>Energia</th>
            <th>Tipo</th>
            <th>Consumo hora</th>
            <th>Horas promedio</th>
            <th class="text-right">Acciones</th>                                
        </tr>
    </thead>
    <tbody>
        @if($ambiente->artefactos)        
            @foreach ($ambiente->artefactos as $artefacto)
                <tr>                    
                    <td>{{$artefacto->nombre}}</td>
                    <td>{{$artefacto->energia->nombre}}</td>
                    <td>{{$artefacto->tipo->nombre}}</td>
                    <td>{{$artefacto->consumo_hora}}</td>
                    <td>{{$artefacto->horas_uso_prom}}</td>                                    
                    <td class="text-right">
                        <a href="{{route('inmueble.artefacto.destroy',[
                            'inmueble_id' => $inmueble->id,
                            'ambiente_id' => $ambiente->id,
                            'artefacto_id'=> $artefacto->id
                            ])}}"
                            data-toggle="tooltip" data-placement="top" title="Quitar Artefacto"
                            class="btn btn-sm btn-danger"><i class="fas fa-unlink"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <p>No has asignado aun artefactos a este ambiente</p>        
        @endif      
    </tbody>
</table>