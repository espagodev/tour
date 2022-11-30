$(document).ready(function () {
 
    if ($("#reportrange").length == 1) {
        $("#reportrange").daterangepicker(dateRangeSettings, function(start,end) {
            $("#reportrange span").val(start.format(moment_date_format) + " ~ " +  end.format(moment_date_format));            
            listado_ingresos.ajax.reload();            
        });

        $("#reportrange").on("cancel.daterangepicker", function(ev,picker) {
            $("#reportrange").val("");            
            listado_ingresos.ajax.reload();

        });

    }

    $("#listado_ingresos, #forma_pago_id").change(function () {
        listado_ingresos.ajax.reload();
    });


    //listado de gastos
    listado_ingresos = $("#listado_ingresos").DataTable({ 
        processing: true,
        serverSide: true,
        aaSorting: false,
        searching: false,
        ajax: {
            url: "/ingresos/getListadoIngresos",
            dataType: "json",
            data: function (d) {
                // d.forma_pago_id = $('select#forma_pago_id').val();
                // d.mayorista_id  = $('select#mayorista_id').val();
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
                data: "moc_numero",
                name: "moc_numero",
                orderable: false,
                searchable: false,
            },
            {
                data: "moc_fecha",
                name: "moc_fecha",
                orderable: false,
                searchable: false,
            },
            {
                data: "moc_monto",
                name: "moc_monto",
                orderable: false,
                searchable: false,
            },
            {
                data: "cat_nombre",
                name: "cat_nombre",
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
                data: "fop_nombre",
                name: "fop_nombre",
                orderable: false,
                searchable: false,
            },
                       
            { data: "action",
             name: "action",
            orderable: false,
            searchable: false, },
        ],
        fnDrawCallback: function (oSettings) {
            __currency_convert_recursively($("#listado_ingresos"));
        },
       
    });

   

});

