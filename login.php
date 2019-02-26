<?php
session_start();

if (isset($_SESSION['email'])) {
  $u_email = $_SESSION['email'];
}
?>
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
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>

        <div class="login-container">

            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <form action="handlers/ops.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">

                            <input type="e-mail" class="form-control" name="email" placeholder="E-mail" value="<?php if (isset($_SESSION['email'])){echo $u_email;} ?>" required/>



                        </div>
                    </div>
                    <?php if(isset($_SESSION['error'])){echo $_SESSION['error']; session_unset(); session_destroy();} ?>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="password" placeholder="Password" required/>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-md-12">
                            <button class="btn btn-info btn-block" name="login">Log In</button>
                            </form>
                        <br>
                        </div>
                    </div>
                    <a href="signup.php"><button class="btn btn-info btn-block" name="requestsignup">SignUp</button></a>


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

    </body>


</html>
