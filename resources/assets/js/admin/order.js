$(document).ready(function () {
    const toast = swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000
    });

    $('form.payment').on('change', function () {
        var url = $(this).attr('action');
        $.ajax({
            type: "PUT",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            data: {
                status: $(this).children('.payment_status').val(),
            },
            beforeSend: function () {
                swal('Updating....', 'success');
            },
            success(data) {
                toast({
                    type: 'success',
                    title: data.message
                })
            },
            error: function (data) {
                // var errors = data.responseJSON;
            },
            fail: function (xhr, textStatus, errorThrown) {
                alert('request failed');
            }
        });
    });
});
