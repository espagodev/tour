@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Itinerarios</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">App</a></li>
                        <li class="breadcrumb-item">Itinerarios</li>
                        <li class="breadcrumb-item active">Listado de Itinerarios</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                    <div class="bookmark">
                      <ul>
                        <li><a class="btn-modal" href="#" data-container=".view_register" data-href="{{ route('getNuevoItinerario') }}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></li>
                      </ul>
                    </div>
                    <!-- Bookmark Ends-->
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
                        @include('itinerarios.components.partials.filtro')
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm" id="listado_itinerarios">
                                <thead>
                                    <tr>                                        
                                        <th>Loc</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Carpeta</th>
                                        <th>Sub Categoria</th>
                                        <th>Fecha Ida</th>
                                        <th>Fecha Regreso</th>
                                        <th>Factura</th>
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
<script src="{{ asset('js/app/itinerarios.js') }}"></script>

@endsection