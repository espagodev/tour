$(document).ready(function () {

    __select2($('.select2'));


    //On display of add contact modal
    $(".contact_modal").on("shown.bs.modal", function (e) {
        $('input[type=radio][name="contact_type_radio"]').on(
            "change",
            function () {
                if (this.value == "individual") {
                    $("div.individual").show();
                    $("div.business").hide();
                } else if (this.value == "business") {
                    $("div.individual").hide();
                    $("div.business").show();
                }
            }
        );
        if ($("#is_customer_export").is(":checked")) {
            $("div.export_div").show();
        }
        $("#is_customer_export").on("change", function () {
            if ($(this).is(":checked")) {
                $("div.export_div").show();
            } else {
                $("div.export_div").hide();
            }
        });

        $(".more_btn").click(function () {
            $($(this).data("target")).toggleClass("hide");
        });
        $("div.lead_additional_div").hide();

        if ($("select#contact_type").val() == "customer") {
            $("div.supplier_fields").hide();
            $("div.customer_fields").show();
        } else if ($("select#contact_type").val() == "supplier") {
            $("div.supplier_fields").show();
            $("div.customer_fields").hide();
        } else if ($("select#contact_type").val() == "lead") {
            $("div.supplier_fields").hide();
            $("div.customer_fields").hide();
            $("div.opening_balance").hide();
            $("div.pay_term").hide();
            $("div.lead_additional_div").show();
            $("div.shipping_addr_div").hide();
        }

        $("select#contact_type").change(function () {
            var t = $(this).val();

            if (t == "supplier") {
                $("div.supplier_fields").fadeIn();
                $("div.customer_fields").fadeOut();
            } else if (t == "both") {
                $("div.supplier_fields").fadeIn();
                $("div.customer_fields").fadeIn();
            } else if (t == "customer") {
                $("div.customer_fields").fadeIn();
                $("div.supplier_fields").fadeOut();
            } else if (t == "lead") {
                $("div.customer_fields").fadeOut();
                $("div.supplier_fields").fadeOut();
                $("div.opening_balance").fadeOut();
                $("div.pay_term").fadeOut();
                $("div.lead_additional_div").fadeIn();
                $("div.shipping_addr_div").hide();
            }
        });

        $(".contact_modal")
            .find(".select2")
            .each(function () {
                $(this).select2();
            });

        $("form#contact_add_form, form#contact_edit_form")
            .submit(function (e) {
                e.preventDefault();
            })
            .validate({
                rules: {
                    contact_id: {
                        remote: {
                            url: "/contacts/check-contacts-id",
                            type: "post",
                            data: {
                                contact_id: function () {
                                    return $("#contact_id").val();
                                },
                                hidden_id: function () {
                                    if ($("#hidden_id").length) {
                                        return $("#hidden_id").val();
                                    } else {
                                        return "";
                                    }
                                },
                            },
                        },
                    },
                },
                messages: {
                    contact_id: {
                        remote: "El Contacto ya Existe",
                    },
                },
                submitHandler: function (form) {
                    e.preventDefault();
                    var data = $(form).serialize();
                    $.ajax({
                        method: "POST",
                        url: $(form).attr("action"),
                        dataType: "json",
                        data: data,
                        beforeSend: function (xhr) {
                            __disable_submit_button(
                                $(form).find('button[type="submit"]')
                            );
                        },
                        success: function (result) {
                            if (result.success == true) {
                                $("div.contact_modal").modal("hide");
                                toastr.success(result.msg);

                                if (typeof contact_table != "undefined") {
                                    contact_table.ajax.reload();
                                }

                                var lead_view = urlSearchParam("lead_view");
                                if (lead_view == "kanban") {
                                    initializeLeadKanbanBoard();
                                } else if (
                                    lead_view == "list_view" &&
                                    typeof leads_datatable != "undefined"
                                ) {
                                    leads_datatable.ajax.reload();
                                }
                            } else {
                                toastr.error(result.msg);
                            }
                        },
                    });
                },
            });

        $("#contact_add_form").trigger("contactFormvalidationAdded");
    });
});
