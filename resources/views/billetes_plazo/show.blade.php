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
                        <li class="breadcrumb-item active">( {{ $billetePlazo->full_name_agenda }} ) - ({{ $billetePlazo->fac_nota_credito }})
                        </li>
                    </ol>
                </div>
            
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                @include('billetes_plazo.components.misc.opciones-buttons')
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('css/expediente.css') }}">
    <div class="box_1024px_1 wrapper">
        @include('billetes_plazo.components.misc.encabezado')
        
        <div class="card">
            <div class="card-header pb-0">
                <h6 class="m-b-0">Pago Clientes</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table  table-bordered table-sm" id="pago_clientes">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Monto</th>
                                    <th>Fecha</th>
                                    <th>Descripcion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abonoClientes as $abonoCliente)
                                    <tr>
                                        <td>{{ $abonoCliente->moc_numero }}</td>
                                        <td>@format_currency( $abonoCliente->moc_monto )</td>
                                        <td>{{ $abonoCliente->moc_fecha }}</td>
                                        <td>{{ $abonoCliente->moc_descripcion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header pb-0">
                <h6 class="m-b-0">Pago a Mayorista</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table  table-bordered table-sm" id="pago_mayorista">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Monto</th>
                                    <th>Fecha</th>
                                    <th>Descripcion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abonoMayoristas as $abonoMayorista)
                                    <tr>
                                        <td>{{ $abonoMayorista->moc_numero }}</td>
                                        <td>@format_currency( $abonoMayorista->moc_monto )</td>
                                        <td>{{ $abonoMayorista->moc_fecha }}</td>
                                        <td>{{ $abonoMayorista->moc_descripcion }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h6 class="m-b-0">Observaciones</h6>
                    </div>
                    <div class="card-body">
                        <table class="table  table-bordered table-sm" id="observaciones">
                            <thead>
                                <tr>
                                    <th>Observaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($observaciones as $observacion)
                                    <tr>
                                        <td>{{ $observacion->moo_descripcion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h6 class="m-b-0">Alertas</h6>
                    </div>
                    <div class="card-body">
                        <table class="table  table-bordered table-sm" id="alertas">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Descripcion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alertas as $alerta)
                                    <tr>
                                        <td>{{ $alerta->moa_fecha }}</td>
                                        <td>{{ $alerta->moa_descripcion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection