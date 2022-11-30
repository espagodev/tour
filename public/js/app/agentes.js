$(document).ready(function () {


    $("#listado_agentes").change(function () {
        listado_agentes.ajax.reload();
    });


    // listado de resultados
    listado_agentes = $("#listado_agentes").DataTable({
        processing: true,
        serverSide: true,
        aaSorting: false,
        searching: false,
        ajax: {
            url: "/agentes/getListadoAgentes",
            dataType: "json",
            data: function (d) {
                d.carpeta_id = $("select#carpeta_id").val();
            },
        },
        columns: [
            {
                data: "id",
                name: "id",
                orderable: false,
                searchable: false,
            },
            {
                data: "nombres",
                name: "nombres",
                orderable: false,
                searchable: false,
            },
            {
                data: "age_telefono",
                name: "age_telefono",
                orderable: false,
                searchable: false,
            },
            {
                data: "nombres",
                name: "nombres",
                orderable: false,
                searchable: false,
            },
            {
                data: "email",
                name: "email",
                orderable: false,
                searchable: false,
            },
            {
                data: "estado",
                name: "estado",
                orderable: false,
                searchable: false,
            },
            { data: "action", name: "action" },
        ],
       
    });
});