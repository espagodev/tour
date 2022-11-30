@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Billetes a Plazos</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">App</li>
                    <li class="breadcrumb-item">Billetes a Plazos</li>
                    <li class="breadcrumb-item">Nota Credito</li>
                    <li class="breadcrumb-item active">{{ $factura->fac_recibo }}</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <!-- Bookmark Start-->
                <div class="bookmark">
                  <ul>
                    <li><a  href=""   data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></li>
                    <li><a  href=""   data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></li>
                    <li><a  href=""   data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></li>
                    <li><a  href=""   data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></li>

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
            <div class="card">
                <div class="card-body">

                <link rel="stylesheet" href="{{ asset('css/factura.css') }}">
                <div class="wrapper">

                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 30%;">
                                {{-- <img
                                src="" alt="Logo"
                                width="250" /> --}}
                            </td>

                            <td style="vertical-align: top; text-align: center;">
                                <h1>Recibo de Caja</h1> {{ $empresa->aje_nombre }}<br />
                                Telefono: {{ $empresa->aje_telefono }} - Móvil: {{ $empresa->aje_movil }}
                                <br /> {{ $empresa->aje_direccion }} {{ $empresa->aje_provincia }}
                                <br /> {{ $empresa->aje_web }}<br />
                                <h2>Código de Turismo {{ $empresa->aje_codigo_turismo }}</h2>
                            </td>

                            <td style="width: 30%; vertical-align: top;">
                                <table style="width: 100%;">
                                    <tr>
                                        <td>Recibo Nº</td>
                                        <td>{{ $factura->fac_recibo }}</td>
                                    </tr>
                                    <tr>
                                        <td>Fecha:</td>
                                        <td>{{  !empty(@format_date($factura->created_at)) ?  @format_date($factura->created_at) : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Atendido Por:</td>
                                        <td> {{  !empty($factura->full_name_agente) ?  $factura->full_name_agente : '' }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <br />
                    <table
                        style="width: 100%; background: #FFE2E2; border-radius: 6px; border: 1px dashed rgb(100, 100, 100);">
                        <tr>
                            <td style="width: 50%; vertical-align: top;">
                                <table>
                                    <tr>
                                        <td><b>Nombre:</b></td>
                                        <td>{{ !empty($factura->full_name_agenda) ? $factura->full_name_agenda : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Documento: </b></td>
                                        <td>{{ !empty($factura->documento) ?  $factura->documento : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Dirección:</b></td>
                                        <td>{{ !empty($factura->agd_direccion) ? $factura->agd_direccion : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Teléfono:</b></td>
                                        <td>{{ !empty($factura->agd_telefono) ? $factura->agd_telefono : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Email:</b></td>
                                        <td>{{ !empty($factura->agd_email) ? $factura->agd_email : '' }}</td>
                                    </tr>
                                </table>
                            </td>

                            <td style="vertical-align: top;">
                                
                            </td>
                        </tr>
                    </table>
                    <br />
                    <div id="observaciones" class="datagrid"
                        style="width: 100%; border: 1px dashed #7db9e8; padding: 0px;">

                        <table>
                            <thead>
                                <tr>
                                    <th style="width: 10%;">No.</th>
                                    <th style="width: 10%;">Fecha.</th>
                                    <th>Descripción</th>
                                    <th style="width: 13%;">Forma de Pago</th>
                                    <th style="width: 13%;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abonoClientes as $abonoCliente)
                                <tr>
                                    <td>{{ $abonoCliente->moc_numero }}</td>
                                    <td>{{ $abonoCliente->moc_fecha }}</td>
                                    <td>{{ $abonoCliente->moc_descripcion }}</td>
                                    <td></td>
                                    <td>@format_currency( $abonoCliente->moc_monto )</td>
                                   
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br />

                    <table style="width: 100%; background: #FFE8C9; text-align: center;">
                        <tr>
                            <td style="width: 10%; font-size: 13px;">Pagado.: </td>
                            <td style="width: 25%; font-size: 13px;">{{  !empty($factura->fac_total_pagado) ?  $factura->fac_total_pagado : ''  }}</td> 
                            <td style="width: 10%; font-size: 13px;">Saldo: </td>
                            <td style="width: 25%; font-size: 13px; ">{{  !empty($factura->fac_total_pendiente) ?  $factura->fac_total_pendiente : ''  }} </td>
                            <td style="width: 10%; font-size: 13px;">Total: </td>
                            <td style="width: 25%; font-size: 13px; ">{{  !empty($factura->fac_total) ?  $factura->fac_total : ''  }} </td>
                        </tr>
                    </table>
                    <br />

                    <div
                        style="width: 100%; background: white; padding: 2px; font-size: 10px; color: rgb(50, 50, 50);">
                        El aquí firmante declara, bajo su responsabilidad que los datos
                        consignados constituyen declaración a efectos de lo previsto en el
                        Ministerio de Turismo sobre viajes nacionales, internacionales y
                        europeos, quedando advertido que la falta de veracidad en los mismos
                        puede ser constitutiva de infracción.</div>
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 35%;">
                                <div style="width: 100%; height: 70px;">Firma Cliente:</div>
                            </td>
                            <td></td>
                            <td style="width: 35%;">
                                <div style="width: 100%; height: 70px;">Firma/Sello Empresa</div>
                            </td>
                        </tr>
                    </table>

                </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection