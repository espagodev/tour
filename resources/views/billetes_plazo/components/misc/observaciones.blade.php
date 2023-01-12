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

                <div class="col-md-1">
                    <label class="form-label" for="pas_localizador_ind">Localizador</label>
                    <input name="pas_localizador_ind" type="text" id="pas_localizador_ind"
                    class="form-control form-control-sm "  value="" required>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="pas_fecha_salidad_ind">Fecha Ida</label>
                    <input name="pas_fecha_salidad_ind" type="text" id="pas_fecha_salidad_ind"
                    class="form-control form-control-sm datepicker-here" data-language="es" data-date-format="dd/mm/yyyy"  value="" required>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div> 
                <div class="col-md-2">
                    <label class="form-label" for="pas_fecha_regreso_ind">Fecha Regreso</label>
                    <input name="pas_fecha_regreso_ind" type="text" id="pas_fecha_regreso_ind"
                    class="form-control form-control-sm datepicker-here"  data-language="es" data-date-format="dd/mm/yyyy" value="" required>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div> 
                <div class="col-md-2 ">
                    <label class="form-label" for="pais_id">Pais Destino</label>
                    <select class="form-select form-control-sm form-select-sm " name="pais_id"
                    id="pais_id" required="">
                    <option selected="" disabled="" value="">Seleccionar
                    </option>
                    @foreach ($paises as $pais)
                        <option value="{{ $pais->id }}">
                            {{ $pais->pai_nombre }}</option>
                    @endforeach
                </select>
                </div>                  
                <div class="col-md-2 ">
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
                <div class="col-md-2 "> 
                     <label class="form-label" for="pas_valor_individual">Valor Individual</label>
                    <input name="pas_valor_individual" type="text" id="pas_valor_individual"
                    class="form-control form-control-sm "  value="" required>
                    <div class="invalid-feedback">Please select a valid state.</div>
                </div>                          
            </div>
        </div>

       
    </div>
</div>