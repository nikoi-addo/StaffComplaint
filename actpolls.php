<?php
  session_start();
  include 'handlers/dbcon.php';
  $curr_time = time();

if (isset($_SESSION['loggedin']) && isset($_SESSION['adminpanel'])) {
  ?>
  <!DOCTYPE html>
  <html lang="en">


  <head>
          <!-- META SECTION -->
          <title>Internal Complaint - Admin Active Posts</title>
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
                      <li>
                          <a href="inactposts.php"><span class="fa fa-shield" style="color: white;"></span> <span class="xn-text" style="color: white;">Inactive Posts</span></a>
                      </li>

                      <li>
                          <a href="actposts.php"><span class="fa fa-check-circle-o" style="color: white;"></span> <span class="xn-text" style="color: white;">Active Posts</span></a>
                      </li>

                      <li class="xn-title"><b>Polls Records</b></li>
                      <li>
                         <a href="delpolls.php"><span class="fa fa-trash-o" style="color: white;"></span> <span class="xn-text" style="color: white;">Deleted Polls</span></a>
                     </li>
                      <li>
                         <a href="inactpolls.php"><span class="fa fa-lock" style="color: white;"></span> <span class="xn-text" style="color: white;">Inactive Polls</span></a>
                     </li>
                     <li class="active">
                         <a href="actpolls.php"><span class="fa fa-bullhorn" style="color: white;"></span> <span class="xn-text" style="color: white;">Active Polls</span></a>
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
                      <h2><span class="fa fa-users"></span> Admin Table for <i><b>Active Posts</b></i></h2>
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
                                                  <th width="300">Question</th>
                                                  <th width="100">Options</th>
                                                  <th width="100">Status</th>
                                                  <th width="100">Date</th>
                                                  <th width="100">Last Vote</th>
                                                  <th width="100">No. of Votes</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                              //Select only those whose time has not elapsed.
                                              $sql_actpolldisplay = "SELECT * FROM poll WHERE p_timeout > $curr_time ORDER BY p_date DESC";
                                              $success_actpolldisplay = mysqli_query($link, $sql_actpolldisplay);
                                              if ($success_actpolldisplay->num_rows > 0) {
                                                $i = 1;
                                                while($rows = $success_actpolldisplay->fetch_assoc()){
                                            ?>
                                            <tr id="trow<?php echo $rows['p_id']; ?>">
                                              <td class="text-center"><?php echo $i; ?></td>
                                              <td><strong> <?php echo $rows['p_question']; ?> </strong></td>
                                              <td>
                                                <?php
                                                echo $rows['p_options']; ?>
                                              </td>
                                              <td><?php
                                                //Display time not exceeded
                                                if ($curr_time < $rows['p_timeout']) {
                                                  echo "<span class='label label-success'>Active</span>";
                                                }
                                                //Display time exceeded
                                                elseif ($curr_time > $rows['p_timeout']){
                                                  echo "<span class='label label-danger'>Inactive</span>";
                                                } ?>
                                                </td>
                                                <td><?php echo date("M d, Y @ h:i a", $rows['p_date']); ?></td>
                                                <td><?php echo date("M d, Y @ h:i a", $rows['p_last_vote_date']); ?></td>
                                                <td><?php echo $rows['p_voters'] ?></td>
                                            </tr>
                                            <?php
                                                $i++;
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

<?php
}else {
  header('location:admin.php');
}
 ?>
