$(document).ready(function () {


    $("#listado_impuestos").change(function () {
        listado_impuestos.ajax.reload();
    });


    // listado de resultados
    listado_impuestos = $("#listado_impuestos").DataTable({
        processing: true,
        serverSide: true,
        aaSorting: false,
        searching: false,
        ajax: {
            url: "/impuestos/getListadoImpuestos",
            dataType: "json",
            data: function (d) {
                // d.categoria_id = $("select#categoria_id").val();
            },
        },
        columns: [
            {
                data: "imp_nombre",
                name: "imp_nombre",
                orderable: false,
                searchable: false,
            },
            {
                data: "imp_valor",
                name: "imp_valor",
                orderable: false,
                searchable: false,
            },
           
           
            { data: "action", name: "action",
            orderable: false,
            searchable: false, },
        ],
       
    });
});