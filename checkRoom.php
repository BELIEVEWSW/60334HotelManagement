<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
//receiving email and password from the form
$roomNumber= $_REQUEST['roomNum'];
$checkIn = $_REQUEST['dateIn'];
$checkOut = $_REQUEST['dateOut'];


require('login1.php'); 

$conn = new mysqli($hn,$un,$pw,$db);
  if ($conn->connect_error) die($conn->connect_error);


	if($roomNumber!="" && $checkIn !="" && $checkOut!=""){
		$query  = "SELECT * FROM `reservation` WHERE (room_num= $roomNumber and date_in <= $checkIn and date_out >= $checkOut)or (room_num= $roomNumber and date_in >= $checkIn and date_in< $checkOut)or (room_num= $roomNumber and date_out> $checkIn and date_out<= $checkOut )";	
		$result = $conn->query($query);
		  if (!$result) die($conn->error);
		$rows = $result->num_rows;


		   $hint =  "room not available";
			if ($rows == 0){
			 $hint ="ok";

			 }
					echo $hint;
					$result->close();
	}

$conn->close();
?>