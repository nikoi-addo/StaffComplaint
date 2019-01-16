<?php
        

        include("connect.php");
        
        $view_users_query="Select * from ncacomplaints where status = 'Working On Issue'";//select query for viewing users.
        $run = mysqli_query($link, $view_users_query);//here run the sql query.



 ?>

<!DOCTYPE html>
<html lang="en">
    

<head>        
        <!-- META SECTION -->
        <title>Admin Working On Issue</title>            
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
                        <a href="#">Administrator</a>
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
                                <div class="profile-data-title">NCA</div>
                            </div>
                            
                        </div>                                                                        
                    </li>
                    <li class="xn-title"><b>Navigation</b></li>                    
                    <li>
                        <a href="admin.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                    </li>
                    
                    <li class="xn-title"><b>Stages</b></li>                    
                    <li>
                        <a href="stage1.php"><span class="fa fa-minus"></span> <span class="xn-text">Pending</span></a>
                    </li>                   
                    <li>
                        <a href="#"><span class="fa fa-shield"></span> <span class="xn-text">Working on Issue</span></a>
                    </li>
                    <li>
                        <a href="stage3.php"><span class="fa fa-mail-forward"></span> <span class="xn-text">Contacting SP</span></a>
                    </li>
                    <li>
                        <a href="stage4.php"><span class="fa fa-check-circle-o"></span> <span class="xn-text">Issue Resolved</span></a>
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
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                   
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    
                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                 <li><a href="Admin">Home</a></li>
                   <li class="active">Working On Issue</li>  
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title ">                    
                    <h2><span class="fa fa-shield"></span> Working On Issue</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">User Information</h3>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'sql'});"><img src='img/icons/sql.png' width="24"/> SQL</a></li>
                                            
                                            
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='img/icons/txt.png' width="24"/> TXT</a></li>
                                            
                                            
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"/> Word</a></li>
                                           
                                            
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='img/icons/pdf.png' width="24"/> PDF</a></li>
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <table id="customers2" class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Refno</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if(mysqli_num_rows($run) > 0){
                                                while($row = mysqli_fetch_array($run)){

                                            ?>
                                                    <tr>
                                                        <td><?php echo $no =$row['index']; ?></td>
                                                        <td><?php echo $name =$row['name']; ?></td>
                                                        <td><?php echo $email =$row['email']; ?></td>
                                                        <td><?php echo $phone =$row['phone']; ?></td>
                                                        <td><?php echo $refno =$row['refno']; ?></td>
                                                        <td><?php echo $date =$row['date']; ?></td>
                                                        <td><?php echo $status =$row['status']; ?></td>
                                                        <td>
                <a href='person.php?refno=<?php echo $refno =$row['refno']; ?>'><button class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></button></a>

                <a href="#delete<?php echo $refno;?>" data-toggle="modal">
                 <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_3');"><span class="fa fa-times"></span></button></a>    
                                                    </td>

             <div id="delete<?php echo $refno; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form method="post">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="delete_refno" value="<?php echo $refno; ?>">
                                        <div class="alert alert-danger">Are you Sure you want Delete <strong>
                                                <?php echo $name; ?>?</strong> </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                                                    </tr>
                                           <?php
                                       }
                                   }
                                           ?>

                 <?php 
                                 if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_refno = $_POST['delete_refno'];
                            $sql = "DELETE FROM ncacomplaints WHERE refno='$delete_refno' ";
                            if ($link->query($sql) === TRUE) {
                                $sql = "DELETE FROM ncacomplaints WHERE refno='$delete_refno' ";
                                if ($link->query($sql) === TRUE) {
                                    $sql = "DELETE FROM ncacomplaints WHERE refno='$delete_refno' ";
                                    echo '<script>window.location.href="stage2.php"</script>';
                                } else {
                                    echo "Error deleting record: " . $link->error;
                                }
                            } else {
                                echo "Error deleting record: " . $link->error;
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






