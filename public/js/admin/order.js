$(document).ready(function () {
    var toast = swal.mixin({
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
                status: $(this).children('.payment_status').val()
            },
            beforeSend: function beforeSend() {
                swal('Updating....', 'success');
            },
            success: function success(data) {
                toast({
                    type: 'success',
                    title: data.message
                });
            },

            error: function error(data) {
                // var errors = data.responseJSON;
            },
            fail: function fail(xhr, textStatus, errorThrown) {
                alert('request failed');
            }
        });
    });
});
