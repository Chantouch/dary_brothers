(function () {
    const toast = swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000
    });
    $('.quantity').on('keyup', function () {
        let url = $(this).attr('data-action');
        $.ajax({
            type: "PUT",
            url: url,
            data: {
                'quantity': this.value,
            },
            beforeSend: function () {
                // swal('Updating....', 'success');
            },
            success(data) {
                $('tr#' + data.product.rowId).children('td.column-5').html(data.product.qty * data.product.price)
                toast({
                    type: 'success',
                    title: data.message
                })
                $(".print-error-msg").css('display', 'none');
            },
            error: function (data) {
                let errors = data.responseJSON;
                if (errors.error) {
                    toast({
                        type: 'error',
                        title: errors.error
                    })
                    return
                }
                printErrorMsg(errors.errors);
            },
            fail: function (xhr, textStatus, errorThrown) {
                alert('request failed');
            }
        });
    });

    $(".table-shopping-cart").keyup(function (event) {
        event.preventDefault()
        let total = 0;
        $(".table-shopping-cart .table-row").each(function () {
            let qty = parseInt($(this).find(".quantity").val());
            let rate = parseInt($(this).find(".rate").html());
            let subtotal = qty * rate;
            $(this).find(".subtotal").val(subtotal);
            if (!isNaN(subtotal)) {
                total += subtotal;
            }
        });
        $("#total").html("$" + total.toFixed(2));
        $("#subtotal").html("$" + total.toFixed(2));
    });

})();

function printErrorMsg(msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display', 'block');
    $.each(msg, function (key, value) {
        $(".print-error-msg").find("ul").append('<li class="list-group-item list-group-item-danger">' + value + '</li>');
    });
}
