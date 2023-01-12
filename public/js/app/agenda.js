$(document).ready(function () {


    $("#listado_clientes,  #agd_nombres, #pais_id , #agd_telefono, #agd_documento, #agd_apellidos").change(function () {
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
                d.agd_nombres = $("input#agd_nombres").val();
                d.pais_id = $("select#pais_id").val();
                d.agd_telefono = $("input#agd_telefono").val();
                d.agd_documento = $("input#agd_documento").val();
                d.agd_apellidos = $("input#agd_apellidos").val();
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
                data: "pai_nombre",
                name: "pai_nombre",
                orderable: false,
                searchable: false,
            },
           
            { data: "action", name: "action" },
        ],
       
    });
});