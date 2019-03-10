<!DOCTYPE HTML>
<html>
<head>
  <title>Log in</title>
  <!--Include javascript and css files-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script  type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/angular.min.js"></script>
  <script type="text/javascript" src="js/alertify.min.js"></script>
  <link rel="stylesheet" href="css/materialize.min.css" />
  <link rel="stylesheet" href="fonts/material icons/icons.css"/>
  <!--<link rel="stylesheet" href="css/index.css" />-->
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css" />
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"/>
  <link rel="stylesheet" href="css/alertify.min.css"/>
  <link rel="stylesheet" href="css/semantic.min.css"/>
  <style>
  .error{
    color:red;
  }
  body{
    font-color: #ff4d4d;
  }
  .login-header{
    background-color:#26A69A;
    color:white;
    line-height: 80px;
    margin-top: 0px;
    border-radius:16px;
  }
  .login-cont{
    border:solid 1px #26A69A;
    margin-top: 20px;
    margin-right: 0px;
    border-radius: 20px;
  }
  .user-icon{
    font-size: 30px;
    color: gray;
  }
  .fa-user-o{
     border: solid gray 1px;
     padding-left: 30px;
     padding-right: 30px;
     padding-top: 20px;
    padding-bottom:20px;
     border-radius:100%;
  }
  #register{
    margin-left:44%;
    font-family: serif;
  }
</style>
</head>
<body class="row">
   <div class="col l2"></div>
   <div class="col l6">
    <div class="login-cont container">
    <h4 class="login-header center">STUDENT LOGIN</h4>

    <form class="login-container" id="login-form">
      <div class="row">
        <p class="user-icon center"> <i class="fa fa-user-o fa-4x aria-hidden="true"></i> </p>
        <p><input style="border: solid #26A69A 1px; border-radius: 6px; margin-left:30px; " class="col l5 s4" type="text" name="student_id" placeholder="School id"></p>
        <p><input style="border: solid #26A69A 1px; margin-left:30px; border-radius: 6px;" class="col l5 s4" type="password"  name="password" placeholder="Password"></p>
      </div>
      <span class="error"></span>
      <span class="info"></span>
      <p><button style=" width:93%; background-color:#26A69A; margin-left:20px; margin-bottom: 30px;" class="btn" id="login-submit" value="Log in"> LOGIN</button> <br>
        <p id=register><a href="register.html"> Register?</a> </p>
    </form>
  </div> 
  </div>
  <div class="col l3 "></div>
  <script type="text/javascript">
    $(function(){

      //get the form
      var form = $('#login-form');

      //prevent form submission
      $(form).submit(function(event){
        event.preventDefault();
      });

      //event listener to intercept form submission events
      $('#login-submit').click(function(){

        //serialise the form data
        var formInput = $(form).serialize();

        //form submission using ajax
        $.ajax({
          type: 'POST',
          url: 'http://localhost/includes/loginprocess.php',
          data: formInput,
          dataType: 'json',

          success:function(response){
            console.log(response)
            if (response.inputError) {
              $('.error').html(response.inputError)
            }else{
              $('.error').html('')
            }

            if (response.passwordError) {
              $('.error').html(response.passwordError)
              $(form)[0].reset()
            }else{
              $('.error').html('')
            }

            if (response.login_status == "1") {
              $('.error').html('')
              $('.info').html('login successful')
              $(form)[0].reset();
              $('#login-submit').html('<img src="/img/ajax-loader.gif">');
              setTimeout(' window.location.href = "index.php"; ',4000);
            }
          },
          error:function(err){
            console.log(err)
          }
        })
      });
    });
  </script>
 </body>
 </html>
 
