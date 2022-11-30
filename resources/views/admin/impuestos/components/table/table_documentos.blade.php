<div class="row">
    <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Nombre: </label>
                            {{ !empty($documento->doc_nombre) ? $documento->doc_nombre : '' }}


                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Abreviado: </label>
                            {{ !empty($documento->doc_prefijo) ? $documento->doc_prefijo : '' }}
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Inicia en:</label>
                            {{ $documento->doc_inicial }}
                        </div>
                        <div class="col-md-6">

                            <label class="form-label" for="doc_incremento">Incremento en:</label>
                            {{ $documento->doc_incremento }}

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="doc_digitos">Numero de Digitos:</label>
                            {{ $documento->doc_digitos }}
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="doc_conteo">Conteo:</label>
                            {{ $documento->doc_conteo }}
                        </div>

                    </div>
                    
                </div>
            </div>
    </div>
</div>