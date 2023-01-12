@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Facturas</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item">Factura</li>
                        <li class="breadcrumb-item active">Modificar Factura {{ $factura->fac_numero }}
                        </li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                   @include('facturas.components.misc.opciones-buttons')
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form class="row  needs-validation" action="{{ route('updateFactura', $factura->id) }}"
                    method="post" id="add_sell_form" novalidate="">
                    @csrf {{ method_field('PUT') }}
                    @include('facturas.components.misc.encabezado')
                    {{-- observaciones --}}
                    @include('facturas.components.misc.observaciones')

                    {{-- <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-xs">
                                    <thead>
                                        <tr>
                                            <th >Localizador</th>
                                            <th >Pasajero</th>
                                            <th >Fecha Ida</th>
                                            <th >Fecha Regreso</th>
                                            <th >SubCategoria</th>
                                            <th ><button id="add_pasajero_row" type="button"
                                                    class="btn  btn-xs"><i
                                                        data-feather="plus-square"></i></button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="list" id="pasajeros">
                                       
                                        <tr id="pasajero_row_template" class="d-none">
                                            <td>
                                                <input name="pas_localizador[]" type="text" id="pas_localizador"
                                                    class="form-control form-control-sm "  value="" required>
                                            </td>
                                            <td class="select-container">
                                                <select name="agenda_id[]"
                                                    class="form-control priceListener select-with-footer" required>
                                                    <option disabled selected>Seleccione un Pasajero</option>
                                                </select>
                                            </td>                                           
                                            <td>
                                                <input name="pas_fecha_salidad[]" type="text" id="pas_fecha_salidad"
                                                    class="form-control form-control-sm datepicker-here" data-language="es" data-date-format="dd/mm/yyyy"
                                                    value="" required>
                                            </td>
                                            <td>
                                                <input name="pas_fecha_regreso[]" type="text" id="pas_fecha_regreso"
                                                    class="form-control form-control-sm datepicker-here"  data-language="es" data-date-format="dd/mm/yyyy"
                                                    value="" required>
                                            </td>
                                            <td><select class="form-select form-control-sm form-select-sm " name="sub_categoria_id_pas[]"
                                                id="sub_categoria_id_pas" required="">
                                                <option selected="" disabled="" value="">Seleccionar
                                                </option>
                                                @foreach ($subCategorias as $subCategoria)
                                                    <option value="{{ $subCategoria->id }}">
                                                        {{ $subCategoria->subc_nombre }}</option>
                                                @endforeach
                                            </select></td>
                                            <td>
                                                <a onclick="removeRow(this)">
                                                    <i data-feather="trash-2"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @if(count(json_decode($factura->pasajeros)) > 0)
                                        @foreach(json_decode($factura->pasajeros) as $pasajero)
                                        <tr>
                                            <td>
                                                <input name="pas_localizador[]" type="text" id="pas_localizador"
                                                    class="form-control form-control-sm "  value="{{ $pasajero->pas_localizador }}" required>
                                            </td>
                                            <td class="select-container">
                                                <select name="agenda_id[]"
                                                    class="form-control priceListener select-with-footer" required>
                                                    <option value="{{ $pasajero->agenda_id }}" selected=""></option>
                                                </select>
                                            </td>                                           
                                            <td>
                                                <input name="pas_fecha_salidad[]" type="text" id="pas_fecha_salidad"
                                                    class="form-control form-control-sm datepicker-here" data-language="es" data-date-format="dd/mm/yyyy"
                                                    value="{{ $pasajero->pas_fecha_salidad }}" required>
                                            </td>
                                            <td>
                                                <input name="pas_fecha_regreso[]" type="text" id="pas_fecha_regreso"
                                                    class="form-control form-control-sm datepicker-here"  data-language="es" data-date-format="dd/mm/yyyy"
                                                    value="{{ $pasajero->pas_fecha_regreso }}" required>
                                            </td>
                                            <td><select class="form-select form-control-sm form-select-sm " name="sub_categoria_id_pas[]"
                                                id="sub_categoria_id_pas" required="">
                                                <option selected="" disabled="" value="">Seleccionar
                                                </option>
                                                @foreach ($subCategorias as $subCategoria)
                                                    <option value="{{ $subCategoria->id }}" @if($subCategoria->id == old('sub_categoria_id', $pasajero->sub_categoria_id_pas)) selected @endif>
                                                        {{ $subCategoria->subc_nombre }}</option>
                                                @endforeach
                                            </select></td>
                                            <td>
                                                <a onclick="removeRow(this)">
                                                    <i data-feather="trash-2"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div> --}}

                    
                    @include('facturas.components.table.conceptos')
                    
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
