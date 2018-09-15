$('.block2-btn-addcart').each(function () {
    var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
    $(this).on('click', function () {
        swal(nameProduct, 'is added to cart !', 'success');
    });
});

$('.block2-btn-addwishlist').each(function () {
    var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
    $(this).on('click', function () {
        swal(nameProduct, 'is added to wishlist !', 'success');
    });
});
