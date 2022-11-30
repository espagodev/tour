@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Recibo deCaja</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item">Rescibo de Caja</li>
                        <li class="breadcrumb-item active">Expediente ( {{ $factura->full_name_agenda }} ) -
                            {{ $factura->fac_recibo }}
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

    <link rel="stylesheet" href="{{ asset('css/expediente.css') }}">
    <div class="box_1024px_1 wrapper">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Nombre: </label>
                        {{ !empty($factura->full_name_agenda) ? $factura->full_name_agenda : '' }}


                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Atendido Por: </label>
                        {{ !empty($factura->full_name_agente) ? $factura->full_name_agente : '' }}
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Telefono:</label>
                        {{ !empty($factura->agd_telefono) ? $factura->agd_telefono : '' }}
                    </div>
                    <div class="col-md-6">

                        <label class="form-label" for="validationCustomUsername">Mayorista:</label>
                        {{ !empty($factura->may_nombre) ? $factura->may_nombre : '' }}

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label" for="validationCustomUsername">Documento:</label>
                        {{ !empty($factura->documento) ? $factura->documento : '' }}
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="validationCustomUsername">Categoria:</label>
                        {{ !empty($factura->cat_nombre) ? $factura->cat_nombre : '' }}
                    </div>

                </div>



            </div>
        </div>

        <div class="card"> 
            <div class="card-header pb-0">
                <h6 class="m-b-0">Pasajeros</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table  table-bordered table-xs">
                            <thead>
                                <tr>
                                    <th class="w-30">Localizador</th>
                                    <th class="w-30">Pasajero</th>
                                    <th class="w-20">Fecha Ida</th>
                                    <th class="w-20">Fecha Regreso</th>
                                    <th class="w-20">SubCategoria</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count(json_decode($factura->pasajeros)) > 0)
                                    @foreach (json_decode($factura->pasajeros) as $pasajero)
                                        <tr>
                                            <td>{{ $pasajero->pas_localizador }}</td>
                                            <td>{{ $pasajero->agenda_id }}</td>
                                            <td>{{ $pasajero->pas_fecha_salidad }}</td>
                                            <td>{{ $pasajero->pas_fecha_regreso }}</td>
                                            <td>{{ $pasajero->sub_categoria_id_pas }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header pb-0">
                <h6 class="m-b-0">Conceptos</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table  table-bordered table-xs">
                            <thead>
                                <tr>
                                    <th class="w-10">Cant</th>
                                    <th class="w-30">SubCategoria</th>
                                    <th class="w-30">Descripcion</th>
                                    <th class="w-20">Valor</th>
                                    <th class="w-20">IVA</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count(json_decode($factura->conceptos)) > 0)
                                    @foreach (json_decode($factura->conceptos) as $concepto)
                                        <tr>
                                            <td>{{ $concepto->con_cantidad }}</td>
                                            <td>{{ $concepto->sub_categoria_id_con }}</td>
                                            <td>{{ $concepto->con_descripcion }}</td>
                                            <td>{{ $concepto->con_monto }}</td>
                                            <td>{{ $concepto->impuesto_id }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <h6 class="m-b-0">Pago Clientes</h6>
                    </div>
                    <div class="card-body">
                      
                           
                                <table class="table  table-bordered table-xs" id="pago_clientes">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha</th>
                                            <th>Monto</th>

                                            <th>Descripcion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($abonoClientes as $abonoCliente)
                                            <tr>
                                                <td>{{ $abonoCliente->moc_numero }}</td>
                                                <td>{{ $abonoCliente->moc_fecha }}</td>
                                                <td>@format_currency( $abonoCliente->moc_monto )</td>

                                                <td>{{ $abonoCliente->moc_descripcion }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">                   
                    <div class="card-body">

                        <table class="table  table-bordered table-xs">

                            <tr>
                                <th>Total</th>
                                <th>@format_currency( $factura->fac_total)</th>                               
                            </tr>
                            <tr>
                                <th>Impuesto</th>
                                <th></th>                               
                            </tr>
                            <tr>
                                <th>Descuento</th>
                                <th></th>                               
                            </tr>
                            <tr>
                                <th>Total a Pagar</th>
                                <th>@format_currency( $factura->fac_total)</th>                               
                            </tr>
                            <tr>
                                <th>Total a Pagado</th>
                                <th>@format_currency( $factura->fac_total_pagado)</th>                               
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
