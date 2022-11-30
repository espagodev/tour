@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Usuarios</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">App</a></li>
                    <li class="breadcrumb-item">Usuarios</li>
                    <li class="breadcrumb-item active">Listado de Usuarios</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <!-- Bookmark Start-->
                <div class="bookmark">
                  <ul>
                    <li><a class="btn-modal" href="#" data-container=".view_register" data-href="{{ route('getNuevoUsuario') }}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></li>                  </ul>
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
                        <table class="table table-xs" id="listado_usuarios">
                            <thead>
                                <tr>                                        
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Rol</th>                                      
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
<script src="{{ asset('js/app/usuarios.js') }}"></script>
@endsection