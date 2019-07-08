<?php
  include 'dbcon.php';
  $complaint_id = $_POST['complaintid'];

  //Count Up Votes
  $sql_countupvotes = "SELECT * FROM complaints_vote WHERE c_id = $complaint_id AND vote = 'up'";
  $success_countupvotes = mysqli_query($link, $sql_countupvotes);
  $countupvotes = $success_countupvotes->num_rows;

  echo $countupvotes;

 ?>
