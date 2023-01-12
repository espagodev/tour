<div class="bookmark">
    <ul>
        <li><a href="{{ route('getListaFacturas') }}" data-container="body" data-bs-toggle="popover" data-placement="top"
                title="" data-original-title="Learning"><i data-feather="rotate-ccw"></i></a>
        </li>
        @if ($factura->estado_id != 3)
            <li><a href="{{ route('editFactura', $facturaId) }}" data-container="body" data-bs-toggle="popover"
                    data-placement="top" title="" data-original-title="Learning"><i data-feather="edit"></i></a>
            </li>
            <li><a class="btn-modal" href="#" data-container=".view_register_abono"
                    data-href="{{ route('getAbonoFactura', [$facturaId]) }}" data-container="body"
                    data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i
                        data-feather="dollar-sign"></i></a>
            </li>
        @endif
        <li><a href="{{ route('getFirmaFactura', [$facturaId]) }}" data-container="body" data-bs-toggle="popover" data-placement="top"
                title="" data-original-title="Learning"><i data-feather="italic"></i></a>
        </li>

        <li><a href="{{ route('showFactura', $facturaId) }}" data-container="body" data-bs-toggle="popover"
                data-placement="top" title="" data-original-title="Learning"><i
                    data-feather="external-link"></i></a>
        </li>
        <li><a href="{{ route('viewFactura', $facturaId) }}" data-container="body" data-bs-toggle="popover" data-placement="top"
                title="" data-original-title="Learning"><i data-feather="eye"></i></a>
            </li>
            <li><a href="{{ route('expedienteFactura', $facturaId) }}" data-container="body" data-bs-toggle="popover" data-placement="top"
                    title="" data-original-title="Learning"><i data-feather="file-text"></i></a>
            </li>
        <li><a href="{{ route('pdf.factura', [$factura->id, 'download' => true]) }}" target="_blank"  title=""
                data-original-title="Learning"><i data-feather="download-cloud"></i></a>
        </li>
        <li><a href="" data-container="body" data-bs-toggle="popover" data-placement="top" title=""
                data-original-title="Learning"><i data-feather="trash-2"></i></a>
        </li>
        <li><a class="btn-modal" href="#" data-container=".view_register"
                data-href="{{ route('anularFactura', [$facturaId]) }}" data-container="body"
                data-bs-toggle="popover" data-placement="top" title="Anular Factura" data-original-title="Learning"><i data-feather="minus-square"></i></a>
        </li>
    </ul>
</div>
