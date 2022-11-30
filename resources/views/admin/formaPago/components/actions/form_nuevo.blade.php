

        <div class="row">
            <div class="col-md-12">
                <label class="form-label" for="fop_nombre">Nombre</label>
                <input class="form-control form-control-sm" name="fop_nombre" id="fop_nombre"
                    type="text" value="{{ old('fop_nombre', !empty($formaPago->fop_nombre) ?  $formaPago->fop_nombre : '') }}" required="">
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
      

       
