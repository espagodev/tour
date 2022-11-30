
        <div class="row g-1 form-group">
            <div class="col-md-6">
                <label class="form-label" >Logo</label> 
                <div class="media align-items-center">
                    <input type="file" onchange="changePreview(this);" class="d-none pro_imagen" name="pro_imagen" id="pro_imagen">
                    <label for="pro_imagen">
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
                @if($proveedor->pro_imagen)
                <a href="{{ asset($proveedor->pro_imagen) }}" target="_blank" class="btn btn-sm btn-info text-white choose-button">Descargar Recibo</a>
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label" for="pro_nombre">Nombre</label>
                <input class="form-control form-control-sm" name="pro_nombre" id="pro_nombre"
                    type="text" value="{{ $proveedor->pro_nombre ?? '' }}" required="">
                <div class="valid-feedback">Looks good!</div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label" for="categoria_id">Categoria</label>
                <select class="form-select form-select-sm " name="categoria_id"
                    id="categoria_id" required="">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $proveedor->categoria_id == $categoria['id'] ? 'selected=""' : '' }}>{{ $categoria->cat_nombre }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Please select a valid state.</div>
            </div>
           
            <div class="col-md-4">
                <label class="form-label" for="pro_link_especial">Link Especial</label>
                <input class="form-control form-control-sm" name="pro_link_especial" id="pro_link_especial" type="text" value="{{ $proveedor->pro_link_especial ?? '' }}"
                    required="">
                <div class="invalid-feedback">Direccion.</div>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="pro_link_normal">Link Normal</label>
                <input class="form-control form-control-sm" name="pro_link_normal" id="pro_link_normal" type="text" value="{{ $proveedor->pro_link_normal ?? '' }}"
                    required="">
                <div class="invalid-feedback">Direccion.</div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-4">
                <label class="form-label" for="pro_usuario">Usuario</label>
                <input class="form-control form-control-sm" name="pro_usuario"
                    id="pro_usuario" type="text" value="{{ $proveedor->pro_usuario ?? '' }}" required="">
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="pro_password">Password</label>
                <input class="form-control form-control-sm" name="pro_password" id="pro_password" type="text" value="{{ $proveedor->pro_password ?? '' }}"
                    required="">
                <div class="invalid-feedback">Direccion.</div>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="pro_identificador">Identificador</label>
                <input class="form-control form-control-sm" name="pro_identificador" id="pro_identificador" type="text" value="{{ $proveedor->pro_identificador ?? '' }}"
                    required="">
                <div class="invalid-feedback">Direccion.</div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-4">
                <label class="form-label" for="pro_url_seg_1">URL Seg 1</label>
                <input class="form-control form-control-sm" name="pro_url_seg_1"
                    id="pro_url_seg_1" type="text" value="{{ $proveedor->pro_url_seg_1 ?? '' }}" required="">
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="pro_url_seg_2">URL Seg 2</label>
                <input class="form-control form-control-sm" name="pro_url_seg_2" id="pro_url_seg_2" type="text" value="{{ $proveedor->pro_url_seg_2 ?? '' }}"
                    required="">
                <div class="invalid-feedback">Direccion.</div>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="pro_url_seg_3">URL Seg 3</label>
                <input class="form-control form-control-sm" name="pro_url_seg_3" id="pro_url_seg_3" type="text" value="{{ $proveedor->pro_url_seg_3 ?? '' }}"
                    required="">
                <div class="invalid-feedback">Direccion.</div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <label class="form-label" for="pro_data_seg_1">Datos Usuario 1</label>
                <input class="form-control form-control-sm" name="pro_data_seg_1" id="pro_data_seg_1" value="{{ $proveedor->pro_data_seg_1 ?? '' }}"
                    type="text" required="">
                <div class="invalid-feedback">Direccion.</div>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="pro_data_seg_2">Datos Usuario 2</label>
                <input class="form-control form-control-sm" name="pro_data_seg_2" id="pro_data_seg_2" value="{{ $proveedor->pro_data_seg_2 ?? '' }}"
                    type="text" required="">
                <div class="invalid-feedback">Direccion.</div>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="pro_data_seg_3">Datos Usuario 3</label>
                <input class="form-control form-control-sm" name="pro_data_seg_3" id="pro_data_seg_3" value="{{ $proveedor->pro_data_seg_3 ?? '' }}"
                    type="text" required="">
                <div class="invalid-feedback">Direccion.</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div>
                  <label class="form-label" for="pro_notas">Nota</label>
                  <textarea class="form-control" id="pro_notas" name="pro_notas" rows="3"></textarea>
                </div>
              </div>
           
        </div>
