@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class=" col-sm-12 col-xl-12 xl-100">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Configuración del sistema</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-home-tab"
                                data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">Empresa</a>

                                <a class="nav-link" id="v-pills-profile-tab"
                                    data-bs-toggle="pill" href="#v-pills-logo" role="tab" aria-controls="v-pills-logo"
                                    aria-selected="false">logos</a>

                                <a class="nav-link" id="v-pills-ajustes-tab"
                                    data-bs-toggle="pill" href="#v-pills-ajustes" role="tab" aria-controls="v-pills-ajustes"
                                    aria-selected="false">Preferencias</a>
                               
                                <a class="nav-link" id="v-pills-profile-tab"
                                    data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                    aria-selected="false">Prefijo</a>


                                {{-- <a class="nav-link" id="v-pills-messages-tab"
                                    data-bs-toggle="pill" href="#v-pills-messages" role="tab"
                                    aria-controls="v-pills-messages" aria-selected="false">Email</a>
                                <a
                                    class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                    href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                    aria-selected="false">SMS</a> --}}
                                </div>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <div class="tab-content" id="v-pills-tabContent">
                                
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                   @include("setting.form.empresa")
                                </div>
                                <div class="tab-pane fade" id="v-pills-logo" role="tabpanel"
                                    aria-labelledby="v-pills-logo-tab">
                                   
                                   @include("setting.form.logo")
                                </div>
                                <div class="tab-pane fade" id="v-pills-ajustes" role="tabpanel"
                                    aria-labelledby="v-pills-ajustes-tab">
                                   @include("setting.form.ajustes")
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    @include("setting.form.prefijos")
                                </div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">
                                    @include("setting.form.emails")
                                </div>
                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    @include("setting.form.sms")
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
