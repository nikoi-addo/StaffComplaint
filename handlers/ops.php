<?php
  //This file handles all major backend operations

    include 'dbcon.php'; //Initialize the database connection

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //Form Submitted
      // $cur_time = $ipaddress = $division = $comment = $c_day "";


      $form_type = $_POST['form_type'];
      //Users IP Address
      $ipaddress = $_SERVER["REMOTE_ADDR"];
      $cur_time = time(); //Time

      #########################################################
      #################### MAKE A COMPLAINT ###################
      #########################################################
      if ($form_type == 'ComplainForm') {
        //User Problem
        $problem = test_input($_POST['problem']);
        //User Division
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
          if(move_uploaded_file($_FILES["images"]["tmp_name"], $targetFilePath)){

            $sql_insertcomplaint = "INSERT INTO complaints(c_value, c_division, c_date_created, c_ip_address, c_date_stop_display, c_image_name1) VALUES('$problem', '$division', $cur_time, '$ipaddress', $stop_display, '$fileName')";

            //Insert Complaint into Database
            $success_insertcomplaint = mysqli_query($link, $sql_insertcomplaint);

            if ($success_insertcomplaint) {
              echo "Image Upload successful";
            }
            else {
              $errorist = mysqli_error($link);
              echo $errorist;
            }


          }
          else{
            echo "Unable to Upload the File, Retry!";

          }
        }
        else{
          echo "File Type is not Supported!";

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
          echo "Comment Uploaded";
        }
        else{
          echo mysqli_error($link);
          echo "<br>Comment upload incomplete";
        }
      }





      #########################################################
      ################### DELETE A COMPLAINT ##################
      #########################################################

      if ($form_type == 'DeleteComplaint') {
        // code...
      }
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>
