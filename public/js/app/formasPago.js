$(document).ready(function () {


    $("#listado_medios").change(function () {
        listado_medios.ajax.reload();
    });


    // listado de resultados
    listado_medios = $("#listado_medios").DataTable({
        processing: true,
        serverSide: true,
        aaSorting: false,
        searching: false,
        ajax: {
            url: "/formaPago/getListadoFormaPagos",
            dataType: "json",
            data: function (d) {
                // d.categoria_id = $("select#categoria_id").val();
            },
        },
        columns: [
            {
                data: "fop_nombre",
                name: "fop_nombre",
                orderable: false,
                searchable: false,
            },
           
           
           
            { data: "action", name: "action",
            orderable: false,
            searchable: false, },
        ],
       
    });
});