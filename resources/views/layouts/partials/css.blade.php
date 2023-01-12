<link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css')}}">
<!-- ico-font-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/icofont.css')}}">
<!-- Themify icon-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify.css')}}">
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/flag-icon.css')}}">
<!-- Feather icon-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/feather-icon.css')}}">
<!-- Plugins css start-->
<link rel="stylesheet" type="text/css" href="{{asset('css/prueba.css')}}">
@stack('css')
<!-- Plugins css Ends-->
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/daterange-picker.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/date-picker.css')}}">

<link rel="stylesheet" type="text/css" href="{{ asset('css/ticket.css') }}">

<!-- App css-->

{{-- <link id="color" rel="stylesheet" href="{{asset('assets/css/color-1.css')}}" media="screen"> --}}
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">


<!-- Data Tables -->
<link rel="stylesheet" href="{{ asset('assets/js/datatables/dataTables.bs4.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/js/datatables/dataTables.bs4-custom.css') }}" />
<link href="{{ asset('assets/js/datatables/buttons.bs.css" rel="stylesheet') }}" />

<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<style>
    .kbw-signature {
        width: 100%;
        height: 200px;
    }

    #sig canvas {
        width: 100% !important;
        height: auto;
    }
</style>

@yield('css')