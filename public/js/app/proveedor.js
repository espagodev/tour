$(document).ready(function () {


    $("#listado_proveedor,  #categoria_id").change(function () {
        listado_proveedor.ajax.reload();
    });


    // listado de resultados
    listado_proveedor = $("#listado_proveedor").DataTable({
        processing: true,
        serverSide: true,
        aaSorting: false,
        searching: false,
        ajax: {
            url: "/proveedor/getListadoProveedor",
            dataType: "json",
            data: function (d) {
                // d.categoria_id = $("select#categoria_id").val();
            },
        },
        columns: [
            {
                data: "pro_imagen",
                name: "pro_imagen",
                orderable: false,
                searchable: false,
            },
            {
                data: "pro_nombre",
                name: "pro_nombre",
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
                data: "pro_usuario",
                name: "pro_usuario",
                orderable: false,
                searchable: false,
            },
            {
                data: "pro_password",
                name: "pro_password",
                orderable: false,
                searchable: false,
            },
            {
                data: "pro_estado",
                name: "pro_estado",
                orderable: false,
                searchable: false,
            },
           
            { data: "action", name: "action",orderable: false,
            searchable: false, },
        ],
       
    });
});