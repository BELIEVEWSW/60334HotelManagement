<?php
//receiving email and password from the form
$roomNum = $_REQUEST['roomNumber'];
//connecting to database to check whether the login combo (username and password ) exists or not.

require('login1.php'); 
$conn = new mysqli($hn,$un,$pw,$db);
  if ($conn->connect_error) die($conn->connect_error);


if($roomNum!=''){
$stmt = $conn->prepare("SELECT * FROM `room` WHERE room_number = ?");
	$stmt->bind_param("s", $roomNum);
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