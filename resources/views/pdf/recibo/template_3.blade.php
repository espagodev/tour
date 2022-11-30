
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    @include('pdf/_style')
</head>
<body>
    <div class="information border-bottom">
        <table class="text-sm" width="100%">
            <tr>
                <td align="left" style="width: 40%;">

                    {{-- <img height="30px" src="data:image/png;base64,{{ $logo_base }}"> --}}
                    <img style="max-height: 100px; width: auto;" src="data:image/png;base64,{{ $logo_base }}">
                        {{-- <img height="30" src="{{ $invoice->company->avatar }}" alt="{{ $invoice->company->name }}"> --}}
                    {{-- @else --}}
                        {{-- <h1 class="m-0" style="color: {{$invoice->company->getSetting('invoice_color')}}">{{$invoice->company->name}}</h1> --}}
                    {{-- @endif --}}
                </td>
                <td align="right" style="width: 40%;">
                    <span class="address address-margin text-sm">
                        <p class="mb-0"><strong>{{$empresa->aje_nombre}}</strong></p>
                        <p class="mb-0">{{$empresa->aje_direccion}}</p>
                        <p class="mb-0">{{$empresa->aje_provincia}}, {{$empresa->aje_municipio}}</p>
                        <p class="mb-0">{{$empresa->aje_pais}}</p>
                        <p class="mb-0">{{$empresa->aje_telefono}}</p>
                        <p class="mb-0">CODIGO: {{$empresa->aje_codigo_turismo}}</p>
                    </span>
                </td>
            </tr>
        </table>
    </div>

    <div class="invoice">
        <div class="grid">
            <div class="col">
                <span class="address text-sm">
                    <p class="mb-0"><strong>{{ $factura->full_name_agenda }}</strong></p>
                    <p class="mb-0">{{ $factura->documento }}</p>
                    <p class="mb-0">{{ $factura->agd_direccion }}</p>  
                    <p class="mb-0">{{ $factura->agd_telefono }}</p>
                    <p class="mb-0">{{ $factura->agd_email }}</p>
                </span>
            </div>
           
            <div class="col">
                <h4>Factura</h4>
                <h5 class="text-sm">Factura: <span class="fw-normal">{{$factura->fac_recibo}}</span></h5>
                <h5 class="text-sm">Fecha Factura : <span class="fw-normal">{{$factura->created_at}}</span></h5>
                <h5 class="text-sm">Fecha Vencimiento: <span class="fw-normal">{{$factura->created_at}}</span></h5>
                <h5 class="text-sm">Atendido Por: <span class="fw-normal">{{$factura->full_name_agente }}</span></h5>
                <h5 class="text-sm">Forma de Pago: <span class="fw-normal">{{$factura->fop_nombre }}</span></h5>

               
            </div>
        </div>

        <br />

        <div class="grid">
            <div class="col">
                @include('pdf.factura._table')       
            </div>
        </div>

       
           
        
    </div>

    <div class="information" style="position: absolute; bottom: 50;">
        <div class="grid">
            <div class="col text-xs">
                <h3 class="m-0 text-color-gray">Notas</h3>
                {{ $factura->obs_observacion }}
            </div>
        </div>
            <div class="text-xs m-5">
                El aquí firmante declara, bajo su responsabilidad que los datos consignados constituyen declaración a efectos de lo previsto en el Ministerio de Turismo sobre viajes nacionales, internacionales y europeos, quedando advertido que la falta de veracidad en los mismos puede ser constitutiva de infracción.

            </div>

            
        <table width="100%" class="text-sm border-top">
           
                <tr>

                    <td class="text-xs" align="center" style="width: 50%;">
                        <img style="max-height: 100px; width: auto;" src="data:image/png;base64,{{ $firma }}"><br>
                        {{ $factura->full_name_agenda }}
                    </td>
                    <td class="text-xs" align="center" style="width: 50%;">
                        <img style="max-height: 100px; width: auto;" src="data:image/png;base64,{{ $firma_agente }}"><br>
                       {{ $empresa->aje_nombre }}
                    </td>
                </tr>
           
        </table>
    </div>
</body>
</html>

