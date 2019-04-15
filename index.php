<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - Sistem Pembinaan Karakter</title>
    <script language="JavaScript">
      var txt=":: Login - Sistem Pembinaan Karakter ";
      var kecepatan=250;var segarkan=null;function bergerak() { document.title=txt;
      txt=txt.substring(1,txt.length)+txt.charAt(0);
      segarkan=setTimeout("bergerak()",kecepatan);}bergerak();
    </script>

    <link rel="shortcut icon" href="images/fav.ico">

    <!-- Bootstrap -->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href=".assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
      	    <div>
                <h3>&nbsp; Selamat Datang di SIPAKAR</h3>      
            </div>	
        <div class="animate form login_form">
          <section class="login_content">
            <form action="login.php" method="post" >
              <h1>Form Login</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password"/>
              </div>
              <div align="right">
              
                <button class="btn btn-default submit" href="login.php" >Log in</buttonh>
                <!--<a class="reset_pass" href="#">Lupa password?</a>-->
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>