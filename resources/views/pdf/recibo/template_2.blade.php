
<!DOCTYPE html>
<html class="no-js" lang="es">

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="ThemeMarch">
  <!-- Site Title -->
  <title>General Invoice</title>
  {{-- <link rel="stylesheet" href="{{ asset('css/invoice.css') }}"> --}}
  @include('pdf/_invoice')
</head>

<body>
  <div class="cs-container">
    <div class="cs-invoice cs-style1">
      <div class="cs-invoice_in" id="download_section">
        <div class="cs-invoice_head cs-type1 cs-mb25">
          <div class="cs-invoice_left">
            <p class="cs-invoice_number cs-primary_color cs-mb5 cs-f16"><b class="cs-primary_color">Factura No:</b> {{$factura->fac_recibo}}</p>
            <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Fecha: </b>{{ $factura->fac_fecha }}</p>
          </div>
          <div class="cs-invoice_right cs-text_right">
            <div class="cs-logo cs-mb5"><img src="assets/img/logo.svg" alt="Logo"></div>
          </div>
        </div>
        <div class="cs-invoice_head cs-mb10">
          <div class="cs-invoice_left">
            <b class="cs-primary_color">Factura a:</b>
            <p>
              Jennifer Richards <br>
              365 Bloor Street East, Toronto, <br>Ontario, M4W 3L4, <br>
              Canada
            </p>
          </div>
          <div class="cs-invoice_right cs-text_right">
            <b class="cs-primary_color">Pagar a:</b>
            <p>
                {{$empresa->aje_nombre}}<br>
                {{$empresa->aje_direccion}}<br>
                {{$empresa->aje_provincia}}, {{$empresa->aje_municipio}}<br>
                {{$empresa->aje_pais}}<br>
                {{$empresa->aje_telefono}}<br>
                CODIGO: {{$empresa->aje_codigo_turismo}}
            </p>
          </div>
        </div>
        <div class="cs-table cs-style1">
          <div class="cs-round_border">
            <div class="cs-table_responsive">
              <table>
                <thead>
                  <tr>
                    <th class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Item</th>
                    <th class="cs-width_4 cs-semi_bold cs-primary_color cs-focus_bg">Description</th>
                    <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">Qty</th>
                    <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Price</th>
                    <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg cs-text_right">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="cs-width_3">App Development</td>
                    <td class="cs-width_4">Mobile & Ios Application Development</td>
                    <td class="cs-width_2">2</td>
                    <td class="cs-width_1">$460</td>
                    <td class="cs-width_2 cs-text_right">$920</td>
                  </tr>
                  <tr>
                    <td class="cs-width_3">Ui/UX Design</td>
                    <td class="cs-width_4">Mobile & Ios Mobile App Design, Product Design</td>
                    <td class="cs-width_2">1</td>
                    <td class="cs-width_1">$220</td>
                    <td class="cs-width_2 cs-text_right">$220</td>
                  </tr>
                  <tr>
                    <td class="cs-width_3">Web Design</td>
                    <td class="cs-width_4">Web Design & Development</td>
                    <td class="cs-width_2">2</td>
                    <td class="cs-width_1">$120</td>
                    <td class="cs-width_2 cs-text_right">#240</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="cs-invoice_footer cs-border_top">
              <div class="cs-left_footer cs-mobile_hide">
                <p class="cs-mb0"><b class="cs-primary_color">Additional Information:</b></p>
                <p class="cs-m0">{{ $factura->obs_observacion }}</p>
              </div>
              <div class="cs-right_footer">
                <table>
                  <tbody>
                    <tr class="cs-border_left">
                      <td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Subtotal</td>
                      <td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">@format_currency($factura->fac_total)</td>
                    </tr>
                    {{-- <tr class="cs-border_left">
                      <td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Tax</td>
                      <td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">-$20</td>
                    </tr> --}}
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="cs-invoice_footer">
            <div class="cs-left_footer cs-mobile_hide"></div>
            <div class="cs-right_footer">
              <table>
                <tbody>
                  <tr class="cs-border_none">
                    <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color">Total</td>
                    <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color cs-text_right">@format_currency($factura->fac_total + $factura->fac_total_fee)</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="cs-note">
          <div class="cs-note_right">
            <p class="cs-mb0"><b class="cs-primary_color cs-bold">Nota:</b></p>
            <p class="cs-m0">El aquí firmante declara, bajo su responsabilidad que los datos consignados constituyen declaración a efectos de lo previsto en el Ministerio de Turismo sobre viajes nacionales, internacionales y europeos, quedando advertido que la falta de veracidad en los mismos puede ser constitutiva de infracción.
            </p>
          </div>
        </div><!-- .cs-note -->
      </div>
     
    </div>
  </div>
</body>
</html>