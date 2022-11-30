<div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myLargeModalLabel">Factura # {{ $factura['0']['fac_numero'] }}</h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @include('facturas.formato.factura')
      </div>
    </div>
  </div>