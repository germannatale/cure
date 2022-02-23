{{-- Modal --}}
<div class="modal fade" id="modalAgregarArtefacto" tabindex="-1" role="dialog" aria-labelledby="agregarArtefactoTitulo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarArtefactoTitulo">Agregar Artefacto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            {{-- Formulario Agregar Ambiente --}}
            <form id="agregarArtefactoForm" method="PUT" action={{ route('inmueble.artefacto.store', $inmueble->id) }}>
                <div class="modal-body">                    
                    @csrf
                    {{-- inmueble_id --}}
                    <input type="hidden" id="agregarArtefactoAmbienteId" name="ambiente_id" value="">
                    <input type="hidden" id="agregarArtefactoEnergiaId" name="energia_id" value="{{ $energia->id }}">
                    {{-- Artefacto --}}
                    <div class="form-group">
                        <label for="nombre">Seleccione Artefacto</label>
                        {{ Form::select('artefacto_id', $artefactosParaAgregar, null, ['class' => 'form-control']) }}
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