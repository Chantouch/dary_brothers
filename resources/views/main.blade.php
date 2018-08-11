<!DOCTYPE html>
<html>
  <head>

    <style>

    #header {
      height: 200px;
      background-color: #fff;
      padding: 30px;
    }

    #content {
      height: 100%;
      background-color: #d1d0db;
      padding-bottom: 20px;
    }

    </style>

  </head>
  <body>
    <div id="header">
      @include('templates.header')
    </div>
    <div id="content">
      @yield('content')
    </div>
  </body>
</html>
