<table width="100%" class="text-sm">
    <thead>
        <tr>
            <th class="text-left" width="5%">Cant</th>
            <th class="text-left" width="20%">SubCategoria</th>
            <th class="text-left" width="30%">Descripcion</th>
            <th class="text-left">Valor</th>
            <th class="text-left">Iva</th>
            <th class="text-left">Total</th>
        </tr>
    </thead>
    <tbody>
       
            @foreach ($conceptos as $concepto)

                <tr>
                    <td>{{ $concepto->con_cantidad }}</td>
                    <td>{{ $concepto->subc_nombre }}</td>
                    <td>{{ $concepto->con_descripcion }}</td>
                    <td>@format_currency( $concepto->con_monto)</td>
                    <td>@format_currency(0)</td>
                    <td>@format_currency( $concepto->con_monto)</td>
                </tr>
            @endforeach
            @if ($factura->fac_total_fee > 0)
                <td></td>
                <td>Comisión</td>
                <td></td>
                <td>@format_currency( $factura->fac_total_fee - $factura->fac_total_fee * 0.21 )</td>
                <td>@format_currency( $factura->fac_total_fee * 0.21 )</td>
                <td>@format_currency( $factura->fac_total_fee)</td>
            @endif
       
    </tbody>
    <tfoot class="border-top">
        <tr>
            <td colspan="4"></td>
            <td>
                <table class="text-right sumtable" width="100%">
                    <tr>
                        <td  class="text-left" width="50%"><h4 class="text-sm text-dark text-left m-3">SubTotal</h4></td>
                        <td><p class="text-sm text-dark m-3"> @format_currency($factura->fac_total)</p></td>
                    </tr>
                    <tr>
                        <td><h4 class="text-sm text-dark text-left m-3">IVA</h4></td>
                        <td><p class="text-sm text-dark m-3">@format_currency($factura->fac_total_fee * 0.21)</p></td>
                    </tr>
                    <tr>
                        <td><h4 class="text-sm text-dark text-left m-3">Descuento</h4></td>
                        <td><p class="text-sm text-dark m-3">@format_currency($factura->fac_total_descuento)</p></td>
                    </tr>
                    <tr>
                        <td><h4 class="text-sm text-dark text-left m-3">Total</h4></td>
                        <td><p class="text-sm text-dark m-3">@format_currency($factura->fac_total + $factura->fac_total_fee)</p></td>
                    </tr>
                    @if ($factura->fac_total_pendiente > 0)
                        <tr>
                            <td><h4 class="text-sm text-dark text-left m-3">Total Pendiente</h4></td>
                            <td><p class="text-sm text-dark m-3">@format_currency($factura->fac_total_pendiente)</p></td>
                        </tr>
                    @endif
                </table>
            </td>            
        </tr>
        
    </tfoot>
</table>