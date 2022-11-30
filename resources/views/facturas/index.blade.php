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
                      <li class="breadcrumb-item active">Listado de Facturas</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                    <div class="bookmark">
                      <ul>
                        <li><a class="btn-modal" href="#" data-container=".view_register_factura" data-href="{{ route('nuevaFactura') }}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></li>

                      </ul>
                    </div>
                    <!-- Bookmark Ends-->
                  </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->

    <div class="container-fluid">
        <div class="row">   
             
              <div class="col-sm-12 col-lg-12 o-hidden border-0">
                <div class="default-according style-1 " id="accordionoc">
                  <div class="card">
                    <div class="card-header bg-primary">
                      <h5 class="mb-0">
                        <button class="btn btn-link text-white" data-bs-toggle="collapse" data-bs-target="#collapseicon" aria-expanded="false" aria-controls="collapse11"><i class="fa fa-filter"></i> Filtro</button>
                      </h5>
                    </div>
                    <div class="collapse" id="collapseicon" aria-labelledby="collapseicon" data-bs-parent="#accordionoc">
                      <div class="card-body">
                        <div>
                            @include('billetes_plazo.components.partials.filtro')
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            
              <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-xs" id="listado_facturas">
                                <thead>
                                    <tr>
                                        <th>Factura Nº</th>
                                        <th>Mayorista</th>
                                        <th>Cliente</th>
                                        <th>Telefono</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                        <th>Pagado En</th>
                                        {{-- <th>Atendido Por</th> --}}
                                        <th>Total</th>
                                        <th>Pagado</th>
                                        <th>Pendiente</th>
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
    <!-- Container-fluid Ends-->

@endsection

@section('scripts')
<script src="{{ asset('js/app/factura.js') }}"></script>

@endsection