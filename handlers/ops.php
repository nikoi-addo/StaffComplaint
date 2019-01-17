<?php
  //This file handles all major backend operations

    include 'dbcon.php'; //Initialize the database connection

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $form_type = $_POST['form_type'];

      #########################################################
      #################### MAKE A COMPLAINT ###################
      #########################################################
      if ($form_type == 'ComplainForm') {
        $problem = $_POST['problem'];
        $division = $_POST['division'];
        $cur_time = time(); //Time of Complaint

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

            $sql_insertcomplaint = "INSERT INTO complaints(c_value, c_date_created, c_ip_address, c_date_stop_display, c_image_name1) VALUES ('$problem', $cur_time, 'We are going forward', $stop_display, '$fileName')";

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
            $errorist = mysqli_error($link);
            echo $errorist;


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
        // code...
      }





      #########################################################
      ################### DELETE A COMPLAINT ##################
      #########################################################

      if ($form_type == 'DeleteComplaint') {
        // code...
      }
    }

?>
