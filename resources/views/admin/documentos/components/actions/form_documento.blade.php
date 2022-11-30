

        <div class="row">
            <div class="col-md-6">
                <label class="form-label" for="doc_nombre">Nombre</label>
                <input class="form-control form-control-sm" name="doc_nombre" id="doc_nombre"
                    type="text" value="{{ $documento->doc_nombre ?? '' }}" required="">
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="doc_prefijo">Prefijo</label>
                <input class="form-control form-control-sm" id="doc_prefijo"
                                name="doc_prefijo" value="{{ old('doc_prefijo', !empty($documento->doc_prefijo) ?  $documento->doc_prefijo : '') }}" type="text" required>

                <div class="invalid-feedback">Please select a valid state.</div>
            </div>
        </div>
        <div class="row">
           
           
            <div class="col-md-6">
                <label class="form-label" for="doc_inicial">Iniciar En </label>
                <input class="form-control form-control-sm" id="doc_inicial" name="doc_inicial" value="{{ old('doc_inicial', !empty($documento->doc_inicial) ?  $documento->doc_inicial : '') }}"
                                type="number" required>
                <div class="invalid-feedback">Direccion.</div>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="doc_incremento">Incremento</label>
                <input class="form-control form-control-sm" id="doc_incremento" name="doc_incremento"
                value="{{ old('doc_incremento', !empty($documento->doc_incremento) ?  $documento->doc_incremento : '') }}" type="number" required>
                <div class="invalid-feedback">Direccion.</div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-6">
                <label class="form-label" for="doc_digitos">Numero de Digitos</label>
                <select class="form-control " name="doc_digitos" id="doc_digitos" required>
                    @foreach ($digitos as $key => $digito)
                        <option value="{{ $key }}" @if($key == old('doc_digitos', $documento->doc_digitos)) selected @endif>{{ $digito }}</option>
                    @endforeach
                </select>
            </div>
        </div>
       
