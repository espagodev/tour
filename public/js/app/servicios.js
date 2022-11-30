$(document).ready(function () {


    $("#listado_servicios,  #categoria_id").change(function () {
        listado_servicios.ajax.reload();
    });


    // listado de resultados
    listado_servicios = $("#listado_servicios").DataTable({
        processing: true,
        serverSide: true,
        aaSorting: false,
        searching: false,
        ajax: {
            url: "/servicios/getListadoServicio",
            dataType: "json",
            data: function (d) {
                // d.categoria_id = $("select#categoria_id").val();
            },
        },
        columns: [
            {
                data: "ser_imagen",
                name: "ser_imagen",
                orderable: false,
                searchable: false,
            },
            {
                data: "ser_nombre",
                name: "ser_nombre",
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
                data: "ser_notas",
                name: "ser_notas",
                orderable: false,
                searchable: false,
            },
           
            { data: "action", name: "action",
            orderable: false,
            searchable: false, },
        ],
       
    });
});