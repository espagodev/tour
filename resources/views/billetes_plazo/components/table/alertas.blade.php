<div class="card">
    <div class="card-header pb-0">
        <h6 class="m-b-0">Alertas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-xs" id="alertas">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Descripcion</th>
                        <th>Opciones <a  class="btn-modal" href="#" data-container=".view_register" data-href="{{ route('getMovimientoAlerta', [$facturaId]) }}"   data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alertas as $alerta)
                    <tr>
                       <td>{{ $alerta->moa_fecha}}</td>
                        <td>{{ $alerta->moa_descripcion}}</td>

                        <td colspan="2">
                            <a href="" class="btn btn-outline-warning btn-xs" rel="tooltip" title="Editar Alerta" >
                                 <i class="fa fa-pencil"></i>
                             </a>
                             <a href="{{ route('MovimientoAlerta.destroy', [$alerta->id, $facturaId]) }}" class="btn btn-outline-danger btn-xs" rel="tooltip" title="Eliminar Alerta" >
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