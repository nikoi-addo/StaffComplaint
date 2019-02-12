<?php
  //This file handles all major backend operations

    include 'dbcon.php'; //Initialize the database connection

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //Form Submitted
      $form_type = $_POST['form_type'];
      //Users IP Address
      $ipaddress = $_SERVER["REMOTE_ADDR"];
      $cur_time = time();

      #########################################################
      #################### MAKE A COMPLAINT ###################
      #########################################################
      if ($form_type == 'ComplainForm') {
        //User Problem
        $problem = test_input($_POST['problem']);
        //User Division
        if ($_POST['division'] === "Select Division (optional)") {
          $division = "";
        }
        $division = test_input($_POST['division']);
        $n_responsetime = strtotime("+72 Hours"); //3 Working Days
        $w_responsetime = strtotime("+132 Hours"); //3 Working Days Weekend inclusive


        $c_day = date("l"); //Complaint day
        $c_day = strtolower($c_day);

        //Weekend inclusive Response Time
        if($c_day == "friday" || "thursday" || "wednesday"){
          $stop_display = $w_responsetime;
        }
        //Normal Times
        else {
          $stop_day = $n_responsetime;
        }
        $fileName = "";
        //If Picture available

        if ($_FILES ['images'][tmp_name]) {

          //Generate picture name
          $fileName = time() . '_' .basename($_FILES["images"]["name"]);
          //Upload path
          $targetDir = "../uploads/";
          $targetFilePath = $targetDir . $fileName;

          //Allowed file formals
          $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
          //Convert format to lowercase
          $fileType = strtolower($fileType);
          $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
          //Check if file type is correct
          if(in_array($fileType, $allowTypes)){

            //Upload file to the Uploads Folder
            move_uploaded_file($_FILES["images"]["tmp_name"], $targetFilePath);

            if(!move_uploaded_file($_FILES["images"]["tmp_name"], $targetFilePath)){
              //Error to display if image is not Uploaded
              header("location:../index.php?rsp=mgplderror");
            }
          }
          else{
            header("location:../index.php?rsp=dttyperror");

          }
        }
        //Query to Insert complaints details
        $sql_insertcomplaint = "INSERT INTO complaints(c_value, c_division, c_date_created, c_ip_address, c_date_stop_display, c_image_name1) VALUES('$problem', '$division', $cur_time, '$ipaddress', $stop_display, '$fileName')";

        //Insert Complaint into Database
        $success_insertcomplaint = mysqli_query($link, $sql_insertcomplaint);

        if ($success_insertcomplaint) {
          // echo "Complaint has been submitted";
          header("location:../index.php?rsp=cmpsuccess");
        }
        else {
          header("location:../index.php?rsp=cmperror");
        }
      }





      #########################################################
      ################# COMMENT ON A COMPLAINT ################
      #########################################################

      if ($form_type == 'UploadComment') {
        //HR Comment
        $comment = $_POST['comment'];
        $comment = test_input($comment);
        //Complaint ID
        $complaint_id = $_POST['complaint_id'];
        //Query to Insert Comment in DB
        $sql_uploadcomment = "INSERT INTO comments(cm_value, cm_ip_address, c_id, cm_date) VALUES('$comment', '$ipaddress', $complaint_id, $cur_time)";
        $sql_uploadcomment = test_input($sql_uploadcomment);
        //Execute query
        $success_uploadcomment = mysqli_query($link, $sql_uploadcomment);

        if ($success_uploadcomment) {
          //Upload comment success
          header("location:../hr.php?rsp=$complaint_id&cmrsp=1");
        }
        else{
          //Error in comment success
          header("location:../hr.php?rsp=$complaint_id&cmrsp=0");
        }
      }





      #########################################################
      ################### DELETE A COMPLAINT ##################
      #########################################################

      if ($form_type == 'DeleteComplaint') {
        $complaint_id = $_POST['complaint_id'];
        $complaint_value = $_POST['complaint_value'];
        $complaint_division = $_POST['complaint_division'];
        $complaint_date_created = $_POST['complaint_date_created'];
        $complaint_ip_address = $_POST['complaint_ip_address'];
        $complaint_date_stop_display = $_POST['complaint_date_stop_display'];
        $complaint_image_name1 = $_POST['complaint_image_name1'];

        //Move complaint to del_complaint table
        $sql_movecomplaint = "INSERT INTO del_complaints(c_id, c_value, c_division, c_date_created, c_ip_address, c_date_stop_display, c_image_name1) VALUES($complaint_id, '$complaint_value', '$complaint_division', $complaint_date_created, '$complaint_ip_address', $complaint_date_stop_display, '$complaint_image_name1')";
        //Delete finally from Complaint Table
        $sql_delcompfromtable = "DELETE FROM complaints WHERE c_id = $complaint_id";
        $sql_movecomplaint = test_input($sql_movecomplaint);
        $sql_delcompfromtable = test_input($sql_delcompfromtable);
        //Execute move complaint
        $success_movecomplaint = mysqli_query($link, $sql_movecomplaint);

        if ($success_movecomplaint) {
          echo "Success was able to move Table entry";
          $last = $link->insert_id;
          //Execute Deletion from Complaint Table
          $success_delcompfromtable = mysqli_query($link, $sql_delcompfromtable);

          //Delete success
          if ($success_delcompfromtable) {
            header("location:../hr.php?delrsp=0");
          }
          //Delete Unsuccessful
          else {
            header("location:../hr.php?delrsp=1");
          }
        }
        //Move Unsuccessful
        else {
          header("location:../hr.php?delrsp=2");
        }

      }



    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


     #########################################################
     ################### COUNT MESSAGE FROM HR ###############
     #########################################################


    
?>
