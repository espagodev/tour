@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Agentes</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item">Agentes</li>
                        <li class="breadcrumb-item active">Listado de Agentes</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                    <div class="bookmark">
                      <ul>
                        <li><a class="btn-modal" href="#" data-container=".view_register" data-href="{{ route('getNuevoAgente') }}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></li>
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
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover"  id="listado_agentes">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Provincia</th>
                                        <th>Email</th>
                                        <th>Estado</th>
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
    <script src="{{ asset('js/app/agentes.js') }}"></script>
@endsection