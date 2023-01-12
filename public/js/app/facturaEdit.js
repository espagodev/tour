// $(document).ready(function() {
//     addConceptoRow();
//     addPasajeroRow();
// });
    $("#add_pasajero_row").click(function() {
        addPasajeroRow();
    });

    $("#add_concepto_row").click(function() {
        addConceptoRow();
    });


    $(document).on('change', 'select#forma_pago_id', function() {
        var formaPago = $(this).val();
           forma_pago(formaPago);
    });
    
$(".save_form_button").click(function() {
    var form = $(this).closest('form');
   
    // // Remove price mask from values
    // var price_inputs = form.find('.price_input');
    // price_inputs.each(function (index, elem) {
    //     var price_input = $(elem);
    //     price_input.val(price_input.unmask());
    // });

    // remove template from form
    var itemTemplate = $('#pasajero_row_template');
    itemTemplate.remove()

    var conceptoTemplate = $('#concepto_row_template');
    conceptoTemplate.remove()

    // replace all name="taxes[]" with name="taxes[rowId][]"
    // $('tbody tr').each(function (index, element) {
    //     var row = $(element);
    //     var conCantidad = row.find('[name="conceptos[con_cantidad][]"]');
    //     conCantidad.attr('name', 'conceptos[con_cantidad][' + index + '][]');

    //     var subCategoria = row.find('[name="conceptos[sub_categoria_id][]"]');
    //     subCategoria.attr('name', 'conceptos[sub_categoria_id][' + index + '][]');
    // });
    
    // Submit form
    form.submit();
});

function calculatePercent(percent, amount) {
    var factor = Number(percent) / Number(100);
    return Number(amount) * Number(factor);
}

 

function inicializarPasajerosSelect2(elem) {
    elem.select2({
        ajax: { 
            url: "/agenda/getAgenda",
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    
                    q: params.term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        },
        tags: true,
        templateSelection: function (data, container) {
            $(data.element).attr('data-taxes', JSON.stringify(data.taxes));
            $(data.element).attr('data-price', data.price);
            return data.text;
        }
    });

    elem.change(function() {
        var element = $(this);
        var selectedOption = element.find(':selected');
        var taxesSelect = element.closest('tr').find('[name="taxes[]"]');
        var priceInput = element.closest('tr').find('.price_input');

        // Set selected taxes from pasajero
        var taxIds = [];
        var taxes = selectedOption.data('taxes');
        if (taxes) {
            taxes.forEach(tax => {
                taxIds.push(tax.tax_type_id);
            });
        }
        taxesSelect.val(taxIds);
        taxesSelect.trigger('change');

        // Set pasajero price for price input
        priceInput.val(selectedOption.data('price'));
        priceInput.focusout();

        // calculateRowPrice();
    });
}


function calculateRowPrice() {
    var subTotal = 0;
    var taxes = {};

    $('tbody tr').each(function(index, element) {
        var row = $(element);

        // If the row is template just continue
        if(row.attr('id') == 'pasajero_row_template') return;

        // quantity
        var quantity = Number(row.find('[name="quantity[]"]').val());

        // price
        var price = Number(row.find('.price_input').unmask()) / 100;

        // amount
        var amount = (quantity * price);

        // Calculate taxes
        var totalTaxAmount = Number(0);
        var selected_taxes = row.find('[name="taxes[]"]').find(':selected');
        selected_taxes.each(function (index, tax) {
            var percent = $(tax).data('percent');
            var taxAmount = calculatePercent(percent, amount);
            console.log("taxAmount", taxAmount);
            totalTaxAmount += Number(taxAmount);
        });

        if (discount_type === '1') {
            // discount
            var discount = Number(row.find('[name="discount[]"]').val());

            // calculate discount
            if(!isNaN(discount) && discount != undefined && discount != 0) {
                var discountAmount = calculatePercent(discount, amount);
                amount = Number(amount) - Number(discountAmount);
            }

            // Add tax amount to Item Total
            amount = Number(amount) + Number(totalTaxAmount);
        } else {
            // Add tax amount to Item Total
            amount = Number(amount) + Number(totalTaxAmount);

            // discount
            var discount = Number(row.find('[name="discount[]"]').val());

            // calculate discount
            if(!isNaN(discount) && discount != undefined && discount != 0) {
                var discountAmount = calculatePercent(discount, amount);
                amount = Number(amount) - Number(discountAmount);
            }
        }

        // Add Item Total to Sub Total
        subTotal += Number(amount);

        var amountPrice = Number(amount);

        // Set price input value
        row.find('.amount_price').val(amountPrice.toFixed(2));
        row.find('.amount_price').focusout();
    });

    calculateTotalPrice(subTotal, taxes);
}

