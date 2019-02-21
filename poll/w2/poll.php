<?php
class Poll{
private $host = 'localhost';
private $user = 'root';
private $password = '';
private $database = 'test';
private $pollTable = 'poll';
private $dbConnect = false;
public function __construct(){
if(!$this->dbConnect){
$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
if($conn->connect_error){
die("Error failed to connect to MySQL: " . $conn->connect_error);
}else{
$this->dbConnect = $conn;
}
}
}
private function getData($sqlQuery) {
$result = mysqli_query($this->dbConnect, $sqlQuery);
if(!$result){
die('Error in query: '. mysqli_error());
}
$data= array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$data[]=$row;
}
return $data;
}
public function getPoll(){
$sqlQuery = 'SELECT id, question, options, votes, voters FROM '.$this->pollTable;
return $this->getData($sqlQuery);
}
public function getVotes($id){
$sqlQuery = 'SELECT votes, voters FROM '.$this->pollTable.' where id = '.$id;
$result = mysqli_query($this->dbConnect, $sqlQuery);
return mysqli_fetch_array($result, MYSQLI_ASSOC);
}
public function updateVote($pollVoteData) {
if(!isset($pollVoteData['id']) || isset($_COOKIE[$pollVoteData['id']])) {
return false;
}
$pollVoteDetails = $this->getVotes($pollVoteData['id']);
$votes = explode("||||", $pollVoteDetails['votes']);
$votes[$pollVoteData['pollOptions']] += 1;
implode("||||",$votes);
$pollVoteDetails['voters'] += 1;
$sqlQuery = "UPDATE ".$this->pollTable." set votes = '".implode("||||",$votes)."' , voters = '".$pollVoteDetails['voters']."' where id = '".$pollVoteData['id']."'";
mysqli_query($this->dbConnect, $sqlQuery);
return true;
}
}
?>