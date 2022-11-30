<div class="modal-dialog modal-lg">
  <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Crear Nuevo Recibo de Caja</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          <form class="row g-3 needs-validation" action="{{ route('storeReciboCaja') }}" method="post">
              @csrf
              @include('recibo_caja.components.actions.form_nueva_factura')
              <input type="hidden" name="fac_tipo_documento" value="2"/>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                  <button class="btn btn-primary" type="submit">Guardar</button>
              </div>
          </form>
      </div>

  </div>
</div>