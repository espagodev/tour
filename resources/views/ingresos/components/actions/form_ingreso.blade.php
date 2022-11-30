
<div class="row g-1 form-group">
    <label class="form-label" >Recibo</label>
    <div class="media align-items-center">
        <input type="file" onchange="changePreview(this);" class="d-none moc_imagen" name="moc_imagen" id="moc_imagen">
        <label for="moc_imagen">
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
    @if($ingreso->moc_imagen)
    <a href="{{ asset($ingreso->moc_imagen) }}" target="_blank" class="btn btn-sm btn-info text-white choose-button">Descargar Recibo</a>
@endif

    </div>

<div class="row g-1">
    <div class="col-md-6">
        <label class="form-label" for="moc_monto" >Monto en Efectivo</label>
        <div class="input-group"><span class="input-group-text"><i class="fa fa-euro"></i></span>
            <input class="form-control" type="number" name="moc_monto" id="moc_monto" value="{{ $ingreso->moc_monto ?? 0 }}"  placeholder="">
          </div>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="moc_fecha">Fecha</label>
        
            <input class="form-control form-control-sm  datepicker-here" name="moc_fecha"
                id="moc_fecha" data-language="es" data-date-format="dd/mm/yyyy" type="text" value="{{ $ingreso->moc_fecha ?? now() }}"  required="">
            <div class="valid-feedback">Looks good!</div>
        
    </div>
   
</div>
<div class="row g-1">
    <div class="col-md-6">
        <label class="form-label" for="forma_pago_id">Pagado en</label>
        <select class="form-select form-select-sm" name="forma_pago_id" id="forma_pago_id" required="">
            <option selected="" disabled="" value="">Seleccionar</option>
            @foreach ($opcionesPagos as $opcionPago)
                <option value="{{ $opcionPago->id }}" {{ $ingreso->forma_pago_id == $opcionPago['id'] ? 'selected=""' : '' }}>{{ $opcionPago->fop_nombre }}
                </option>
            @endforeach
        </select>
        <div class="invalid-feedback">Please select a valid state.</div>
    </div>
    <div class="col-md-6" id="monto_efectivo" style="display: none;">
        <label class="form-label" for="validationCustom01" >Monto en Efectivo</label>
        <div class="input-group"><span class="input-group-text"><i class="fa fa-euro"></i></span>
            <input class="form-control" type="number" name="mov_monto" id="mov_monto"  placeholder="">
          </div>
    </div>
  
</div>
<div class="row g-1">
    
    <div class="col-md-6">
        <label class="form-label" for="categoria_id">Categoria</label>
        <select class="form-select form-select-sm" name="categoria_id" id="categoria_id"
            required="">
            <option selected="" disabled="" value="">Seleccionar</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $ingreso->categoria_id == $categoria['id'] ? 'selected=""' : '' }}>{{ $categoria->cat_nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="sub_categoria_id">Sub Categoria</label>
       <select class="form-select form-select-sm" name="sub_categoria_id" id="sub_categoria_id">
                <option value="">Seleccione una Subcategoria</option>
                {{-- @foreach($mayoristas as  $mayorista)
                        <option value="{{ $mayorista->id }}" {{ $ingreso->sub_categoria_id == $mayorista['id'] ? 'selected=""' : '' }} >{{ $mayorista->may_nombre}}</option>
                    @endforeach --}}
            </select>
    </div>
</div>
<div class="row g-2">    
    <div class="col-md-12">
        <textarea class="form-control" name="moc_descripcion" id="moc_descripcion" placeholder="Descripcion" >{{ $ingreso->moc_descripcion }}</textarea>
    </div>   
</div>

