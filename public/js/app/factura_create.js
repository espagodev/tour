$(document).ready(function () {
    $(document).on("change", "select#fac_plazos", function () {
        var plazo_id = $(this).val();
        compra_plazo(plazo_id);
    });

    $(document).on('change', 'select#forma_pago_id', function() {
        var formaPago = $(this).val();
           forma_pago(formaPago);
    });

    $("#fac_pasajero").click(function (evento) {
        if ($("#fac_pasajero").attr("checked")) {
            $("#pasajero").css("display", "block"); 
        } else {
            $("#pasajero").css("display", "none");
        }
    });


  
    $('#agenda_id').on('select2:select', function(e) {
        var data = e.params.data;

        if (data.agd_apellidos) {
            $('input#agd_apellidos_inf').val(data.agd_apellidos);
            $('input#agd_documento_inf').val(data.agd_documento);
            $('input#agd_email_inf').val(data.agd_email);
            $('input#agd_telefono_inf').val(data.agd_telefono);
            $('input#agd_direccion_inf').val(data.agd_direccion);
            $('input#agd_codigo_postal_inf').val(data.agd_codigo_postal);
            $('input#car_nombre').val(data.car_nombre);
            $('input#pai_nombre').val(data.pai_nombre);
            $('input#pro_nombre').val(data.pro_nombre);
            $('input#mun_nombre').val(data.mun_nombre);


            $('select[name="tipo_documento_id_inf"]').val(data.tipo_documento_id);
            // $('select[name="carpeta_id_inf"]').val(data.carpeta_id);
            // $('select[name="pais_id_inf"]').val(data.pais_id);
            // $('select[name="municipio_id_inf"]').val(data.municipio_id);
            // $('select[name="provincia_id_inf"]').val(data.provincia_id);
            

        } else {
            $('input#agd_apellidos_inf').val('');
            $('input#agd_documento_inf').val('');
            $('input#agd_email_inf').val('');
            $('input#agd_telefono_inf').val('');
            $('input#agd_direccion_inf').val('');
            $('input#agd_codigo_postal_inf').val('');
            $('input#car_nombre').val('');
            $('input#pai_nombre').val('');
            $('input#pro_nombre').val('');
            $('input#mun_nombre').val('');


            $('select[name="tipo_documento_id_inf"]').val('');
            // $('select[name="carpeta_id_inf"]').val('');
            // $('select[name="pais_id_inf"]').val('');
            // $('select[name="municipio_id_inf"]').val('');
            // $('select[name="provincia_id_inf"]').val('');
        }   
        
        
    });

    $(document).on('click', '.agregar_nuevo_cliente', function() {
        $('#agenda_id').select2('close');
        var name = $(this).data('name');
        $('.contact_modal')
            .find('input#name')
            .val(name);
        $('.contact_modal')
            .find('select#contact_type')
            .val('customer')
            .closest('div.contact_type_div')
            .addClass('hide');
        $('.contact_modal').modal('show');
    });
   
$('.contact_modal').on('hidden.bs.modal', function() {
    $('form#agregar_nuevo_cliente')
        .find('button[type="submit"]')
        .removeAttr('disabled');
    $('form#agregar_nuevo_cliente')[0].reset();
});



    

    $(document).on('click', '.add_pasajero_value_row', function() {
        
        var pasajero_row_index = $(this)
            .closest('.pasajero_row')
            .find('.row_index')
            .val();
        var pasajero_value_row_index = $(this)
            .closest('table')
            .find('tr:last .pasajero_row_index')
            .val();

        if (
            $(this)
                .closest('.pasajero_row')
                .find('.row_edit').length >= 1
        ) {
            var row_type = 'edit';
        } else {
            var row_type = 'add';
        }

        var table = $(this).closest('table');

        $.ajax({
            method: 'GET',
            url: '/facturas/get_pasajero_value_row',
            data: {
                pasajero_row_index: pasajero_row_index,
                value_index: pasajero_value_row_index,
                row_type: row_type,
            },
            dataType: 'html',
            success: function(result) {
                if (result) {
                    table.append(result);
                    // toggle_dsp_input();
                }
            },
        });
    });

    $(document).on('click', '.remove_pasajero_value_row', function() {
        swal({
            title: "Estás seguro ?",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willDelete => {
            if (willDelete) {
                var count = $(this)
                    .closest('table')
                    .find('.remove_pasajero_value_row').length;
                if (count === 1) {
                    $(this)
                        .closest('.pasajero_row')
                        .remove();
                } else {
                    $(this)
                        .closest('tr')
                        .remove();
                }
            }
        });
    });

    $(document).on('click', '.add_concepto_value_row', function() {
        
        var concepto_row_index = $(this)
            .closest('.concepto_row')
            .find('.row_index')
            .val();
        var concepto_value_row_index = $(this)
            .closest('table')
            .find('tr:last .concepto_row_index')
            .val();

        if (
            $(this)
                .closest('.concepto_row')
                .find('.row_edit').length >= 1
        ) {
            var row_type = 'edit';
        } else {
            var row_type = 'add';
        }

        var table = $(this).closest('table');

        $.ajax({
            method: 'GET',
            url: '/facturas/get_concepto_value_row',
            data: {
                concepto_row_index: concepto_row_index,
                value_index: concepto_value_row_index,
                row_type: row_type,
            },
            dataType: 'html',
            success: function(result) {
                if (result) {
                    table.append(result);
                    // toggle_dsp_input();
                }
            },
        });
    });

    $(document).on('click', '.remove_concepto_value_row', function() {
        swal({
            title: "Estás seguro ?",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willDelete => {
            if (willDelete) {
                var count = $(this)
                    .closest('table')
                    .find('.remove_concepto_value_row').length;
                if (count === 1) {
                    $(this)
                        .closest('.concepto_row')
                        .remove();
                } else {
                    $(this)
                        .closest('tr')
                        .remove();
                }
            }
        });
    });
});

$(document).ready(function () {

    $("#ind_pasajero").click(function () {
        if ($(this).is(":checked")) {
            $("div#pasajero").css("display", "block");
        } else {
            $("div#pasajero").css("display", "none");
        }
    });

});

function compra_plazo(plazo_id) {
    if (plazo_id == "0") {
        $("div#plazos").hide();
    } else if (plazo_id == "1") {
        $("div#plazos").show();
    }
}

function forma_pago(formaPago) {
    if (formaPago != "3") {
        $("div#monto_efectivo").hide();
    } else if (formaPago == "3") {
        $("div#monto_efectivo").show();
    }
}
