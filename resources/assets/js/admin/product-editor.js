$('.editor').trumbowyg();

$('.select2').select2();

$('#image_uploads').filer({
    limit: 30,
    maxSize: 30,
    extensions: ['jpg', 'jpeg', 'png', 'gif'],
    changeInput: true,
    showThumbs: true,
    addMore: true
});
