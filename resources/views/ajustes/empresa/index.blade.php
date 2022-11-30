@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Configuración del sistema</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Configuracion </li>
                        <li class="breadcrumb-item active">Ajustes</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                    <div class="bookmark">
                        <ul>
                            {{-- <li><a href="{{ route('getNuevaFactura') }}" title=""><i data-feather="plus-square"></i></a>
                            </li> --}}
                        </ul>
                    </div>
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="row g-3 needs-validation" action="{{ route('empresa.update',$empresa->id) }}" method="post"
                                id="add_sell_form" novalidate="">
                                @csrf {{method_field('PUT')}}

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-8">
                                                <label class="form-label" for="aje_nombre">Nombre Empresa</label>
                                                <input class="form-control form-control-sm" id="aje_nombre" name="aje_nombre"
                                                    value="{{ old('aje_nombre', $empresa->aje_nombre) }}" type="text">

                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="aje_codigo_turismo">Codigo
                                                    Turismo</label>
                                                <input class="form-control form-control-sm" id="aje_codigo_turismo" name="aje_codigo_turismo"
                                                    value="{{ old('aje_codigo_turismo', $empresa->aje_codigo_turismo) }}"
                                                    type="text">

                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label class="form-label" for="aje_direccion">Direccion</label>
                                                <input class="form-control form-control-sm" id="aje_direccion" name="aje_direccion"
                                                    value="{{ old('aje_direccion', $empresa->aje_direccion) }}"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="aje_pais">Pais</label>
                                                <input class="form-control form-control-sm" id="aje_pais" name="aje_pais"
                                                    value="{{ old('aje_pais', $empresa->aje_pais) }}" type="text">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="aje_codigo_postal">Codigo Postal</label>
                                                <input class="form-control form-control-sm" id="aje_codigo_postal" name="aje_codigo_postal"
                                                    value="{{ old('aje_codigo_postal', $empresa->aje_codigo_postal) }}"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="aje_municipio">Ciudad</label>
                                                <input class="form-control form-control-sm" id="aje_municipio" name="aje_municipio"
                                                    value="{{ old('aje_municipio', $empresa->aje_municipio) }}"
                                                    type="text">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="aje_provincia">Estado</label>
                                                <input class="form-control form-control-sm" id="aje_provincia" name="aje_provincia"
                                                    value="{{ old('aje_provincia', $empresa->aje_provincia) }}"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="aje_telefono">Telefono</label>
                                                <input class="form-control form-control-sm" id="aje_telefono" name="aje_telefono"
                                                    value="{{ old('aje_telefono', $empresa->aje_telefono) }}" type="text">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="aje_movil">Movil</label>
                                                <input class="form-control form-control-sm" id="aje_movil" name="aje_movil"
                                                    value="{{ old('aje_movil', $empresa->aje_movil) }}" type="text">
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="aje_web">Pagina Web</label> 
                                                <input class="form-control form-control-sm" id="aje_web" name="aje_web"
                                                    value="{{ old('aje_web', $empresa->aje_web) }}" type="text">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="aje_email">Email Soporte</label>
                                                <input class="form-control form-control-sm" id="aje_email" name="aje_email"
                                                    value="{{ old('aje_email', $empresa->aje_email) }}" type="email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit">Submit form</button>
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection
