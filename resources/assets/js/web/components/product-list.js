let filterBar = document.getElementById('filter-bar');

noUiSlider.create(filterBar, {
    start: [50, 200],
    connect: true,
    range: {
        'min': 50,
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
