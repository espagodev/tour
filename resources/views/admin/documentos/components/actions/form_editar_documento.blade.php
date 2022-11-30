<div class="row">
    <div class="col-sm-12">
        <form class="row  needs-validation" action="{{ route('updateDocumentos', $documento->id) }}"
            method="post" id="add_sell_form" novalidate="">
            @csrf {{ method_field('PUT') }}
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Nombre: </label>
                            <input class="form-control form-control-sm" name="doc_nombre" id="doc_nombre"
                            type="text" value="{{ old('doc_prefijo', !empty($documento->doc_nombre) ?  $documento->doc_nombre : '') }}" required="">


                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Abreviado: </label>
                            <input class="form-control form-control-sm" id="doc_prefijo"
                            name="doc_prefijo" value="{{ old('doc_prefijo', !empty($documento->doc_prefijo) ?  $documento->doc_prefijo : '') }}" type="text" required>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Inicia en:</label>
                            <input class="form-control form-control-sm" id="doc_inicial" name="doc_inicial" value="{{ old('doc_inicial', !empty($documento->doc_inicial) ?  $documento->doc_inicial : '') }}"
                            type="number" required>
                        </div>
                        <div class="col-md-6">

                            <label class="form-label" for="doc_incremento">Incremento en:</label>
                            <input class="form-control form-control-sm" id="doc_incremento" name="doc_incremento"
                            value="{{ old('doc_incremento', !empty($documento->doc_incremento) ?  $documento->doc_incremento : '') }}" type="number" required>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="doc_digitos">Numero de Digitos:</label>
                            <select class="form-control " name="doc_digitos" id="doc_digitos" required>
                                @foreach ($digitos as $key => $digito)
                                    <option value="{{ $key }}" @if($key == old('doc_digitos', $documento->doc_digitos)) selected @endif>{{ $digito }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="doc_conteo">Conteo:</label>
                            <input class="form-control form-control-sm" id="doc_conteo" name="doc_conteo"
                            value="{{ old('doc_conteo', !empty($documento->doc_conteo) ?  $documento->doc_conteo : 0) }}" type="number" required>

                        </div>

                    </div>
                    
                </div>
            </div>
            
        

            <div class="card">
                <div class="card-footer text-end">
                    <button class="btn btn-primary m-r-15" type="submit">Modificar</button>
                    <button class="btn btn-light" type="button">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>