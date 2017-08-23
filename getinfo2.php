<?php
//receiving email and password from the form
$email = $_REQUEST['email'];
$password = $_REQUEST['pwd'];
$username = $_REQUEST['uname'];
//connecting to database to check whether the login combo (username and password ) exists or not.

require('login1.php'); 
$conn = new mysqli($hn,$un,$pw,$db);
  if ($conn->connect_error) die($conn->connect_error);


if($email!=''){
	$stmt = $conn->prepare("SELECT * FROM `project_user` WHERE email = ?");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$rows = $stmt->fetch();
	$hint1 = "ok";
	if ($rows >0)
	$hint1 = "email match our records";
	echo $hint1;
		$stmt->close();
}
	$conn->close();
?>