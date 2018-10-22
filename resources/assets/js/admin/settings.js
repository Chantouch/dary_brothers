$(function () {
    $('.ajax-request').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var value = $(this).data('value');
        if (value) {
            $(this).data('value', 0);
            element = 0;
        } else {
            $(this).data('value', 1);
            element = 1;
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "PUT",
            url: $(this).attr("href"),
            data: {'value': element},
            success: function (rrr) {
                if (rrr.value === '1') {
                    $('#value' + id).removeClass('fa-square-o');
                    $('#value' + id).addClass('fa-check-square-o');
                } else {
                    $('#value' + id).removeClass('fa-check-square-o');
                    $('#value' + id).addClass('fa-square-o');
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    })
})
