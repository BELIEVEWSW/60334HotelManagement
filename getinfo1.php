<?php
//receiving email and password from the form
$email = $_REQUEST['email'];
$password = $_REQUEST['pwd'];
$username = $_REQUEST['uname'];
//connecting to database to check whether the login combo (username and password ) exists or not.

require('login1.php'); 

$conn = new mysqli($hn,$un,$pw,$db);
  if ($conn->connect_error) die($conn->connect_error);


if($username!=''){
	$stmt = $conn->prepare("SELECT * FROM `project_user` WHERE uname = ?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$rows = $stmt->fetch();
	$hint = "ok";
	if ($rows >0)
	$hint = "username match our records";
	echo $hint;
	$stmt->close();
}

$conn->close();
?>