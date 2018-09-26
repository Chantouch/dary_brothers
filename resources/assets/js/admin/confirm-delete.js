$('button.confirm').on('click', function (e) {
    e.preventDefault();
    let self = $(this);
    swal({
        title: 'Are you sure?',
        text: 'You will not be able to recover this imaginary file!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, keep it'
    }).then((result) => {
        if (result.value) {
            self.parents('.confirm').submit();
            Swal(
                'Deleted!',
                'Your imaginary file has been deleted.',
                'success'
            )
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })
});
