$('.editor').trumbowyg();

$('.select2').select2();

$('#image_uploads').filer({
    limit:5,
    maxSize: 3,
    extensions: ['jpg', 'jpeg', 'png', 'gif'],
    changeInput: true,
    showThumbs: true,
    addMore: true
});
