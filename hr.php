<!DOCTYPE html>
<html lang="en">

<?php
  include 'handlers/dbcon.php';
  $timely = time();
?>

<head>
        <!-- META SECTION -->
        <title>Internal Complaint - Human Resource</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
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

                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <div class="informer informer-danger">4</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages From HR</h3>
                                <div class="pull-right">
                                    <span class="label label-danger">4 new</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-online"></div>
                                    <img src="assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>
                                    <span class="contacts-title">John Doe</span>
                                    <p>Praesent placerat tellus id augue condimentum</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
                                    <span class="contacts-title">Dmitry Ivaniuk</span>
                                    <p>Donec risus sapien, sagittis et magna quis</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>
                                    <span class="contacts-title">Nadia Ali</span>
                                    <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-offline"></div>
                                    <img src="assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>
                                    <span class="contacts-title">Darth Vader</span>
                                    <p>I want my money back!</p>
                                </a>
                            </div>
                            <div class="panel-footer text-center">
                                <a href="pages-messages.html">Show all messages</a>
                            </div>
                        </div>
                    </li>
                    <!-- END MESSAGES -->

                </ul>
                <!-- END X-NAVIGATION VERTICAL -->

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                   <li class="active">Internal Complaint Portal   Human Resource Division</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">

                        <div class="col-md-12">

                          <!-- START NEW RECORD -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Any Internal Issues?</h3>
                                    <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-tag"></span></span>
                                                <input class="form-control" name="subject" placeholder="Subject of Message..." required/>
                                            </div>
                                            <br><div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input class="form-control" name="hrmessage" maxlength="2048" placeholder="What's happening?..." required/>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-suitcase"></span></span>
                                              <select class="form-control" name="addivision">
                                                        <option>All Divisions (optional)</option>
                                                        <option>Administration Division</option>
                                                        <option>Consumer and Corporate Affairs Division</option>
                                                        <option>Cybersecurity Division</option>
                                                        <option>Engineering Division</option>
                                                        <option>Finance Division</option>
                                                        <option>Human Resource Division</option>
                                                        <option>Information Technology (IT) Division</option>
                                                        <option>Legal Division</option>
                                                        <option>Policy, Strategy and Innovation Division</option>
                                                        <option>Regulatory Administration Division</option>
                                                        <option>Research and Business Development</option>


                                                    </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="btn-group pull-left">
                                            <input type="hidden" name="form_type" value="ComplainForm">
                                            <input type="file" name="hrimages" accept="image/*" />
                                              
                                            </div>
                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-success"><span class="fa fa-share"></span> SEND</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <?php
                                //Delete successful
                                  if(isset($_GET['delrsp']) && $_GET['delrsp'] == 0){
                                    $msg ="<div class='alert alert-success'>
                                      <center>Complaint Successfully Deleted!!!
                                      <a class='close' data-dismiss='alert'>&times;</a>
                                      </center>
                                    </div>";
                                    echo $msg;
                                  }
                                  //Delete Error
                                  elseif(isset($_GET['delrsp']) && $_GET['delrsp'] == 1){
                                    $msg ="<div class='alert alert-danger'>
                                      <center>Error Deleting Complaint!!!
                                      <a class='close' data-dismiss='alert'>&times;</a>
                                      </center>
                                    </div>";
                                    echo $msg;
                                  }
                                  elseif(isset($_GET['delrsp']) && $_GET['delrsp'] == 2){
                                    $msg ="<div class='alert alert-danger'>
                                      <center>Error Changing Complaint Status!!!
                                      <a class='close' data-dismiss='alert'>&times;</a>
                                      </center>
                                    </div>";
                                    echo $msg;
                                  }
                                 ?>
                            </div>
                            <!-- END NEW RECORD -->

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <!-- START TIMELINE -->
                            <div class="timeline timeline-right">

                                <!-- START TIMELINE ITEM -->
                                <div class="timeline-item timeline-main">
                                    <div class="timeline-date">2019</div>
                                </div>
                                <!-- END TIMELINE ITEM -->

                                <?php
                                    //Complaint sql query
                                    $sql_complaintdisplay = "SELECT * FROM complaints WHERE c_date_stop_display > $timely ORDER BY c_date_created DESC";
                                    //Execution of Complaint Query
                                    $success_complaintdisplay = mysqli_query($link, $sql_complaintdisplay);

                                    if ($success_complaintdisplay->num_rows > 0) {
                                      while($rows = $success_complaintdisplay->fetch_assoc()){
                                ?>

                                <!-- START TIMELINE ITEM -->
                                 <div class="timeline-item timeline-item-right">
                                     <div class="timeline-item-info"> <?php echo date("d M G:i", $rows['c_date_created']); ?> </div>
                                     <div class="timeline-item-icon"><span class="fa fa-bullhorn"></span></div>
                                     <div class="timeline-item-content">
                                         <div class="timeline-heading">
                                             <img src="assets/images/users/avatar.jpg"/> <b>Anonymus</b> <i>from</i> <u><?php echo $rows['c_division']; ?></u> made a complaint
                                             <div class="pull-right">
                                             <!-- Delete button -->
                                             <button href="#" data-box="#mb-delcomp<?php echo $rows['c_id']; ?>" class="mb-control btn btn-default" type="submit"><span class="fa fa-trash-o"></span></button>
                                             </div>
                                         </div>
                                         <div class="timeline-body">
                                           <div class="row">
                                             <div class="col-md-10">
                                               <!-- Display Complaint from Database -->
                                               <p><?php echo $rows['c_value']; ?></p>
                                             </div>
                                             <div class="col-md-2">

                                             </div>

                                           </div>


                                           <!-- Check if there is an image stored in the database for the particular comment -->
                                           <?php
                                              if ($rows['c_image_name1'] != "") {
                                          ?>
                                          <div class="row">
                                              <div class="col-md-4">
                                                  <a href="uploads/<?php echo $rows['c_image_name1']; ?>" data-gallery>
                                                      <img src="uploads/<?php echo $rows['c_image_name1']; ?>" class="img-responsive img-text"/>
                                                  </a>
                                              </div>
                                          </div>
                                          <?php
                                              }

                                           ?>

                                         </div>

                                         <?php
                                          //Comment id
                                          $comment_id = $rows['c_id'];
                                          //Query for comment display
                                          $sql_commentdisplay = "SELECT * FROM comments WHERE c_id = $comment_id";
                                          //Execution for comment display
                                          $success_commentdisplay = mysqli_query($link, $sql_commentdisplay);

                                          if ($success_commentdisplay->num_rows > 0) {
                                            while ($cm_rows = $success_commentdisplay->fetch_assoc()){
                                          ?>
                                          <!-- Comments -->
                                            <div class="timeline-body comments">
                                              <div class="comment-item">
                                                  <img src="assets/images/users/avatar.jpg"/>
                                                  <p class="comment-head">
                                                      <b>Human Resource Division</b>
                                                       <small class="text-muted pull-right"><?php echo date("d M @ h:i a", $cm_rows['cm_date']); ?></small>
                                                  </p>
                                                  <!-- Comment from Database -->
                                                  <p><?php echo $cm_rows['cm_value']; ?></p>
                                                 
                                              </div>

                                          </div>
                                          <?php
                                            }

                                          }
                                         ?>
                                         <!-- Insert new comment -->
                                         <div class="comment-item">
                                           <form action="handlers/ops.php" method="post">
                                             <input type="hidden" name="form_type" value="UploadComment">
                                             <input type="hidden" name="complaint_id" value="<?php echo $rows['c_id']; ?>">

                                             <!-- Check if a comment has been submitted -->
                                             <?php
                                             // If comment is sent successfully
                                             if (isset($_GET['cmrsp']) && isset($_GET['rsp']) && $_GET['rsp'] == $rows['c_id'] && $_GET['cmrsp'] == 1) {
                                               $msg ="<div class='alert alert-success'>
                                                 <center>Comment Sent!!!
                                                 <a class='close' data-dismiss='alert'>&times;</a>
                                                 </center>
                                               </div>";
                                               echo $msg;
                                             }
                                             //If comment is not sent
                                             elseif (isset($_GET['cmrsp']) && isset($_GET['rsp']) && $_GET['rsp'] == $rows['c_id'] && $_GET['cmrsp'] == 0) {
                                               $msg ="<div class='alert alert-danger'>
                                                 <center>Unable to Upload Comment. Retry!!!
                                                 <a class='close' data-dismiss='alert'>&times;</a>
                                                 </center>
                                               </div>";
                                               echo $msg;
                                             } ?>
                                             <div class="col-md-11">
                                            <input class="form-control" type="text" name="comment" placeholder="Enter Comments here(Limit: 1024 Characters)"
                                               <?php
                                                  if (isset($_GET['cmrsp']) && $_GET['rsp'] == $rows['c_id']) {
                                                  //Focus on the comment you just sent
                                                  echo "autofocus";
                                                  } ?> required>
                                              </div>
                                             <button class="btn btn-default col-md-1" type="submit"><span class="fa fa-send"></span></button>
                                          </form>
                                         </div>

                                     </div>

                                 </div>
                                 <!-- MESSAGE BOX-->
                                 <div class="message-box animated fadeIn" id="mb-delcomp<?php echo $rows['c_id']; ?>">
                                     <div class="mb-container">
                                         <div class="mb-middle">
                                             <div class="mb-title"><span class="fa fa-sign-out"></span> Delete <strong>Complaint</strong> ?</div>
                                             <div class="mb-content">
                                                 <p>Are you sure you want to delete this complaint?</p>
                                                 <p>Press No if you want to Cancel. Press Yes to Delete.</p>
                                             </div>
                                             <div class="mb-footer">
                                                 <div class="pull-right">
                                                   <form class="" action="handlers/ops.php" method="post">
                                                     <!-- Specify form type as hidden -->
                                                     <input type="hidden" name="form_type" value="DeleteComplaint">
                                                     <!-- Pass complaint Information also hidden -->
                                                     <input type="hidden" name="complaint_value" value=" <?php echo $rows['c_value']; ?> ">
                                                     <input type="hidden" name="complaint_division" value=" <?php echo $rows['c_division']; ?> ">
                                                     <input type="hidden" name="complaint_date_created" value=" <?php echo $rows['c_date_created']; ?> ">
                                                     <input type="hidden" name="complaint_ip_address" value=" <?php echo $rows['c_ip_address']; ?> ">
                                                     <input type="hidden" name="complaint_date_stop_display" value=" <?php echo $rows['c_date_stop_display']; ?> ">
                                                     <input type="hidden" name="complaint_image_name1" value=" <?php echo $rows['c_image_name1']; ?> ">
                                                     <input type="hidden" name="complaint_id" value=" <?php echo $rows['c_id']; ?> ">

                                                     <button class="btn btn-danger btn-lg" type="submit">Yes</a>
                                                     <button class="btn btn-default btn-lg mb-control-close">No</button>
                                                     </form>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <!-- END MESSAGE BOX-->

                                <?php
                                      }

                                    }
                                    else {
                                      echo "No Complaints available currently";
                                    }


                                ?>
                                <!-- END TIMELINE ITEM -->

                                <!-- START TIMELINE ITEM -->
                                <div class="timeline-item timeline-main">
                                    <div class="timeline-date"><a href="#"><span class="fa fa-ellipsis-h"></span></a></div>
                                </div>
                                <!-- END TIMELINE ITEM -->
                            </div>
                            <!-- END TIMELINE -->

                        </div>
                    </div>

                </div>
                <!-- END PAGE CONTENT WRAPPER -->


            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- BLUEIMP GALLERY -->
        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>
        <!-- END BLUEIMP GALLERY -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>
                        <p>Press No if you want to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
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

        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;libraries=places"></script>
        <script type="text/javascript" src="js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>

        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>
        <script type="text/javascript" src="js/demo_maps.js"></script>
        <!-- END TEMPLATE -->

        <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
        </script>

        <script>
            document.getElementById('links').onclick = function (event) {
                event = event || window.event;
                var target = event.target || event.srcElement,
                    link = target.src ? target.parentNode : target,
                    options = {index: link, event: event,onclosed: function(){
                        setTimeout(function(){
                            $("body").css("overflow","");
                        },200);
                    }},
                    links = this.getElementsByTagName('a');
                blueimp.Gallery(links, options);
            };

            $('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });

            $("#textareaId").keypress(function (e) {
             if(e.which == 13 && !e.shiftKey) {
            $(this).closest("form").submit();
            e.preventDefault();
            return false;
    }
});
        </script>

    <!-- END
    SCRIPTS -->
    </body>


</html>
