<div class="card">
    <div class="card-header pb-0">
        <h6 class="m-b-0">Pago Clientes</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm" id="pago_clientes">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Descripcion</th>
                        <th>Opciones 
                        @if ($factura->estado_id != 3)   
                            <a  class="btn-modal" href="#" data-container=".view_register_abono" data-href="{{ route('getAbonoReciboCaja', [$facturaId]) }}"   data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($abonoClientes as $abonoCliente)
                    <tr>
                        <td>{{ $abonoCliente->moc_numero}}</td>
                       <td>@format_currency( $abonoCliente->moc_monto ) </td>
                        <td>{{ $abonoCliente->moc_fecha}}</td>
                        <td>{{ $abonoCliente->moc_descripcion}}</td>
                        <td colspan="2">
                           <a href="" class="btn btn-outline-warning btn-xs" rel="tooltip" title="Editar Abono Cliente" >
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="{{ route('destroyAbonoCliente', [$abonoCliente->id, $facturaId]) }}" class="btn btn-outline-danger btn-xs" rel="tooltip" title="Eliminar Abono Cliente" >
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

