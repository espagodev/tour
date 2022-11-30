
$(document).ready(function () {

// $(document).on('click', '.view_abono_cliente', function(e) {
//     e.preventDefault();
//     var container = $('.view_register'); 

//     $.ajax({
//         url: $(this).attr('href'),
//         dataType: 'html',
//         success: function(result) {
//             $(container).html(result).modal('show');

//                 $(document).on('change', 'select#forma_pago_id', function() {
//                     var formaPago = $(this).val();
//                        __forma_pago(formaPago);
//                 });

//                 datepicker();
//                 // abono_cliente();
//         },
//     });
// });

});


function abono_cliente(){
    $(".abono_cliente").click(function () {


        var container = $(".abono_cliente");

        var moc_monto = $('#moc_monto').val();
        var moc_fecha = $('#moc_fecha').val();
        var forma_pago_id = $('#forma_pago_id').val();
        var mov_monto = $('#mov_monto').val();
        var moc_descripcion = $('#moc_descripcion').val();
        var billetes_plazos_id = $('#billetes_plazos_id').val();
        var factura_id = $('#factura_id').val();

        var data = { 'moc_monto': moc_monto, 'moc_fecha': moc_fecha, 'forma_pago_id':forma_pago_id, 'mov_monto':mov_monto, 'moc_descripcion':moc_descripcion, 'billetes_plazos_id':billetes_plazos_id, 'factura_id':factura_id };


        var delayInMilliseconds = 2000; //1 second
        setTimeout(function () {
            $.when(
                $.ajax({
                    async: false,
                    url: "/resultados/getGuardarResultados",
                    method: "get",
                    dataType: "json",
                    data: data,
                })
            ).then(function (resp) {
                if (resp.status == true) {
                    $("input[name=moc_monto]").val("");
                    $("#moc_fecha").val("");
                    $("#forma_pago_id").val("");
                    $("#mov_monto").val("");
                    $("#moc_descripcion").val("");


                    // $(".view_register").hide();
                    container.html(resp).modal("hide");
                
                }
            });
        }, delayInMilliseconds);
    });
}



