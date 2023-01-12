<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header pb-0">
                <h6 class="m-b-0">Pago Clientes</h6>
            </div>
            <div class="card-body">
              
                   
                        <table class="table  table-bordered table-xs" id="pago_clientes">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Monto</th>

                                    <th>Descripcion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abonoClientes as $abonoCliente)
                                    <tr>
                                        <td>{{ $abonoCliente->moc_numero }}</td>
                                        <td>{{ $abonoCliente->moc_fecha }}</td>
                                        <td>@format_currency( $abonoCliente->moc_monto )</td>

                                        <td>{{ $abonoCliente->moc_descripcion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">                   
            <div class="card-body">

                <table class="table  table-bordered table-xs">

                    <tr>
                        <th>Total</th>
                        <th>@format_currency( $factura->fac_total)</th>                                
                    </tr>
                    <tr>
                        <th>Fee</th>
                        <th>@format_currency( $factura->fac_total_fee)</th>                               
                    </tr>
                    <tr>
                        <th>Impuesto</th>
                        <th>@format_currency( $factura->fac_total_fee)</th>                               
                    </tr>
                    <tr>
                        <th>Descuento</th>
                        <th>@format_currency( $factura->fac_total_descuento)</th>                               
                    </tr>
                    <tr>
                        <th>Total a Pagar</th>
                        <th>@format_currency( $factura->fac_total)</th>                               
                    </tr>
                    <tr>
                        <th>Total a Pagado</th>
                        <th>@format_currency( $factura->fac_total_pagado)</th>                               
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>   