//Function accepting two values to update views
function updateviews(str, hlp){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
      //Replace id views value with new value from responseText
      document.getElementById("views"+str).innerHTML = xmlhttp.responseText;
    }
  };
  //Connect and submit postid and userid using POST method
  xmlhttp.open("POST", "handlers/views.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("postid="+str+"&userid="+hlp);
}

//Function for upvoting
function upvote(c_id, state, userid ){
  var xmlhttp = new XMLHttpRequest();
  // If the button has been voted already for the upvote
  if (state == 1) {
    END;
  }
  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
      //Replace id views value with new value from responseText
      document.getElementById("up"+c_id).src = "img/up.png";
      //Changet the state of up key to reflect active
      document.getElementById("up"+c_id).getAttributeNode("onclick").value = "upvote("+c_id+",1,"+userid+")";
      document.getElementById("down"+c_id).src = "img/down_off.png";
      //Change the state of down key to reflect inactive so that voting can be carried out again
      document.getElementById("down"+c_id).getAttributeNode("onclick").value = "downvote("+c_id+",1,"+userid+")";
      // alert(xmlhttp.responseText);
      //Change total vote count
      document.getElementById("totalvotes"+c_id).innerHTML = xmlhttp.responseText;
      countup(c_id);
      countdown(c_id);
    }
  };
  //Connect and submit postid and userid using POST method
  xmlhttp.open("POST", "handlers/upvote.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("complaintid="+c_id+"&userid="+userid);
}

//Function for downvoting
function downvote(c_id, state, userid){
  var xmlhttp = new XMLHttpRequest();
  // If the button has been voted already for the downvote
  if (state == 1) {
    END;
  }
  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
      //Replace id views value with new value from responseText
      document.getElementById("up"+c_id).src = "img/up_off.png";
      //Changet the state of up key to reflect inactive so that voting can be carried out again
      document.getElementById("up"+c_id).getAttributeNode("onclick").value = "upvote("+c_id+",1,"+userid+")";
      document.getElementById("down"+c_id).src = "img/down.png";
      //Changet the state of down key to reflect active
      document.getElementById("down"+c_id).getAttributeNode("onclick").value = "downvote("+c_id+",1,"+userid+")";
      // alert(xmlhttp.responseText)
      //Change total vote count
      document.getElementById("totalvotes"+c_id).innerHTML = xmlhttp.responseText;
      countup(c_id);
      countdown(c_id);
    }
  };
  //Connect and submit postid and userid using POST method
  xmlhttp.open("POST", "handlers/downvote.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("complaintid="+c_id+"&userid="+userid);
}

//Function to mark a message as read
function unreadmessages(messageid, userid){
  var xmlhttp = new XMLHttpRequest();

  //Direct to see full message
  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
      alert('done');
    }
  };

  //Connect and submit message
  xmlhttp.open("POST", "handlers/msgstate.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("messageid="+messageid+"userid="+userid);

}

function hovering(id, upordown){
  if(upordown == 'up'){
    document.getElementById("up"+id).src = "img/up.png";
    document.getElementById("down"+id).src = "img/up_off.png";
  }
  if(upordown == 'down'){
    document.getElementById("up"+id).src = "img/up_off.png";
    document.getElementById("down"+id).src = "img/down.png";
  }
}

//Function to count up votes and make changes needed
function countup(complaintid){
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
      document.getElementById("ucount"+complaintid).innerHTML = xmlhttp.responseText;
    }
  };

  //Connect and submit message
  xmlhttp.open("POST", "handlers/countup.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("complaintid="+complaintid);
}

//Function to count down votes and make changes needed
function countdown(complaintid){
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
      document.getElementById("dcount"+complaintid).innerHTML = xmlhttp.responseText;
    }
  };

  //Connect and submit message
  xmlhttp.open("POST", "handlers/countdown.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("complaintid="+complaintid);
}
