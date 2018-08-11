@extends('main')

@section('content')

<html>
<head>
  <title>Products</title>

  <script src="/js/myCart.js"></script>
  <script src="/js/product.js"></script>

  <style>
    #title-container {
      padding-top: 20px;
    }
    #title-text {
      letter-spacing: .2rem;
    }
    .card {
      margin: 10 auto;
      float: none;
      margin-top: 20px;
      padding-top: 10px;
    }
    .card:hover {
      cursor: pointer;
    }
    .card:hover .card-title {
      color: #4c90ff;
    }
    .card-text {
      font-weight: bold;
    }
  </style>

</head>
<body>
  <div class="container">
    <div id="title-container">
      <h3 id="title-text">PRODUCTS</h3>
    </div>
    <div class="row">
      @foreach ($products as $product)
        <div class="card col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <input type="hidden" id="product_id" value="{{ $product->id }}" />
          @if(count($product->pro_images()) == 1)
            <img class="card-img-top" src="{{ $product->pro_images()[0] }}" alt="{{ $product->title }}" height="200px">
          @else
            <div id="carousel-product-images" class="carousel slide" data-ride="carousel" data-interval="false">
              <ol class="carousel-indicators">
                @foreach( $product->pro_images() as $photo )
                  <li data-target="#carousel-product-images" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
              </ol>
            <div class="carousel-inner">
              @foreach( $product->pro_images() as $photo )
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" >
                  <img class="card-img-top" src="{{ $photo }}" alt="{{ $product->title }}" height="200px">
                </div>
              @endforeach
            </div>
          </div>
        @endif
        <div class="card-body" onclick="location.href='product_detail/{{ $product->id }}';">
          <h5 class="card-title">{{ $product->title }}</h5>
          <p class="card-text">{{ $product->pro_price() }}</p>
        </div>
        <div class="d-flex justfiy-content-start" style="margin-bottom: 20px; color: white;">
          <a class="btn btn-primary" id="add-to-cart{{ $product->id }}" onclick="addToCart('{{ $product->id }}', 'add-to-cart{{ $product->id }}')"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a>
        </div>
      </div>
    @endforeach
    </div>
  </div>
  <div class="d-flex justify-content-center">
    @if ($pagination->hasMore)
      <nav>
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        @for ($i = 1; $i <= $pagination->nPage; $i++)
        <li class="page-item"><a class="page-link" onclick="toPage('{{ $i }}')">{{ $i }}</a></li>
        @endfor
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
    @endif
  </div>
</body>
</html>

@endsection
