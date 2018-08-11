@extends('main')

@section('content')

<!DOCTYPE html>
<html>
<head>
  <title>Account</title>

  <style>
  form {
    margin-top: 30px;
}

#gender {
    height: 35px;
}
.avatar-upload {
    position: relative;
    max-width: 205px;
    margin: 50px auto;
    .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
        input {
            display: none;
            + label {
                display: inline-block;
                width: 34px;
                height: 34px;
                margin-bottom: 0;
                border-radius: 100%;
                background: #FFFFFF;
                border: 1px solid transparent;
                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                cursor: pointer;
                font-weight: normal;
                transition: all .2s ease-in-out;
                &:hover {
                    background: #f1f1f1;
                    border-color: #d6d6d6;
                }
                &:after {
                    content: "\f040";
                    font-family: 'FontAwesome';
                    color: #757575;
                    position: absolute;
                    top: 10px;
                    left: 0;
                    right: 0;
                    text-align: center;
                    margin: auto;
                }
            }
        }
    }
}
#imagePreview {
    width: 192px;
    height: 192px;
    position: relative;
    border-radius: 100%;
    border: 6px solid #F8F8F8;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    > div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
}
</style>

<script>
  $(document).ready(function(){
//       $flag=1;
//       $("#myName").focusout(function(){
//           if($(this).val()==''){
//               $(this).css("border-color", "#FF0000");
//               $('#submit').attr('disabled',true);
//               $("#error_name").text("* You have to enter your first name!");
//           }
//           else
//           {
//               $(this).css("border-color", "#2eb82e");
//               $('#submit').attr('disabled',false);
//               $("#error_name").text("");

//           }
//       });
//       $("#lastname").focusout(function(){
//           if($(this).val()==''){
//               $(this).css("border-color", "#FF0000");
//               $('#submit').attr('disabled',true);
//               $("#error_lastname").text("* You have to enter your Last name!");
//           }
//           else
//           {
//               $(this).css("border-color", "#2eb82e");
//               $('#submit').attr('disabled',false);
//               $("#error_lastname").text("");
//           }
//       });
//       $("#gender").focusout(function(){
//        $(this).css("border-color", "#2eb82e");

//    });
//       $("#age").focusout(function(){
//           if($(this).val()==''){
//               $(this).css("border-color", "#FF0000");
//               $('#submit').attr('disabled',true);
//               $("#error_age").text("* You have to enter your Age!");
//           }
//           else
//           {
//               $(this).css({"border-color":"#2eb82e"});
//               $('#submit').attr('disabled',false);
//               $("#error_age").text("");

//           }
//       });
//       $("#phone").focusout(function(){
//         $pho =$("#phone").val();
//         if($(this).val()==''){
//           $(this).css("border-color", "#FF0000");
//           $('#submit').attr('disabled',true);
//           $("#error_phone").text("* You have to enter your Phone Number!");
//       }
//       else if ($pho.length!=9)
//       {
//           $(this).css("border-color", "#FF0000");
//           $('#submit').attr('disabled',true);
//           $("#error_phone").text("* Lenght of Phone Number Should Be Nine");
//       }
//       else if(!$.isNumeric($pho))
//       {
//        $(this).css("border-color", "#FF0000");
//        $('#submit').attr('disabled',true);
//        $("#error_phone").text("* Phone Number Should Be Numeric");
//    }
//    else{
//       $(this).css({"border-color":"#2eb82e"});
//       $('#submit').attr('disabled',false);
//       $("#error_phone").text("");
//   }

// });

//       $( "#submit" ).click(function() {
//           if($("#myName" ).val()=='')
//           {
//               $("#myName").css("border-color", "#FF0000");
//               $('#submit').attr('disabled',true);
//               $("#error_name").text("* You have to enter your first name!");
//           }
//           if($("#lastname" ).val()=='')
//           {
//               $("#lastname").css("border-color", "#FF0000");
//               $('#submit').attr('disabled',true);
//               $("#error_lastname").text("* You have to enter your Last name!");
//           }
//           if($("#age" ).val()=='')
//           {
//               $("#age").css("border-color", "#FF0000");
//               $('#submit').attr('disabled',true);
//               $("#error_age").text("* You have to enter your Age!");
//           }
//           if($("#phone" ).val()=='')
//           {
//               $("#phone").css("border-color", "#FF0000");
//               $('#submit').attr('disabled',true);
//               $("#error_phone").text("* You have to enter your Phone Number!");
//           }
//       });
      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result);
                $('#imageAvatar').val(e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
});

</script>

</head>
<body>
  <div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
     <form name="myform" method="POST" action="/account/create_user_detail" enctype="multipart/form-data">
        @csrf

        <div>
          <div>
            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type='file' id="imageUpload" name="imageAvatar" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                </div>
                <img id="imagePreview" class="img-thumbnail" src="/storage/avatar.png" />
                <input type="hidden" id="imageAvatar" />
            </div>
        </div>
        <div>
            <div class="form-group">
               <label for="myName">First Name *</label>
               <input id="myName" name="myName" class="form-control" type="text" data-validation="required">
               <span id="error_name" class="text-danger"></span>
           </div>
           <div class="form-group">
               <label for="lastname">Last Name *</label>
               <input id="lastname" name="lastname" class="form-control" type="text" data-validation="email">
               <span id="error_lastname" class="text-danger"></span>
           </div>
       </div>
   </div>
   <div class="form-group">
       <label for="age">Age *</label>
       <input id="age" name="age"  class="form-control" type="number" min="1" >
       <span id="error_age" class="text-danger"></span>
   </div>
   <div class="form-group">
       <label for="gender">Gender</label>
       <select name="gender" id="gender" class="form-control">
          <option selected>Male</option>
          <option>Female</option>
          <option>Other</option>
      </select>
      <span id="error_gender" class="text-danger"></span>
  </div>
  <div class="form-group">
   <label for="phone">Phone Number *</label>
   <input type="text" id="phone" name="phone" class="form-control" >
   <span id="error_phone" class="text-danger"></span>
</div>
<div class="form-group">
   <label for="disc">Address</label>
   <textarea class="form-control" rows="3"></textarea>
</div>

<button id="submit" type="submit" value="submit" class="btn btn-primary center">Save</button>

</form>
</div>
</div>
</div>
</body>
</html>

@endsection
