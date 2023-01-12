<div class="card"> 
    <div class="card-header pb-0">
        <h6 class="m-b-0">Conceptos</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <table class="table  table-bordered table-xs">
                    <thead>
                        <tr>
                            <th class="w-10">Cant</th>
                            <th class="w-30">SubCategoria</th>
                            <th class="w-30">Descripcion</th>
                            <th class="w-20">Valor</th>
                            <th class="w-20">Descuento</th>
                            <th class="w-20">Fee</th>
                            <th class="w-20">IVA</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                            @foreach ($conceptos as $concepto)
                                <tr>
                                    <td>{{ $concepto->con_cantidad }}</td>
                                    <td>{{ $concepto->subc_nombre }}</td>
                                    <td>{{ $concepto->con_descripcion }}</td>
                                    <td>@format_currency( $concepto->con_monto )</td>
                                    <td>@format_currency( $concepto->con_descuento )</td>
                                    <td>@format_currency( $concepto->con_fee )</td>
                                    <td>{{ $concepto->imp_nombre }} %</td>
                                </tr>
                            @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>