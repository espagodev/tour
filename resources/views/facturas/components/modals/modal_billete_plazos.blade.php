<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Agregar Nuevo Billete a Plazos</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <form class="row g-3 needs-validation" action="{{ route('storeBilletePlazos') }}" method="post">
                @csrf
                @include('billetes_plazo.components.actions.form_billete_plazos')
                <input type="hidden" name="fac_tipo_documento" value="3"/>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>
        </div>

    </div>
</div>
