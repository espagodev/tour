<div class="card">
    <div class="card-header pb-0">
        <h6 class="m-b-0">Observaciones</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm" id="observaciones">
                <thead>
                    <tr>
                        <th>Observaciones</th>                                   
                        <th>Opciones <a  class="btn-modal" href="#" data-container=".view_register" data-href="{{ route('getMovimientoObservacion', [$facturaId, $billetePlazo->billetes_plazos_id]) }}"   data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($observaciones as $observacion)
                    <tr>
                        <td>{{ $observacion->moo_descripcion}}</td>
                        <td colspan="2">
                            <a href="" class="btn btn-outline-warning btn-xs" rel="tooltip" title="Editar Observacion" >
                                 <i class="fa fa-pencil"></i>
                             </a>
                             <a href="{{ route('MovimientoObservacion.destroy', [$observacion->id, $facturaId]) }}" class="btn btn-outline-danger btn-xs" rel="tooltip" title="Eliminar Observacion" >
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