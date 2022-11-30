
        <div class="row g-1 form-group">
            <div class="col-md-6">
                <label class="form-label" >Logo</label>
                <div class="media align-items-center">
                    <input type="file" onchange="changePreview(this);" class="d-none ser_imagen" name="ser_imagen" id="ser_imagen">
                    <label for="ser_imagen">
                        <div class="media align-items-center">
                            <div class="mr-3">
                                <div class="avatar avatar-xl">
                                    <img id="file-prev" src="{{ ('assets/images/account-add-photo.svg') }}" class="avatar-img rounded">
                                </div>
                            </div>
                            <div class="media-body">
                                <a class="btn btn-sm btn-light choose-button">Seleccione un Archivo</a>
                            </div>
                        </div>
                    </label><br>
                   
                </div>
                @if($servicio->ser_imagen)
                <a href="{{ asset($servicio->ser_imagen) }}" target="_blank" class="btn btn-sm btn-info text-white choose-button">Descargar Recibo</a>
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label" for="ser_nombre">Nombre</label>
                <input class="form-control form-control-sm" name="ser_nombre" id="ser_nombre"
                    type="text" value="{{ $servicio->ser_nombre ?? '' }}" required="">
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="categoria_id">Categoria</label>
                <select class="form-select form-select-sm " name="categoria_id"
                    id="categoria_id" required="">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $servicio->categoria_id == $categoria['id'] ? 'selected=""' : '' }}>{{ $categoria->cat_nombre }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Please select a valid state.</div>
            </div>
        </div>
        <div class="row">
           
           
            <div class="col-md-6">
                <label class="form-label" for="ser_link_especial">Link Especial</label>
                <input class="form-control form-control-sm" name="ser_link_especial" id="ser_link_especial" type="text" value="{{ $servicio->ser_link_especial ?? '' }}"
                    required="">
                <div class="invalid-feedback">Direccion.</div>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="ser_link_normal">Link Normal</label>
                <input class="form-control form-control-sm" name="ser_link_normal" id="ser_link_normal" type="text" value="{{ $servicio->ser_link_normal ?? '' }}"
                    required="">
                <div class="invalid-feedback">Direccion.</div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-6">
                <label class="form-label" for="ser_usuario">Usuario</label>
                <input class="form-control form-control-sm" name="ser_usuario"
                    id="ser_usuario" type="text" value="{{ $servicio->ser_usuario ?? '' }}" required="">
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="ser_password">Password</label>
                <input class="form-control form-control-sm" name="ser_password" id="ser_password" type="text" value="{{ $servicio->ser_password ?? '' }}"
                    required="">
                <div class="invalid-feedback">Direccion.</div>
            </div>
           
        </div>
        <div class="row">
            <div class="col">
                <div>
                  <label class="form-label" for="ser_notas">Nota</label>
                  <textarea class="form-control" id="ser_notas" name="ser_notas" rows="3"></textarea>
                </div>
              </div>
           
        </div>
