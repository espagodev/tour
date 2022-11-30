

        <div class="row">
            <div class="col-md-6">
                <label class="form-label" for="imp_nombre">Nombre</label>
                <input class="form-control form-control-sm" name="imp_nombre" id="imp_nombre"
                    type="text" value="{{ old('imp_nombre', !empty($impuesto->imp_nombre) ?  $impuesto->imp_nombre : '') }}" required="">
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="imp_valor">Valor</label>
                <input class="form-control form-control-sm" id="imp_valor"
                                name="imp_valor" value="{{ old('imp_valor', !empty($impuesto->imp_valor) ?  $impuesto->imp_valor : '') }}" type="text" required>

                <div class="invalid-feedback">Please select a valid state.</div>
            </div>
        </div>
      

       
