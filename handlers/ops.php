<?php
  //This file handles all major backend operations

    include 'dbcon.php'; //Include the database connection

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //Users IP Address
      $ipaddress = $_SERVER["REMOTE_ADDR"];
      $cur_time = time();
      $form_type = "";
      //Form Submitted
      if(isset($_POST['form_type'])){
        $form_type = $_POST['form_type'];
      }

      #########################################################
      #################### MAKE A COMPLAINT ###################
      #########################################################
      if ($form_type == 'ComplainForm') {
        //User Problem
        $problem = $_POST['problem'];
        //Escape the special characters in the query
        $problem = mysqli_real_escape_string($link, $problem);
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        //User Division
        if ($_POST['division'] === "Select Division (optional)") {
          $division = "";
        }
        $division = $_POST['division'];
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

        $sql_insertcomplaint = "INSERT INTO complaints(c_value, c_division, date_created, c_ip_address, date_stop_display, u_fname, u_id) VALUES('$problem', '$division', $cur_time, '$ipaddress', $stop_display, '$username', $user_id)";

        //Insert Complaint into Database
        $success_insertcomplaint = mysqli_query($link, $sql_insertcomplaint);

        if ($success_insertcomplaint) {
          //Get id for inserted message
          $last_insert_id = mysqli_insert_id($link);

          //Upload each of the images
          foreach ($_FILES["images"]["error"] as $key => $error) {
              if ($error == UPLOAD_ERR_OK) {
                  $tmp_name = $_FILES["images"]["tmp_name"][$key];
                  // basename() may prevent filesystem traversal attacks;
                  // further validation/sanitation of the filename may be appropriate
                  $name = time() . '_cm_' .basename($_FILES["images"]["name"][$key]);
                  if (move_uploaded_file($tmp_name, "../uploads/$name")) {
                    $sql_insertimage = "INSERT INTO imagine(im_name, ref_id, ref_name) VALUES ('$name', $last_insert_id, 'complaint')";
                    mysqli_query($link, $sql_insertimage);
                  }
              }
          }

          header("location:../index.php?rsp=cmpsuccess");
        }
        else {

          header("location:../index.php?rsp=cmperror");
        }
      }





      #########################################################
      ################# COMMENT ON A COMPLAINT OR POLL ################
      #########################################################

      if ($form_type == 'UploadComment') {
        //HR Comment
        $comment = $_POST['comment'];
        $username = $_POST['username'];
        //Escape comments to take care of apostrophes in comment side
        $comment = mysqli_real_escape_string($link, $comment);
        $username = mysqli_real_escape_string($link, $username);

        $comment_type = $_POST['comment_type'];

        //Complaint ID
        if ($comment_type == 0) {
          $idea_id = $_POST['complaint_id'];
        }
        //POll ID
        elseif ($comment_type == 1) {
          $idea_id = $_POST['poll_id'];
        }
        //Query to Insert Comment in DB
        $sql_uploadcomment = "INSERT INTO comments(cm_value, cm_ip_address, c_id, cm_date, cm_type, cm_author) VALUES('$comment', '$ipaddress', $idea_id, $cur_time, $comment_type, '$username')";
        //Execute query
        $success_uploadcomment = mysqli_query($link, $sql_uploadcomment);

        if ($success_uploadcomment) {
          //Upload comment success
          header("location:../hr.php?rsp=$idea_id&cmrsp=1&cmtyp=$comment_type");
        }
        else{
          //Error in comment success
          header("location:../hr.php?rsp=$idea_id&cmrsp=0&cmtyp=$comment_type");

        }
      }





      #########################################################
      ################### DELETE A COMPLAINT ##################
      #########################################################

      if ($form_type == 'DeleteComplaint') {
        $complaint_id = $_POST['complaint_id'];
        $complaint_value = $_POST['complaint_value'];
        $complaint_value = mysqli_real_escape_string($complaint_value);
        $complaint_division = $_POST['complaint_division'];
        $complaint_date_created = $_POST['complaint_date_created'];
        $complaint_ip_address = $_POST['complaint_ip_address'];
        $complaint_date_stop_display = $_POST['complaint_date_stop_display'];
        $username = $_POST['username'];
        $user_id = $_POST['user_id'];

        //Move complaint to del_complaint table
        $sql_movecomplaint = "INSERT INTO del_complaints(c_id, c_value, c_division, date_created, c_ip_address, date_stop_display, u_fname, u_id) VALUES($complaint_id, '$complaint_value', '$complaint_division', $complaint_date_created, '$complaint_ip_address', $complaint_date_stop_display, '$username', $user_id)";
        //Delete complaint from complaint table
        $sql_delcompfromtable = "DELETE FROM complaints WHERE c_id = $complaint_id";
        //Update image table to show image as deleted
        $sql_updateimage = "UPDATE imagine SET ref_status = 'deleted' WHERE ref_id = $complaint_id AND ref_name='complaint'";
        //Execute move complaint
        $success_movecomplaint = mysqli_query($link, $sql_movecomplaint);

        if ($success_movecomplaint) {
          $last = $link->insert_id;
          //Execute Deletion from Complaint Table
          $success_delcompfromtable = mysqli_query($link, $sql_delcompfromtable);
          $success_updateimage = mysqli_query($link, $sql_updateimage);

          //Delete and Update success
          if ($success_delcompfromtable && $success_updateimage) {
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

      #########################################################
      ##################### SEND HR MESSAGE ###################
      #########################################################

      if ($form_type == 'HRMessage') {
        //Subject input and escaping
        $m_subject = $_POST['subject'];
        $m_subject = mysqli_real_escape_string($link, $m_subject);
        //Message input and escaping to prevent errors
        $m_message = $_POST['hrmessage'];
        $m_message = mysqli_real_escape_string($link, $m_message);
        $m_division = $_POST['add_division'];

        // Query for inserting HR Message
        $sql_sendhrmessage = "INSERT INTO messagehr(m_message, m_subject, m_ip_address, m_division, m_date_created) VALUES('$m_message', '$m_subject', '$ipaddress', '$m_division', $cur_time)";
        // Execute sql for insert HR Message
        $success_sendhrmessage = mysqli_query($link, $sql_sendhrmessage);

        // Check Success of insert hr message query
        if ($success_sendhrmessage) {
          //Get id for inserted message
          $last_insert_id = mysqli_insert_id($link);
          $sql_viewallactivated = "SELECT * FROM login_info WHERE u_status='activated'";
          $success_viewallactivated = mysqli_query($link, $sql_viewallactivated);
          if ($success_viewallactivated) {
            while ($rowactivated = $success_viewallactivated->fetch_assoc()) {
              $valunreadmessage = $rowactivated['u_unreadmessage'];
              if ($valunreadmessage == "") {
                $valunreadmessage = 0;
              }
              $id = $rowactivated['no'];
              $newvalueunreadmessage = $valunreadmessage. "|" . $last_insert_id;
              $sql_updatevalueunreadmessage = "UPDATE login_info SET u_unreadmessage = '$newvalueunreadmessage' WHERE no = $id";
              $success_updatevalueunreadmessage = mysqli_query($link, $sql_updatevalueunreadmessage);
            }
          }
          //Upload each of the images
          foreach ($_FILES["hrimages"]["error"] as $key => $error) {
              if ($error == UPLOAD_ERR_OK) {
                  $tmp_name = $_FILES["hrimages"]["tmp_name"][$key];
                  // basename() may prevent filesystem traversal attacks;
                  // further validation/sanitation of the filename may be appropriate
                  $name = time() . '_hr_' .basename($_FILES["hrimages"]["name"][$key]);
                  if (move_uploaded_file($tmp_name, "../uploads/$name")) {
                    $sql_insertimage = "INSERT INTO imagine(im_name, ref_id, ref_name) VALUES ('$name', $last_insert_id, 'hrmessage')";
                    mysqli_query($link, $sql_insertimage);
                  }
              }
          }

          header("location:../hr.php");
        }
        else {
          // header("location:../hr.php");
          echo mysqli_error($link);
        }

      }
      #########################################################
      ###################### MAKE A POLL ######################
      #########################################################
      if (isset($_POST['postpoll'])) {
        $question = $opinion1 = $opinion2 = $opinion3 = $opinion4 = $ctime = "";
        $d_votes = "0|0";
        $question = $_POST['question'];
        $question = mysqli_real_escape_string($link, $question);
        $opinion1 = $_POST['opinion1'];
        $opinion1 = mysqli_real_escape_string($link, $opinion1);
        $opinion2 = $_POST['opinion2'];
        $opinion2 = mysqli_real_escape_string($link, $opinion2);
        $opinion3 = $_POST['opinion3'];
        $opinion3 = mysqli_real_escape_string($link, $opinion3);
        $opinion4 = $_POST['opinion4'];
        $opinion4 = mysqli_real_escape_string($link, $opinion4);
        $duration = $_POST['duration'];
        $poll_timeout = strtotime("+". $duration ." Days");
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $opinion1 = $opinion1 . "|" . $opinion2; //Setting Default Vote to 0|0
        //Check if there is a third opinion
        if (!empty($opinion3)) {
          $opinion1 = $opinion1 . "|" . $opinion3;
          $d_votes .= "|0"; //Setting Default Vote to 0|0|0
        }
        //Check if there is a fourth opinion
        if (!empty($opinion4)) {
          $opinion1 = $opinion1 . "|" . $opinion4;
          $d_votes .= "|0"; //Setting Default Vote to 0|0|0|0
        }
        $number_options = count(explode("|", $opinion1));
        // $number_options = 2;
        $sql_insertpoll = "INSERT INTO poll(p_question, date_created, p_options, p_votes, p_number_options, date_stop_display, u_id, u_fname) VALUES('$question', $cur_time, '$opinion1', '$d_votes', $number_options, $poll_timeout, $user_id, '$username')";
        $success = mysqli_query($link, $sql_insertpoll);
        if ($success) {
          $last_insert_id = mysqli_insert_id($link);
          //Identify poll option with specific image
          $i = 0;
          foreach ($_FILES["pollimages"]["error"] as $key => $error) {
              if ($error == UPLOAD_ERR_OK) {
                  $tmp_name = $_FILES["pollimages"]["tmp_name"][$key];
                  $name = time() . '_pl_' .basename($_FILES["pollimages"]["name"][$key]);
                  if (move_uploaded_file($tmp_name, "../uploads/$name")) {
                    $sql_insertimage = "INSERT INTO poll_imagine(pl_im_name, pl_ref_id, pl_ref_option) VALUES ('$name', $last_insert_id, $i)";
                    mysqli_query($link, $sql_insertimage);
                  }
              }
              $i++;
          }
        if ($username == "HUMAN RESOURCE DIVISION") {
          header('location:../hr.php');
        }
        else {
          header('location:../index.php');
        }

        }
      }


      #########################################################
      ###################### VOTE ON A POLL ###################
      #########################################################
      if (isset($_POST['pollvote'])) {
        //Poll Data holding Option user voted for
        $pollVoteData = array(
          'id' => $_POST['id'],
          'pollOptions' => $_POST['option']
        );
        $id = $_POST['id'];
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        //Select Votes Cast for each category and Number of Votes
        $sql_getvotes = "SELECT p_votes, p_voters FROM poll WHERE p_id = $id";
        $success_getvotes = mysqli_query($link, $sql_getvotes);
        if ($success_getvotes) {
          $row = $success_getvotes->fetch_assoc();
          $votes = explode("|", $row['p_votes']);
          //Increate the Category of Users vote by 1
          $votes[$pollVoteData['pollOptions']] += 1;
          $votes = implode("|", $votes);
          // echo $votes;
          //Increate Voter count
          $voters = $row['p_voters'];
          $voters  += 1;
          $sql_updatepoll = "UPDATE poll SET p_votes ='$votes' , p_voters = $voters, p_last_vote_date = $cur_time WHERE p_id=$id";
          $success_updatepoll = mysqli_query($link,$sql_updatepoll);
          $sql_votedetails = "INSERT INTO poll_voters(user_id, poll_id, username, vote_date) VALUES($user_id, $id, '$username', $cur_time)";
          $success_votedetails = mysqli_query($link, $sql_votedetails);
          if ($success_updatepoll && $success_votedetails) {
            header('location:../index.php');
          }//End success_updatepoll
          else {
            echo mysqli_error($link);
          } //End !$success_updatepoll
        } //End success_getvotes
        else { //if !success_getvotes
          echo mysqli_error($link);
        } //End !success_getvotes
      } //End Post of pollvote


      #########################################################
      ###################### DELETE A POLL ####################
      #########################################################
      if (isset($_POST['delpoll'])) {
        $poll_id = $_POST['poll_id'];
        $poll_question = $_POST['poll_question'];
        $poll_question = mysqli_real_escape_string($link, $poll_question);
        $poll_date = $_POST['poll_date'];
        $poll_options = $_POST['poll_options'];
        $poll_options = mysqli_real_escape_string($link, $poll_options);
        $poll_votes = $_POST['poll_votes'];
        $poll_number_options = $_POST['poll_number_options'];
        $poll_timeout = $_POST['poll_timeout'];
        $poll_voters = $_POST['poll_voters'];
        $poll_last_vote_date = $_POST['poll_last_vote_date'];
        $u_id = $_POST['user_id'];
        $username = $_POST['username'];

        //Move Pol to del_poll table
        $sql_movepoll = "INSERT INTO del_poll(p_id, p_question, date_created, p_options, p_votes, p_number_options, date_stop_display, p_voters, p_last_vote_date, u_id, u_fname) VALUES($poll_id, '$poll_question', $poll_date, '$poll_options', '$poll_votes', $poll_number_options, $poll_timeout, $poll_voters, $poll_last_vote_date, $u_id, '$username')";
        //Delete Poll from poll table
        $sql_delpollfromtable = "DELETE FROM poll WHERE p_id = $poll_id";
        //Execute move complaint
        $success_movepoll = mysqli_query($link, $sql_movepoll);

        if ($success_movepoll) {
          $last = $link->insert_id;
          //Execute Deletion from Poll Table
          $success_delpollfromtable = mysqli_query($link, $sql_delpollfromtable);

          //Deletesuccess
          if ($success_delpollfromtable) {
            header("location:../hr.php?delrsp=0");

          }
          //Delete of Poll Unsuccessful
          else {
            header("location:../hr.php?delrsp=1");

          }
        }
        //Move of Poll Unsuccessful
        else {
          header("location:../hr.php?delrsp=2");
        }
      }


      #########################################################
      ########################## SIGNUP #######################
      #########################################################
      if (isset($_POST['signup'])) {
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $confirm_password = $_POST['confirm_password'];
        $confirm_password = md5($confirm_password);
        $success_checkemail = mysqli_query($link, "SELECT u_email FROM login_info WHERE u_email = '$user_email' AND u_status='unactivated'");
        $form_type = "";
        if ($success_checkemail->num_rows > 0 ) {
          $sql_updatelogin = "UPDATE login_info SET u_password = '$confirm_password', u_signup_date='$cur_time', u_status = 'activated' WHERE u_email = '$user_email'";
          $success_updatelogin = mysqli_query($link, $sql_updatelogin);
          if ($success_updatelogin) {
            echo "<center>Password has been set. You will be redirected to the Login Page...</center>";
            header("Refresh: 2;url='../login.php'");
          }
          else {
            echo "User Email has already been registered";
          }
        }
        else {
          session_start();
          $_SESSION['error'] = "<div class='alert alert-danger'><center>Kindly use a correct Staff Email, or contact the Administrator</center></div>";
          header("location:../signup.php");
        }
      }


      #########################################################
      ###################### USER LOGIN ####################
      #########################################################
      if (isset($_POST['login'])) {
        $u_mail = $_POST['email'];
        $u_passwd = $_POST['password'];
        $u_passwd = md5($u_passwd);

        $sql_checkloginmail = "SELECT u_email FROM login_info WHERE u_email = '$u_mail'";
        $success_checkloginmail = mysqli_query($link, $sql_checkloginmail);

        if ($success_checkloginmail->num_rows > 0) {
          $sql_checkstatus = "SELECT u_email FROM login_info WHERE u_email = '$u_mail' AND u_status = 'activated'";
          $success_checkstatus = mysqli_query($link, $sql_checkstatus);

          if ($success_checkstatus->num_rows > 0) {
            $sql_checkpassword = "SELECT * FROM login_info WHERE u_email = '$u_mail' AND u_status = 'activated' AND u_password = '$u_passwd'";
            $success_checkpassword = mysqli_query($link, $sql_checkpassword);

            if ($success_checkpassword->num_rows > 0) {
              session_start();
              if ($u_mail == "nikoi.addo@nca.org.gh") {
                $_SESSION['admin'] = true;
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = "HUMAN RESOURCE DIVISION";
                $_SESSION['u_id'] = 0;
                header("location:../hr.php");

              }
              else {
                while ($row = $success_checkpassword->fetch_assoc()) {
                  $_SESSION['u_id'] = $row['no'];
                  $_SESSION['loggedin'] = true;
                  $_SESSION['username'] = $row['u_fname'] . " " . $row['u_lname'];
                }
                header("location:../index.php");

              }
            }
            else {
              session_start();
              $_SESSION['email'] = $u_mail;
              $_SESSION['error'] = "<div class='alert alert-danger fade in'><center>Password Incorrect</center><a class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
              header("location:../login.php");
            }
          }
          else{
            echo "Email has not been activated. Yet";
            header("Refresh: 2;url='../signup.php'");
          }
        }
        else {
          echo "Email Does not Exist. Contact Admin";
        }

      }




    }



    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }



?>
