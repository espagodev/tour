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
                        <li class="breadcrumb-item active">Firma Agente 
                        </li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->

                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="{{ route('storeFirmaAgente') }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">                                  
                                    <div id="sig"></div>
                                    <br><br>
                                    <input type="hidden" name="agente_id" value="{{ $agenteId }}">
                                    <button id="clear" class="btn btn-danger">Limpiar</button>
                                    <button class="btn btn-success">Guardar</button>
                                    <textarea id="signature" name="age_firma_digital" style="display: none"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    <script>
         var sig = $('#sig').signature({syncField: '#signature', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature").val('');
    });
    </script>
@endsection
