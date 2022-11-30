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
<!-- Container-fluid starts-->
    {{-- @dump($billetePlazo) --}}

    @include('facturas.components.misc.encabezado')
    <div class="col-sm-12">
        @include("facturas.components.table.abono_cliente")
    </div>
    {{-- <div class="col-sm-12">
        @include("facturas.components.table.abono_mayorista")
    </div> --}}
    <div class="row">
        <div class="col-sm-6">
            @include("facturas.components.table.observaciones")
        </div>
        <div class="col-sm-6">
            @include("facturas.components.table.alertas")
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('js/app/movimientoContable.js') }}"></script>
@endsection