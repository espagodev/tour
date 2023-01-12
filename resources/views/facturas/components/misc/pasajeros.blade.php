<div class="card"> 
    <div class="card-header pb-0">
        <h6 class="m-b-0">Pasajeros</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <table class="table  table-bordered table-xs">
                    <thead>
                        <tr>
                            <th class="w-30">Localizador</th>
                            <th class="w-30">Pasajero</th>
                            <th class="w-20">Fecha Ida</th>
                            <th class="w-20">Fecha Regreso</th>
                            <th class="w-20">SubCategoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count(json_decode($factura->pasajeros)) > 0)
                            @foreach (json_decode($factura->pasajeros) as $pasajero)
                                <tr>
                                    <td>{{ $pasajero->pas_localizador }}</td>
                                    <td>{{ $pasajero->agenda_id }}</td>
                                    <td>{{ $pasajero->pas_fecha_salidad }}</td>
                                    <td>{{ $pasajero->pas_fecha_regreso }}</td>
                                    <td>{{ $pasajero->sub_categoria_id_pas }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>