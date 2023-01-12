@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Facturas</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item">Facturas</li>
                        <li class="breadcrumb-item active"> ( {{ $factura->full_name_agenda }} ) - ({{ $factura->fac_numero }})
                        </li>
                    </ol>
                </div>            
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                @include('facturas.components.misc.opciones-buttons')
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('css/expediente.css') }}">
    <div class="box_1024px_1 wrapper">
        @include('facturas.components.misc.encabezado')

       @include('facturas.components.misc.pasajeros')

        @include('facturas.components.misc.conceptos')
        
        @include('facturas.components.misc.pagos')
    </div>
    @endsection