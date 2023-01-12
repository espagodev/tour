<div class="card">
    <div class="card-header pb-0">
        <h6 class="m-b-0">Apuntes</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-xs">
                <thead>
                    <tr>                                        
                        <th>Fecha</th>
                        <th>Apuntes</th>
                        <th>
                            <a  class="btn-modal" href="#" data-container=".view_register" data-href="{{ route('nuevoApunte') }}"   data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="plus-square"></i></a></th>
                    </th>
                    </tr>
                </thead>
                <tbody>
                   @forelse ($apuntes as $apunte )
                       <tr>
                        <td>{{ $apunte->apu_detalle }}</td>
                        <td>{{ $apunte->apu_detalle }}</td>
                        <td>
                            {{-- <a href="{{ route('destroyApunte', [$apunte->id]) }}"  class="btn btn-outline-danger btn-xs" rel="tooltip" title="Eliminar Abono Cliente" >
                                <i class="fa fa-trash"></i>
                            </a> --}}
                        </td>
                       </tr>
                   @empty
                       <tr>
                        <td colspan="3"> No hay Apuntes en este Momento</td>
                       </tr>
                   @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>