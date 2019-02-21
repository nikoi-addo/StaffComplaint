<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <!-- jQuery -->
  <style type="text/css">
  body { margin-top:20px; }
  .panel-body:not(.two-col) { padding:0px }
  .glyphicon { margin-right:5px; }
  .glyphicon-new-window { margin-left:5px; }
  .panel-body .radio,.panel-body .checkbox {margin-top: 0px;margin-bottom: 0px;}
  .panel-body .list-group {margin-bottom: 0;}
  .margin-bottom-none { margin-bottom: 0; }
  .panel-body .radio label,.panel-body .checkbox label { display:block; }
</style>
</head>
<body class="">
 
  <?php
  include ('Poll.php');
  $poll = new Poll();
  $voted = 0;
  $pollData = $poll->getPoll();
  if(isset($_POST['vote'])){
    $pollVoteData = array(
      'id' => $_POST['id'],
      'pollOptions' => $_POST['options']
    );
    
    $isVoted = $poll->updateVote($pollVoteData);
    if($isVoted){
      setcookie($_POST['id'], 1, time()+60*60*24*365);
      $voted = 1;
    } else {
      $voted = 2;
    }
  }
  ?>
  <div class="container">
    <div class="row">
      <?php if(!empty($voted) && $voted === 1) {
        echo '<div class="alert alert-success">Your have voted successfully.</div>';
      }
      else if(!empty($voted)  && $voted === 2) {
        echo '<div class="alert alert-danger">Your had already voted.</div>';
      }
      ?>
      <form action="" method="post" name="pollForm">
      <?php foreach($pollData as $poll){
        $pollOptions = explode("||||", $poll['options']);?>
        <div class="col-md-3">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">
                <span class="glyphicon glyphicon-arrow-right"></span><?php echo $poll['question']?><span
                class="glyphicon glyphicon-new-window"></span></a>
              </h3>
            </div>
            <div class="panel-body">
              <ul class="list-group">
                <?php for( $i = 0; $i < count($pollOptions); $i++ ) { ?>
 
                  <li class="list-group-item">
                    <div class="radio">
                      <label>
                        <input type="radio" name="options" value="<?php echo $i; ?>">
                        <?php echo $pollOptions[$i]?>
                      </label>
                    </div>
                  </li>
                <?php }?>
 
              </ul>
            </div>
            <div class="panel-footer">
              <input type="hidden" name="id" value="<?php echo $poll['id']; ?>"/>
              <button type="submit" class="btn btn-primary btn-sm" id="vote" name="vote">
              Vote</button>
              <a href="results.php?pollID="<?php echo $poll['id'];?>">View Result</a></div>
            </div>
          </div>
        <?php }?>
      </form>
      </div>
    </div>
  </body>
  </html>