<?php
session_start();
if (isset($_POST['adminlogin'])) {
  if ($_POST['admin_username'] == 'admin' && $_POST['password'] == 'admin') {
    $_SESSION['loggedin'] = true;
    $_SESSION['adminpanel'] = true;
  }
}

if (isset($_SESSION['loggedin']) && isset($_SESSION['adminpanel'])) {
?>
<!DOCTYPE html>
<html lang="en">
<?php
  include 'handlers/dbcon.php';
  $curr_time = time();
?>

<head>
        <!-- META SECTION -->
        <title>NCA Staff Ideas Portal - Admin</title>
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
        <!-- START PAGE CONTAINER -->
        <div class="page-container">

            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">

                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">Admin</div>
                                <div class="profile-data-title">Ideas Generation Portal</div>
                            </div>

                        </div>
                    </li>
                   <li class="xn-title"><b>Navigation</b></li>
                    <li class="active">
                        <a href="admin.php"><span class="fa fa-desktop" style="color: white;"></span> <span class="xn-text" style="color: white;">Dashboard</span></a>
                    </li>

                    <li class="xn-title"><b>Status</b></li>
                    <li>
                        <a href="delposts.php"><span class="fa fa-trash-o" style="color: white;"></span> <span class="xn-text" style="color: white;">Deleted Posts</span></a>
                    </li>
                    <li>
                        <a href="inactposts.php"><span class="fa fa-shield" style="color: white;"></span> <span class="xn-text" style="color: white;">Inactive Posts</span></a>
                    </li>

                    <li>
                        <a href="actposts.php"><span class="fa fa-check-circle-o" style="color: white;"></span> <span class="xn-text" style="color: white;">Active Posts</span></a>
                    </li>

                     <li class="xn-title"><b>Human Resource Polls</b></li>
                     <li>
                        <a href="delpolls.php"><span class="fa fa-trash-o" style="color: white;"></span> <span class="xn-text" style="color: white;">Deleted Polls</span></a>
                    </li>
                     <li>
                        <a href="inactpolls.php"><span class="fa fa-lock" style="color: white;"></span> <span class="xn-text" style="color: white;">Inactive Polls</span></a>
                    </li>
                    <li>
                        <a href="actpolls.php"><span class="fa fa-bullhorn" style="color: white;"></span> <span class="xn-text" style="color: white;">Active Polls</span></a>
                    </li>

                    <li class="xn-title"><b>Staff Polls</b></li>
                     <li>
                        <a href="staffdelpolls.php"><span class="fa fa-trash-o" style="color: white;"></span> <span class="xn-text" style="color: white;">Deleted Polls</span></a>
                    </li>
                     <li>
                        <a href="staffinactpolls.php"><span class="fa fa-lock" style="color: white;"></span> <span class="xn-text" style="color: white;">Inactive Polls</span></a>
                    </li>
                    <li>
                        <a href="staffactpolls.php"><span class="fa fa-bullhorn" style="color: white;"></span> <span class="xn-text" style="color: white;">Active Polls</span></a>
                    </li>



                        </ul>



                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="page-content">

                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->


                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                    </li>
                    <!-- END SIGN OUT -->


                </ul>
                <!-- END X-NAVIGATION VERTICAL -->

                    <ul class="breadcrumb">

                    <li class="active">Admin</li>
                </ul>

                <!-- PAGE TITLE -->
                <div class="page-title" style="padding-left: 400px;">
                    <h2><span class="fa fa-users"></span> Welcome to <b>Ideas Portal</b></h2>
                </div>
                <!-- END PAGE TITLE -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">



                    <div class="row">
                        <div class="col-md-12" >

                            <div class="col-md-4">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-envelope"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count">48</div>
                                    <div class="widget-title">New iDea</div>
                                    <div class="widget-subtitle">Number OF iDEAS Generated</div>
                                </div>      
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-4">
                            
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">375</div>
                                    <div class="widget-title">Registred Staff</div>
                                    <div class="widget-subtitle">On the iDeas Portal</div>
                                </div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                            </div>                            
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>
                        <div class="col-md-4">
                            
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-info widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                                <div class="widget-buttons widget-c3">
                                    <div class="col">
                                        <a href="#"><span class="fa fa-clock-o"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-bell"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-calendar"></span></a>
                                    </div>
                                </div>                            
                            </div>                        
                            <!-- END WIDGET CLOCK -->
                            
                        </div>
                    </div>
                    <!-- END WIDGETS -->                    
                    
                    

                </div>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->



        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>
                        <p>Press No if you want to continue work. Press Yes to logout .</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="logout.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/plugins/tableexport/tableExport.js"></script>
  <script type="text/javascript" src="js/plugins/tableexport/jquery.base64.js"></script>
  <script type="text/javascript" src="js/plugins/tableexport/html2canvas.js"></script>
  <script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
  <script type="text/javascript" src="js/plugins/tableexport/jspdf/jspdf.js"></script>
  <script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/base64.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>

        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
    </body>


</html>
<!--  -->
<?php
}
else {?>
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
                      <div class="login-title"><strong>Admin</strong>, Please login</div>
                      <form action="" class="form-horizontal" method="post">
                      <div class="form-group">
                          <div class="col-md-12">
                              <input type="text" class="form-control" name="admin_username" placeholder="E-mail" required/>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                              <input type="password" class="form-control" name="password" placeholder="Password" required/>
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-md-12">
                              <button class="btn btn-info btn-block" name="adminlogin">Log In</button>
                              </form>
                          <br>
                          </div>
                      </div>
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

<?php }
 ?>
