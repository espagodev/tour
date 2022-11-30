<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Observaciones</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="row g-3 needs-validation" action="{{ route('storeMovimientoObservacion') }}" method="post" novalidate="" >
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <textarea class="form-control" name="moo_descripcion" id="moo_descripcion" placeholder="Descripcion" ></textarea>
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
