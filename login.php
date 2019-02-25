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
                  <?php if (isset($_POST['requestpassword'])){ ?>
                    <form action="handlers/ops.php" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="e-mail" class="form-control" placeholder="Enter Staff Mail"/>
                            <button class="btn btn-info btn-block" name="requestpassword">Request Passord</button>
                        </div>
                    </div>
                    <form>
                  <?php }
                  else {
                    ?>
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <form action="handlers/ops.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="e-mail" class="form-control" placeholder="E-mail"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-md-12">
                            <button class="btn btn-info btn-block">Log In</button>
                            </form>
                        <br>
                        <form action="" method="post">
                            <button class="btn btn-info btn-block" name="requestpassword">First Login? Request Password</button>
                          </form>
                        </div>
                    </div>
                <?php
                  }
                ?>


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
