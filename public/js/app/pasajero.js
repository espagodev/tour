$(document).ready(function () {

    $("#agenda_id").select2({
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
              
                template += data.agd_nombres + " " + data.agd_apellidos + "<br>" + 'Telefono' + " " + data.agd_telefono;

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
    $('#agenda_id').on('select2:select', function(e) {
        var data = e.params.data;

        if (data.agd_apellidos) {
            $('input#agd_apellidos').val(data.agd_apellidos);
            $('input#agd_documento').val(data.agd_documento);
            $('input#agd_email').val(data.agd_email);
            $('input#agd_telefono').val(data.agd_telefono);
            $('input#agd_direccion').val(data.agd_direccion);
            $('input#agd_codigo_postal').val(data.agd_codigo_postal);


            $('select[name="tipo_documento_id"]').val(data.tipo_documento_id);
            $('select[name="carpeta_id"]').val(data.carpeta_id);
            $('select[name="pais_id"]').val(data.pais_id);
            $('select[name="municipio_id"]').val(data.municipio_id);
            $('select[name="provincia_id"]').val(data.provincia_id);
            

        } else {
            $('input#age_apellido').val('');
        }   
        
        
    });
});