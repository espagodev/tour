@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Divisa</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Divisa</li>
                    <li class="breadcrumb-item active">Listado de Divisas</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <!-- Bookmark Start-->
                <div class="bookmark">
                  <ul>
                    <li><a  href="{{ route('getNuevaFactura') }}"   title="" ><i data-feather="plus-square"></i></a></li>
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
                    <div class="table-responsive">
                        <table class="table table-hover" id="listado_carpetas">
                            <thead>
                                <tr>                                        
                                    <th>Pais</th>
                                    <th>Divisa</th>
                                    <th>Codigo</th>
                                    <th>Simbolo</th>
                                    <th>Separador Miles</th>
                                    <th>Separado Decimal</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{-- <script src="{{ asset('js/app/factura.js') }}"></script> --}}
@endsection