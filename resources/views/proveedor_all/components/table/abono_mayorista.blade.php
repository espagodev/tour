<div class="card">
    <div class="card-header pb-0">
        <h6 class="m-b-0">Pago a Mayorista</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm" id="pago_mayorista">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Descripcion</th>
                        <th>Opciones <a  class="btn-modal" href="#" data-container=".view_register" data-href="{{ route('getAbonoMayorista', [$facturaId, $billetePlazo->billetes_plazos_id]) }}"   data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($abonoMayoristas as $abonoMayorista)
                    <tr>
                        <td>{{ $abonoMayorista->moc_numero}}</td>
                        <td>{{ $abonoCliente->moc_monto }} </td>
                                                <td>{{ $abonoMayorista->moc_fecha}}</td>
                        <td>{{ $abonoMayorista->moc_descripcion}}</td>
                        <td colspan="2">
                            <a href="" class="btn btn-outline-warning btn-xs" rel="tooltip" title="Editar Abono Mayorista" >
                                 <i class="fa fa-pencil"></i>
                             </a>
                             <a href="{{ route('destroyAbonoCliente', [$abonoMayorista->id, $facturaId]) }}" class="btn btn-outline-danger btn-xs" rel="tooltip" title="Eliminar Abono Mayorista" >
                                 <i class="fa fa-trash"></i>
                             </a>
                         </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>