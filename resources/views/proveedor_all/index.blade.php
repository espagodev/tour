@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Proveedor</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">App</a></li>
                        <li class="breadcrumb-item">Proveedores</li>
                        <li class="breadcrumb-item active">Listado de Proveedores</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                    <div class="bookmark">
                      <ul>
                        <li><a class="btn-modal" href="#" data-container=".view_register" data-href="{{ route('getNuevoProveedor') }}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></li>
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
                            <table class="table table-xs" id="listado_proveedores">
                                <thead>
                                    <tr>                                        
                                        <th>Logo</th>
                                        <th>Nombre</th>
                                        <th>Categoria</th>
                                        <th>Usuario</th>
                                        <th>Contraseña</th>
                                        <th>Publicar</th>
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
<script src="{{ asset('js/app/proveedor.js') }}"></script>

@endsection