<div class="modal-dialog modal-gl">
  <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Crear Nueva Forma de Pago</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          <form class="row g-2 needs-validation" action="{{ route('storeFormaPago') }}" method="post" >
              @csrf
              @include('admin.formaPago.components.actions.form_nuevo')
              
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                  <button class="btn btn-primary" type="submit">Guardar</button>
              </div>
          </form>
      </div>

  </div>
</div>