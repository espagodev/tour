$(document).ready(function () {

    if ($("#reportrange").length == 1) {
        $("#reportrange").daterangepicker(dateRangeSettings, function(start,end) {
            $("#reportrange span").val(start.format(moment_date_format) + " ~ " +  end.format(moment_date_format));            
            billete_plazos.ajax.reload();   
            getSaldos()         
        });

        $("#reportrange").on("cancel.daterangepicker", function(ev,picker) {
            $("#reportrange").val("");            
            billete_plazos.ajax.reload();
            getSaldos()
        });
        getSaldos()
    }
 
    $("#billete_plazos,  #mayorista_id, #localizador").change(function () {
        billete_plazos.ajax.reload();
        getSaldos()
    });

    
        // listado de resultados
        billete_plazos = $("#billete_plazos").DataTable({
            processing: true,
            serverSide: true,
            aaSorting: false,
            searching: false,
            ajax: {
                url: "/billetes_plazo/getListadoBilletePlazos",
                dataType: "json",
                data: function (d) {
                    d.mayorista_id = $("select#mayorista_id").val();                  
                    d.localizador = $("#localizador").val();

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
                    data: "fac_nota_credito",
                    name: "fac_nota_credito",
                    orderable: false,
                    searchable: false,
                },
                {
                    data: "bilp_localizador",
                    name: "bilp_localizador",
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
                    data: "bilp_precio_total",
                    name: "bilp_precio_total",
                    orderable: false,
                    searchable: false,
                },
                {
                    data: "fecha",
                    name: "fecha",
                    orderable: false,
                    searchable: false,
                },
                // {
                //     data: "cat_nombre",
                //     name: "cat_nombre",
                //     orderable: false,
                //     searchable: false,
                // },
                {
                    data: "may_nombre",
                    name: "may_nombre",
                    orderable: false,
                    searchable: false,
                },
              
                {
                    data: "bilp_saldo_cliente",
                    name: "bilp_saldo_cliente",
                    orderable: false,
                    searchable: false,
                },
                {
                    data: "bilp_saldo_proveedor",
                    name: "bilp_saldo_proveedor",
                    orderable: false,
                    searchable: false,
                },
                {
                    data: "fee",
                    name: "fee",
                    orderable: false,
                    searchable: false,
                },

               
                { data: "action", name: "action" },
            ],
            fnDrawCallback: function (oSettings) {
                __currency_convert_recursively($("#billete_plazos"));
            },
           
        });

});


function getSaldos() {

    var start = $("#reportrange")
        .data("daterangepicker")
        .startDate.format("YYYY-MM-DD");
    var end = $("#reportrange")
        .data("daterangepicker")
        .endDate.format("YYYY-MM-DD");

        var mayorista_id = $("select#mayorista_id").val();
        var localizador = $("#localizador").val();

    var data = { start_date: start, end_date: end, localizador: localizador,   mayorista_id: mayorista_id };


    var loader =
        '<div class ="text-center"><div class ="spinner-border"><span class="sr-only">...Cargando</span></div></div>';

    $(".saldoCliente").html(loader); 
    $(".saldoProveedor").html(loader);
    $(".totalFee").html(loader);


    $.ajax({
        method: "get",
        url: "/billetes_plazo/getBilletePlazosSaldos",
        dataType: "json",
        data: data,
        success: function (data) {
            $(".saldoCliente").html(data.saldoCliente);
            $(".saldoProveedor").html(data.saldoProveedor);
            $(".totalFee").html(data.totalFee);
           
        },
    });
}

