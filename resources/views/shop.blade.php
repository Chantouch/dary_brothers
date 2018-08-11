@extends('main')

@section('content')

<html>
<head>

  <style>
    #title-container {
      padding-top: 20px;
    }
    #title-text {
      letter-spacing: .2rem;
    }
  </style>

</head>

<body>
  <div class="container">
    <div id="title-container">
      <h3 id="title-text">CONTACT US</h3>
    </div>
    <div>
      <div class="d-flex justify-content-center">
        <div>
          <h2 style="text-align: center;">Dary Brothers</h2><br>
          <address style="text-align: center;">
            #262, KD, Sangkat BKK, Phnom Penh, Cambodia<br>
            Email: <a href="#">bunmeng.bo@gmail.com</a><br>
            Tel: 070406616
          </address>
        </div>
      </div>
      <div>
        <div>
          <iframe
            width="100%"
            height="450"
            frameborder="0" style="border:0"
            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDJLPv00yZMdJf547gIgEylDmcuzTyGFvg
              &q=Wat+Phnom,Phnom+Penh+Cambodia">
          </iframe>
        </div>
    </div>
  </div>
</body>
</html>

@endsection
