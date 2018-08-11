@extends('main')

@section('content')

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>My Cart - DaryBrothers</title>

	<script src="/js/myCart.js"></script>
	<style>
	html, body, #text-container {
        height: 100%;
    }

	.card {
		margin-top: 20px;
		background: #eee;
		padding: 1em;
		line-height: 1.5em; }

	#text-container {
		display: flex;
		align-items: center;
		justify-content: center;
	}
	</style>

	<script type="text/javascript">
		function startEditQuantity(id) {
			$('#qtyDisplayer' + id).css('display', 'none');
			$('#qtyEditor' + id).show();
		}

		function cancelEditQuantity(id) {
			$('#qtyDisplayer' + id).show();
			$('#qtyDisplayer' + id).css('display', 'inline-flex');
			$('#qtyEditor' + id).css('display', 'none');
		}
	</script>
</head>
<body>
	@if (empty($cartProducts))
	<div class="container" id="text-container">
		
		<h2>The Cart is Empty</h2>
	</div>
	@else
	<div class="container">
		@foreach ($cartProducts as $pro)
			<div class="card" id="cart-id{{ $pro->id }}">
			<div class="card-body">
				<div class="col-md-4">
					@if(count($pro->pro_images()) == 1)
						<img src="{{ $pro->pro_images()[0] }}" alt="{{ $pro->title }}" style="max-width: 100%;" />
					@else
					<div id="carousel-product-images" class="carousel slide" data-ride="carousel" data-interval="false">
						<ol class="carousel-indicators">
							@foreach( $pro->pro_images() as $photo )
							<li data-target="#carousel-product-images" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
							@endforeach
						</ol>
						<div class="carousel-inner">
							@foreach( $pro->pro_images() as $photo )
							<div class="carousel-item {{ $loop->first ? 'active' : '' }}" >
								<img class="card-img-top" src="{{ $photo }}" alt="{{ $pro->title }}" />
							</div>
							@endforeach
						</div>
					</div>
					@endif
				</div>
				<div class="col-md-8">
					<h3 class="card-title">{{ $pro->title }}</h3>
					<h5>{{ $pro->pro_price() }}</h5>
					<div>
						<div id="qtyDisplayer{{$pro->id}}" style="display: inline-flex;">
							<h5 id="textQty{{$pro->id}}">{{ $pro->pro_quantity() }}</h5> 
							<a style="margin-left: 10px; color: #337ab7;" class="btn" onclick="startEditQuantity('{{$pro->id}}')"><span class="glyphicon glyphicon-pencil"></span> </a>
						</div>
						<div id="qtyEditor{{$pro->id}}" style="display: none;">
							<input id="quantity{{$pro->id}}" type="number" min="1" placeholder="Input quantity" value="{{$pro->quantity}}" style="text-align: right;" /> <a id="btnDone{{$pro->id}}" class="btn btn-primary" style="color: white;" onclick="editQuantity('{{$pro->id}}')">Done</a> <a class="btn btn-warning" onclick="cancelEditQuantity('{{$pro->id}}')">Cancel</a>
						</div>
					</div>
					<h5>{{ $pro->pro_totalPrice() }}</h5>
					<a class="btn btn-primary" style="color: white;" onclick="removeCartItem('{{ $pro->id }}', 'cart-id{{ $pro->id }}')"><span class="glyphicon glyphicon-trash"></span> Remove</a>
				</div>
			</div>
		</div>
		@endforeach
		<div class="d-flex justify-content-end" style="margin-top: 20px;">
			<a class="btn btn-primary" style="color: white; font-size: 18pt;">ORDER</a>
		</div>
	</div>
	@endif
</body>
</html>

@endsection