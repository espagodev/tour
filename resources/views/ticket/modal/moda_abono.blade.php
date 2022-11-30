<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Abono # {{ $abono->moc_numero }}</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            @include('ticket.ticket')

            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-info btnGenerarCopia"><i class="icon-image"></i> Generar
                    Imagen</button> --}}
                <a href="#" data-href="" class="print-invoice btn btn-primary"><i class="icon-printer"
                        aria-hidden="true"></i> Imprimir</a>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>

    </div>
</div>
