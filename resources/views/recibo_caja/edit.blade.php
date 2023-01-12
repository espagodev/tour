@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Recibo de Caja</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item">Rescibos de Caja</li>
                        <li class="breadcrumb-item active">Modificar Recibo {{ $factura->fac_recibo }}
                        </li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                    @include('recibo_caja.components.misc.opciones-buttons')
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>
    <div class="container invoice">
        <div class="row">
            <div class="col-sm-12">
               
                  <!-- End InvoiceTop-->
                <form class="row  needs-validation" action="{{ route('updateReciboCaja', $factura->id) }}" method="post"
                    id="add_sell_form" novalidate="">
                    @csrf {{ method_field('PUT') }}
                    @include('recibo_caja.components.misc.encabezado')

                    @include('recibo_caja.components.misc.observaciones')
                   

                    {{-- @include('recibo_caja.components.table.pasajeros') --}}


                   @include('recibo_caja.components.table.conceptos')

                   {{-- @include('recibo_caja.components.misc.add-line-buttons') --}}
                    <div class="card">
                        <div class="card-footer text-end">
                            <button class="btn btn-primary m-r-15 save_form_button" type="button">Modificar</button>
                            <button class="btn btn-light" type="button">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/app/facturaedit.js') }}"></script>
    <script>

        
        $(document).ready(function() {
           
            $('tbody tr').each(function(index, element) {
                var row = $(element);

                // If the row is template just continue
                if(row.attr('id') === 'concepto_row_template') return;

                if(row.attr('id') === 'pasajero_row_template') return;

                var agendaId = row.find('[name="agenda_id[]"]');
                inicializarPasajerosSelect2(agendaId);
            });
            
          
        });
    </script>
@endsection