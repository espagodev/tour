$(document).ready(function () {
    $(".view_register").on("shown.bs.modal", function () {
       
    });

    $(".view_register_abono").on("shown.bs.modal", function () {

        $(document).on('change', 'select#forma_pago_id', function() {
                                var formaPago = $(this).val();
                                   __forma_pago(formaPago);
                            });
            __datepicker_abono();

            $(document).on('change', 'select#categoria_id', function() {
                var subCategoriaId = $('#sub_categoria_id');
                var categoriaId = $(this).val();
                   __subCategoria(categoriaId,subCategoriaId);
            });
    });

    $(".view_register_firma").on("shown.bs.modal", function () {

        var sig = $('#sig').signature({
            syncField: '#signature',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature").val('');
        });
    });

    $(".view_register_ingreso").on("shown.bs.modal", function () {

        $(document).on('change', 'select#forma_pago_id', function() {
                                var formaPago = $(this).val();
                                   __forma_pago(formaPago);
                            });
            __datepicker_abono();
            
            $(document).on('change', 'select#categoria_id', function() {
                var subCategoriaId = $('#sub_categoria_id');
                var categoriaId = $(this).val();
                   __subCategoria(categoriaId,subCategoriaId);
            });
    });

    $(".view_register_ajustes").on("shown.bs.modal", function () {

        $(document).on('change', 'select#forma_pago_id', function() {
                                var formaPago = $(this).val();
                                   __forma_pago(formaPago);
                            });
            __datepicker_abono();

            $(document).on('change', 'select#categoria_id', function() {
                var subCategoriaId = $('#sub_categoria_id');
                var categoriaId = $(this).val();
                   __subCategoria(categoriaId,subCategoriaId);
            });
            
    });

    $(document).on("click", ".btn-modal", function (e) {
        e.preventDefault();
        var container = $(this).data("container");
        $.ajax({
            url: $(this).data("href"),
            dataType: "html",
            success: function (result) {
                $(container).html(result).modal("show");
            },
        });
    });

    $(".view_register_factura").on("shown.bs.modal", function () {
        __selectAgenda();
        __datepicker();
    });

    $(".view_register_billete_plazos").on("shown.bs.modal", function () {
        __selectAgenda();
        __datepicker();
    });

    $(".view_register_recibo").on("shown.bs.modal", function () {
        __selectAgenda();
        __datepicker();
    });
    
});


$(document).on('click', '.view_factura_modal', function(e) {
    e.preventDefault();
    var container = $('.factura_modal'); 

    $.ajax({
        url: $(this).attr('href'),
        dataType: 'html',
        success: function(result) {
            $(container)
                .html(result)
                .modal('show');

        },
    });
});


function __datepicker_abono() {
    $("#moc_fecha").datepicker({
        format: "dd/mm/yyyy",
        formatSubmit: "dd/mm/yyyy",
        today: "Hoy",
        clear: "",
        close: "Cancelar",
        min: -4,
        max: 0,
    });    
}


function __datepicker() {
    $("#fac_fecha").datepicker({
        format: "dd/mm/yyyy",
        formatSubmit: "dd/mm/yyyy",
        today: "Hoy",
        clear: "",
        close: "Cancelar",
        min: -4,
        max: 0,
    });    
}

function __selectAgenda(){
    $("select#agenda_id").select2({
        placeholder: "Seleccione un Cliente",
        ajax: {
            url: "/agenda/getAgenda",
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                };
            },
            processResults: function (data) {
                return {
                    results: data,
                };
            },
        },
            templateResult: function (data) {
   
                var template = "";
              
                template += data.text + " " + data.agd_apellidos + "<br>" + 'Telefono' + " " + data.agd_telefono;

                return template;
            },
            minimumInputLength: 1,
            language: {
                noResults: function() {
                    var name = $('#agenda_id')
                        .data('select2')
                        .dropdown.$search.val();
                    return (
                        '<button type="button" data-name="' +
                        name +
                        '" class="btn btn-link agregar_nuevo_cliente"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>&nbsp; ' +
                         'Agregar Nuevo Cliente' +
                        '</button>'
                    );
                },
            },
            escapeMarkup: function (markup) {
                return markup;
            },
        
    });
}

function __subCategoria(categoriaId,subCategoriaId){
    subCategoriaId.empty();
    if (categoriaId) {
        $.ajax({
            url: "/categorias/getCategorias",
            type: 'GET',
            data: { categoriaId: categoriaId },
            dataType: 'json',
            success: function (response) {
                subCategoriaId.append('<option value="">Seleccione una Subcategoria</option>')
                $.each(response, function (key, value) {
                    subCategoriaId.append("<option value='" + value.id + "'>" + value.subc_nombre + "</option>");
                });
            },
            error: function () {
                alert('Hubo un error obteniendo las Subcategorias!');
            }
        });
    }
}


function __datepicker() {
    $(".fecha").datepicker({
        format: "dd/mm/yyyy",
        formatSubmit: "dd/mm/yyyy",
        today: "Hoy",
        clear: "",
        close: "Cancelar",
        min: -4,
        max: 0,
    });    
}