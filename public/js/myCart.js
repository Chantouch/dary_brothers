
function addToCart(id, idSelector) {
	var quantity = 1;
	if (idSelector === "") {
		quantity = $('#quantity').val();
	}
	$.ajax({
		type: 'GET',
		url: '/my_cart_add/' + id + '/quantity/' + quantity,
		data: '_token = <?php echo csrf_token() ?>',
		success: function(data) {
			var item = $('.add-to-cart');
			if (idSelector !== "") {
				item = $('#' + idSelector);
			}
			var htmlText = "<span class=\"glyphicon glyphicon-ok\"></span> ADDED TO CART";
			item.html(htmlText);
			item.removeClass('btn-primary');
			item.addClass('btn-success');
		}
	});
}

function removeCartItem(id, idSelector) {
	$.ajax({
		type: 'GET',
		url: '/my_cart_remove/' + id,
		data: '_token = <?php echo csrf_token() ?>',
		success: function(data) {
			$('#' + idSelector).remove();
		}
	});
}

function editQuantity(id) {
	var quantity = $('#quantity' + id).val();
	if (quantity == '' || quantity < 1) {
		alert('Quantity must be at least 1');
		return;
	}
	$.ajax({
		type: 'GET',
		url: '/my_cart_edit/' + id + '/quantity/' + quantity,
		data: '_token = <?php echo csrf_token() ?>',
		success: function(data) {
			$('#qtyDisplayer' + id).show();
			$('#qtyDisplayer' + id).css('display', 'inline-flex');
			$('#qtyEditor' + id).css('display', 'none');
			$('#textQty' + id).html(data.newQtyText);
		}
	});
}