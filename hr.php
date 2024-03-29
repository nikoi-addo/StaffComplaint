<?php
  session_start();
  include 'handlers/dbcon.php';
  $timely = time();
  $username = "Human Resource Division";
  if (isset($_SESSION['loggedin']) == true && isset($_SESSION['admin']) == true) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
            <!-- META SECTION -->
            <title>NCA Staff Ideas Portal - Human Resource</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="refresh" content="2000" />

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
                            <a href="#"><span class="fa fa-inbox"></span></a>

                            <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><span class="fa fa-inbox"></span> Messages From HR</h3>

                                </div>
                                <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">

                                  <?php
                                    //SQL Query to show messages
                                    $sql_showhrmessages = "SELECT * FROM messagehr ORDER BY m_date_created DESC";
                                    // The type of user signed in will determine as to which query to give to the division
                                    //Execture show HR messages query
                                    $success_showhrmessages = mysqli_query($link, $sql_showhrmessages);

                                    //Check if execution returned true
                                    if ($success_showhrmessages->num_rows > 0) {
                                        while($mrows = $success_showhrmessages->fetch_assoc()){?>
                                      <a href="message.php?msgid=<?php echo $mrows['m_id']; ?>" class="list-group-item">
                                          <div class="list-group-status status-offline"></div>
                                          <span class="contacts-title"><?php echo $mrows['m_subject']; ?></span>
                                          <!-- Use the substr() function to get a specific length of the message to show -->
                                          <p><?php echo substr($mrows['m_message'], 0, 110) . " ...";?></p>
                                      </a>
                                    <?php }
                                    }
                                    else {
                                      echo "Error here";
                                      echo mysqli_error($link);
                                    }


                                  ?>

                            </div>
                        </li>
                        <!-- END MESSAGES -->

                         <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                    </li>
                    <!-- END SIGN OUT -->

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
                                        <h3>The Human Resource Official?</h3>
                                        <form class="form-horizontal" enctype="multipart/form-data" action="handlers/ops.php" method="post">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-tag"></span></span>
                                                    <input class="form-control" name="subject" placeholder="Subject of Message..." required/>
                                                </div>
                                                <br><div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <textarea style="resize: none ; white-space: normal;" class="form-control" name="hrmessage" maxlength="2048" placeholder="What's happening?..." required/></textarea>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="input-group">
                                                  <span class="input-group-addon"><span class="fa fa-suitcase"></span></span>
                                                  <input type="text" name="add_division" class="form-control" readonly value="All Divisions"/>
                                                </div>
                                                <input type="hidden" name="form_type" value="HRMessage">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="btn-group pull-left">
                                                <input type="file" name="hrimages[]" accept="image/*" multiple/>

                                                </div>
                                         <div class="pull-right">
                                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_basic"><span class="fa fa-thumbs-o-up"></span>  Run Poll For Staff</button>
                                              <button type="submit" class="btn btn-success"><span class="fa fa-share"></span> SEND</button>
                                         </div>

                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                      <!-- START PANELS WITH CONTROLS -->

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




                                <!-- MODALS -->
            <div style="z-index: 999" class="modal" id="modal_basic" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="defModalHead">Run Polls For Staff</h4>
                        </div>
                        <div class="modal-body">
                           <div class="panel-body has-warning">
                             <form action="handlers/ops.php" method="post" enctype="multipart/form-data">
                                <textarea class="form-control" placeholder="Ask Something..." name="question" required></textarea>
                            </div>
                            <div class="panel-body has-success">
                              <input type="text" name="opinion1" class="form-control" placeholder="Option 1" required/>
                              <input type="file" name="pollimages[]" accept="image/*" /><br>
                              <input type="text" name="opinion2" class="form-control" placeholder="Option 2" required/>
                              <input type="file" name="pollimages[]" accept="image/*" /><br>
                              <a data-toggle="collapse" href="#more_opinions">More Opinions +</a>
                              <div id="more_opinions" class="collapse">
                                <br><input type="text" name="opinion3" placeholder="Option 3" class="form-control">
                                <input type="file" name="pollimages[]" accept="image/*" /><br>
                                <a data-toggle="collapse" href="#more_opinions2">More Opinions +</a>
                                <div id="more_opinions2" class="collapse">
                                  <br><input type="text" name="opinion4" placeholder="Option 4" class="form-control">
                                  <input type="file" name="pollimages[]" accept="image/*" />
                                </div>
                              </div>
                            </div>
                            <input type="hidden" name="user_id" value="0">
                            <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-md btn-warning pull-right col-md-4" name="postpoll"><span class="fa fa-share"></span>Post Poll</button>
                            <select class="btn btn-warning pull-left" name="duration">
                                    <option value="1">1 Day</option>
                                    <option value="2">2 Day</option>
                                    <option value="3">3 Day</option>
                                    <option value="4">4 Day</option>
                                    <option value="5">5 Day</option>
                            </select>
                          </form>
                        </div>
                    </div>
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
                                    <!-- START POLL TIMELINE ITEM -->
                                    <?php
                                      //Query to select polls that have not expired
                                      $sql_polldisplay = "SELECT * FROM poll WHERE date_stop_display > $timely ORDER BY date_created DESC";
                                      $success_polldisplay = mysqli_query($link, $sql_polldisplay);
                                      if($success_polldisplay->num_rows > 0){
                                      while ($poll = $success_polldisplay->fetch_assoc()) {
                                        //Set Poll Options as an array
                                        $pollOptions = explode("|", $poll['p_options']);
                                        $votes = explode("|", $poll['p_votes']);
                                        $poll_id = $poll['p_id'];?>
                                        <!-- START POLL ITEM VOTED -->
                                        <div class="timeline-item timeline-item-right">
                                            <div class="timeline-item-info"><?php echo date("d M G:i", $poll['date_created']); ?></div>
                                            <div class="timeline-item-icon"><span class="fa fa-thumbs-up"></span></span></div>
                                            <div class="timeline-item-content">
                                                <div class="timeline-heading">
                                                    <img src="assets/images/users/avatar.jpg"/> <a href="#"><b><?php echo $poll['u_fname']; ?></b></a> added a poll
                                                    <div class="pull-right">
                                                    <!-- Delete button -->
                                                    <button href="#" data-box="#mb-delpoll<?php echo $poll_id; ?>" class="mb-control btn btn-default" type="submit"><span class="fa fa-trash-o"></span></button>
                                                    </div>
                                                </div>
                                                <div class="timeline-body">
                                                    <p style="white-space:pre-wrap;"><?php echo $poll['p_question']; ?></p>
                                                    <span class="pull-right"><?php echo $poll['p_voters']; ?> Votes</span>
                                                </div>
                                                <div class="timeline-body comments">
                                                  <div class="row">
                                                         <?php
                                                         //Display all the Options for the Poll
                                                         for ($i=0; $i < count($pollOptions) ; $i++) {
                                                           $votePercent = round(($votes[$i]/$poll['p_voters'])*100);
                                                           $sql_plimage = "SELECT pl_ref_option, pl_im_name FROM poll_imagine WHERE pl_ref_id = $poll_id AND pl_ref_option = $i";
                                                           $success_plimage = mysqli_query($link, $sql_plimage);
                                                           if ($success_plimage->num_rows > 0) {
                                                             while ($pl_row = $success_plimage->fetch_assoc()) { ?>
                                                               <div class="col-md-6">
                                                                   <a href="uploads/<?php echo $pl_row['pl_im_name']; ?>" data-gallery>
                                                                       <img src="uploads/<?php echo $pl_row['pl_im_name']; ?>" class="img-responsive img-text" style="width: auto; height: 200px;"/>
                                                                   </a>
                                                                   <div class="progress">
                                                                     <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo "$votePercent"; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $votePercent;  ?>%">
                                                                         <b style="color: black;"><?php echo "$votePercent";  ?>%  <?php echo $pollOptions[$i]; ?></b>
                                                                     </div>
                                                                   </div>
                                                               </div>
                                                          <?php
                                                             }
                                                           }
                                                           else {
                                                             ?>
                                                             <div class="col-md-6">
                                                                <div class="progress">
                                                                     <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo "$votePercent"; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $votePercent;  ?>%">
                                                                         <b style="color: black;"><?php echo "$votePercent";  ?>%  <?php echo $pollOptions[$i]; ?></b>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                          <?php
                                                            }
                                                          }
                                                          ?>
                                                  </div>
                                                </div>

                                                <!-- Display comments for a  poll -->
                                                <?php
                                                 //Comment id
                                                 $comment_id = $poll['p_id'];
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
                                                             <b><?php echo $cm_rows['cm_author']?></b>
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


                                                <!-- Insert new comment for a poll -->
                                                <div class="timeline-body comments">
                                                 <div class="comment-write">
                                                  <form action="handlers/ops.php" method="post">
                                                    <input type="hidden" name="form_type" value="UploadComment">
                                                    <input type="hidden" name="poll_id" value="<?php echo $poll['p_id']; ?>">
                                                    <input type="hidden" name="comment_type" value="1">
                                                    <input type="hidden" name="username" value="<?php echo $username; ?>">

                                                    <div class="comment-write col-md-11">
                                                      <input class="form-control" type="text" name="comment" placeholder="Share feedback here(Limit: 1024 Characters)"
                                                      <?php
                                                         if (isset($_GET['cmrsp']) && $_GET['rsp'] == $poll['p_id'] && $_GET['cmtyp'] == 0) {
                                                         //Focus on the comment you just sent
                                                         echo "autofocus";
                                                         } ?> required>
                                                     </div>
                                                     <!-- <button class="btn btn-default col-md-1" type="submit"><span class="fa fa-send"></span></button> -->
                                                 </form>
                                               </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END TIMELINE ITEM -->

                                        <!-- DELETE POLL MESSAGE BOX-->
                                        <div class="message-box animated fadeIn" id="mb-delpoll<?php echo $poll_id; ?>">
                                            <div class="mb-container">
                                                <div class="mb-middle">
                                                    <div class="mb-title"><span class="fa fa-sign-out"></span> Delete <strong> Poll<span class="fa fa-thumbs-up"></span></strong> ?</div>
                                                    <div class="mb-content">
                                                        <p>Are you sure you want to delete this poll?</p>
                                                        <p>Press No if you want to Cancel. Press Yes to Delete.</p>
                                                    </div>
                                                    <div class="mb-footer">
                                                        <div class="pull-right">
                                                          <form class="" action="handlers/ops.php" method="post">
                                                            <!-- Pass complaint Information also hidden -->
                                                            <input type="hidden" name="poll_question" value="<?php echo $poll['p_question']; ?>">
                                                            <input type="hidden" name="poll_date" value="<?php echo $poll['date_created']; ?> ">
                                                            <input type="hidden" name="poll_options" value="<?php echo $poll['p_options']; ?> ">
                                                            <input type="hidden" name="poll_votes" value="<?php echo $poll['p_votes']; ?> ">
                                                            <input type="hidden" name="poll_number_options" value="<?php echo $poll['p_number_options']; ?> ">
                                                            <input type="hidden" name="poll_timeout" value="<?php echo $poll['date_stop_display']; ?> ">
                                                            <input type="hidden" name="poll_voters" value="<?php echo $poll['p_voters']; ?> ">
                                                            <input type="hidden" name="poll_last_vote_date" value="<?php echo $poll['p_last_vote_date']; ?> ">
                                                            <input type="hidden" name="poll_id" value="<?php echo $poll_id; ?>">
                                                            <input type="hidden" name="username" value="<?php echo $poll['username']; ?>">
                                                            <input type="hidden" name="user_id" value="<?php echo $poll['u_id']; ?>">
                                                            <button class="btn btn-danger btn-lg" type="submit"  name="delpoll">Yes</a>
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
                                      ?>

                                    <?php
                                        //Complaint sql query
                                        $sql_complaintdisplay = "SELECT * FROM complaints WHERE date_stop_display > $timely ORDER BY date_created DESC";
                                        //Execution of Complaint Query
                                        $success_complaintdisplay = mysqli_query($link, $sql_complaintdisplay);

                                        if ($success_complaintdisplay->num_rows > 0) {
                                          while($rows = $success_complaintdisplay->fetch_assoc()){
                                    ?>

                                    <!-- START TIMELINE ITEM -->
                                     <div class="timeline-item timeline-item-right">
                                         <div class="timeline-item-info"> <?php echo date("d M G:i", $rows['date_created']); ?> </div>
                                         <div class="timeline-item-icon"><span class="fa fa-bullhorn"></span></div>
                                         <div class="timeline-item-content">
                                             <div class="timeline-heading">
                                                 <img src="assets/images/users/avatar.jpg"/> <b><?php echo $rows['u_fname']; ?> </b> <?php if ($rows['c_division'] != "Select Division (optional)") {
                                                  echo "<i>from</i> <u>". $rows['c_division'];

                                                } ?> shared an idea
                                                 <div class="pull-right">
                                                 <!-- Delete button -->
                                                 <button href="#" data-box="#mb-delcomp<?php echo $rows['c_id']; ?>" class="mb-control btn btn-default" type="submit"><span class="fa fa-trash-o"></span></button>
                                                 </div>
                                             </div>
                                             <div class="timeline-body">
                                               <!-- Section to show user votes for Complaints -->
                                               <div class="pull-right" id="votes<?php echo $$rows['c_id']; ?>">

                                                	Total : <a id="totalvotes<?php echo $rows['c_id']; ?>"><?php echo $rows['c_votes']; ?></a> <b>votes</b>&nbsp; &nbsp;
                                                   <!-- Display Number of Views for the complaint -->
                                                   <span id='views<?php echo $id; ?>' class="pull-right"><?php echo $rows['c_views']. " views "; ?></span>
                                               </div>
                                               <div class="row">
                                                 <div class="col-md-12">
                                                   <!-- Display Complaint from Database -->
                                                   <p style="white-space:pre-wrap;"><?php echo (trim($rows['c_value'])) ; ?></p>

                                                   <!-- End of Section to show user votes for complaints -->
                                                 </div>
                                                 <div class="col-md-2">

                                                 </div>

                                               </div>

                                               <?php
                                               //Check if an image exists for the specifice message
                                               $sql_checkimage = "SELECT * FROM imagine WHERE ref_id = $rows[c_id] AND ref_name = 'complaint'";
                                               $success_checkimage = mysqli_query($link, $sql_checkimage);
                                               if ($success_checkimage): ?>

                                               <div class="row">
                                                 <?php while ($rowly = $success_checkimage->fetch_assoc()) {
                                                   ?>
                                                 <div class="col-md-4" style="width: auto; height: 200px;">
                                                   <div class="image">
                                                     <a href="uploads/<?php echo (trim($rowly['im_name'])); ?>" data-gallery>
                                                       <img src="uploads/<?php echo (trim($rowly['im_name'])); ?>" class="img-responsive img-text" style="width: auto; height: 200px;"/>
                                                     </a>
                                                   </div>
                                                 </div>
                                               <?php }?>
                                               </div>

                                               <?php endif; ?>

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
                                                          <b><?php echo $cm_rows['cm_author'];?></b>
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
                                             <div class="timeline-body comments">
                                              <div class="comment-write">
                                               <form action="handlers/ops.php" method="post">
                                                 <input type="hidden" name="form_type" value="UploadComment">
                                                 <input type="hidden" name="complaint_id" value="<?php echo $rows['c_id']; ?>">
                                                 <input type="hidden" name="comment_type" value="0">
                                                 <input type="hidden" name="username" value="<?php echo $username; ?>">

                                                 <div class="comment-write col-md-11">
                                                   <input class="form-control" type="text" name="comment" placeholder="Share feedback here(Limit: 1024 Characters)"
                                                   <?php
                                                      if (isset($_GET['cmrsp']) && $_GET['rsp'] == $rows['c_id'] && $_GET['cmtyp'] == 0) {
                                                      //Focus on the comment you just sent
                                                      echo "autofocus";
                                                      } ?> required>
                                                  </div>

                                              </form>
                                            </div>
                                             </div>

                                         </div>

                                     </div>
                                     <!-- DELETE COMPLAINT MESSAGE BOX-->
                                     <div class="message-box animated fadeIn" id="mb-delcomp<?php echo $rows['c_id']; ?>">
                                         <div class="mb-container">
                                             <div class="mb-middle">
                                                 <div class="mb-title"><span class="fa fa-sign-out"></span> Delete <strong>Post<span class="fa fa-bullhorn"></span></strong> ?</div>
                                                 <div class="mb-content">
                                                     <p>Are you sure you want to delete this post?</p>
                                                     <p>Press No if you want to Cancel. Press Yes to Delete.</p>
                                                 </div>
                                                 <div class="mb-footer">
                                                     <div class="pull-right">
                                                       <form class="" action="handlers/ops.php" method="post">
                                                         <!-- Specify form type as hidden -->
                                                         <input type="hidden" name="form_type" value="DeleteComplaint">
                                                         <!-- Pass complaint Information also hidden -->
                                                         <input type="hidden" name="complaint_value" value="<?php echo $rows['c_value']; ?> ">
                                                         <input type="hidden" name="complaint_division" value="<?php echo $rows['c_division']; ?> ">
                                                         <input type="hidden" name="complaint_date_created" value="<?php echo $rows['date_created']; ?> ">
                                                         <input type="hidden" name="complaint_ip_address" value="<?php echo $rows['c_ip_address']; ?> ">
                                                         <input type="hidden" name="complaint_date_stop_display" value="<?php echo $rows['date_stop_display']; ?> ">
                                                         <input type="hidden" name="complaint_image_name1" value="<?php echo $rows['c_image_name1']; ?> ">
                                                         <input type="hidden" name="complaint_id" value="<?php echo $rows['c_id']; ?> ">
                                                         <input type="hidden" name="user_id" value="<?php echo $rows['u_id']; ?>">
                                                         <input type="hidden" name="username" value="<?php echo $rows['u_fname'] ?>">
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
                                        else {?>
                                          <div class="timeline-item timeline-item-right">
                                            <div class="timeline-item-content"> <br><center>
                                              <h3>No Post available currently</h3></center>
                                            </div>
                                          </div>
                                        <?php }


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
                            <p>Press No if you want to continue. Press Yes to logout current user.</p>
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

  <?php
  }
  else {
    header('location:index.php');
  }
?>
