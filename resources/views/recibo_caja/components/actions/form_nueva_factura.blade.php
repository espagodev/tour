<div class="row g-3">
    <div class="col-md-12">
        <label class="form-label" for="agd_nombres">Nombre</label>
        <select class="form-select form-select-sm" name="agenda_id" id="agenda_id"></select> 
    </div>
    
   
</div>
<div class="row g-3">
    <div class="col-md-4">
        <label class="form-label" for="fac_fecha">Fecha</label>
        <input class="form-control form-control-sm  fecha" name="fac_fecha"
            id="fac_fecha" data-language="es" data-date-format="dd/mm/yyyy" type="text"  required="">
        <div class="valid-feedback">Looks good!</div>
    </div>
    <div class="col-md-4">
        <label class="form-label" for="categoria_id">Categoria</label>
        <select class="form-select form-select-sm" name="categoria_id" id="categoria_id"
            required="">
            <option selected="" disabled="" value="">Seleccionar</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->cat_nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label" for="mayorista_id">Mayorista</label>
       <select class="form-select form-select-sm" name="mayorista_id" id="mayorista_id">
                <option value="">Seleccione</option>
                @foreach($mayoristas as  $mayorista)
                        <option value="{{ $mayorista->id }}"  >{{ $mayorista->may_nombre}}</option>
                    @endforeach
            </select>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <label class="form-label" for="fac_fecha_vencimiento">Fecha Vencimiento</label>
        <input class="form-control form-control-sm  fecha" name="fac_fecha_vencimiento"
            id="fac_fecha_vencimiento" data-language="es" data-date-format="dd/mm/yyyy" type="text"  required="">
        <div class="valid-feedback">Looks good!</div>
    </div>
    <div class="col-md-4">
       
    </div>
    <div class="col-md-4">
       
    </div>
</div>
