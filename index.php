<!DOCTYPE html>
<html lang="en">

<?php
  include 'handlers/dbcon.php';
  $timely = time();
  $user_id = 23;
?>

<head>
        <!-- META SECTION -->
        <title>NCA Staff Ideas Portal</title>
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

              <style type="text/css">
                .fixed{z-index: 999;}
              </style>

                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">

                	<li class="xn-icon-button pull-left">
                       <img src="img/logo.png"/>

                    </li>


                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-inbox"></span></a>
                        <div class="informer informer-danger">HR</div>
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
                                // The type of user signed in will determine as to which query to give to the division
                                //Execture show HR messages query
                                $success_showhrmessages = mysqli_query($link, $sql_showhrmessages);

                                //Check if execution returned true
                                if ($success_showhrmessages->num_rows > 0) {
                                    while($mrows = $success_showhrmessages->fetch_assoc()){?>
                                  <a href="message.php?msgid=<?php echo $mrows['m_id']; ?>" class="list-group-item">
                                      <div class="list-group-status status-online"></div>
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
                                            <!-- Add array and multiple attribute to show for multiple images -->
                                            <input type="file" name="images[]" accept="image/*"  multiple/>

                                            </div>
                                            <div class="pull-right">
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
                                  $sql_polldisplay = "SELECT * FROM poll ORDER BY poll_date DESC";
                                  $success_polldisplay = mysqli_query($link, $sql_polldisplay);
                                  foreach ($success_polldisplay as $poll) {
                                    //Set Poll Options as an array
                                    $pollOptions = explode("|", $poll['options']);
                                    $votes = explode("|", $poll['votes']);
                                    $poll_id = $poll['id'];
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
                                    <div class="timeline-item-info"><?php echo date("d M G:i", $poll['poll_date']); ?></div>
                                    <div class="timeline-item-icon"><span class="fa fa-thumbs-up"></span></span></div>
                                    <div class="timeline-item-content">
                                        <div class="timeline-heading">
                                            <img src="assets/images/users/avatar.jpg"/> <a href="#">The Human Resource Division</a> added a poll
                                        </div>
                                        <div class="timeline-body">
                                            <p style="white-space:pre-wrap;"><?php echo(trim($poll['question'])); ?></p>
                                            <span class="pull-right"><?php echo $poll['voters']; ?> Votes</span>
                                        </div>
                                        <form action="handlers/ops.php" method="post">
                                        <div class="timeline-body comments">
                                            <div class="comment-item">
                                               <div class="form-group">
                                                 <?php
                                                 //Display all the Options for the Poll
                                                 for ($i=0; $i < count($pollOptions) ; $i++) { ?>
                                                    <div class="col-md-6">
                                                        <label class="check"><input type="radio" class="icheckbox" name="option" value="<?php echo $i; ?>"/> <?php echo $pollOptions[$i]; ?> </label>
                                                    </div>
                                                  <?php
                                                  }
                                                  ?>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="clear: both;">
                                            <!-- Submit ID of Poll -->
                                            <input type="hidden" name="id" value="<?php echo $poll['id']; ?>"/>
                                            <!-- Submit User's ID -->
                                            <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                            <button name="pollvote"class="btn btn-default btn-warning col-md-1 pull-right" type="submit"><span class="fa fa-send"></span>Vote</button>
                                        </div>
                                      </form>
                                    </div>
                                </div>
                                <!-- END POLL ITEM NOT VOTED -->
                                <?php
                                    }
                                    if ($voted == "y") {
                                ?>
                                <!-- START POLL ITEM VOTED -->
                                <div class="timeline-item timeline-item-right">
                                    <div class="timeline-item-info"><?php echo date("d M G:i", $poll['poll_date']); ?></div>
                                    <div class="timeline-item-icon"><span class="fa fa-thumbs-up"></span></span></div>
                                    <div class="timeline-item-content">
                                        <div class="timeline-heading">
                                            <img src="assets/images/users/avatar.jpg"/> <a href="#">The Human Resource Division</a> added a poll
                                        </div>
                                        <div class="timeline-body">
                                            <p style="white-space:pre-wrap;"><?php echo (trim($poll['question'])); ?></p>
                                            <span class="pull-right"><?php echo $poll['voters']; ?> Votes</span>
                                        </div>
                                        <div class="timeline-body comments">
                                            <div class="comment-item">
                                               <div class="form-group">
                                                 <?php
                                                 //Display all the Options for the Poll
                                                 for ($i=0; $i < count($pollOptions) ; $i++) {
                                                   $votePercent = round(($votes[$i]/$poll['voters'])*100);
                                                  ?>
                                                   <div class="col-md-6">
                                                      <div class="progress">
                                                           <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="<?php echo "$votePercent"; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "$votePercent";  ?>%">
                                                               <b style="color: black;"><?php echo "$votePercent";  ?>%  <?php echo $pollOptions[$i]; ?></b>
                                                           </div>
                                                       </div>
                                                   </div>
                                                  <?php
                                                  }
                                                  ?>

                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TIMELINE ITEM -->
                                <?php
                                    }
                                  }
                                ?>


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
                                             <img src="assets/images/users/avatar.jpg"/> <b>Anonymus</b> <?php if ($rows['c_division'] != "") {
                                              echo "<i>from</i> <u>". $rows['c_division'];
                                             } ?></u> shared an idea
                                         </div>
                                         <div class="timeline-body">
                                             <p style="white-space:pre-wrap;"><?php echo (trim($rows['c_value'])); ?></p>

                                             <?php
                                             //Check if an image exists for the specifice message
                                             $sql_checkimage = "SELECT * FROM imagine WHERE ref_id = $rows[c_id] AND ref_name = 'complaint'";
                                             $success_checkimage = mysqli_query($link, $sql_checkimage);
                                             if ($success_checkimage): ?>

                                             <div class="row">
                                               <?php while ($rowly = $success_checkimage->fetch_assoc()) {
                                                 ?>
                                               <div class="col-md-4">
                                                 <div class="image">
                                                   <a href="uploads/<?php echo $rowly['im_name']; ?>" data-gallery>
                                                     <img src="uploads/<?php echo $rowly['im_name']; ?>" class="img-responsive img-text"/>
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
                                                      <b>Human Resource Division</b>
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

                                 <!-- END TIMELINE ITEM -->
                                <?php
                                      }

                                    }
                                    else {?>
                                      <div class="timeline-item timeline-item-right">
                                        <div class="timeline-item-content"> <br><center>
                                          <h3>No Complaints available currently</h3></center>
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

</script>

    <!-- END SCRIPTS -->
    </body>


</html>
