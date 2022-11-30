
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Firma Cliente Factura ({{ $factura->fac_numero }})</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       
        <form class="row g-3 needs-validation" action="" method="post" novalidate="" id="quick_add_product_form" >
            @csrf
            <div class="modal-body">
                <div class="row mb-3">
                  
                    <div class="col-md-12">
                        <div id="sig"></div>
                        <textarea id="signature" name="signed" style="display: none"></textarea>
                    </div>
                    
                </div>
                
            </div>
            <div class="modal-footer">
                <input type="hidden" name="factura_id" value="{{ $facturaId }}">
                <button id="clear" class="btn btn-danger">Borrar Firma</button>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cerrar</button>
               
                <button class="btn btn-primary abono_cliente" type="submit" id="abono_cliente">Guardar</button>
            </div>
        </form>
    </div>
</div>