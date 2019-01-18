<!DOCTYPE html>
<html lang="en">

<?php
  include 'handlers/dbcon.php';
  $timely = time();
?>
<head>
        <!-- META SECTION -->
        <title>NCA Internal Complaint</title>
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


                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <div class="informer informer-danger">4</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages from HR</h3>
                                <div class="pull-right">
                                    <span class="label label-danger">4 new</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-online"></div>
                                    <img src="assets/images/users/no-image.jpg" class="pull-left" alt="John Doe"/>
                                    <span class="contacts-title">John Doe</span>
                                    <p>Praesent placerat tellus id augue condimentum</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="assets/images/users/no-image.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
                                    <span class="contacts-title">Dmitry Ivaniuk</span>
                                    <p>Donec risus sapien, sagittis et magna quis</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="assets/images/users/no-image.jpg" class="pull-left" alt="Nadia Ali"/>
                                    <span class="contacts-title">Nadia Ali</span>
                                    <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-offline"></div>
                                    <img src="assets/images/users/no-image.jpg" class="pull-left" alt="Darth Vader"/>
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

                    <li class="active">Staff Complaint Portal</li>
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
                                    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="handlers/ops.php" role="form" name="complainform">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input class="form-control" name="problem" maxlength="2048" placeholder="What's happening? (Limit: 2048 Characters)"/>
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
                                            <input type="file" id="real-file" hidden="hidden" name="images" accept="image/*" />
                                              <!-- <button class="btn btn-primary" type="button" id="custom-button" target="#real-fie"><span class="fa fa-camera"></span>Image Upload</button>
                                              <span id="custom-text">No file chosen, yet.</span> -->
                                            </div>
                                            <div class="pull-right">
                                                <button class="btn btn-success"><span class="fa fa-share"></span> SEND</button>
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
                                     <div class="timeline-item-info"> <?php echo date("d M h:i a", $rows['c_date_created']); ?> </div>
                                     <div class="timeline-item-icon"><span class="fa fa-bullhorn"></span></div>
                                     <div class="timeline-item-content">
                                         <div class="timeline-heading">
                                             <img src="assets/images/users/no-image.jpg"/> <b>Anonymus</b> <i>from</i> <u><?php echo $rows['c_division']; ?></u> made a complaint
                                         </div>
                                         <div class="timeline-body">

                                             <p><?php echo $rows['c_value']; ?></p>

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
                                                  <img src="assets/images/users/no-image.jpg"/>
                                                  <p class="comment-head">
                                                      <b>Human Resource Division</b>
                                                  </p>
                                                  <!-- Comment from Database -->
                                                  <p><?php echo $cm_rows['cm_value']; ?></p>
                                                  <small class="text-muted">10h ago</small>
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
                                    else {
                                      echo "No Complaints available currently";
                                      echo mysqli_error($link);
                                    }


                                ?>




                                <!-- START TIMELINE ITEM -->
                                <!-- <div class="timeline-item timeline-item-right">
                                    <div class="timeline-item-info">Yesterday</div>
                                    <div class="timeline-item-icon"><span class="fa fa-bullhorn"></span></div>
                                    <div class="timeline-item-content">
                                        <div class="timeline-heading">
                                            <img src="assets/images/users/no-image.jpg"/><b>Anonymus</b> made a complaint
                                        </div>
                                        <div class="timeline-body">
                                            <img src="assets/images/gallery/nature-4.jpg" class="img-text" width="150" align="left"/>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempus dolor id orci lacinia, eget aliquam velit consequat.</p>
                                            <p>Vivamus at tincidunt lectus, faucibus condimentum quam. Duis facilisis sem sed eros malesuada, vel dignissim diam ornare. Etiam rhoncus, nibh non auctor mattis, ligula diam mattis dolor, non tincidunt lectus velit nec metus.
                                               Phasellus dictum justo vitae ornare lobortis. Integer ut lectus vel mauris tempor ultricies eget vitae turpis. Sed eleifend odio quis rutrum volutpat.</p>

                                        </div>
                                          <div class="timeline-body comments">
                                            <div class="comment-item">
                                                <img src="assets/images/users/no-image.jpg"/>
                                                <p class="comment-head">
                                                    <b>Human Resource Division</b>
                                                </p>
                                                <p>Awesome, man, that is awesome...</p>
                                                <small class="text-muted">10h ago</small>
                                            </div>

                                        </div>


                                    </div>
                                </div> -->
                                <!-- END TIMELINE ITEM -->

                                <!-- START TIMELINE ITEM -->
                                <!-- <div class="timeline-item timeline-item-right">
                                    <div class="timeline-item-info">29 Sep 2014</div>
                                    <div class="timeline-item-icon"><span class="fa fa-image"></span></div>
                                    <div class="timeline-item-content">
                                        <div class="timeline-heading">
                                            <img src="assets/images/users/no-image.jpg"/>  <b>Anonymus</b> made a complaint
                                        </div>
                                        <div class="timeline-body" id="links">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="assets/images/gallery/nature-1.jpg" title="Nature Image 1" data-gallery>
                                                        <img src="assets/images/gallery/nature-1.jpg" class="img-responsive img-text"/>
                                                    </a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="assets/images/gallery/nature-2.jpg" title="Nature Image 2" data-gallery>
                                                        <img src="assets/images/gallery/nature-2.jpg" class="img-responsive img-text"/>
                                                    </a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="assets/images/gallery/nature-3.jpg" title="Nature Image 3" data-gallery>
                                                        <img src="assets/images/gallery/nature-3.jpg" class="img-responsive img-text"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="timeline-body comments">
                                            <div class="comment-item">
                                                <img src="assets/images/users/no-image.jpg"/>
                                                <p class="comment-head">
                                                    <b>Human Resource Division</b>
                                                </p>
                                                <p>Awesome, man, that is awesome...</p>
                                                <small class="text-muted">10h ago</small>
                                            </div>

                                        </div>

                                    </div>
                                </div> -->
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
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
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
