<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/app.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>

      .nav {
        font-size: 14pt;
      }

      #nav_container {
        align-items: flex-end;
        padding: 10px;
      }

      #account_container {
        margin-bottom: 30px;
      }

    </style>

  </head>
  <body>
      <div class="d-flex justify-content-around" id="container">
        <div class="d-inline-block">
          <img src="/storage/sample_mcdonald.jpg" alt="Shop Logo" width="150" height="150" />
        </div>
        <div class="d-inline-block" id="nav_container">
          <div id="account_container">
            <ul class="nav navbar-right">
              @if (empty($email))
                <li class="nav-item">
                  <a class="nav-link" href="/account/create_form"><span class="glyphicon glyphicon-user"></span> Create Account</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/account/login_user"><span class="glyphicon glyphicon-log-in"></span> Log In</a>
                </li>
              @else
                <li class="nav-item">
                  <a class ="nav-link" href="#">{{ $email }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/account/log_out"><span class="glyphicon glyphicon-log-out"></span> Log out</a>
                </li>
              @endif
            </ul>
          </div>
          <div>
            <ul class="nav navbar-right">
              <li class="nav-item ">
                <a class="nav-link" href="/home">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/products">PRODUCTS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/shop">OUR SHOP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/my_cart"> <span class="glyphicon glyphicon-shopping-cart"></span> MY CART</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
  </body>
</html>
