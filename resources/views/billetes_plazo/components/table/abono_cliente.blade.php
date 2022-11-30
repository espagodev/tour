<div class="card">
    <div class="card-header pb-0">
        <h6 class="m-b-0">Pago Clientes</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-xs" id="pago_clientes">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Descripcion</th>
                        <th>Opciones <a  class="btn-modal" href="#" data-container=".view_register_abono" data-href="{{ route('getAbonoCliente', [$facturaId]) }}"   data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($abonoClientes as $abonoCliente) 
                    <tr>
                        <td>{{ $abonoCliente->moc_numero}}</td>
                       <td><span class="display_currency totalFee" data-orig-value="{{ $abonoCliente->moc_monto }}" data-currency_symbol = true>{{ $abonoCliente->moc_monto }}</span></td>
                        <td>{{ $abonoCliente->moc_fecha}}</td>
                        <td>{{ $abonoCliente->moc_descripcion}}</td>
                        <td colspan="2">
                           <a data-href="{{ route('editAbonoCliente', [$abonoCliente->id]) }}" class="btn btn-outline-warning btn-xs btn-modal" data-container=".view_register_abono" rel="tooltip" title="Editar Abono Cliente" >
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="{{ route('destroyAbonoCliente', [$abonoCliente->id, $facturaId]) }}"  class="btn btn-outline-danger btn-xs" rel="tooltip" title="Eliminar Abono Cliente" >
                                <i class="fa fa-trash"></i>
                            </a>
                            <a data-href="{{ route('getVerAbono', [$abonoCliente->id]) }}" class="btn btn-outline-primary btn-xs btn-modal" data-container=".view_register" rel="tooltip" title="Imprimir Abono Cliente" >
                                <i class="fa fa-print"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

