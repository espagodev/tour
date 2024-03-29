<div class="bookmark">
    <ul>
        <li><a href="{{ route('getListaReciboCaja') }}" data-container="body" data-bs-toggle="popover" data-placement="top"
                title="" data-original-title="Learning"><i data-feather="rotate-ccw"></i></a>
        </li>
        @if ($factura->estado_id != 3)
        <li><a href="{{ route('editReciboCaja', $facturaId) }}" data-container="body" data-bs-toggle="popover" data-placement="top"
            title="" data-original-title="Learning"><i data-feather="edit"></i></a>
        </li> 
        <li><a  class="btn-modal" href="#" data-container=".view_register_abono" data-href="{{ route('getAbonoReciboCaja', [$facturaId]) }}"   data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="dollar-sign"></i></a>
      </li>
          
      @endif
        
        <li><a href="{{ route('showReciboCaja', $facturaId) }}" data-container="body" data-bs-toggle="popover" data-placement="top"
            title="" data-original-title="Learning"><i data-feather="external-link"></i></a>
        </li>
        <li><a href="" data-container="body" data-bs-toggle="popover" data-placement="top"
                title="" data-original-title="Learning"><i data-feather="file-text"></i></a>
        </li>
       
        
        <li><a href="" data-container="body" data-bs-toggle="popover" data-placement="top"
            title="" data-original-title="Learning"><i data-feather="trash-2"></i></a>
        </li>
        
    </ul>
</div>