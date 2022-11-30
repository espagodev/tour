{{-- <div class="card">
    <div class="card-body"> --}}
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label" for="agd_nombres">Nombre</label>
                <input class="form-control form-control-sm" name="agd_nombres" id="agd_nombres" value="{{ $agenda->agd_nombres ?? '' }}"
                    type="text" value="" required="">
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="agd_apellidos">Apellidos</label>
                <input class="form-control form-control-sm" name="agd_apellidos" id="agd_apellidos" value="{{ $agenda->agd_apellidos ?? '' }}"
                    type="text" value="" required="">
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="carpeta_id">Carpeta</label>
                <select class="form-select form-select-sm" name="carpeta_id" id="carpeta_id" required="">
                    @foreach ($carpetas as $carpeta)
                        <option value="{{ $carpeta->id }}" {{ $agenda->carpeta_id == $carpeta['id'] ? 'selected=""' : '' }}>{{ $carpeta->car_nombre }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Seleccione una Carpeta.</div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label" for="tipo_documento_id">Tipo de Identificacion</label>
                <select class="form-select form-select-sm" name="tipo_documento_id"
                    id="tipo_documento_id">
                    <option selected="" disabled="" value="" required="">Seleccione</option>
                    @foreach ($documentos as $key => $documento)
                        <option value="{{ $key }}" {{ $agenda->tipo_documento_id == $key ? 'selected=""' : '' }}>{{ $documento }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Seleccione un Tipo de Identificacion Valido.</div>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="agd_documento">Identificación</label>
                <input class="form-control form-control-sm" name="agd_documento" value="{{ $agenda->agd_documento ?? '' }}"
                    id="agd_documento" type="text" value="" required="">
                <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="agd_email">Email</label>
                <input class="form-control form-control-sm" name="agd_email" id="agd_email" type="email" value="{{ $agenda->agd_email ?? '' }}"
                    required="">
                <div class="invalid-feedback">Ingrese un Email Valido.</div>
            </div>
        </div>
        <div class="row g-3">

            <div class="col-md-3">
                <label class="form-label" for="agd_telefono">Telefono</label>
                <input class="form-control form-control-sm" name="agd_telefono" id="agd_telefono" value="{{ $agenda->agd_telefono ?? '' }}"
                    type="text" required="">
                <div class="invalid-feedback">Ingrese un Telefono .</div>
            </div>
            <div class="col-md-3">
                <label class="form-label" for="agd_movil">Movil</label>
                <input class="form-control form-control-sm" name="agd_movil" id="agd_movil" value="{{ $agenda->agd_movil ?? '' }}"
                    type="text">
                <div class="invalid-feedback">Direccion.</div>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="agd_direccion">Direccion</label>
                <input class="form-control form-control-sm" name="agd_direccion" id="agd_direccion" value="{{ $agenda->agd_direccion ?? '' }}"
                    type="text" required="">
                <div class="invalid-feedback">Ingrese una Direccion.</div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="agd_codigo_postal">Codigo Postal</label>
                <input class="form-control form-control-sm" name="agd_codigo_postal" value="{{ $agenda->agd_codigo_postal ?? '' }}"
                    id="agd_codigo_postal" type="text" required="">
                <div class="invalid-feedback">Ingrese un Codigo Postal .</div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label" for="pais_id">Pais</label>
                <select class="form-select form-select-sm js-example-basic-single" name="pais_id"
                    id="pais_id" >
                    @foreach ($paises as $pais)
                        <option value="{{ $pais->id }}" {{ $agenda->pais_id == $pais['id'] ? 'selected=""' : '' }}>{{ $pais->pai_nombre }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Please select a valid state.</div>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="provincia_id">Provincia</label>
                <select class="form-select form-select-sm js-example-basic-single" name="provincia_id"
                    id="provincia_id" >
                    @foreach ($provincias as $provincia)
                        <option value="{{ $provincia->id }}" {{ $agenda->provincia_id == $provincia['id'] ? 'selected=""' : '' }}>{{ $provincia->pro_nombre }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Please select a valid state.</div>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="municipio_id">Localidad</label>
                <select class="form-select form-select-sm js-example-basic-single" name="municipio_id"
                    id="municipio_id" >
                    @foreach ($municipios as $municipio)
                        <option value="{{ $municipio->id }}" {{ $agenda->municipio_id == $municipio['id'] ? 'selected=""' : '' }}>{{ $municipio->mun_nombre }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Please select a valid state.</div>
            </div>

        </div>

    {{-- </div>
</div> --}}