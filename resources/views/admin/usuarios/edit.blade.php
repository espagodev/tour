@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Usuarios</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">App</a></li>
                    <li class="breadcrumb-item">Usuarios</li>
                    <li class="breadcrumb-item active">Modificar Usuario</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <!-- Bookmark Start-->
                @include('admin.usuarios.components.misc.opciones-buttons')
                <!-- Bookmark Ends-->
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                    class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 needs-validation" action="{{ route('updateUsuario',$usuario->id) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf {{ method_field('PUT') }}

                            <div class="row mb-2">
                                <div class="profile-title">
                                    <div class="media align-items-center">
                                        <div class="form-group">
                                            <input id="logo" name="logo" class="d-none logo" type="file"
                                                onchange="changePreview(this);">
                                            <label for="logo">
                                                <div class="media align-items-center">
                                                    <div class="mr-3">
                                                        <div class="avatar avatar-xl">
                                                            <img id="file-prev"
                                                                src="{{  !empty($usuario->logo) ?  asset($usuario->logo) : 'assets/images/account-add-photo.svg' }}"
                                                                class="avatar-img rounded">
                                                        </div>
                                                    </div>

                                                </div>
                                            </label>
                                        </div>
                                        <div class="media-body">
                                            <h3 class="mb-1 f-20 txt-primary">{{ $usuario->nombres ?? '' }}</h3>
                                            <p class="f-12">{{ $agente->age_cargo ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Nombre</label>
                                <input class="form-control" id="nombres" name="nombres" value="{{ old('nombres', $usuario->nombres ?? '') }}">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Apellidos</label>
                                <input class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos', $usuario->apellidos ?? '') }}">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Email</label>
                                <input class="form-control" id="email" name="email" value="{{ old('email', $usuario->email ?? '') }}" disable>
                            </div>

                            <div class="form-footer">
                                <button class="btn btn-primary btn-block">Modificar Usuario</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           
                <div class="col-xl-8">
                    <div class="card">
                    <form action="{{ route('updateAgente', $agente->id) }}" method="post" enctype="multipart/form-data">
                        @csrf {{ method_field('PUT') }}
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Modificar Datos Para Agente</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#"
                                    data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="age_razon_social">Empresa</label>
                                    <input class="form-control" id="age_razon_social" type="text" name="age_razon_social"
                                        value="{{ old('age_razon_social', $agente->age_razon_social ?? '' ) }}" required="">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="age_cargo">Cargo</label>
                                    <input class="form-control" id="age_cargo" type="text" name="age_cargo"
                                        value="{{ old('age_cargo', $agente->age_cargo ?? '' ) }}" required="">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label" for="tipo_documento_id">Tipo Identificación</label>
                                    <select class="form-select form-select-sm" name="tipo_documento_id"
                                        id="tipo_documento_id">
                                        <option selected="" disabled="" value="" required="">Seleccione</option>
                                        @foreach ($documentos as $key => $documento)
                                        <option value="{{ $key }}" {{ $agente->tipo_documento_id == $key ? 'selected=""' :
                                            '' }}>{{ $documento }}</option>
                                        @endforeach
                                    </select>

                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="age_documento">Identificación</label>
                                    <input class="form-control" id="age_documento" type="text" name="age_documento"
                                        value="{{ old('age_documento', $agente->age_documento ?? 0) }}" required="">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label" for="municipio_id">Ciudad</label>
                                    <select class="form-select form-select-sm" name="municipio_id" id="municipio_id">
                                        <option selected="" disabled="" value="" required="">Seleccione</option>
                                        @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio->id }}" {{ $agente->municipio_id == $municipio['id'] ?
                                            'selected=""' : '' }}>{{ $municipio->mun_nombre }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please provide a valid city.</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="provincia_id">Provincia</label>
                                    <select class="form-select form-select-sm" name="provincia_id" id="provincia_id">
                                        <option selected="" disabled="" value="" required="">Seleccione</option>
                                        @foreach ($provincias as $provincia)
                                        <option value="{{ $provincia->id }}" {{ $agente->provincia_id == $provincia['id'] ?
                                            'selected=""' : '' }}>{{ $provincia->pro_nombre }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a valid state.</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="age_codigo_postal">Codigo Postal</label>
                                    <input class="form-control" id="age_codigo_postal" name="age_codigo_postal" type="text"
                                        value="{{ old('age_codigo_postal', $agente->age_codigo_postal ?? '' ) }}"
                                        placeholder="" required="">
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="age_direccion">Direccion</label>
                                    <input class="form-control" id="age_direccion" type="text" name="age_direccion"
                                        value="{{ old('age_direccion', $agente->age_direccion ?? '' ) }}" placeholder=""
                                        required="">
                                    <div class="invalid-feedback">Direccion.</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="age_telefono">Teléfono</label>
                                    <input class="form-control" id="age_telefono" type="text" name="age_telefono"
                                        value="{{ old('age_telefono', $agente->age_telefono ?? '' ) }}" placeholder=""
                                        required="">
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="age_movil">Teléfono Móvil</label>
                                    <input class="form-control" id="age_movil" type="text" name="age_movil"
                                        value="{{ old('age_movil', $agente->age_movil ?? '') }}" placeholder="" required="">
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-check">
                                        <div class="checkbox p-0">
                                            <input class="form-check-input" id="age_whatsapp" name="age_whatsapp"
                                                type="checkbox" value="1" @if($agente->age_whatsapp) checked @endif>
                                            <label class="form-check-label" for="age_whatsapp">¿Usas Whatsapp?</label>
                                        </div>
                                        <div class="invalid-feedback">You must agree before submitting.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="age_cuentabancaria">Cuenta Bancaria (Comisiones):</label>
                                    <input class="form-control" id="age_cuentabancaria" type="text"
                                        name="age_cuentabancaria"
                                        value="{{ old('age_cuentabancaria', $agente->age_cuentabancaria ?? '' ) }}"
                                        placeholder="ES">
                                    <div class="invalid-feedback">Cuenta Bancaria.</div>
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
                                                        <img id="file-prev"
                                                            src="{{  !empty($agente->age_firma_digital) ?  asset($agente->age_firma_digital) : 'assets/images/account-add-photo.svg' }}""
                                                    class=" avatar-img rounded">
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
                        <div class="card-footer text-end">
                            <input type="hidden" name="usuario" value="1">
                            <button class="btn btn-primary" type="submit">Modificar Agente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection