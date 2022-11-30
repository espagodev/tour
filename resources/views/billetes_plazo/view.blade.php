@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Billete a Plazos</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item">Billete a Plazos</li>
                        <li class="breadcrumb-item active"> ( {{ $billetePlazo->full_name_agenda }} ) - ({{ $billetePlazo->fac_nota_credito }})
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

    <div class="row">
        <div class="col-12 col-md-6 order-2 order-md-1">
            <div class="pdf-iframe">
                <iframe src="{{ route('pdf.billete_plazos', $billetePlazo->id) }}" frameborder="0"></iframe> 
            </div>
        </div>
       
    </div>
    @endsection