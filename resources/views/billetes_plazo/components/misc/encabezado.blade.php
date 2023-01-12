<div class="card">
    <div class="card-body">
        <div>
            <div class="row invo-header">
                <div class="col-sm-6">
                    <div class="media">
                        <div class="media-body m-l-20">
                            <h4 class="media-heading f-w-600">
                                {{-- <label class="form-label">Estado:</label> --}}
                                @if($billetePlazo->estado_id == '1')
                                <span class="badge badge-secondary">Pendiente</span>
                                @elseif ($billetePlazo->estado_id == '2')
                                <span class="badge badge-warning text-dark">Plazos</span>
                                @elseif ($billetePlazo->estado_id == '3')
                                <span class="badge badge-success">Pagada</span>
                                @endif
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="text-md-end text-xs-center">
                        <h3><span class="digits counter">{{ $billetePlazo->fac_recibo }}</span></h3>
                        <p>Fecha de la factura: <span class="digits">{{ $billetePlazo->fac_fecha }}</span><br>Fecha de
                            vencimiento: <span class="digits">{{ $billetePlazo->fac_fecha_vencimiento }}</span></p>
                    </div>
                    <!-- End Title                                 -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Nombre: </label>
                {{ !empty($billetePlazo->full_name_agenda) ? $billetePlazo->full_name_agenda : '' }}


            </div>
            <div class="col-md-6">
                <label class="form-label">Atendido Por: </label>
                {{ !empty($billetePlazo->full_name_agente) ? $billetePlazo->full_name_agente : '' }}
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Telefono:</label>
                {{ !empty($billetePlazo->agd_telefono) ? $billetePlazo->agd_telefono : '' }}
            </div>
            <div class="col-md-6">

                <label class="form-label">Mayorista:</label>
                {{ !empty($billetePlazo->may_nombre) ? $billetePlazo->may_nombre : '' }}

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Documento:</label>
                {{ !empty($billetePlazo->documento) ? $billetePlazo->documento : '' }}
            </div>
            <div class="col-md-6">
                <label class="form-label">Categoria:</label>
                {{ !empty($billetePlazo->cat_nombre) ? $billetePlazo->cat_nombre : '' }}
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 media">
                <label class="form-label">Email:</label>
                {{ !empty($billetePlazo->agd_email) ? $billetePlazo->agd_email : '' }}
            </div>
            <div class="col-md-6">
                <label class="form-label" >Nacionalidad: </label> 
                {{ !empty($billetePlazo->car_nombre) ? $billetePlazo->car_nombre : '' }}
            </div>
        </div> 
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Neto Mayorista:</label>
                <span class="display_currency totalFee" data-orig-value="{{    !empty($billetePlazo->bilp_precio_proveedor) ?  $billetePlazo->bilp_precio_proveedor : '' }}" data-currency_symbol = true>{{    !empty($billetePlazo->bilp_precio_proveedor) ?  $billetePlazo->bilp_precio_proveedor : '' }}</span>
                
            </div>
            <div class="col-md-6">
                <label class="form-label">Fecha Ida:</label>
                {{  !empty($billetePlazo->bilp_fecha_viaje) ?  $billetePlazo->bilp_fecha_viaje : '' }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Precio Total:</label>
                <span class="display_currency totalFee" data-orig-value="{{ !empty($billetePlazo->fac_total) ?  $billetePlazo->fac_total : '' }}" data-currency_symbol = true>{{ !empty($billetePlazo->fac_total) ?  $billetePlazo->fac_total : '' }}</span>
                
            </div>
            <div class="col-md-6">
                <label class="form-label">Fecha Regreso:</label>
                {{  !empty($billetePlazo->bilp_fecha_retorno) ?  $billetePlazo->bilp_fecha_retorno : '' }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Saldo Cliente:</label>
                <span class="display_currency totalFee" data-orig-value="{{    !empty($billetePlazo->fac_total_pendiente) ?  $billetePlazo->fac_total_pendiente : '' }}" data-currency_symbol = true>{{    !empty($billetePlazo->fac_total_pendiente) ?  $billetePlazo->fac_total_pendiente : '' }}</span>

            </div>
            <div class="col-md-6">
                <label class="form-label">Localizador:</label>
                {{  !empty($billetePlazo->bilp_localizador) ?  $billetePlazo->bilp_localizador : '' }}
            </div>
        </div>                 
        {{-- <div class="row">
            <div class="col-md-6">
                
            </div>
            <div class="col-md-6">
                <label class="form-label">Estado:</label>
                @if($billetePlazo->estado_id == '1')
                <span class="badge badge-secondary">Pendiente</span>
                @elseif ($billetePlazo->estado_id == '2')
                <span class="badge badge-warning text-dark">Plazos</span>
                @elseif ($billetePlazo->estado_id == '3')
                <span class="badge badge-success">Pagada</span>
                @endif
            </div>
        </div> --}}
    </div>
</div>