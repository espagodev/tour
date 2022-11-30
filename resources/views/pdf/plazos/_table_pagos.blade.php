<table width="100%" class="text-sm">
    <thead>
        <tr>
            <th class="text-left">#</th>
            <th class="text-left">Monto</th>
            <th class="text-left">Fecha</th>
            <th class="text-left">Descripcion</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($pagos as $pago)
        <tr>
            <td>{{ $pago->moc_numero }}</td>
            <td>@format_currency($pago->moc_monto )</td>
            <td>{{ $pago->moc_fecha }}</td>
            <td>{{ $pago->moc_descripcion }}</td>
        </tr>
        @endforeach

    </tbody>

</table>
