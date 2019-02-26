<!DOCTYPE html>
<html lang="en" class="body-full-height">


<head>
        <!-- META SECTION -->
        <title>NCA Staff Ideas Portal Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>

        <div class="login-container">

            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, SignUp Below</div>
                    <?php session_start(); if (isset($_SESSION['error'])) { echo $_SESSION['error']; session_unset(); session_destroy();} ?>
                    <form action="handlers/ops.php" method="post" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="email" class="form-control" name="user_email" placeholder="Enter Staff Mail" required id="user_email"/>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                          <input type="password" class="form-control" name="user_password" placeholder="Enter New Password" id="user_password" required/>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                          <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" id="confirm_password" required/>
                      </div>
                    </div>
                    <button class="btn btn-info btn-block" name="signup">SignUp</button>
                    <form>


                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2019 NCA Staff Ideas Portal
                    </div>
                    <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </div>

        </div>

        <script type="text/javascript">
        var password = document.getElementById("user_password"), confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
          if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
          } else {
            confirm_password.setCustomValidity('');
          }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
        </script>

    </body>


</html>
