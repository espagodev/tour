@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Contabilidad Interna</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">App</a></li>
                        <li class="breadcrumb-item active">Contablidad</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                    <div class="bookmark">
                      <ul>
                        {{-- <li><a class="btn-modal" href="#" data-container=".view_register" data-href="{{ route('getNuevoMovimiento') }}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></li> --}}
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
            <div class="col-sm-6 col-xl-6 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="dollar-sign"></i></div>
                      <div class="media-body"><span class="m-0">Balance Inicial</span>
                        <h4 class="mb-0 counter totalCliente"></h4><i class="icon-bg" data-feather="dollar-sign"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-6 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-secondary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="dollar-sign"></i></div>
                      <div class="media-body"><span class="m-0">Balance Final</span>
                        <h4 class="mb-0 counter totalMayorista"></h4><i class="icon-bg" data-feather="dollar-sign"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
             
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
                            @include('contabilidad.partials.filtro')
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
                            <table class="table table-xs" id="contabilidad">
                                <thead>
                                    <tr>
                                      <th>Movimiento</th>
                                      <th>Fecha</th>
                                      <th>Factura</th>
                                      <th>Monto</th>
                                      <th>Categoria</th>
                                      <th>SubCategoria</th>   
                                      <th>Forma de Pago</th>
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
<script src="{{ asset('js/app/contabilidad.js') }}"></script>
@endsection