$(document).ready(function () {


    $("#listado_clientes,  #carpeta_id").change(function () {
        listado_clientes.ajax.reload();
    });


    // listado de resultados
    listado_clientes = $("#listado_clientes").DataTable({
        processing: true,
        serverSide: true,
        aaSorting: false,
        searching: false,
        ajax: {
            url: "/agenda/getListadoClientes",
            dataType: "json",
            data: function (d) {
                d.carpeta_id = $("select#carpeta_id").val();
            },
        },
        columns: [
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
           
            { data: "action", name: "action" },
        ],
       
    });
});