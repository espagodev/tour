@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Documentos Contables</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item">Documento Contable</li>
                        <li class="breadcrumb-item active">Modificar  {{ $documento->doc_nombre }}
                        </li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                   @include('admin.documentos.components.misc.opciones-buttons')
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        @if ($documento->doc_conteo == '0')
            @include('admin.documentos.components.actions.form_editar_documento')
        @else
            @include('admin.documentos.components.table.table_documentos')
        @endif
       
    </div>
    @endsection