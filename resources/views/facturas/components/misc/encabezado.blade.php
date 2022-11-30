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

                <label class="form-label">Mayorista:</label>
                {{ !empty($factura->may_nombre) ? $factura->may_nombre : '' }}

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Documento:</label>
                {{ !empty($factura->documento) ? $factura->documento : '' }}
            </div>
            <div class="col-md-6">
                <label class="form-label">Categoria:</label>
                {{ !empty($factura->cat_nombre) ? $factura->cat_nombre : '' }}
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 media">
                <label class="form-label">Email:</label>
                {{ !empty($factura->agd_email) ? $factura->agd_email : '' }}
            </div>
            <div class="col-md-6">
                <label class="form-label" >Carpeta: </label> 
                {{ !empty($factura->car_nombre) ? $factura->car_nombre : '' }}
            </div>
        </div> 
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Neto Mayorista:</label>
                <span class="display_currency totalFee" data-orig-value="{{    !empty($factura->bilp_precio_proveedor) ?  $factura->bilp_precio_proveedor : '' }}" data-currency_symbol = true>{{    !empty($factura->bilp_precio_proveedor) ?  $factura->bilp_precio_proveedor : '' }}</span>
                
            </div>
            <div class="col-md-6">
                <label class="form-label">Fecha Ida:</label>
                {{  !empty($factura->bilp_fecha_viaje) ?  $factura->bilp_fecha_viaje : '' }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Precio Total:</label>
                <span class="display_currency totalFee" data-orig-value="{{ !empty($factura->fac_total) ?  $factura->fac_total : '' }}" data-currency_symbol = true>{{ !empty($factura->fac_total) ?  $factura->fac_total : '' }}</span>
                
            </div>
            <div class="col-md-6">
                <label class="form-label">Fecha Regreso:</label>
                {{  !empty($factura->bilp_fecha_retorno) ?  $factura->bilp_fecha_retorno : '' }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Saldo Cliente:</label>
                <span class="display_currency totalFee" data-orig-value="{{    !empty($factura->fac_total_pendiente) ?  $factura->fac_total_pendiente : '' }}" data-currency_symbol = true>{{    !empty($factura->fac_total_pendiente) ?  $factura->fac_total_pendiente : '' }}</span>

            </div>
            <div class="col-md-6">
                <label class="form-label">Localizador:</label>
                {{  !empty($factura->bilp_localizador) ?  $factura->bilp_localizador : '' }}
            </div>
        </div>                 
        <div class="row">
            <div class="col-md-6">
                
            </div>
            <div class="col-md-6">
                <label class="form-label">Estado:</label>
                @if($factura->estado_id == '1')
                <span class="badge badge-secondary">Pendiente</span>
                @elseif ($factura->estado_id == '2')
                <span class="badge badge-warning text-dark">Plazos</span>
                @elseif ($factura->estado_id == '3')
                <span class="badge badge-success">Pagada</span>
                @endif
            </div>
        </div>
    </div>
</div>