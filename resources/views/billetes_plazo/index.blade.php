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
                        <li class="breadcrumb-item active">Listado</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                    <div class="bookmark">
                      <ul>
                        {{-- <li><a  href="{{ route('getNuevoBilletePlazo') }}"   data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></li> --}}
                        <li><a class="btn-modal" href="#" data-container=".view_register_billete_plazos" data-href="{{ route('getNuevoBilletePlazo') }}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></li>

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
              <div class="col-sm-6 col-xl-4 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="dollar-sign"></i></div>
                      <div class="media-body"><span class="m-0">Total pendiente cliente</span>
                        <h4 class="mb-0 counter saldoCliente"></h4><i class="icon-bg" data-feather="dollar-sign"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-4 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-secondary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="dollar-sign"></i></div>
                      <div class="media-body"><span class="m-0">Total pendiente mayorista</span>
                        <h4 class="mb-0 counter saldoProveedor"></h4><i class="icon-bg" data-feather="dollar-sign"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-4 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="dollar-sign"></i></div>
                      <div class="media-body"><span class="m-0">Total Fee</span>
                        <h4 class="mb-0 counter totalFee"></h4><i class="icon-bg" data-feather="dollar-sign"></i>
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
                            <table class="table table-hover table-xs" id="billete_plazos">
                                <thead>
                                    <tr> 
                                      <th>Recibo No</th>                                    
                                        <th>Loc</th>
                                        <th>Nombre</th>
                                        <th>Precio Total</th>
                                        <th>Fecha</th>
                                        {{-- <th>Categoria</th> --}}
                                        <th>Mayorista</th>
                                        <th>Saldo Cliente</th>
                                        <th>Saldo Mayorista</th>
                                        <th>FEE</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
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
<script src="{{ asset('js/app/billete_plazos.js') }}"></script>

@endsection