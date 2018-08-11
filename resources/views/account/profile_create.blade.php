@extends('main') @section('content')

<!DOCTYPE html>
<html>

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Account</title>

  <style>
    form {
      margin-top: 30px;
    }

    #gender {
      height: 35px;
    }

    #title-container {
      padding-top: 20px;
    }

    #title-text {
      letter-spacing: .2rem;
    }
  </style>

  <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }

    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

    $(document).ready(function() {

      $('#submit').attr('disabled', true);

      function validate(str) {
        //validate email
        var emailReg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var isNotEmail = !emailReg.test(str) || email == '';
        if (isNotEmail) {
          //validate phone
          var intRegex = /[0-9 -()+]+$/;
          if ((str.length < 6) || (!intRegex.test(str))) {
            return false;
          }
        }
        return true;
      }

      $("#email").focusout(function() {
        if ($(this).val() == '') {
          $(this).css("border-color", "#FF0000");
          $('#submit').attr('disabled', true);
          $("#error_email").text("* You have to enter your email!");
          return;
        }
        var validation = validate($(this).val());
        if (!validation) {
          $(this).css("border-color", "#FF0000");
          $('#submit').attr('disabled', true);
          $("#error_email").text("* Email/Phone Number is not valid!");
          return;
        }
        $(this).css("border-color", "#2eb82e");
        $('#submit').attr('disabled', false);
        $("#error_email").text("");
      });
      $("#password").focusout(function() {
        if ($(this).val() == '') {
          $(this).css("border-color", "#FF0000");
          $('#submit').attr('disabled', true);
          $("#error_password").text("* You have to input password!");
          return;
        }
        $(this).css("border-color", "#2eb82e");
        $('#submit').attr('disabled', false);
        $("#error_password").text("");
      });
      $("#c_password").focusout(function() {
        if ($(this).val() != $("#password").val()) {
          $(this).css("border-color", "#FF0000");
          $('#submit').attr('disabled', true);
          $("#error_c_password").text("* Password must be matched!");
          return;
        }
        $(this).css("border-color", "#2eb82e");
        $('#submit').attr('disabled', false);
        $("#error_c_password").text("");
      });
    });
  </script>

</head>

<body>
  <div class="container col-md-offset-3">
    <div id="title-container">
      <h3 id="title-text">CREATE ACCOUNT</h3>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-12 col-lg-6">
        <form name="myform" method="POST" action="/account/create">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="email">Email/Phone Number</label>
            <input id="email" name="email" class="form-control" type="text">
            <span id="error_email" class="text-danger"></span>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
            <span id="error_password" class="text-danger"></span>
          </div>
          <div class="form-group">
            <label for="c_password">Confirm Password</label>
            <input type="password" id="c_password" class="form-control">
            <span id="error_c_password" class="text-danger"></span>
          </div>

          <button id="submit" type="submit" value="submit" class="btn btn-primary center">Create Account</button>

        </form>
      </div>
    </div>
  </div>
  </div>
</body>

</html>

@endsection
