<script type="text/javascript">
    base_path = "{{url('/')}}";

</script>

<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
{{-- <script src="{{asset('assets/js/jquery.min.js')}}"></script> --}}

<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/moment-timezone-with-data.min.js') }}"></script>

{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
{{-- <script type="text/javascript">
   
</script> --}}

@php
    $business_date_format = session('empresa.date_format', config('constants.default_date_format'));
   
    $datepicker_date_format = str_replace('d', 'dd', $business_date_format);
    $datepicker_date_format = str_replace('m', 'mm', $datepicker_date_format);
    $datepicker_date_format = str_replace('Y', 'yyyy', $datepicker_date_format);

    $moment_date_format = str_replace('d', 'DD', $business_date_format);
    $moment_date_format = str_replace('m', 'MM', $moment_date_format);
    $moment_date_format = str_replace('Y', 'YYYY', $moment_date_format);

    $business_time_format = session('empresa.time_zone');


    $moment_time_format = 'HH:mm';
    if($business_time_format == 12){
        $moment_time_format = 'hh:mm A';
    }


    $datos_pagina_predeterminado = 25;

       
    @endphp

<script>
    moment.tz.setDefault('{{ Session::get("empresa.time_zone") }}');
    

    var datepicker_date_format = "{{$datepicker_date_format}}";
    var moment_date_format = "{{$moment_date_format}}";
    var moment_time_format = "{{$moment_time_format}}";

    var app_locale = "{{ config('app.locale') }}";

    var __datos_pagina_predeterminado = "{{$datos_pagina_predeterminado}}";



</script>

<!--**************************  Required JavaScript Files **************************-->
<script src="{{ asset('js/functions.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>

<script src="{{asset('assets/js/accounting.min.js')}}"></script>
<script src="{{asset('assets/js/decimal.min.js')}}"></script>

<script src="{{ asset('js/app.js') }}"></script>
{{-- <script src="{{ asset('assets/js/validate/validate.js') }}"></script> --}}

<!-- feather icon js-->
<script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('assets/js/config.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('assets/js/bootstrap/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
<!-- Plugins JS start-->
{{-- <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script> --}}


<script src="{{ asset('assets/js/datepicker/daterange-picker/daterangepicker.js') }}"></script>
{{-- <script src="{{ asset('assets/js/datepicker/daterange-picker/daterange-picker.custom.js') }}"></script> --}}

<script src="{{ asset('assets/js/datatables/dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables/custom/custom-datatables.js') }}"></script>

<script src="{{asset('assets/js/tooltip-init.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.es.js')}}"></script>
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>

{{-- <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script> --}}
<script src="{{asset('assets/js/select2/select2.js')}}"></script>

<script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>


<!-- Plugins JS start-->
<script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="{{asset('assets/js/theme-customizer/customizer.js')}}"></script>
<!-- Plugin used-->

{{-- modal --}}


<script src="{{ asset('js/modal.js') }}"></script>





@yield('scripts')