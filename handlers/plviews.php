<?php
include 'dbcon.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = $_POST['postid'];
    $user_id = $_POST['userid'];
    //Locate details for specific complaint
    $query_poll = "SELECT * FROM poll WHERE p_id = $post_id";
    $success_poll = mysqli_query($link, $query_poll);
    if ($success_poll) {
      $row = $success_poll->fetch_assoc();
      //Number of views currently
      $totalviews = $row['p_views'];
      //Check if user has already viewed the complaint
      $query_verifyuserview = "SELECT * FROM plview WHERE p_id = $post_id AND u_id = $user_id";
      $success_verifyuserview = mysqli_query($link, $query_verifyuserview);

      //If user has not viewed Complaint
      if ($success_verifyuserview->num_rows == 0) {
        $query_userviewinsert = "INSERT INTO plview(p_id, u_id) VALUES ($post_id, $user_id)";
        $success_userviewinsert = mysqli_query($link, $query_userviewinsert);
        if ($success_userviewinsert) {
          $totalviews = $totalviews + 1;
          //Update number of views
          $query_updatepostviews = "UPDATE poll SET p_views= $totalviews WHERE p_id = $post_id";
          $succcess_updatepostviews = mysqli_query($link, $query_updatepostviews);
          //Display on page

        }
      }

      //Update Post Views
      echo $totalviews . "<i class='fa fa-eye'>";
    }

  }

 ?>
