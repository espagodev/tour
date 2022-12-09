@php
    $whitelist = ['127.0.0.1', '::1'];
@endphp
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities. laravel/framework: ^8.40">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('uploads/ajustes/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('uploads/ajustes/favicon.png')}}" type="image/x-icon">
    <title>@yield('title')</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    @includeIf('layouts.partials.css')
  </head>
  <body>
    @if(in_array($_SERVER['REMOTE_ADDR'], $whitelist))
    <input type="hidden" id="__is_localhost" value="true">
@endif
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      @includeIf('layouts.partials.header')
      <!-- Page Header Ends -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        @includeIf('layouts.partials.sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <!-- Agregar campo relacionado con la moneda-->
           <!-- Agregar campo relacionado con la moneda-->
           <input type="hidden" id="__code" value="{{session('divisa.code')}}">
           <input type="hidden" id="__symbol" value="{{session('divisa.symbol')}}">
           <input type="hidden" id="__thousand" value="{{session('divisa.thousand_separator')}}">
           <input type="hidden" id="__decimal" value="{{session('divisa.decimal_separator')}}">
           <input type="hidden" id="__symbol_placement" value="{{session('empresa.symbol_placement')}}">
           <input type="hidden" id="__precision" value="{{config('constants.currency_precision', 2)}}">
           <input type="hidden" id="__quantity_precision" value="{{config('constants.quantity_precision', 2)}}">
           <!-- Fin del campo relacionado con la moneda-->


          <!-- Container-fluid starts-->
          @yield('content')
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        @include('layouts.partials.footer')
      </div>
    </div>
    <div class="modal fade view_factura_modal no-print" tabindex="-1" role="dialog"  aria-labelledby="myLargeModalLabel">
    </div>
    <div class="modal fade view_register" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    </div>
    <div class="modal fade view_register_factura"   role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    </div>
    <div class="modal fade view_register_billete_plazos"   role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    </div>
    <div class="modal fade view_register_recibo"   role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    </div>
    <div class="modal fade view_register_gasto"   role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    </div>
    <div class="modal fade view_register_abono no-print"  role="dialog"  aria-labelledby="myLargeModalLabel">
    </div>
    <div class="modal fade view_register_ingreso no-print"  role="dialog"  aria-labelledby="myLargeModalLabel">
    </div>
    <!-- latest jquery-->
    <script type="text/javascript">
        // localStorage.clear();
        var div = document.querySelector("div.page-wrapper")
        if(div.classList.contains('compact-sidebar')){
            div.classList.remove("compact-sidebar");
        }
        if(div.classList.contains('modern-sidebar')){
            div.classList.remove("modern-sidebar");
        }
        localStorage.setItem('page-wrapper', 'page-wrapper compact-wrapper');
        localStorage.setItem('page-body-wrapper', 'sidebar-icon');    
    </script>

    @include('layouts.partials.js')
  
  </body>
</html>