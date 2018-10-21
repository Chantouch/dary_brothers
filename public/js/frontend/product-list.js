let filterBar = document.getElementById('filter-bar');

noUiSlider.create(filterBar, {
    start: [1, 200],
    connect: true,
    range: {
        'min': 1,
        'max': 200
    }
});

let skipValues = [
    document.getElementById('value-lower'),
    document.getElementById('value-upper')
];

filterBar.noUiSlider.on('update', function (values, handle) {
    skipValues[handle].innerHTML = Math.round(values[handle]);
});

$('#sorting-level').on('change', function (e) {
    e.preventDefault();
    window.location = '/en/products/list?sort-price=' + $(this).val() + '&price-level=' + $('#sorting-price').val()
});
$('#sorting-price').on('change', function (e) {
    e.preventDefault();
    window.location = '/en/products/list?sort-price=' + $('#sorting-level').val() + '&price-level=' + $(this).val()
});
