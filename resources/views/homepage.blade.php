@extends('main')

@section('content')
<body>
  <div id="carouselHomePage" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="/storage/burger_menu_1.jpg">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="/storage/burger_menu_2.png">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="/storage/burger_menu_3.jpg">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselHomePage" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselHomePage" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
</body>

  @endsection
