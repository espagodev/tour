@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Billete a Plazos</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">App</li>
                    <li class="breadcrumb-item">Billetes a Plazos</li>
                    <li class="breadcrumb-item active">Expediente Cliente ( {{ $billetePlazo->full_name_agenda }} ) - ({{ $billetePlazo->fac_nota_credito }})
                    </li>
                </ol>
            </div>
           
            <div class="col-sm-6">
                <!-- Bookmark Start-->
               @include('recibo_caja.components.misc.opciones-buttons')
                <!-- Bookmark Ends-->
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
    {{-- @dump($billetePlazo) --}}

    <div class="card">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom01">Nombre</label>
                    <input class="form-control form-control-sm"  type="text"
                        value="{{ !empty($billetePlazo->full_name_agenda) ?  $billetePlazo->full_name_agenda : '' }}" disabled>

                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom01">Atendido Por</label>
                    <input class="form-control form-control-sm"  type="text"
                        value="{{  !empty($billetePlazo->full_name_agente) ?  $billetePlazo->full_name_agente : '' }}" disabled>
                </div>

            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom03">Telefono</label>
                    <input class="form-control form-control-sm"  type="text"
                        value="{{  !empty($billetePlazo->agd_telefono) ?  $billetePlazo->agd_telefono : '' }}" disabled>
                </div>
                <div class="col-md-6">

                    <label class="form-label" for="validationCustomUsername">Mayorista</label>
                    <input class="form-control form-control-sm"  type="text"
                        value="{{  !empty($billetePlazo->may_nombre) ?  $billetePlazo->may_nombre : '' }}" disabled>

                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="validationCustomUsername">Documento</label>
                    <input class="form-control form-control-sm"  type="text"
                        value="{{  !empty($billetePlazo->documento) ?  $billetePlazo->documento : '' }}" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustomUsername">Categoria</label>
                    <input class="form-control form-control-sm"  type="text"
                        value="{{  !empty($billetePlazo->cat_nombre) ?  $billetePlazo->cat_nombre : '' }}" disabled>
                </div>

            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom03">Neto Mayorista</label>
                    <input class="form-control form-control-sm"  type="text"
                        value="{{    !empty($billetePlazo->bilp_precio_proveedor) ?  $billetePlazo->bilp_precio_proveedor : '' }}" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom05">Fecha Ida</label>
                    <input class="form-control form-control-sm"  type="text"
                        value="{{  !empty($billetePlazo->bilp_fecha_viaje) ?  $billetePlazo->bilp_fecha_viaje : '' }}" disabled>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom03">Precio Total</label>
                    <input class="form-control form-control-sm"  type="text"
                        value="{{    !empty($billetePlazo->bilp_precio_total) ?  $billetePlazo->bilp_precio_total : '' }}" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom05">Fecha Regreso</label>
                    <input class="form-control form-control-sm"  type="text"
                        value="{{  !empty($billetePlazo->bilp_fecha_retorno) ?  $billetePlazo->bilp_fecha_retorno : '' }}" disabled>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom05">Localizador</label>
                    <input class="form-control form-control-sm"  type="text"
                        value="{{  !empty($billetePlazo->bilp_localizador) ?  $billetePlazo->bilp_localizador : '' }}" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        @include("billetes_plazo.components.table.abono_cliente")
    </div>
    <div class="col-sm-12">
        @include("billetes_plazo.components.table.abono_mayorista")
    </div>
    <div class="row">
        <div class="col-sm-6">
            @include("billetes_plazo.components.table.observaciones")
        </div>
        <div class="col-sm-6">
            @include("billetes_plazo.components.table.alertas")
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('js/app/movimientoContable.js') }}"></script>
@endsection