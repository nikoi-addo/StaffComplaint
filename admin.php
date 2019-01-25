<!DOCTYPE html>
<html lang="en">


<head>
        <!-- META SECTION -->
        <title>Internal Complaint - Admin</title>
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
                    <h2><span class="fa fa-users"></span> Admin Table for <i><b><?php echo $sdate ; ?></b></i></h2>
                </div>
                <!-- END PAGE TITLE -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">



                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">

                                    <div>
                                    <div class="btn-group pull-left">
                                        <!-- Form code begins -->
                                        <form class="form-inline" method="get" action="course1.php" >
                                          <div class="form-group"> <!-- Date input -->
                                            <label class="control-label" for="date">Date :</label>
                                            <input class="form-control" name="sdate"  value=""  type="date"/>
                                            <input class="btn btn-primary" type="submit" name="submit">
                                          </div>

                                        </form>
                                         <!-- Form code ends -->
                                    </div>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">


                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'xml',escape:'false'});"><img src='img/icons/xml.png' width="24"/> XML</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'sql'});"><img src='img/icons/sql.png' width="24"/> SQL</a></li>
                                            <li class="divider"></li>

                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='img/icons/txt.png' width="24"/> TXT</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"/> Word</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                                            <li class="divider"></li>

                                        </ul>
                                    </div>
                                </div>

                                </div>
                                <div class="panel-body">
                                    <table id="customers2" class="table datatable">
                                        <thead>
                                            <tr>
                                                <th width="50">id</th>
                                                    <th>post</th>
                                                    <th>reply from HR</th>
                                                    <th width="100">status</th>
                                                    <th width="100">ip</th>
                                                    <th width="100">date</th>
                                                    <th width="100">actions</th>


                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                                <tr id="trow_1">
                                                    <td class="text-center">1</td>
                                                    <td><strong>John Doe</strong></td>
                                                    <td><span class="label label-success">New</span></td>
                                                    <td>$430.20</td>
                                                    <td>24/09/2014</td>
                                                    <td>24/09/2014</td>
                                                    <td>
                                                        <button class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></button>
                                                        <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_1');"><span class="fa fa-times"></span></button>
                                                    </td>
                                                </tr>
                                              
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

<!-- Mirrored from themifycloud.com/demos/templates/joli/table-export.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2018 15:41:43 GMT -->
</html>
