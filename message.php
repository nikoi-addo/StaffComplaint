<?php
  include 'handlers/dbcon.php';
  if (isset($_GET) && isset($_GET['msgid'])) {
    $msgid = $_GET['msgid'];
  }
  //If a message is not requested to be shown then redirect to home
  else {
    header("location:index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">


<head>
        <!-- META SECTION -->
        <title>Message From Human Resource Division</title>
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


                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="page-content">

                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">

                    <li class="xn-icon-button pull-left">
                       <img src="img/logo.png"/>

                    </li>




                </ul>
                <!-- END X-NAVIGATION VERTICAL -->

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="index.php">Home</a></li>

                    <li class="active">Message</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- START CONTENT FRAME -->
                <div class="content-frame">
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">
                        <div class="page-title">
                            <h2><span class="fa fa-file-text"></span> Message From Human Resource Division</h2>
                        </div>


                    </div>
                    <!-- END CONTENT FRAME TOP -->

                    <?php
                    $sql_displaymessage = "SELECT * FROM messagehr WHERE m_id = '$msgid'";
                    $sql_displaymessage = test_input($sql_displaymessage);
                    $success_displaymessage = mysqli_query($link, $sql_displaymessage);

                    if ($success_displaymessage->num_rows == 1) {
                      while($rows = $success_displaymessage->fetch_assoc()){ ?>

                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <div class="pull-left">
                                      <img src="assets/images/users/avatar.jpg" class="panel-title-image" alt="John Doe"/>
                                      <h3 class="panel-title">Addressed to All Divisions</h3>
                                  </div>

                              </div>
                              <div class="panel-body">
                                  <h3><?php echo $rows['m_subject']; ?> <small class="pull-right text-muted"><span class="fa fa-clock-o"></span> <?php echo date("d M,Y G:i", $rows['m_date_created']); ?></small></h3>
                                  <p>Hello \Username\,</p>
                                  <p> <?php echo $rows['m_message']; ?> </p>
                                  <p class="text-muted"><strong>Best Regards<br/>John Doe</strong></p>
                              </div>
                          </div>
                    </div>
                    <!-- END CONTENT FRAME BODY -->
                  <?php
                    }
                  }
                  else {
                    header("location:index.php");
                  }
                   ?>
                </div>
                <!-- END CONTENT FRAME -->
            </div>
            <!-- END PAGE CONTENT -->
            <?php
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
             ?>
        </div>
        <!-- END PAGE CONTAINER -->



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

        <script type="text/javascript" src="js/plugins/summernote/summernote.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>

        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
    </body>


</html>
