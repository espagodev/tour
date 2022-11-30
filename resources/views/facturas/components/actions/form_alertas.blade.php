<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Alertas</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="row g-3 needs-validation" action="{{ route('storeMovimientoAlerta') }}" method="post"
            novalidate="">
            @csrf
            <div class="modal-body">
                <div class="row mb-3">

                    <div class="col-md-12">
                        <label class="form-label" for="validationCustom01">Fecha</label>
                        <div class="input-group"><span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            <input class="form-control datepicker-here" type="text" data-language="es" name="moa_fecha"
                                id="moa_fecha" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <textarea class="form-control " name="moa_descripcion" id="moa_descripcion" placeholder="Observacion"></textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="billetes_plazos_id" value="{{ isset($billetePlazoId) ? $billetePlazoId : '' }}"> 
                <input type="hidden" name="factura_id" value="{{ $facturaId }}">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
