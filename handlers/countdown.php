<?php
  include 'dbcon.php';
  $complaint_id = $_POST['complaintid'];

  //Count Up and Down Votes
  $sql_countdownvotes = "SELECT * FROM complaints_vote WHERE c_id = $complaint_id AND vote = 'down'";
  $success_countdownvotes = mysqli_query($link, $sql_countdownvotes);
  $countdownvotes = $success_countdownvotes->num_rows;

  echo "$countdownvotes";
?>
