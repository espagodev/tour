@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Rescibo de Caja</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item">Rescibo de Caja</li>
                        <li class="breadcrumb-item active"> ( {{ $factura->full_name_agenda }} ) - ({{ $factura->fac_recibo }})
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

    <div class="row">
        <div class="col-12 col-md-6 order-2 order-md-1">
            <div class="pdf-iframe">
                <iframe src="{{ route('pdf.recibo_caja', $factura->id) }}" frameborder="0"></iframe> 
            </div>
        </div>
       
    </div>
    @endsection