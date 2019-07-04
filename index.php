<?php
  session_start();
  include 'handlers/dbcon.php';
  $timely = time();
  $user_id = $_SESSION['u_id'];
  $username = $_SESSION['username'];
  if (isset($_SESSION['loggedin']) && isset($_SESSION['u_id']) && $user_id != 0) {
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- META SECTION -->
        <title>NCA Staff Ideas Portal</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="refresh" content="2000" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->
        <!-- Add script for various functions especially ajax functions -->
        <script type="text/javascript" src="js/functions.js"></script>

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

              <style type="text/css">
                .fixed{z-index: 999;
                     position: fixed;
                       top: 0;
                       width: 100%;
                       overflow: hidden;
                      }
              </style>

                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">

                  <li class="xn-icon-button pull-left">
                       <img src="img/logo.png"/>

                    </li>

                    <?php
                    //Query to extract array of unreadmessages
                    $sql_unreadmessages = "SELECT * FROM login_info WHERE no=$user_id";
                    $success_unreadmessages = mysqli_query($link, $sql_unreadmessages);
                    if ($success_unreadmessages) {
                      $unreadmessages = $success_unreadmessages->fetch_assoc();
                      $listunreadmessages = $unreadmessages['u_unreadmessage'];
                      $listunreadmessages = explode("|", $listunreadmessages);
                      if ($listunreadmessages !== "") {
                        $countunreadmessages = 0;
                      }
                      else {
                        $countunreadmessages = count($listunreadmessages);
                      }
                    }

                    ?>

                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#mb-signout"><span class="fa fa-inbox"></span></a>
                        <div class="informer informer-danger"><?php echo $countunreadmessages; ?></div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-inbox"></span> Messages From HR</h3>
                                <div class="pull-right">
                                    <span class="label label-danger"></span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">

                             <?php
                                //SQL Query to show messages
                                $sql_showhrmessages = "SELECT * FROM messagehr ORDER BY m_date_created DESC";
                                //Execture show HR messages query
                                $success_showhrmessages = mysqli_query($link, $sql_showhrmessages);
                                // Get users unreadmessages and put in an array

                                //Check if execution returned true
                                if ($success_showhrmessages->num_rows > 0) {
                                    while($mrows = $success_showhrmessages->fetch_assoc()){
                                      $msgid = $mrows['m_id'];?>

                                      <a href="message.php?msgid=<?php echo $mrows['m_id']; ?>" class="list-group-item">
                                          <div class="list-group-status <?php if (in_array($msgid, $listunreadmessages)) {echo "status-online";} else{echo "status-offline";}?>"></div>
                                          <span class="contacts-title"><?php echo $mrows['m_subject']; ?></span>
                                          <!-- Use the substr() function to get a specific length of the message to show -->
                                          <p><?php echo substr($mrows['m_message'], 0, 110) . " ...";?></p>
                                      </a>

                                <?php }
                                }
                                else {
                                  echo "Unable to Show Messages";
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

                    <li class="active">NCA Staff Ideas Portal</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                         <div class="col-md-12">
                            <!-- START NEW RECORD -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>What's New (Any Ideas or Feedback)?</h3>


                                    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="handlers/ops.php" role="form">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea style="resize: none ; white-space: normal;" class="form-control" name="problem" rows="1" maxlength="2048" placeholder="We are listening (Limit: 2048 Characters)" required/></textarea>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-suitcase"></span></span>
                                                  <select class="form-control" name="division">
                                                        <option>Select Division (optional)</option>
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
                                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                            <input type="hidden" name="username" value="<?php echo $username; ?>">
                                            <!-- Add array and multiple attribute to show for multiple images -->
                                            <input type="file" name="images[]" accept="image/*" multiple />

                                            </div>
                                            <div class="pull-right">
                                            	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal_basic"><span class="fa fa-thumbs-o-up"></span>  Run Poll </button>
                                                <button type="submit" class="btn btn-success"><span class="fa fa-share"></span> SEND</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>

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
                            <h4 class="modal-title" id="defModalHead">Run Polls</h4>
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
                            <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                            <input type="hidden" name="username" value="<?php echo $username; ?>">
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
                                  $sql_polldisplay = "SELECT * FROM poll WHERE date_stop_display > $timely AND u_fname = 'HUMAN RESOURCE DIVISION' ORDER BY date_created DESC";
                                  $success_polldisplay = mysqli_query($link, $sql_polldisplay);
                                  if($success_polldisplay->num_rows > 0){
                                  while ($poll = $success_polldisplay->fetch_assoc()) {
                                    //Set Poll Options as an array
                                    $pollOptions = explode("|", $poll['p_options']);
                                    $votes = explode("|", $poll['p_votes']);
                                    $poll_id = $poll['p_id'];
                                    $u_id = $poll['u_id'];
                                    //Check if user has voted already
                                    $sql_votestatus ="SELECT * FROM poll_voters WHERE user_id=$user_id AND poll_id=$poll_id";
                                    $success_votestatus = mysqli_query($link, $sql_votestatus);
                                    if ($success_votestatus->num_rows > 0) {
                                      //Set Voted to Yes
                                      $voted = "y";
                                    }
                                    else {
                                      //Set Voted to No
                                      $voted = "n";
                                    }

                                    if ($voted == "n") {
                                ?>
                                <!-- START POLL ITEM NOT VOTED -->
                                <div class="timeline-item timeline-item-right">
                                    <div class="timeline-item-info"><?php echo date("d M G:i", $poll['date_created']); ?></div>
                                    <div class="timeline-item-icon"><span class="fa fa-thumbs-up"></span></span></div>
                                    <div class="timeline-item-content">
                                        <div class="timeline-heading">
                                            <img src="assets/images/users/avatar.jpg"/> <a href="#"><b>Anonymous </b></a> added a poll
                                        </div>
                                        <div class="timeline-body">
                                            <p style="white-space:pre-wrap;"><?php echo(trim($poll['p_question'])); ?></p>
                                            <span class="pull-right"><?php echo $poll['p_voters']; ?> Votes</span>
                                        </div>
                                        <form action="handlers/ops.php" method="post">
                                        <div class="timeline-body comments">
                                               <div class="row">
                                                 <?php
                                                 //Display all the Options for the Poll
                                                 for ($i=0; $i < count($pollOptions) ; $i++) {
                                                   $sql_plimage = "SELECT pl_ref_option, pl_im_name FROM poll_imagine WHERE pl_ref_id = $poll_id AND pl_ref_option = $i";
                                                   $success_plimage = mysqli_query($link, $sql_plimage);
                                                   if ($success_plimage->num_rows > 0) {
                                                     while ($pl_row = $success_plimage->fetch_assoc()) { ?>
                                                       <div class="col-md-6">
                                                           <a href="uploads/<?php echo $pl_row['pl_im_name']; ?>" data-gallery>
                                                               <img src="uploads/<?php echo $pl_row['pl_im_name']; ?>" class="img-responsive img-text" style="width: auto; height: 200px;"/>
                                                           </a>
                                                           <label class="check"><input type="radio" name="option" value="<?php echo $i; ?>" required/> <?php echo $pollOptions[$i]; ?> </label>
                                                       </div>
                                                  <?php
                                                     }
                                                   }
                                                   else {
                                                     ?>
                                                     <div class="col-md-6">
                                                         <label class="check"><input type="radio" name="option" value="<?php echo $i; ?>" required/> <?php echo $pollOptions[$i]; ?> </label>
                                                     </div>
                                                  <?php
                                                    }
                                                  }
                                                  ?>
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="clear: both;">
                                            <!-- Submit ID of Poll -->
                                            <input type="hidden" name="id" value="<?php echo $poll['p_id']; ?>"/>
                                            <!-- Submit User's ID -->
                                            <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                            <input type="hidden" name="username" value="<?php echo $username;?>">
                                            <button name="pollvote" class="btn btn-default btn-warning col-md-1 pull-right" type="submit"><span class="fa fa-send"></span>Vote</button>
                                        </div>
                                      </form>

                                      <!-- Display Comments on the poll -->
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
                                                   <b><?php echo $cm_rows['cm_author']; ?></b>
                                                   <small class="text-muted pull-right"><?php echo date("d M @ h:i a", $cm_rows['cm_date']); ?></small>

                                               </p>
                                               <!-- Comment from Database -->
                                               <p><?php echo $cm_rows['cm_value']; ?><p>

                                           </div>

                                       </div>


                                       <?php
                                         }

                                       }
                                      ?>

                                    </div>
                                </div>
                                <!-- END POLL ITEM NOT VOTED -->
                                <?php
                                    }
                                    if ($voted == "y") {
                                ?>
                                <!-- START POLL ITEM VOTED -->
                                <div class="timeline-item timeline-item-right">
                                    <div class="timeline-item-info"><?php echo date("d M G:i", $poll['date_created']); ?></div>
                                    <div class="timeline-item-icon"><span class="fa fa-thumbs-up"></span></span></div>
                                    <div class="timeline-item-content">
                                        <div class="timeline-heading">
                                            <img src="assets/images/users/avatar.jpg"/> <a href="#"><b>Anonymous</b></a> added a poll
                                        </div>
                                        <div class="timeline-body">
                                            <p style="white-space:pre-wrap;"><?php echo (trim($poll['p_question'])); ?></p>
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
                                                               <img src="uploads/<?php echo $pl_row['pl_im_name']; ?>" class="img-responsive img-text" style="width: auto; height: 200px;" />
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
                                    </div>
                                </div>
                                <!-- END TIMELINE ITEM -->
                                <?php
                                    }
                                  }
                                }
                                ?>


                                <?php
                                    //Query to combine poll and complaint
                                    $sql_pollcomplaintdisplay = "SELECT c_id, date_created, date_stop_display, table_type FROM complaints WHERE date_stop_display > $timely UNION ALL SELECT p_id, date_created, date_stop_display, table_type FROM poll WHERE u_fname != 'HUMAN RESOURCE DIVISION' AND date_stop_display > $timely ORDER BY date_created DESC";
                                    //Execution of Complaint Query
                                    $success_pollcomplaintdisplay = mysqli_query($link, $sql_pollcomplaintdisplay);

                                    if ($success_pollcomplaintdisplay->num_rows > 0) {
                                      while($rows = $success_pollcomplaintdisplay->fetch_assoc()){
                                        $id = $rows['c_id'];
                                        if ($rows['table_type'] == 'complaint') {
                                          $sql_compdisplay = "SELECT * FROM complaints WHERE c_id = $id";
                                          $success_compdisplay = mysqli_query($link, $sql_compdisplay);
                                          if ( $success_compdisplay->num_rows > 0) {
                                            while ($cp_rows = $success_compdisplay->fetch_assoc()) {
                                              //Query UpDownVote on complaints_vote
                                              $sql_udvote = "SELECT * FROM complaints_vote WHERE c_id = $id AND u_id = $user_id";
                                              $success_udvote = mysqli_query($link, $sql_udvote);
                                              $udvote = $success_udvote->num_rows;
                                              $row_udvote = $success_udvote->fetch_assoc();

                                              $sql_countupvote = "SELECT * FROM complaints_vote WHERE c_id = $id AND vote = 'up'";
                                              $sql_countdownvote = "SELECT * FROM complaints_vote WHERE c_id = $id AND vote = 'down'";
                                              $success_countupvote = mysqli_query ($link, $sql_countupvote);
                                              $success_countdownvote = mysqli_query ($link, $sql_countdownvote);
                                              $countupvote = $success_countupvote->num_rows;
                                              $countdownvote = $success_countdownvote->num_rows;
                                              $totalvotes = $countupvote - $countdownvote;
                                            ?>



                                            <!-- START TIMELINE ITEM -->
                                            <!-- Added function to activate xml request to update number of views onmousehover -->
                                             <div class="timeline-item timeline-item-right" onmouseover="updateviews(<?php echo "$id"; ?>, <?php echo "$user_id" ?>)">
                                                 <div class="timeline-item-info"> <?php echo date("d M G:i", $cp_rows['date_created']); ?> </div>
                                                 <div class="timeline-item-icon"><span class="fa fa-bullhorn"></span></div>
                                                 <div class="timeline-item-content">
                                                     <div class="timeline-heading">
                                                         <img src="assets/images/users/avatar.jpg"/> <b>Anonymous </b><?php if ($cp_rows['c_division'] != "Select Division (optional)") {
                                                          echo "<i>from</i> <u>". $cp_rows['c_division'];

                                                        } ?></u> shared an idea
                                                        <span id='views<?php echo $id; ?>' class="pull-right"><?php echo "  ". $cp_rows['c_views']. "<i class='fa fa-eye'></i> "; ?></span>


                                                        <!-- Section to show user votes for Complaints -->
                                                        <div class="pull-right" id="votes<?php echo $id; ?>">
                                                          <!-- upvote function accepts three parameters complaintid state of vote and userid -->
                                                          <img id = "up<?php echo $id; ?>" onclick="upvote(<?php echo $id; ?>, <?php if ($udvote == 0){ echo 0; } elseif ($row_udvote['vote'] == 'down'){ echo 0; } ?>, <?php echo $user_id; ?>)" src="img<?php if ($udvote == 0) {echo '/up_off.png';} elseif($row_udvote['vote'] == 'up') { echo '/up.png';} elseif($row_udvote['vote'] !== 'up'){echo '/up_off.png';} ?>" alt="Upvote">

                                                          <img id ="down<?php echo $id; ?>"  onclick="downvote(<?php echo $id; ?>, <?php if ($udvote == 0){ echo 0;} elseif ($row_udvote['vote'] == 'up') { echo 0; } ?>, <?php echo $user_id; ?>)" src="img<?php if ($udvote == 0) {echo '/down_off.png';} elseif($row_udvote['vote'] == 'down'){ echo '/down.png';} elseif($row_udvote['vote'] !== 'down'){echo '/down_off.png';} ?>" alt="Downvote">

                                                          <b><a id="totalvotes<?php echo $id; ?>"><?php echo " ". $totalvotes; ?></a> votes</b><br>
                                                        </div>
                                                        <!-- End of Section to show user votes for complaints -->

                                                     </div>
                                                     <div class="timeline-body">
                                                         <p style="white-space:pre-wrap;"><?php echo (trim($cp_rows['c_value'])); ?></p>

                                                         <?php
                                                         //Check if an image exists for the specific message
                                                         $sql_checkimage = "SELECT * FROM imagine WHERE ref_id = $cp_rows[c_id] AND ref_name = 'complaint'";
                                                         $success_checkimage = mysqli_query($link, $sql_checkimage);
                                                         if ($success_checkimage): ?>

                                                         <div class="row">
                                                           <?php while ($rowly = $success_checkimage->fetch_assoc()) {
                                                             ?>
                                                           <div class="col-md-4" style="width: auto; height: 200px;">
                                                             <div class="image">
                                                               <a href="uploads/<?php echo (trim($rowly['im_name'])); ?>" data-gallery>
                                                                 <img src="uploads/<?php echo (trim($rowly['im_name'])) ; ?>" class="img-responsive img-text" style="width: auto; height: 200px;"/>
                                                               </a>
                                                             </div>
                                                           </div>
                                                         <?php }?>
                                                         </div>

                                                         <?php endif; ?>


                                                     </div>

                                                     <?php
                                                      //Comment id
                                                      $comment_id = $cp_rows['c_id'];
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
                                                                  <b><?php echo $cm_rows['cm_author']; ?></b>
                                                                  <small class="text-muted pull-right"><?php echo date("d M @ h:i a", $cm_rows['cm_date']); ?></small>

                                                              </p>
                                                              <!-- Comment from Database -->
                                                              <p><?php echo $cm_rows['cm_value']; ?><p>

                                                          </div>

                                                      </div>
                                                      <?php
                                                        }

                                                      }
                                                     ?>
                                                     <!-- Insert new comment -->
                                                     <?php if ($cp_rows['u_id'] == $user_id): ?>
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
                                                     <?php endif; ?>




                                                 </div>
                                             </div>

                                             <!-- END TIMELINE ITEM -->

                                        <?php
                                            }
                                          }
                                        }
                                        elseif ($rows['table_type'] == 'poll') {


                                          //Query to select polls that have not expired
                                          $sql_pldisplay = "SELECT * FROM poll WHERE p_id = $id";
                                          $success_pldisplay = mysqli_query($link, $sql_pldisplay);
                                          if($success_pldisplay->num_rows > 0){
                                          while ($poll = $success_pldisplay->fetch_assoc()) {
                                            //Set Poll Options as an array
                                            $pollOptions = explode("|", $poll['p_options']);
                                            $votes = explode("|", $poll['p_votes']);
                                            $poll_id = $poll['p_id'];
                                            $u_id = $poll['u_id'];
                                            //Check if user has voted already
                                            $sql_votestatus ="SELECT * FROM poll_voters WHERE user_id=$user_id AND poll_id=$poll_id";
                                            $success_votestatus = mysqli_query($link, $sql_votestatus);
                                            if ($success_votestatus->num_rows > 0) {
                                              //Set Voted to Yes
                                              $voted = "y";
                                            }
                                            else {
                                              //Set Voted to No
                                              $voted = "n";
                                            }

                                            if ($voted == "n") {
                                        ?>
                                        <!-- START POLL ITEM NOT VOTED -->
                                        <div class="timeline-item timeline-item-right">
                                            <div class="timeline-item-info"><?php echo date("d M G:i", $poll['date_created']); ?></div>
                                            <div class="timeline-item-icon"><span class="fa fa-thumbs-up"></span></span></div>
                                            <div class="timeline-item-content">
                                                <div class="timeline-heading">
                                                    <img src="assets/images/users/avatar.jpg"/> <a href="#"><b>Anonymous</b></a> added a poll
                                                </div>
                                                <div class="timeline-body">
                                                    <p style="white-space:pre-wrap;"><?php echo(trim($poll['p_question'])); ?></p>
                                                    <span class="pull-right"><?php echo $poll['p_voters']; ?> Votes</span>
                                                </div>
                                                <form action="handlers/ops.php" method="post">
                                                <div class="timeline-body comments">
                                                  <div class="row">
                                                    <?php
                                                    //Display all the Options for the Poll
                                                    for ($i=0; $i < count($pollOptions) ; $i++) {
                                                      $sql_plimage = "SELECT pl_ref_option, pl_im_name FROM poll_imagine WHERE pl_ref_id = $poll_id AND pl_ref_option = $i";
                                                      $success_plimage = mysqli_query($link, $sql_plimage);
                                                      if ($success_plimage->num_rows > 0) {
                                                        while ($pl_row = $success_plimage->fetch_assoc()) { ?>
                                                          <div class="col-md-6">
                                                              <a href="uploads/<?php echo $pl_row['pl_im_name']; ?>" data-gallery>
                                                                  <img src="uploads/<?php echo $pl_row['pl_im_name']; ?>" class="img-responsive img-text" width="200"/>
                                                              </a>
                                                              <label class="check"><input type="radio" name="option" value="<?php echo $i; ?>" required/> <?php echo $pollOptions[$i]; ?> </label>
                                                          </div>
                                                     <?php
                                                        }
                                                      }
                                                      else {
                                                        ?>
                                                        <div class="col-md-6">
                                                            <label class="check"><input type="radio" name="option" value="<?php echo $i; ?>" required/> <?php echo $pollOptions[$i]; ?> </label>
                                                        </div>
                                                     <?php
                                                       }
                                                     }
                                                     ?>
                                               </div>
                                                </div>
                                                <div class="modal-footer" style="clear: both;">
                                                    <!-- Submit ID of Poll -->
                                                    <input type="hidden" name="id" value="<?php echo $poll['p_id']; ?>"/>
                                                    <!-- Submit User's ID -->
                                                    <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                                    <input type="hidden" name="username" value="<?php echo $username;?>">
                                                    <button name="pollvote" class="btn btn-default btn-warning col-md-1 pull-right" type="submit"><span class="fa fa-send"></span>Vote</button>
                                                </div>
                                              </form>
                                              <!-- Display Comments on the poll -->
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
                                                           <b><?php echo $cm_rows['cm_author']; ?></b>
                                                           <small class="text-muted pull-right"><?php echo date("d M @ h:i a", $cm_rows['cm_date']); ?></small>

                                                       </p>
                                                       <!-- Comment from Database -->
                                                       <p><?php echo $cm_rows['cm_value']; ?><p>

                                                   </div>

                                               </div>
                                               <?php
                                                 }

                                               }
                                              ?>
                                              <!-- Allowing user to write comments on only the polls that he has creeated on not voted yets-->
                                              <?php if ($poll['u_id'] == $user_id): ?>
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
                                                   
                                                 </form>
                                               </div>
                                                </div>
                                              <?php endif; ?>

                                            </div>
                                        </div>
                                        <!-- END POLL ITEM NOT VOTED -->
                                        <?php
                                            }
                                            if ($voted == "y") {
                                        ?>
                                        <!-- START POLL ITEM VOTED -->
                                        <div class="timeline-item timeline-item-right">
                                            <div class="timeline-item-info"><?php echo date("d M G:i", $poll['date_created']); ?></div>
                                            <div class="timeline-item-icon"><span class="fa fa-thumbs-up"></span></span></div>
                                            <div class="timeline-item-content">
                                                <div class="timeline-heading">
                                                    <img src="assets/images/users/avatar.jpg"/> <a href="#"><b>Anonymous</b></a> added a poll
                                                </div>
                                                <div class="timeline-body">
                                                    <p style="white-space:pre-wrap;"><?php echo (trim($poll['p_question'])); ?></p>
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

                                                <!-- Display Comments on the poll -->
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
                                                             <b><?php echo $cm_rows['cm_author']; ?></b>
                                                             <small class="text-muted pull-right"><?php echo date("d M @ h:i a", $cm_rows['cm_date']); ?></small>

                                                         </p>
                                                         <!-- Comment from Database -->
                                                         <p><?php echo $cm_rows['cm_value']; ?><p>

                                                     </div>

                                                 </div>
                                                 <?php
                                                   }

                                                 }
                                                ?>

                                                <!-- Allowing user to write comments on only the polls that he has creeated on the voted polls-->
                                                <?php if ($poll['u_id'] == $user_id): ?>
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
                                                     
                                                   </form>
                                                 </div>
                                                  </div>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                        <!-- END TIMELINE ITEM -->
                                        <?php
                                            }
                                          }
                                        }
                                        }

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
                        <p>Press No if you want to continue. Press Yes to logout .</p>
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

             const realFileBtn = document.getElementById("real-file");
            const customBtn = document.getElementById("custom-button");
            const customTxt = document.getElementById("custom-text");

            customBtn.addEventListener("click", function() {
            realFileBtn.click();
            });

            realFileBtn.addEventListener("change", function() {
            if (realFileBtn.value) {
             customTxt.innerHTML = realFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt.innerHTML = "No file chosen, yet.";
  }
});


var checkboxes = $("input[type='checkbox']"),
    submitButt = $("input[type='submit']");

checkboxes.click(function() {
    submitButt.attr("disabled", !checkboxes.is(":checked"));
});

</script>

    <!-- END SCRIPTS -->
    </body>


</html>

<?php
  }
  else {
    header('location:login.php');
  }
?>
