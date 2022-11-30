<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Agregar Nuevo Cliente</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {{-- @php
        $form_id = 'agregar_nuevo_cliente';
        if(isset($quick_add)){
          $form_id = 'agregar_nuevo_cliente';
        }
    
        if(isset($store_action)) { 
          $url = $store_action;
          $type = 'lead';
          $customer_groups = [];
        } else {
          $url = route('agenda.store');
          $type = isset($selected_type) ? $selected_type : '';
          $sources = [];
          $life_stages = [];
        }
      @endphp --}}
        <form class="row g-3 needs-validation" action="route('agenda.store')" method="post" novalidate="" id="agregar_nuevo_cliente">
            @csrf
            <div class="modal-body">

                @include('agenda.components.actions.form_nuevo')
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
