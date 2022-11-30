<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Pago Factura ({{ $factura->fac_numero }})</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="row g-3 needs-validation" action="{{ route('storeAbonoFactura') }}" method="post" novalidate="" id="quick_add_product_form" >
            @csrf
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label" for="validationCustom01">Monto Total</label>
                        <div class="input-group"><span class="input-group-text"><i class="fa fa-euro"></i></span>
                            <input class="form-control" type="number" name="moc_monto" value="{{ $factura->fac_total_pendiente }}" id="moc_monto" placeholder="" >
                          </div>
    
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="validationCustom01">Fecha</label>
                        <div class="input-group"><span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            <input class="form-control " data-language="es" data-date-format="dd/mm/yyyy" type="text" name="moc_fecha" id="moc_fecha" placeholder="">
                          </div>
                    </div>
                  
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label" for="forma_pago_id">Pagado en</label>
                        <select class="form-select form-select-sm" name="forma_pago_id" id="forma_pago_id" required="">
                            <option selected="" disabled="" value="">Seleccionar</option>
                            @foreach ($opcionesPagos as $opcionPago)
                                <option value="{{ $opcionPago->id }}">{{ $opcionPago->fop_nombre }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                    <div class="col-md-6" id="monto_efectivo" style="display: none;">
                        <label class="form-label" for="validationCustom01" >Monto en Efectivo</label>
                        <div class="input-group"><span class="input-group-text"><i class="fa fa-euro"></i></span>
                            <input class="form-control" type="number" name="mov_monto" id="mov_monto" placeholder="">
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
                @if ($factura->fac_tipo_documento != '3')
                <input type="hidden" name="fac_tipo_documento" value="{{ $factura->fac_tipo_documento }}">                
                @endif
                <input type="hidden" name="factura_id" value="{{ $facturaId }}">

                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary abono_cliente" type="submit" id="abono_cliente">Guardar</button>
            </div>
        </form>
    </div>
</div>


