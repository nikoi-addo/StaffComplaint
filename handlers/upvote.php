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
      $sql_insertupvote = "INSERT INTO complaints_vote (c_id, u_id, vote) VALUES($complaint_id, $user_id, 'up')";
      $sql_updatevotecount = "UPDATE complaints SET c_votes = $totalvotes+1 WHERE c_id = $complaint_id";
      $success_insertupvote = mysqli_query($link, $sql_insertupvote);
      //Increment number of votes for the complaint
      if ($success_insertupvote) {
        $success_updatevotecount = mysqli_query($link, $sql_updatevotecount);
        if ($success_updatevotecount) {
          //Count for votes
          $totalvotes = $totalvotes + 1;
          echo $totalvotes;
        }

      }
    }

    //If user has already voted, update the vote to reflect current decision to upvote
    else {
      $sql_changetoupvote = "UPDATE complaints_vote SET vote = 'up' WHERE c_id = $complaint_id AND u_id = $user_id";
      $sql_updatevotecount = "UPDATE complaints SET c_votes = $totalvotes+1 WHERE c_id = $complaint_id";
      $success_changetoupvote = mysqli_query($link, $sql_changetoupvote);

      if ($success_changetoupvote) {
        $success_updatevotecount = mysqli_query($link, $sql_updatevotecount);
        if ($success_updatevotecount) {
          $totalvotes = $totalvotes+1;
          echo $totalvotes;
        }
      }

    }

?>
