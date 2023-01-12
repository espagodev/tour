<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reportes de Movimientos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }

        * {
            font-family: Verdana, Arial, sans-serif;
            color: #040405;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: large;
        }

        tfoot tr {
            padding: 10px;
        }

        .invoice table {
            margin: 15px;
        }

        .invoice h3 {
            margin-left: 15px;
        }

        .information {
            border-bottom: 1px solid #dddddd;
            border-top: 1px solid #dddddd;
        }

        .information h2 {
            text-align: center;
            font-size: large;
        }

        .information h3 {
            font-weight: normal;
        }

        .information .logo {
            margin: 5px;
        }

        .information table {
            padding: 10px;
        }

        .heading {
            color: #595959;
            margin: 0px;
        }

        .text-sm {
            font-size: x-small;
        }

        .text-center {
            text-align: center;
        }

        .border-top {
            border-top: 1px solid #dddddd;
        }
    </style>
</head>

<body>
    <div class="information">
        <table class="text-sm" width="100%">
            <tr>
                <td align="left" style="width: 40%;">
                    {{-- @if (get_company_setting('avatar', $company->id))  --}}
                    <img style="max-height: 100px; width: auto;" src="data:image/png;base64,{{ $logo }}">
                    {{-- @else
                        <h1>{{ $company->name }}</h1>
                    @endif --}}
                    {{-- <h1>prueba</h1> --}}
                </td>

                <td align="right" style="width: 40%;">
                    <h3>Fecha desde:</h3>
                    <h3>Fecha hasta:</h3>

                </td>
            </tr>
        </table>
    </div>

    <br />

    <div class="invoice">
        <h2 class="heading text-center">Reporte de Movimientos</h2>

        <table width="100%" >
            <tbody>
                @foreach ($movimientos as $movimiento)
                    <tr class="text-xs">
                        <td>{{ !empty($movimiento->moc_numero) ? $movimiento->moc_numero : '--' }}</td>
                        <td>
                            @if ($movimiento->fac_tipo_documento == '1')
                                {{ $movimiento->fac_numero }}
                            @elseif ($movimiento->fac_tipo_documento == '2')
                                {{ $movimiento->fac_recibo }}
                            @else
                                {{ $movimiento->fac_nota_credito }}
                            @endif
                        </td>
                        <td>{{ !empty($movimiento->moc_fecha) ? $movimiento->moc_fecha : '--'}}</td>
                        <td>{{ !empty($movimiento->moc_monto) ? $movimiento->moc_monto : '--'}}</td>
                        <td>{{ !empty($movimiento->cat_nombre) ? $movimiento->cat_nombre : '--'}}</td>
                        <td>{{ !empty($movimiento->subc_nombre) ? $movimiento->subc_nombre : '--'}}</td>
                        <td>{{ !empty($movimiento->fop_nombre) ? $movimiento->fop_nombre : '--'}}</td>

                    </tr>
                @endforeach
            </tbody>
            <tfoot class="border-top text-sm">
                <tr>
                    <td colspan="4"></td>
                    <td>
                       Total Efectivo
                    </td>
                    <td>
                        00
                     </td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td>
                        Total Tarjeta Credito
                    </td>
                    <td>
                        00
                     </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="information" style="position: absolute; bottom: 0;">
        <table width="100%" class="text-sm">
            {{-- @if ($company->subscription('main')->getFeatureValue('advertisement_on_mails') === '1') --}}
            <tr>
                <td class="text-xs" align="left" style="width: 50%;">
                    {{-- {{ __('messages.pdf_footer_left', ['app_name' => get_system_setting('application_name')]) }} --}}
                    Sistema de Contabilidad Interna
                </td>
                <td class="text-xs" align="right" style="width: 50%;">
                    Reporte de Ventas
                </td>
            </tr>
            {{-- @endif --}}
        </table>
    </div>
</body>

</html>
