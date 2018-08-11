@extends('main')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ $product->title }}</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

  <script src="/js/myCart.js"></script>

	<style>

		body {
  			font-family: 'open sans';
  			overflow-x: hidden; }

		img {
  			max-width: 100%; }

		.preview {
  			display: -webkit-box;
  			display: -webkit-flex;
  			display: -ms-flexbox;
  			display: flex;
  			-webkit-box-orient: vertical;
  			-webkit-box-direction: normal;
  			-webkit-flex-direction: column;
      		-ms-flex-direction: column;
          	flex-direction: column; }

  		@media screen and (max-width: 996px) {
    	.preview {
      		margin-bottom: 20px; } }

		.preview-pic {
  			-webkit-box-flex: 1;
  			-webkit-flex-grow: 1;
      		-ms-flex-positive: 1;
          	flex-grow: 1; }

		.preview-thumbnail.nav-tabs {
  			border: none;
  			margin-top: 15px; }

  		.preview-thumbnail.nav-tabs li {
    		width: 18%;
    		margin-right: 2.5%; }

    	.preview-thumbnail.nav-tabs li img {
      		max-width: 100%;
      		display: block; }

    	.preview-thumbnail.nav-tabs li a {
      		padding: 0;
      		margin: 0; }

    	.preview-thumbnail.nav-tabs li:last-of-type {
      		margin-right: 0; }

		.tab-content {
  			overflow: hidden; }

  		.tab-content img {
    		width: 100%;
    		-webkit-animation-name: opacity;
            animation-name: opacity;
    		-webkit-animation-duration: .3s;
            animation-duration: .3s; }

		.card {
  			margin-top: 50px;
  			background: #eee;
  			padding: 3em;
  			line-height: 1.5em; }

		@media screen and (min-width: 997px) {
  		.wrapper {
    		display: -webkit-box;
    		display: -webkit-flex;
    		display: -ms-flexbox;
    		display: flex; } }

		.details {
  			display: -webkit-box;
  			display: -webkit-flex;
  			display: -ms-flexbox;
  			display: flex;
  			-webkit-box-orient: vertical;
  			-webkit-box-direction: normal;
  			-webkit-flex-direction: column;
      		-ms-flex-direction: column;
          	flex-direction: column; }

		.product-title, .price, .quantity {
  			text-transform: UPPERCASE;
  			font-weight: bold; }

		.checked, .price span {
  			color: #ff9f1a; }

		.product-title, .rating, .product-description, .price, .quantity {
  			margin-bottom: 15px; }

		.product-title {
  			margin-top: 0; }

    	#quantity {
			margin-left: 40px;    		
    	}

		.not-available {
  			text-align: center;
  			line-height: 2em; }

  		.not-available:before {
    		font-family: fontawesome;
    		content: "\f00d";
    		color: #fff; }

		.tooltip-inner {
  			padding: 1.3em; }

		@-webkit-keyframes opacity {
  		0% {
    		opacity: 0;
    		-webkit-transform: scale(3);
            transform: scale(3); }
  		100% {
    		opacity: 1;
    		-webkit-transform: scale(1);
            transform: scale(1); } }

		@keyframes opacity {
  		0% {
    		opacity: 0;
    		-webkit-transform: scale(3);
            transform: scale(3); }
  		100% {
    		opacity: 1;
    		-webkit-transform: scale(1);
            transform: scale(1); } }
	</style>

</head>

<body>
	
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
							@for ($i = 0; $i < count($product->pro_images()); $i++)
								@if($i==0)
									<div class="tab-pane active" id="pic-{{$i+1}}"><img src="{{ $product->pro_images()[$i] }}" height="320px"/></div>
									@continue
								@endif
								<div class="tab-pane" id="pic-{{$i+1}}"><img src="{{ $product->pro_images()[$i] }}" height="320px"/></div>
							@endfor
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
							@for ($i = 0; $i < count($product->pro_images()); $i++)
								@if($i==0) 
									<li class="active"><a data-target="#pic-{{$i+1}}" data-toggle="tab"><img src="{{ $product->pro_images()[$i] }}" /></a></li>
									@continue
								@endif
								<li><a data-target="#pic-{{$i+1}}" data-toggle="tab"><img src="{{ $product->pro_images()[$i] }}" /></a></li>
							@endfor
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{ $product->title }}</h3>
						<p class="product-description">{{ $product->description }}</p>
						<h4 class="price">current price: <span>${{ $product->price }}</span></h4>
						<h5 class="quantity">Quantity:
							<input type="number" id="quantity" name="quantity" style="height:30px; width:70px;font-size:14pt; text-align: right;" value="1" />
						</h5>
						<div>
							<button class="add-to-cart btn btn-primary" type="button" onclick="addToCart('{{ $product->id }}', '')">ADD TO CART</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div id="title-container">
      		<h3 id="title-text">RELATED ITEMS</h3>
    	</div>
    	@foreach($related as $pro)
    	<div class="card col-xs-12 col-sm-6 col-md-4 col-lg-3" style="margin-top: 10px; height: 400px;">
    		@if(count($pro->pro_images()) == 1)
            	<img class="card-img-top" src="{{ $product->pro_images()[0] }}" alt="{{ $product->title }}" height="200px">
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
                  <img class="card-img-top" src="{{ $photo }}" alt="{{ $product->title }}" height="200px">
                </div>
              @endforeach
            </div>
          </div>
        @endif
    		<div class="card-body">
          		<h5 class="card-title">{{ $pro->title }}</h5>
          		<p class="card-text">{{ $pro->pro_price() }}</p>
          		<a id="add-to-cart{{ $pro->id }}" onclick="addToCart('{{ $pro->id }}', 'add-to-cart{{ $pro->id }}')" class="btn btn-primary" style="color: white;"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a>
       		</div>
    	</div>
    	@endforeach
	</div>
</body>
</html>

@endsection
