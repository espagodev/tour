@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Dashboard</h3>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">App</li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
                 {{-- <div class="col-sm-6">
                <!-- Bookmark Start-->
               
                    <div class="btn-group btn-group-toggle pull-right" data-toggle="buttons">
                        <label class="btn btn-info active">
                            <input type="radio" name="date-filter" data-start="{{ date('Y-m-d') }}"
                            data-end="{{ date('Y-m-d') }}" checked>Hoy
                        </label>
                        <label class="btn btn-info">
                            <input type="radio" name="date-filter" data-start="{{ $date_filters['this_week']['start'] }}"
                            data-end="{{ $date_filters['this_week']['end'] }}">Esta Semana
                        </label>
                        <label class="btn btn-info">
                            <input type="radio" name="date-filter" data-start="{{ $date_filters['this_month']['start'] }}"
                            data-end="{{ $date_filters['this_month']['end'] }}">Este Mes
                        </label>
                    </div>

                </div> --}}
                <!-- Bookmark Ends-->
              </div>
        </div>
    </div>
<!-- Container-fluid starts-->

    {{-- <div class="container-fluid general-widget">
        <div class="row">
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="database"></i></div>
                            <div class="media-body"><span class="m-0">Earnings</span>
                                <h4 class="mb-0 counter">6659</h4><i class="icon-bg" data-feather="database"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                            <div class="media-body"><span class="m-0">Products</span>
                                <h4 class="mb-0 counter">9856</h4><i class="icon-bg" data-feather="shopping-bag"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                            <div class="media-body"><span class="m-0">Messages</span>
                                <h4 class="mb-0 counter">893</h4><i class="icon-bg" data-feather="message-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                            <div class="media-body"><span class="m-0">New Use</span>
                                <h4 class="mb-0 counter">4531</h4><i class="icon-bg" data-feather="user-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.components.table.notas')
        </div>
        
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.components.table.itinerarios')
        </div>
        
    </div>
    <div class="row">
       
        <div class="col-sm-6">
            @include('dashboard.components.table.facturas')
        </div>
    </div>
@endsection
