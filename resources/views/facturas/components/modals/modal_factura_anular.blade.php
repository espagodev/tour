<div class="modal-dialog modal-xl">
  <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Anular Factura ({{ $factura->fac_numero }})</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          <form class="row g-3 needs-validation" action="{{ route('storeFactura') }}" method="post">
              @csrf
              <link rel="stylesheet" href="{{ asset('css/expediente.css') }}">
              @include('facturas.components.actions.form_anular_factura')
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                  <button class="btn btn-primary" type="submit">Guardar</button>
              </div>
          </form>
      </div>

  </div>
</div>