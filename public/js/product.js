
function toPage(page) {
	$.ajax({
		type: 'GET',
		url: '/products/' + page,
		data: '_token = <?php echo csrf_token() ?>',
		success: function(data) {
			var obj = data.nextOrPreviousProducts;
			$('.row').remove();
		}
	});
}