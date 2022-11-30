$(document).ready(function () {
 
    if ($("#reportrange").length == 1) {
        $("#reportrange").daterangepicker(dateRangeSettings, function(start,end) {
            $("#reportrange span").val(start.format(moment_date_format) + " ~ " +  end.format(moment_date_format));            
            listado_facturas.ajax.reload();            
        });

        $("#reportrange").on("cancel.daterangepicker", function(ev,picker) {
            $("#reportrange").val("");            
            listado_itinerarios.ajax.reload();

        });

    }

    $("#listado_itinerarios,  #carpeta_id, #forma_pago_id, #mayorista_id").change(function () {
        listado_itinerarios.ajax.reload();
    });


    // listado de resultados
    listado_itinerarios = $("#listado_itinerarios").DataTable({
        processing: true,
        serverSide: true,
        aaSorting: false,
        searching: false,
        ajax: {
            url: "/itinerarios/getListadoItinerarios",
            dataType: "json",
            data: function (d) {
                // d.forma_pago_id = $('select#forma_pago_id').val();
                // d.mayorista_id  = $('select#mayorista_id').val();
                d.localizador  = $('#localizador').val();
                var start = '';
                var end = '';
                if ($('input#reportrange').val()) {
                    start = $('input#reportrange')
                        .data('daterangepicker')
                        .startDate.format('YYYY-MM-DD');
                    end = $('input#reportrange')
                        .data('daterangepicker')
                        .endDate.format('YYYY-MM-DD');
                }
                d.start_date = start;
                d.end_date = end;
            },
        },
        columns: [
            {
                data: "pas_localizador",
                name: "pas_localizador",
                orderable: false,
                searchable: false,
            },           
            {
                data: "full_name_agenda",
                name: "full_name_agenda",
                orderable: false,
                searchable: false,
            },
            {
                data: "agd_email",
                name: "agd_email",
                orderable: false,
                searchable: false,
            },
           
            {
                data: "car_nombre",
                name: "car_nombre",
                orderable: false,
                searchable: false,
            },
            {
                data: "subc_nombre",
                name: "subc_nombre",
                orderable: false,
                searchable: false,
            },
            {
                data: "pas_fecha_salidad",
                name: "pas_fecha_salidad",
                orderable: false,
                searchable: false,
            },
            {
                data: "pas_fecha_regreso",
                name: "pas_fecha_regreso",
                orderable: false,
                searchable: false,
            },
            {
                data: "factura_id",
                name: "factura_id",
                orderable: false,
                searchable: false,
            },
           

           
            { data: "action", name: "action" },
        ],
        fnDrawCallback: function (oSettings) {
            __currency_convert_recursively($("#listado_itinerarios"));
        },
       
    });

   

});
