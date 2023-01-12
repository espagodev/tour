<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reportes de Ventas</title>
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
        <h2 class="heading text-center">Reporte de Ventas</h2>

        <table width="100%" >
            <tbody>
                @foreach ($facturas as $factura)
                    <tr class="text-xs">
                        <td>
                            @if ($factura->fac_tipo_documento == '1')
                                {{ $factura->fac_numero }}
                            @elseif ($factura->fac_tipo_documento == '2')
                                {{ $factura->fac_recibo }}
                            @else
                                {{ $factura->fac_nota_credito }}
                            @endif
                        </td>
                        <td>{{ !empty($factura->est_nombre) ? $factura->est_nombre : '--'}}</td>
                        <td>{{ !empty($factura->fop_nombre) ? $factura->fop_nombre : '--' }}</td>
                        <td>{{ !empty($factura->fac_total) ? $factura->fac_total : '--'}}</td>
                        <td>{{ !empty($factura->fac_total_pagado) ? $factura->fac_total_pagado : '--'}}</td>
                        <td>{{ !empty($factura->fac_total_pendiente) ? $factura->fac_total_pendiente : '--'}}</td>
                        <td>{{ !empty($factura->fecha) ? $factura->fecha : '--'}}</td>

                    </tr>
                @endforeach
            </tbody>
            <tfoot class="border-top">
                {{-- <tr>
                    <td colspan="3"></td>
                    <td align="right">
                        {{ __('messages.total_sales') }}: {!! money($totalAmount, $company->currency->short_code)->format() !!}
                    </td>
                </tr> --}}
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
