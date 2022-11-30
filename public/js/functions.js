function __currency_trans_from_en(
    input,
    show_symbol = true,
    use_page_currency = false,
    precision = __currency_precision,
    is_quantity = false
) {
    if (use_page_currency && __p_currency_symbol) {
        var s = __p_currency_symbol;
        var thousand = __p_currency_thousand_separator;
        var decimal = __p_currency_decimal_separator;
    } else {
        var s = __currency_symbol;
        var thousand = __currency_thousand_separator;
        var decimal = __currency_decimal_separator;
    }

    symbol = '';
    var format = '%s%v';
    if (show_symbol) {
        symbol = s;
        format = '%s %v';
        if (__currency_symbol_placement == 'after') {
            format = '%v %s';
        }
    }

    if (is_quantity) {
        precision = __quantity_precision;
    }

    return accounting.formatMoney(input, symbol, precision, thousand, decimal, format);
}

function __currency_convert_recursively(element, use_page_currency = false) {
    element.find('.display_currency').each(function() {
        var value = $(this).text();

        var show_symbol = $(this).data('currency_symbol');
        if (show_symbol == undefined || show_symbol != true) {
            show_symbol = false;
        }

        var highlight = $(this).data('highlight');
        if (highlight == true) {
            __highlight(value, $(this));
        }

        var is_quantity = $(this).data('is_quantity');
        if (is_quantity == undefined || is_quantity != true) {
            is_quantity = false;
        }

        if (is_quantity) {
            show_symbol = false;
        }

        $(this).text(__currency_trans_from_en(value, show_symbol, use_page_currency, __currency_precision, is_quantity));
    });
}

//Da formato a la moneda/número
function __number_uf(input, use_page_currency = false) {
    if (use_page_currency && __currency_decimal_separator) {
        var decimal = __p_currency_decimal_separator;
    } else {
        var decimal = __currency_decimal_separator;
    }

    return accounting.unformat(input, decimal);
}

//Alias de formato de moneda, número de formatos
function __number_f(
    input,
    show_symbol = false,
    use_page_currency = false,
    precision = __currency_precision
) {
    return __currency_trans_from_en(input, show_symbol, use_page_currency, precision);
}

//Lea la entrada y conviértala en un número natural
function __read_number(input_element, use_page_currency = false) {
    return __number_uf(input_element.val(), use_page_currency);
}

function __select2(selector) {
    if ($('html').attr('dir') == 'rtl') selector.select2({ dir: 'rtl' });
    else selector.select2();
}


function __forma_pago(formaPago) {
    if (formaPago != "3") {
        $("div#monto_efectivo").hide();
    } else if (formaPago == "3") {
        $("div#monto_efectivo").show();
    }
}


function changePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(input).closest('.form-group').find('.avatar-img').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// function __datepicker() {
//     $(".fecha").datepicker({
//         format: "dd/mm/yyyy",
//         formatSubmit: "dd/mm/yyyy",
//         today: "Hoy",
//         clear: "",
//         close: "Cancelar",
//         min: -4,
//         max: 0,
//     });    
// }