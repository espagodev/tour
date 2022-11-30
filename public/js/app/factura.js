$(document).ready(function () {
 
    if ($("#reportrange").length == 1) {
        $("#reportrange").daterangepicker(dateRangeSettings, function(start,end) {
            $("#reportrange span").val(start.format(moment_date_format) + " ~ " +  end.format(moment_date_format));            
            listado_facturas.ajax.reload();            
        });

        $("#reportrange").on("cancel.daterangepicker", function(ev,picker) {
            $("#reportrange").val("");            
            listado_facturas.ajax.reload();

        });

    }

    $("#listado_facturas,  #carpeta_id, #forma_pago_id, #mayorista_id").change(function () {
        listado_facturas.ajax.reload();
    });


    // listado de resultados
    listado_facturas = $("#listado_facturas").DataTable({
        processing: true,
        serverSide: true,
        aaSorting: false,
        searching: false,
        ajax: {
            url: "/facturas/getListadoFacturas",
            dataType: "json",
            data: function (d) {
                // d.forma_pago_id = $('select#forma_pago_id').val();
                d.mayorista_id  = $('select#mayorista_id').val();
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
                data: "fac_numero",
                name: "fac_numero",
                orderable: false,
                searchable: false,
            },
            {
                data: "may_nombre",
                name: "may_nombre",
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
                data: "agd_telefono",
                name: "agd_telefono",
                orderable: false,
                searchable: false,
            },
            {
                data: "fecha",
                name: "fecha",
                orderable: false,
                searchable: false,
            },
            {
                data: "est_nombre",
                name: "est_nombre",
                orderable: false,
                searchable: false,
            },
            {
                data: "fop_nombre",
                name: "fop_nombre",
                orderable: false,
                searchable: false,
            },
            {
                data: "fac_total",
                name: "fac_total",
                orderable: false,
                searchable: false,
            },
            {
                data: "fac_total_pagado",
                name: "fac_total_pagado",
                orderable: false,
                searchable: false,
            },
            {
                data: "fac_total_pendiente",
                name: "fac_total_pendiente",
                orderable: false,
                searchable: false,
            },
           

           
            { data: "action", name: "action" },
        ],
        fnDrawCallback: function (oSettings) {
            __currency_convert_recursively($("#listado_facturas"));
        },
       
    });

   

});


// $(document).ready(function() {
//     $("#agenda_id").select2({
//       dropdownParent: $("#nuevaFactura")
//     });
//   });


function selectAgenda(){
    $("select#agenda_id").select2({
        placeholder: "Seleccione un Cliente",
        ajax: {
            url: "/agenda/getAgenda",
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                };
            },
            processResults: function (data) {
                return {
                    results: data,
                };
            },
        },
            templateResult: function (data) {
   
                var template = "";
              
                template += data.text + " " + data.agd_apellidos + "<br>" + 'Telefono' + " " + data.agd_telefono;

                return template;
            },
            minimumInputLength: 1,
            language: {
                noResults: function() {
                    var name = $('#agenda_id')
                        .data('select2')
                        .dropdown.$search.val();
                    return (
                        '<button type="button" data-name="' +
                        name +
                        '" class="btn btn-link agregar_nuevo_cliente"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>&nbsp; ' +
                         'Agregar Nuevo Cliente' +
                        '</button>'
                    );
                },
            },
            escapeMarkup: function (markup) {
                return markup;
            },
        
    });
}