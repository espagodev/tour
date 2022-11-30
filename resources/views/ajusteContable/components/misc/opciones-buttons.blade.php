<div class="bookmark">
    <ul>
        <li><a href="{{ route('getListaIngreso') }}" data-container="body" data-bs-toggle="popover" data-placement="top"
                title="" data-original-title="Learning"><i data-feather="rotate-ccw"></i></a>
        </li>
        @if ($factura->estado_id != 3)
        <li><a href="{{ route('editIngreso', $facturaId) }}" data-container="body" data-bs-toggle="popover" data-placement="top"
            title="" data-original-title="Learning"><i data-feather="edit"></i></a>
        </li> 
        <li><a  class="btn-modal" href="#" data-container=".view_register_abono" data-href="{{ route('getAbonoIngreso', [$facturaId]) }}"   data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="dollar-sign"></i></a>
      </li>
          
      @endif
        
        <li><a href="{{ route('showIngreso', $facturaId) }}" data-container="body" data-bs-toggle="popover" data-placement="top"
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