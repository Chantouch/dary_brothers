$('#sorting-level').on('change', function (e) {
    e.preventDefault();
    window.location = '/en/products/list?sort-price=' + $(this).val() + '&price-level=' + $('#sorting-price').val();
});
$('#sorting-price').on('change', function (e) {
    e.preventDefault();
    window.location = '/en/products/list?sort-price=' + $('#sorting-level').val() + '&price-level=' + $(this).val();
});
