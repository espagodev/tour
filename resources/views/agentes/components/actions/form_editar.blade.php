

<div class="card">

    <div class="card-body">    
         
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="nombres">Nombre</label>
                    <input class="form-control @error('nombres') is-invalid @enderror"  name="nombres" id="nombres" type="text"  value="{{ $agente->nombres ?? '' }}" required="">
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="apellidos">Apellidos</label>
                    <input class="form-control  @error('apellidos') is-invalid @enderror" name="apellidos" id="apellidos" type="text" value="{{ $agente->apellidos ?? '' }}" required="">
                    <div class="valid-feedback">Looks good!</div>
                </div>              
            </div>
  
            <div class="row g-3">
                <div class="col-md-">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror"  type="email" id="email" name="email" value="{{ $agente->email ?? '' }}" placeholder="" required="">
                    <div class="invalid-feedback">Direccion.</div>
                </div>
  
            </div>
            <div class="row g-3">
              <div class="col-md-6">
                  <label class="form-label" for="password">Contraseña</label>
                  <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password">

              </div>
              <div class="col-md-6">
                  <label class="form-label" for="password-confirm">Repetir Contraseña</label>
                  <input class="form-control" id="password-confirm" type="password" name="password_confirmation">

              </div>              
          </div>
        
    </div>
  </div>
  <div class="card">
  
    <div class="card-body">
  
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label" for="age_razon_social">Empresa</label>
                    <input class="form-control" id="age_razon_social" type="text" name="age_razon_social" value="{{ $agente->age_razon_social ?? '' }}" required="">
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="age_cargo">Cargo</label>
                    <input class="form-control" id="age_cargo" type="text" name="age_cargo" value="{{ $agente->age_cargo ?? '' }}" required="">
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="tipo_documento_id">Tipo Identificación</label>
                    <select class="form-select form-select-sm" name="tipo_documento_id"
                      id="tipo_documento_id">
                      <option selected="" disabled="" value="" required="">Seleccione</option>
                      @foreach ($documentos as $key => $documento)
                          <option value="{{ $key }}" {{ $agente->tipo_documento_id == $key ? 'selected=""' : '' }}>{{ $documento }}</option>
                      @endforeach
                  </select>
                    
                    <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-3">
                  <label class="form-label" for="age_documento">Identificación</label>
                  <input class="form-control" id="age_documento" type="text" name="age_documento" value="{{ $agente->age_documento ?? '' }}" required="">
                  <div class="valid-feedback">Looks good!</div>
              </div>
            </div>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label" for="municipio_id">Ciudad</label>
                    <select class="form-select form-select-sm" name="municipio_id"
                      id="municipio_id">
                      <option selected="" disabled="" value="" required="">Seleccione</option>
                      @foreach ($municipios as $municipio)
                          <option value="{{ $municipio->id }}" {{ $agente->municipio_id == $municipio['id'] ? 'selected=""' : '' }}>{{ $municipio->mun_nombre }}</option>
                      @endforeach
                  </select>
                    <div class="invalid-feedback">Please provide a valid city.</div>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="provincia_id">Provincia</label>
                    <select class="form-select form-select-sm" name="provincia_id"
                    id="provincia_id">
                    <option selected="" disabled="" value="" required="">Seleccione</option>
                    @foreach ($provincias as $provincia)
                          <option value="{{ $provincia->id }}" {{ $agente->provincia_id == $provincia['id'] ? 'selected=""' : '' }}>{{ $provincia->pro_nombre }}</option>
                      @endforeach
                </select>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="age_codigo_postal">Codigo Postal</label>
                    <input class="form-control" id="age_codigo_postal" name="age_codigo_postal" type="text" value="{{ $agente->age_codigo_postal ?? '' }}" placeholder="" required="">
                    <div class="invalid-feedback">Please provide a valid zip.</div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label" for="age_direccion">Direccion</label>
                    <input class="form-control" id="age_direccion" type="text" name="age_direccion" value="{{ $agente->age_direccion ?? '' }}" placeholder="" required="">
                    <div class="invalid-feedback">Direccion.</div>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="age_telefono">Teléfono</label>
                    <input class="form-control" id="age_telefono" type="text" name="age_telefono" value="{{ $agente->age_telefono ?? '' }}" placeholder="" required="">
                    <div class="invalid-feedback">Please provide a valid zip.</div>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="age_movil">Teléfono Móvil</label>
                    <input class="form-control" id="age_movil" type="text" name="age_movil" value="{{ $agente->age_movil ?? '' }}" placeholder="" required="">
                    <div class="invalid-feedback">Please provide a valid zip.</div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="form-check">
                        <div class="checkbox p-0">
                            <input class="form-check-input" id="age_whatsapp" name="age_whatsapp" type="checkbox" value="1" @if($agente->age_whatsapp) checked @endif>
                            <label class="form-check-label" for="age_whatsapp">¿Usas Whatsapp?</label>
                        </div>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                    </div>
                </div>
            </div>
            <div class="row g-3">
              <div class="col-md-6">
                  <label class="form-label" for="age_cuentabancaria">Cuenta Bancaria (Comisiones):</label>
                  <input class="form-control" id="age_cuentabancaria" type="text" name="age_cuentabancaria" value="{{ $agente->age_cuentabancaria ?? '' }}" placeholder="ES">
                  <div class="invalid-feedback">Direccion.</div>
              </div>
              <div class="col-md-6 g-3 form-group">
                <label class="form-label">Firma Digital</label>
                <div class="media align-items-center">
                    <input type="file" onchange="changePreview(this);" class="d-none age_firma_digital"
                        name="age_firma_digital" id="age_firma_digital">
                    <label for="age_firma_digital">
                        <div class="media align-items-center">
                            <div class="mr-3">
                                <div class="avatar avatar-xl">
                                    <img id="file-prev" src="{{  !empty($agente->age_firma_digital) ?  asset($agente->age_firma_digital) : 'assets/images/account-add-photo.svg' }}"
                                        class="avatar-img rounded">
                                </div>
                            </div>
                            <div class="media-body">
                                <a class="btn btn-sm btn-light choose-button">Seleccione un Archivo</a>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
          </div>
       
    </div>
  </div>
      

       
