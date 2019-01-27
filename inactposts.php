<?php
  include 'handlers/dbcon.php';
  $curr_time = time();
?>
<!DOCTYPE html>
<html lang="en">


<head>
        <!-- META SECTION -->
        <title>Internal Complaint - Admin Inactive Posts</title>
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
                    <li class="xn-logo">
                        <a href="table-export.php"><b>AcaCell</b></a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
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
                                <div class="profile-data-title">Internal Issues</div>
                            </div>

                        </div>
                    </li>
                   <li class="xn-title"><b>Navigation</b></li>
                    <li>
                        <a href="admin.php"><span class="fa fa-desktop" style="color: white;"></span> <span class="xn-text" style="color: white;">Dashboard</span></a>
                    </li>

                    <li class="xn-title"><b>Status</b></li>
                    <li>
                        <a href="delposts.php"><span class="fa fa-minus" style="color: white;"></span> <span class="xn-text" style="color: white;">Deleted Posts</span></a>
                    </li>
                    <li  class="active">
                        <a href="inactposts.php"><span class="fa fa-shield" style="color: white;"></span> <span class="xn-text" style="color: white;">Inactive Posts</span></a>
                    </li>

                    <li>
                        <a href="actposts.php"><span class="fa fa-check-circle-o" style="color: white;"></span> <span class="xn-text" style="color: white;">Active Posts</span></a>
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

                    <li class="active">Deleted . Active . Inactive Database for Admin</li>
                </ul>

                <!-- PAGE TITLE -->
                <div class="page-title">
                    <h2><span class="fa fa-users"></span> Admin Table for <i>Inactive Posts</b></i></h2>
                </div>
                <!-- END PAGE TITLE -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">



                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                </div>
                                <div class="panel-body">
                                    <table id="customers2" class="table datatable">
                                        <thead>
                                            <tr>
                                                <th width="50">id</th>
                                                <th width="300">Post</th>
                                                <th width="100">Reply from HR</th>
                                                <th width="100">Status</th>
                                                <th width="100">IP Address</th>
                                                <th width="100">Date</th>
                                                <th width="100">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            //Select only those whose stop time has elapsed
                                            $sql_delpostsdisplay = "SELECT * FROM complaints WHERE c_date_stop_display < $curr_time ORDER BY c_date_created DESC";
                                            $success_delpostdisplay = mysqli_query($link, $sql_delpostsdisplay);
                                            $cur_time = time();
                                            if ($success_delpostdisplay->num_rows > 0) {
                                              while($rows = $success_delpostdisplay->fetch_assoc()){
                                                $id = $rows['c_id'];
                                                $sql_commentpresent = "SELECT * FROM comments WHERE c_id = '$id'";
                                                $success_commentpresent = mysqli_query($link, $sql_commentpresent);
                                          ?>
                                                <tr id="trow<?php echo $rows['c_id']; ?>">
                                                  <td class="text-center"> <?php echo $rows['c_id'];; ?> </td>
                                                  <td><strong><?php echo $rows['c_value']; ?></strong></td>
                                                  <td>
                                                    <?php
                                                    if ($success_commentpresent->num_rows > 0) {?>
                                                        <span class='label label-success'>Responded</span>
                                                    <?php }
                                                    elseif ($success_commentpresent->num_rows == 0) {?>
                                                      <span class='label label-danger'>Not Responded</span>
                                                    <?php } ?>
                                                  </td>
                                                  <td><?php echo "<span class='label label-danger'>Inactive</span>";?></td>
                                                  <td><?php echo $rows['c_ip_address']; ?></td>
                                                  <td><?php echo date("M d, Y @ h:i a", $rows['c_date_created']); ?></td>
                                                  <td>Yet to decide</td>
                                                </tr>
                                          <?php
                                                }
                                              }
                                          ?>

                                            </tbody>
                                    </table>

                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT -->



                        </div>
                    </div>

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
                            <a href="logOut.php" class="btn btn-success btn-lg">Yes</a>
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
