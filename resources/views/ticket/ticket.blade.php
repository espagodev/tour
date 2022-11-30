<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
   

    <style>
        @media print {
            .page-break {
                display: block;
                page-break-before: always;
            }
        }

        #invoice-POS {
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
            padding: 2mm;
            margin: 0 auto;
            width: 44mm;
            background: #FFF;
        }

        #invoice-POS ::selection {
            background: #f31544;
            color: #FFF;
        }

        #invoice-POS ::moz-selection {
            background: #f31544;
            color: #FFF;
        }

        #invoice-POS h1 {
            font-size: 1.5em;
            color: #222;
        }

        #invoice-POS h2 {
            font-size: .9em;
        }

        #invoice-POS h3 {
            font-size: 1.0em;
            font-weight: 300;
            line-height: 2em;
        }

        #invoice-POS p {
            font-size: .7em;
            color: #666;
            line-height: 1.2em;
        }

        #invoice-POS #top,
        #invoice-POS #mid,
        #invoice-POS #bot {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
        }

        #invoice-POS #top {
            min-height: 100px;
        }

        #invoice-POS #mid {
            min-height: 80px;
        }

        #invoice-POS #bot {
            min-height: 50px;
        }

        #invoice-POS #top .logo {
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
            background-size: 60px 60px;
        }

        #invoice-POS .clientlogo {
            float: left;
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }

        #invoice-POS .info {
            display: block;
            margin-left: 0;
        }

        #invoice-POS .title {
            float: right;
        }

        #invoice-POS .title p {
            text-align: right;
        }

        #invoice-POS table {
            width: 100%;
            border-collapse: collapse;
        }

        #invoice-POS .tabletitle {
            font-size: .8em;
            background: #EEE;
        }

        #invoice-POS .service {
            border-bottom: 1px solid #EEE;
        }

        #invoice-POS .item {
            width: 24mm;
        }

        #invoice-POS .itemtext {
            font-size: .5em;
        }

        #invoice-POS #legalcopy {
            margin-top: 5mm;
        }
    </style>

</head>

<body translate="no">


    <div id="invoice-POS">

        <div id="top">
            {{-- <div class="logo"></div> --}}
            <div class="info">
                <h2>{{ $empresa->aje_nombre }}</h2>
            </div>
            <!--End Info-->
        </div>
        <!--End InvoiceTop-->

        <div id="mid">
            <div class="info">
               
                <p>
                    {{ $empresa->aje_direccion }}</br>
                    Telefono : {{ $empresa->aje_telefono }}</br>
                    Codgio Turismo : {{ $empresa->aje_codigo_turismo }}</br>
                </p>
            </div>
            <div class="info">
                <h2>Contacto Cliente</h2>
                <p>
                    {{ $abono->full_name_agenda }}</br>
                    Telefono : {{ $abono->agd_telefono }}</br>
                    Email : {{ $abono->agd_email }}</br>
                </p>
            </div>
            <div class="info">
                <h2>Datos Factura</h2>
                <p>
                    Billete a Plazo : {{ $abono->fac_nota_credito }}</br>
                    Fecha : JohnDoe@gmail.com</br>
                    Vencimiento : 555-555-5555</br>
                </p>
            </div>
            <div class="info">
                <h2>Datos Abono</h2>
                <p>
                    Abono : {{ $abono->moc_numero }}</br>
                    Fecha : {{ $abono->moc_fecha }}</br>                  
                </p>
            </div>
        </div>
        <!--End Invoice Mid-->

        <div id="bot">

            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="item">
                            <h2>Descripcion</h2>
                        </td>           
                        <td></td>            
                        <td class="Rate">
                            <h2>Total</h2>
                        </td>
                    </tr>

                    <tr class="service">
                        <td colspan="2" class="tableitem">
                            <p class="itemtext">{{ $abono->moc_descripcion }}</p>
                        </td>              
                             
                        <td  class="tableitem">
                            <p class="itemtext">@format_currency( $abono->moc_monto )</p>
                        </td>
                    </tr>




                    <tr class="tabletitle">
                       
                        <td class="Rate">
                            <h2>Saldo</h2>
                        </td>
                        <td colspan="2" class="payment">
                            <h2>@format_currency( $abono->fac_total_pendiente)</h2>
                        </td>
                    </tr>
                    <tr class="tabletitle">
                       
                        <td class="Rate">
                            <h2>Abonado</h2>
                        </td>
                        <td colspan="2" class="payment">
                            <h2>@format_currency( $abono->fac_total_pagado )</h2>
                        </td>
                    </tr>
                    <tr class="tabletitle">
                        
                        <td class="Rate">
                            <h2>Total</h2>
                        </td>
                        
                        <td colspan="2" class="payment">
                            <h2>@format_currency( $abono->fac_total )</h2>
                        </td>
                    </tr>

                </table>
            </div>
            <!--End Table-->

            {{-- <div id="legalcopy">
                <p class="legal"><strong>Thank you for your business!</strong> Payment is expected within 31 days;
                    please process this invoice within that time. There will be a 5% interest charge per month on late
                    invoices.
                </p>
            </div> --}}

        </div>
        <!--End InvoiceBot-->
    </div>
    <!--End Invoice-->

</body>
</html>