function calculateTotalPrice(subTotal, taxes) {
    // Total value
    total = 0;
    total += subTotal;

    // Set subtotal value
    subtotal = Number(subTotal);
    $('#sub_total').val(subtotal.toFixed(2));

    // total taxes
    var total_taxes = $('#total_taxes').find(':selected');
    total_taxes.each(function (index, tax) {
        var taxName = $(tax).text();
        var percent = $(tax).data('percent');
        var taxAmount = calculatePercent(percent, subTotal);

        // push tax to taxes array
        if(taxes[taxName]) {
            taxes[taxName] += Number(taxAmount);
        } else {
            taxes[taxName] = Number(taxAmount);
        }
    });

    if (discount_type === '1') {
        // total discount
        var total_discount = $('#total_discount').val();
        if(total_discount != undefined && total_discount != 0) {
            total_discount = parseFloat(total_discount);
            var discountAmount = calculatePercent(total_discount, subTotal)
            total = Number(total) - Number(discountAmount)
        }

        // Display total tax list
        $('.total_tax_list').empty();
        for (var [name, amount] of Object.entries(taxes)) {
            var template = '<div class="d-flex align-items-center mb-3">' +
                '<div class="h6 mb-0 w-50">' +
                '    <strong class="text-muted">' + name + '</strong>' +
                '</div>' +
                '<div class="ml-auto h6 mb-0">' +
                '    <input type="text" class="price_input price-text w-100 fs-inherit" value="'+ Number(amount).toFixed(2) +'" disabled>' +
                '</div>' +
            '</div>';

            $('.total_tax_list').append(template);

            total = Number(total) + Number(amount);
        }
    } else {
        // Display total tax list
        $('.total_tax_list').empty();
        for (var [name, amount] of Object.entries(taxes)) {
            var template = '<div class="d-flex align-items-center mb-3">' +
                '<div class="h6 mb-0 w-50">' +
                '    <strong class="text-muted">' + name + '</strong>' +
                '</div>' +
                '<div class="ml-auto h6 mb-0">' +
                '    <input type="text" class="price_input price-text w-100 fs-inherit" value="'+ Number(amount).toFixed(2) +'" disabled>' +
                '</div>' +
            '</div>';

            $('.total_tax_list').append(template);

            total = Number(total) + Number(amount);
        }

        // total discount
        var total_discount = $('#total_discount').val();
        if(total_discount != undefined && total_discount != 0) {
            total_discount = parseFloat(total_discount);
            var discountAmount = calculatePercent(total_discount, total)
            total = Number(total) - Number(discountAmount)
        }
    }

    $('#grand_total').val(Number(total).toFixed(2));
    setupPriceInput(window.sharedData.company_currency);
}


function addPasajeroRow() {
    var pasajerosItems = $('#pasajeros');
    var template = $('#pasajero_row_template')
            .clone()
            .removeAttr('id')
            .removeClass('d-none');
    pasajerosItems.append(template);

    var pasajero_select = template.find('[name="agenda_id[]"]');
    inicializarPasajerosSelect2(pasajero_select);
}

function addConceptoRow() {
    var conceptosItems = $('#conceptos');
    var template = $('#concepto_row_template')
            .clone()
            .removeAttr('id')
            .removeClass('d-none');
    conceptosItems.append(template);

  
    // var tax_select = template.find('[name="taxes[]"]');
    // initializeTaxSelect2(tax_select);

    // initializePriceListener();
    // calculateRowPrice();
    // setupSelect2FooterListener();
}

function removeRow(elem) {
    $(elem).closest('tr').remove();
    calculateRowPrice();
}

function removeConceptRow(elem) {
    $(elem).closest('tr').remove();
    // calculateRowPrice();
}

function validateForm() {
    $('tbody tr').each(function(index, element) {
        var row = $(element);
        var pasajero = row.find('[name="pasajero[]"]')
    });
}

$(document).ready(function () {

    $("#ind_pasajero").click(function () {
        if ($(this).is(":checked")) {
            $("div#pasajero").css("display", "block");
          
        } else {
            $("div#pasajero").css("display", "none");
        }
    });

});

function forma_pago(formaPago) {
    if (formaPago != "3") {
        $("div#monto_efectivo").hide();
    } else if (formaPago == "3") {
        $("div#monto_efectivo").show();
    }
}