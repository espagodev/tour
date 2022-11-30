<div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myLargeModalLabel">Expediente Cliente ( {{ $factura->full_name_agenda }} ) - ({{ $factura->fac_numero }})</h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @include("billetes_plazo.formato.expediente")
      </div>
    </div>
  </div>