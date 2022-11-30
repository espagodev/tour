<div class="modal-dialog modal-lg">
  <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Modificar Agenda {{ $agenda->agd_nombres }}</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          <form class="row g-3 needs-validation" action="{{ route('updateAgenda',$agenda->id) }}" method="post" enctype="multipart/form-data">
              @csrf {{ method_field('PUT') }}
              @include('agenda.components.actions.form_nuevo')
              
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                  <button class="btn btn-primary" type="submit">Guardar</button>
              </div>
          </form>
      </div>

  </div>
</div>