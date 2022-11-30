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
<!-- Container-fluid starts-->
    {{-- @dump($billetePlazo) --}}
    @include('billetes_plazo.components.misc.encabezado')


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