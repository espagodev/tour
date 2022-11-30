$(document).ready(function () {



    $(".fecha").datepicker({
        
        today: "Hoy",
        clear: "",
        close: "Cancelar",
        min: -4,
        max: 0,
    });    

        //Configuración predeterminada para select2
        $.fn.select2.defaults.set('minimumResultsForSearch', 6);
        if ($('html').attr('dir') == 'rtl') {
            $.fn.select2.defaults.set('dir', 'rtl');
        }
        // $.fn.datepicker.defaults.todayHighlight = true;
        // $.fn.datepicker.defaults.autoclose = true;
        // $.fn.datepicker.defaults.format = datepicker_date_format;

        //Configuración predeterminada para el validador jQuery
        // jQuery.validator.setDefaults({
        //     errorPlacement: function(error, element) {
        //         if (element.hasClass('select2') && element.parent().hasClass('input-group')) {
        //             error.insertAfter(element.parent());
        //         } else if (element.hasClass('select2')) {
        //             error.insertAfter(element.next('span.select2-container'));
        //         } else if (element.parent().hasClass('input-group')) {
        //             error.insertAfter(element.parent());
        //         } else if (element.parent().hasClass('multi-input')) {
        //             error.insertAfter(element.closest('.multi-input'));
        //         } else if (element.parent().hasClass('input_inline')) {
        //             error.insertAfter(element.parent());
        //         } else {
        //             error.insertAfter(element);
        //         }
        //     },
    
        //     invalidHandler: function() {
        //         toastr.error(LANG.some_error_in_input_field);
        //     },
        // });


        //Establecer la moneda global que se utilizará en la aplicación

        __currency_symbol = $("input#__symbol").val();
        __currency_thousand_separator = $("input#__thousand").val();
        __currency_decimal_separator = $("input#__decimal").val();
        __currency_symbol_placement = $("input#__symbol_placement").val();
        if ($("input#__precision").length > 0) {
            __currency_precision = $("input#__precision").val();
        } else {
            __currency_precision = 2;
        }
    
        if ($("input#__quantity_precision").length > 0) {
            __quantity_precision = $("input#__quantity_precision").val();
        } else {
            __quantity_precision = 2;
        }
    
        //Establezca la moneda de nivel de página que se utilizará para algunas páginas. (Página de compra)
        if ($("input#p_symbol").length > 0) {
            __p_currency_symbol = $("input#p_symbol").val();
            __p_currency_thousand_separator = $("input#p_thousand").val();
            __p_currency_decimal_separator = $("input#p_decimal").val();
        }
    
        __currency_convert_recursively($(document), $("input#p_symbol").length);


    jQuery.extend($.fn.dataTable.defaults, {
        fixedHeader: true,
        dom: '<"row margin-bottom-20 text-center"<"col-sm-2"l><"col-sm-7"B><"col-sm-3"f> r>tip',
        // buttons: buttons,
        aLengthMenu: [
            [25, 50, 100, 200, 500, 1000, -1],
            [25, 50, 100, 200, 500, 1000, "Todas"],
        ],
        // iDisplayLength: __datos_pagina_predeterminado,
        iDisplayLength: 25,
        language: {
            searchPlaceholder: "Buscar...",
            search: "",
            lengthMenu: "Mostrando" + " _MENU_ " + "Entradas",
            emptyTable: "No hay datos disponibles para mostrar",
            info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            infoEmpty: "Mostrando 0 a 0 de 0 entradas",
            loadingRecords: "Cargando...",
            processing: "Processando...",
            zeroRecords: "Mostrando 0 a 0 de 0 entradas",
            paginate: {
                first: "Primero",
                last: "Ultimo",
                next: "Siguiente",
                previous: "Anterior",
            },
        },
    });




});

//Verifique la cadena de números en el campo de entrada, si el decimal de datos es 0, entonces no permita el símbolo decimal
$(document).on('keypress', 'input.input_number', function(event) {
    var is_decimal = $(this).data('decimal');

    if (is_decimal == 0) {
        if (__currency_decimal_separator == '.') {
            var regex = new RegExp(/^[0-9,-]+$/);
        } else {
            var regex = new RegExp(/^[0-9.-]+$/);
        }
    } else {
        var regex = new RegExp(/^[0-9.,-]+$/);
    }

    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});


//Configuración predeterminada para daterangePicker
var ranges = {};
ranges["Hoy"] = [moment(), moment()];
ranges["Ayer"] = [moment().subtract(1, "days"), moment().subtract(1, "days")];
ranges["Los últimos 7 días"] = [moment().subtract(6, "days"), moment()];
ranges["Últimos 30 días"] = [moment().subtract(29, "days"), moment()];
ranges["Este mes"] = [moment().startOf("month"), moment().endOf("month")];
ranges["El mes pasado"] = [
    moment().subtract(1, "month").startOf("month"),
    moment().subtract(1, "month").endOf("month"),
];
ranges["Este año"] = [moment().startOf("year"), moment().endOf("year")];

var dateRangeSettings = {
    ranges: ranges,
    startDate: moment().subtract(29, "days"),
    endDate:  moment(),
    locale: {
        cancelLabel: "Borrar",
        applyLabel: "Aplicar",
        customRangeLabel: "Rango personalizado",
        format: moment_date_format,
        toLabel: "~",
    },
};
