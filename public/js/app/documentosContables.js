$(document).ready(function () {


    $("#listado_documentos").change(function () {
        listado_documentos.ajax.reload();
    });


    // listado de resultados
    listado_documentos = $("#listado_documentos").DataTable({
        processing: true,
        serverSide: true,
        aaSorting: false,
        searching: false,
        ajax: {
            url: "/documentos/getListadoDocumentos",
            dataType: "json",
            data: function (d) {
                // d.categoria_id = $("select#categoria_id").val();
            },
        },
        columns: [
            {
                data: "doc_nombre",
                name: "doc_nombre",
                orderable: false,
                searchable: false,
            },
            {
                data: "doc_prefijo",
                name: "doc_prefijo",
                orderable: false,
                searchable: false,
            },
            {
                data: "doc_incremento",
                name: "doc_incremento",
                orderable: false,
                searchable: false,
            },
            
            {
                data: "doc_digitos",
                name: "doc_digitos",
                orderable: false,
                searchable: false,
            },

            {
                data: "doc_conteo",
                name: "doc_conteo",
                orderable: false,
                searchable: false,
            },
           
            { data: "action", name: "action",
            orderable: false,
            searchable: false, },
        ],
       
    });
});