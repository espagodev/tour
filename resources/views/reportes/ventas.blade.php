@extends('layouts.app')

@section('content') 
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Reportes</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">App</li>
                    <li class="breadcrumb-item active">Reporte de Ventas</li>
                   
                    </li>
                </ol>
            </div>            
            <div class="col-sm-6">
                <!-- Bookmark Start-->
            {{-- @include('recibo_caja.components.misc.opciones-buttons') --}}
                <!-- Bookmark Ends-->
            </div>
        </div>
    </div>
</div>

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
                        @include('reportes.components.partials.filtro')
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        {{-- <div class="col-12 col-md-8">
            <form method="GET">
                <div class="row">
                    <div class="col-12 col-md-4 pl-0 ml-3">
                        <div class="form-group form-inline">
                            <label for="filter[from]"></label>
                            <input name="filter[from]" type="text" class="form-control ml-1" data-toggle="flatpickr"
                                data-flatpickr-default-date="{{ isset(Request::get("filter")['from']) ? Request::get("filter")['from'] : \Carbon\Carbon::now() }}"
                                readonly="readonly" placeholder="">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 pl-0">
                        <div class="form-group form-inline">
                            <label for="filter[to]"></label>
                            <input name="filter[to]" type="text" class="form-control ml-1" data-toggle="flatpickr"
                                data-flatpickr-default-date="{{ isset(Request::get("filter")['to']) ? Request::get("filter")['to'] : \Carbon\Carbon::now()->addMonth() }}"
                                readonly="readonly" placeholder="">
                        </div>
                    </div>
                    <div class="col-12 col-md-2 pl-0">
                        <button type="submit" class="btn btn-light">
                            <i class="material-icons icon-20pt">refresh</i>
                            
                        </button>
                    </div>
                </div>
            </form>
        </div> --}}
        <div class="col-12 col-md-4 text-right">
            <div class="btn-group mb-2">
                {{-- <a href="{{ route('', [
                    'company_uid' => $currentCompany->uid,
                    'from' => isset(Request::get("filter")['from']) ? Request::get("filter")['from'] : \Carbon\Carbon::now()->format('Y-m-d'),
                    'to' => isset(Request::get("filter")['to']) ? Request::get("filter")['to'] : \Carbon\Carbon::now()->addMonth()->format('Y-m-d'),
                    'download' => true
                ]) }}" target="_blank" class="btn btn-info">
                    <i class="material-icons">cloud_download</i>
                    
                </a>
                <a href="{{ route('', [
                    'company_uid' => $currentCompany->uid,
                    'from' => isset(Request::get("filter")['from']) ? Request::get("filter")['from'] : \Carbon\Carbon::now()->format('Y-m-d'),
                    'to' => isset(Request::get("filter")['to']) ? Request::get("filter")['to'] : \Carbon\Carbon::now()->addMonth()->format('Y-m-d'),
                    'csv' => true
                ]) }}" target="_blank" class="btn btn-info">
                    <i class="material-icons">import_export</i>
                    
                </a> --}}
            </div>
        </div>
    </div>
    <div class="pdf-iframe">
        <iframe src="{{ route('reporte.ventas.pdf', [           
            'from' => isset(Request::get("filter")['from']) ? Request::get("filter")['from'] : \Carbon\Carbon::now()->format('Y-m-d'),
            'to' => isset(Request::get("filter")['to']) ? Request::get("filter")['to'] : \Carbon\Carbon::now()->addMonth()->format('Y-m-d')
        ]) }}" frameborder="0"></iframe>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/app/reportes.js') }}"></script>

@endsection