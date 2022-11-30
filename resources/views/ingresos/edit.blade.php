@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Recibo deCaja</h3>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form class="row  needs-validation" action="{{ route('updateReciboCaja', $factura->id) }}"
                    method="post" id="add_sell_form" novalidate="">
                    @csrf {{ method_field('PUT') }}
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Nombre: </label>
                                    {{ !empty($factura->full_name_agenda) ? $factura->full_name_agenda : '' }}


                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Atendido Por: </label>
                                    {{ !empty($factura->full_name_agente) ? $factura->full_name_agente : '' }}
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Telefono:</label>
                                    {{ !empty($factura->agd_telefono) ? $factura->agd_telefono : '' }}
                                </div>
                                <div class="col-md-6">

                                    <label class="form-label" for="validationCustomUsername">Mayorista:</label>
                                    {{ !empty($factura->may_nombre) ? $factura->may_nombre : '' }}

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustomUsername">Documento:</label>
                                    {{ !empty($factura->documento) ? $factura->documento : '' }}
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustomUsername">Categoria:</label>
                                    {{ !empty($factura->cat_nombre) ? $factura->cat_nombre : '' }}
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustomUsername">Email:</label>
                                    {{ !empty($factura->agd_email) ? $factura->agd_email : '' }}
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="fecha_viaje">Carpeta: </label> 
                                    {{ !empty($factura->car_nombre) ? $factura->car_nombre : '' }}
                                </div>
                            </div>
                           
                            
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label" for="observaciones_id">Observaciones</label>
                                    <select class="form-select form-select-sm" name="observaciones_id" id="observaciones_id"
                                        required="">
                                        <option selected="" disabled="" value="">Seleccionar</option>
                                        @foreach ($observaciones as $observacion)
                                            <option value="{{ $observacion->id }}" @if($observacion->id == old('observaciones_id', $factura->observaciones_id)) selected @endif>{{ $observacion->obs_titulo }}
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
                                            <option value="{{ $infoFactura->id }}" @if($infoFactura->id == old('info_factura_id', $factura->info_factura_id)) selected @endif>{{ $infoFactura->inf_titulo }}
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th class="w-30">Localizador</th>
                                            <th class="w-30">Pasajero</th>
                                            <th class="w-20">Fecha Ida</th>
                                            <th class="w-20">Fecha Regreso</th>
                                            <th class="w-20">SubCategoria</th>
                                            <th class="w-10"><button id="add_pasajero_row" type="button"
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

                    
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th class="w-10">Cant</th>
                                            <th class="w-30">SubCategoria</th>
                                            <th class="w-30">Descripcion</th>
                                            <th class="w-20">Valor</th>
                                            {{-- <th class="w-20">IVA</th> --}}
                                            <th class="w-10"><button id="add_concepto_row" type="button"
                                                    class="btn  btn-xs"><i data-feather="plus-square"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody class="list" id="conceptos" >
                                        <tr id="concepto_row_template" class="d-none">
                                            <td><input class="form-control form-control-sm input_number" name="con_cantidad[]"
                                                    id="con_cantidad" type="number" value="1" required=""></td>
                                            <td><select class="form-select form-select-sm " name="sub_categoria_id[]"
                                                    id="sub_categoria_id" required="">
                                                    <option selected="" disabled="" value="">Seleccionar
                                                    </option>
                                                    @foreach ($subCategorias as $subCategoria)
                                                        <option value="{{ $subCategoria->id }}">
                                                            {{ $subCategoria->subc_nombre }}</option>
                                                    @endforeach
                                                </select></td>
                                            <td><input class="form-control form-control-sm" name="con_descripcion[]"
                                                    id="con_descripcion" required="" type="text"></td>
                                            <td> <input class="form-control form-control-sm input_number"
                                                    name="con_monto[]" id="con_monto" type="text" value="{{ !empty($factura->con_monto) ?  $factura->con_monto : '0'  }}">
                                            </td>
                                            {{-- <td><select class="form-select form-select-sm" name="impuesto_id[]"
                                                    id="impuesto_id">
                                                    <option selected="" disabled="" value="">Seleccionar
                                                    </option>
                                                    @foreach ($impuestos as $impuesto)
                                                        <option value="{{ $impuesto->id }}">
                                                            {{ $impuesto->imp_nombre }}%</option>
                                                    @endforeach
                                                </select>
                                            </td> --}}
                                            <td>
                                                <a onclick="removeConceptRow(this)">
                                                    <i data-feather="trash-2"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        {{-- @dd($factura->conceptos)  --}}
                                         @if(count(json_decode($factura->conceptos)) > 0)
                                            @foreach(json_decode($factura->conceptos) as $concepto)
                       
                                            <tr>
                                                <td><input class="form-control form-control-sm input_number" name="con_cantidad[]"
                                                        id="con_cantidad" type="number" value="{{ $concepto->con_cantidad }}" required=""></td>
                                                <td><select class="form-select form-select-sm " name="sub_categoria_id_con[]"
                                                        id="sub_categoria_id_con" required="">
                                                        <option selected="" disabled="" value="">Seleccionar
                                                        </option>
                                                        @foreach ($subCategorias as $subCategoria)
                                                            <option value="{{ $subCategoria->id }}" @if($subCategoria->id == old('sub_categoria_id_con', $concepto->sub_categoria_id_con)) selected @endif> {{ $subCategoria->subc_nombre }}</option>
                                                        @endforeach
                                                    </select></td>
                                                <td><input class="form-control form-control-sm" name="con_descripcion[]"
                                                        id="con_descripcion" required="" type="text" value="{{ $concepto->con_descripcion }}" ></td>
                                                <td> <input class="form-control form-control-sm input_number"
                                                        name="con_monto[]" id="con_monto" type="text" value="  {{ !empty($concepto->con_monto) ?  $concepto->con_monto : '0'}}">
                                                </td>
                                                {{-- <td><select class="form-select form-select-sm" name="impuesto_id[]"
                                                        id="impuesto_id">
                                                        <option selected="" disabled="" value="">Seleccionar
                                                        </option>
                                                        @foreach ($impuestos as $impuesto)
                                                            <option value="{{ $impuesto->id }}" @if($impuesto->id == old('impuesto_id', $concepto->impuesto_id)) selected @endif>
                                                                {{ $impuesto->imp_nombre }}%</option>
                                                        @endforeach
                                                    </select>
                                                </td> --}}
                                                <td>
                                                    <a onclick="removeConceptRow(this)">
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
