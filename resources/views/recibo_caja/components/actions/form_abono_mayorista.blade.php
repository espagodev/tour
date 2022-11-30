<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Pago a Mayorista</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="row g-3 needs-validation" action="{{ route('storeAbonoMayorista') }}" method="post" novalidate="" >
            @csrf
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label" for="validationCustom01">Monto</label>
                        <div class="input-group"><span class="input-group-text"><i class="fa fa-euro"></i></span>
                            <input class="form-control" type="number" name="moc_monto" id="moc_monto" placeholder="">
                          </div>
    
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="validationCustom01">Fecha</label>
                        <div class="input-group"><span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            <input class="form-control datepicker-here" data-language="es" name="moc_fecha" id="moc_fecha" type="text" placeholder="">
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <textarea class="form-control" name="moc_descripcion" id="moc_descripcion" placeholder="Descripcion" ></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="billetes_plazos_id" value="{{ $billetePlazoId }}">
                <input type="hidden" name="factura_id" value="{{ $facturaId }}">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
