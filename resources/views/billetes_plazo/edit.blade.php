@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Billete a Plazos</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item">Billetes a Plazos</li>
                        <li class="breadcrumb-item active">Modificar Nota Credito {{ $billetePlazo->fac_nota_credito }}
                        </li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                   @include('billetes_plazo.components.misc.opciones-buttons')
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form class="row needs-validation" action="{{ route('updateBilletePlazos', $billetePlazo->id) }}"
                    method="post" id="add_sell_form" novalidate="">
                    @csrf {{ method_field('PUT') }}
                    @include('billetes_plazo.components.misc.encabezado')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label" for="observaciones_id">Observaciones</label>
                                    <select class="form-select form-select-sm" name="observaciones_id" id="observaciones_id"
                                        required="">
                                        <option selected="" disabled="" value="">Seleccionar</option>
                                        @foreach ($observaciones as $observacion)
                                            <option value="{{ $observacion->id }}" @if($observacion->id == old('observaciones_id', $billetePlazo->observaciones_id)) selected @endif>{{ $observacion->obs_titulo }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a valid state.</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="info_factura_id">Mod.Inf.Imp.</label>
                                    <select class="form-select form-select-sm " name="info_factura_id" id="info_factura_id"
                                        required="">
                                        <option selected="" disabled="" value="">Seleccionar</option>
                                        @foreach ($infoFacturas as $infoFactura)
                                            <option value="{{ $infoFactura->id }}" @if($infoFactura->id == old('info_factura_id', $billetePlazo->info_factura_id)) selected @endif>{{ $infoFactura->inf_titulo }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a valid state.</div>
                                </div> 
                                <div class="col-md-4 media">
                                    <label class="col-form-label m-r-10">Es Pasajero?</label>
                                        <div class="media-body   icon-state">
                                        <label class="switch">
                                            <input type="checkbox"  value="1" id="ind_pasajero"><span class="switch-state"></span>
                                        </label>
                                        </div>
                                </div>                                
                            </div>
                            <div id="pasajero" style="display: none;">
                                <div class="row" >

                                    <div class="col-md-3">
                                        <label class="form-label" for="pas_localizador_ind">Localizador</label>
                                        <input name="pas_localizador_ind" type="text" id="pas_localizador_ind"
                                        class="form-control form-control-sm "  value="" required>
                                        <div class="invalid-feedback">Please select a valid state.</div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label" for="pas_fecha_salidad_ind">Fecha Ida</label>
                                        <input name="pas_fecha_salidad_ind" type="text" id="pas_fecha_salidad_ind"
                                        class="form-control form-control-sm datepicker-here" data-language="es" data-date-format="dd/mm/yyyy"  value="" required>
                                        <div class="invalid-feedback">Please select a valid state.</div>
                                    </div> 
                                    <div class="col-md-3">
                                        <label class="form-label" for="pas_fecha_regreso_ind">Fecha Regreso</label>
                                        <input name="pas_fecha_regreso_ind" type="text" id="pas_fecha_regreso_ind"
                                        class="form-control form-control-sm datepicker-here"  data-language="es" data-date-format="dd/mm/yyyy" value="" required>
                                        <div class="invalid-feedback">Please select a valid state.</div>
                                    </div> 
                                    <div class="col-md-3 ">
                                        <label class="form-label" for="sub_categoria_id_ind">SubCategoria</label>
                                        <select class="form-select form-control-sm form-select-sm " name="sub_categoria_id_ind"
                                        id="sub_categoria_id_ind" required="">
                                        <option selected="" disabled="" value="">Seleccionar
                                        </option>
                                        @foreach ($subCategorias as $subCategoria)
                                            <option value="{{ $subCategoria->id }}">
                                                {{ $subCategoria->subc_nombre }}</option>
                                        @endforeach
                                    </select>
                                    </div>                                
                                </div>
                            </div>

                           
                        </div>
                    </div>
                    <div class="card">
          
                        <div class="card-body ">
                            <div class="row g-3">
                                <div class="col-md-2">
                                    <label class="form-label" for="bilp_precio_proveedor">Neto Mayorista</label>
                                    <input class="form-control form-control-sm input_number" name="bilp_precio_proveedor"
                                        id="bilp_precio_proveedor" type="text" value="{{    !empty($billetePlazo->bilp_precio_proveedor) ?  $billetePlazo->bilp_precio_proveedor : '0' }}">
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label" for="bilp_precio_total">Precio Total</label>
                                    <input class="form-control form-control-sm input_number" name="bilp_precio_total"
                                        id="bilp_precio_total" type="text" value="{{  !empty($billetePlazo->bilp_precio_total) ?  $billetePlazo->bilp_precio_total : '0' }}">
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label" for="bilp_localizador">Localizador</label>
                                    <input class="form-control form-control-sm" name="bilp_localizador"
                                        id="bilp_localizador" type="text" value="{{ !empty($billetePlazo->bilp_localizador) ? $billetePlazo->bilp_localizador : '' }}">
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                                <div class="col-md-3 ">
                                    <label class="form-label" for="bilp_fecha_viaje">Fecha Ida</label>
                                    <input class="form-control form-control-sm datepicker-here" name="bilp_fecha_viaje"
                                        data-language="es" data-date-format="dd/mm/yyyy" id="bilp_fecha_viaje" type="text" value="{{ !empty($billetePlazo->bilp_fecha_viaje) ? $billetePlazo->bilp_fecha_viaje : '' }}">
                                    <div class="invalid-feedback">Selee.</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="bilp_fecha_retorno ">Fecha Regreso</label>
                                    <input class="form-control form-control-sm datepicker-here" name="bilp_fecha_retorno"
                                        data-language="es" data-date-format="dd/mm/yyyy" id="bilp_fecha_retorno" type="text" value="{{ !empty($billetePlazo->bilp_fecha_retorno) ? $billetePlazo->bilp_fecha_retorno : '' }}">
                                    <div class="invalid-feedback">Direccion.</div>
                                </div>

                            </div>
                        </div>
                    </div>

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
                                                    class="form-control form-select-sm priceListener select-with-footer" required>
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
                                        @if(count(json_decode($billetePlazo->pasajeros)) > 0)
                                        @foreach(json_decode($billetePlazo->pasajeros) as $pasajero)
                                        <tr>
                                            <td>
                                                <input name="pas_localizador[]" type="text" id="pas_localizador"
                                                    class="form-control form-control-sm "  value="{{ $pasajero->pas_localizador }}" required>
                                            </td>
                                            <td class="select-container">
                                                <select name="agenda_id[]"
                                                    class="form-control form-select-sm priceListener select-with-footer" required>
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
                                                    <option value="{{ $subCategoria->id }}" @if($subCategoria->id == old('sub_categoria_id_pas', $pasajero->sub_categoria_id_pas)) selected @endif>
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
                    </div>
--}}
                    
                   @include('billetes_plazo.components.table.conceptos')
                    
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
    <script src="{{ asset('js/app/billetePlazos.js') }}"></script> 
    <script>
        $(document).ready(function() {
           
            $('tbody tr').each(function(index, element) {
                var row = $(element);

                // If the row is template just continue
                if(row.attr('id') === 'concepto_row_template') return;

               
            });
            
          
        });
    </script>
@endsection
