<?php
  //upvoting a complaint
  include 'dbcon.php';
    $complaint_id = $_POST['complaintid'];
    $user_id = $_POST['userid'];

    //Query to select from complaint table
    $query_complaint = "SELECT * FROM complaints WHERE c_id = $complaint_id";
    $success_complaint = mysqli_query($link, $query_complaint);
    if ($success_complaint) {
      $row = $success_complaint->fetch_assoc();
      //Number of votes currently
      $totalvotes = $row['c_votes'];
    }

    //Query to see if user has already voted
    $sql_statususervote = "SELECT * FROM complaints_vote WHERE c_id = $complaint_id AND u_id = $user_id";
    $success_statususervote = mysqli_query ($link, $sql_statususervote);
    // echo mysqli_error($link);

    //If user has not voted yet
    if ($success_statususervote->num_rows == 0) {
      $sql_insertupvote = "INSERT INTO complaints_vote (c_id, u_id, vote) VALUES($complaint_id, $user_id, 'down')";
      $sql_updatevotecount = "UPDATE complaints SET c_votes = c_votes+1 WHERE c_id = $complaint_id";
      $success_insertupvote = mysqli_query($link, $sql_insertupvote);
      //Increment number of votes for the complaint
      if ($success_insertupvote) {
        $success_updatevotecount = mysqli_query($link, $sql_updatevotecount);
        if ($success_updatevotecount) {
          $sql_countupvote = "SELECT * FROM complaints_vote WHERE c_id = $complaint_id AND vote = 'up'";
          $sql_countdownvote = "SELECT * FROM complaints_vote WHERE c_id = $complaint_id AND vote = 'down'";
          $success_countupvote = mysqli_query ($link, $sql_countupvote);
          $success_countdownvote = mysqli_query ($link, $sql_countdownvote);
          $countupvote = $success_countupvote->num_rows;
          $countdownvote = $success_countdownvote->num_rows;
          $totalvotes = $countupvote - $countdownvote;
        }

      }
    }

    //If user has already voted, update the vote to reflect current decision to upvote
    else {
      $sql_changetodownvote = "UPDATE complaints_vote SET vote = 'down' WHERE c_id = $complaint_id AND u_id = $user_id";
      $success_changetodownvote = mysqli_query($link, $sql_changetodownvote);

      if ($success_changetodownvote) {
        $sql_countupvote = "SELECT * FROM complaints_vote WHERE c_id = $complaint_id AND vote = 'up'";
        $sql_countdownvote = "SELECT * FROM complaints_vote WHERE c_id = $complaint_id AND vote = 'down'";
        $success_countupvote = mysqli_query ($link, $sql_countupvote);
        $success_countdownvote = mysqli_query ($link, $sql_countdownvote);
        $countupvote = $success_countupvote->num_rows;
        $countdownvote = $success_countdownvote->num_rows;
        $totalvotes = $countupvote - $countdownvote;
      }

    }

    echo $totalvotes;
?>
