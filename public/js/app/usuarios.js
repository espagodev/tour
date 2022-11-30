$(document).ready(function () {


    $("#listado_usuarios").change(function () {
        listado_usuarios.ajax.reload();
    });


    // listado de resultados
    listado_usuarios = $("#listado_usuarios").DataTable({
        processing: true,
        serverSide: true,
        aaSorting: false,
        searching: false,
        ajax: {
            url: "/usuarios/getListadoUsuarios",
            dataType: "json",
            data: function (d) {
               
            },
        },
        columns: [
            
            {
                data: "nombres",
                name: "nombres",
                orderable: false,
                searchable: false,
            },
            {
                data: "apellidos",
                name: "apellidos",
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
                data: "email",
                name: "email",
                orderable: false,
                searchable: false,
            },
           
            { data: "action", name: "action",
            orderable: false,
            searchable: false, },
        ],
       
    });
});