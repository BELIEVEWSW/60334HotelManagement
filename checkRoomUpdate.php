<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$roomNumber= $_REQUEST['roomNum'];
$checkIn = $_REQUEST['dateIn'];
$checkOut = $_REQUEST['dateOut'];
$idUpdate= $_REQUEST['idUpdate'];

require('login1.php'); 

$conn = new mysqli($hn,$un,$pw,$db);
  if ($conn->connect_error) die($conn->connect_error);


	if($roomNumber!="" && $checkIn !="" && $checkOut!=""){
		$query  = "SELECT id FROM `reservation` WHERE (room_num= $roomNumber and date_in <= $checkIn and date_out >= $checkOut)or (room_num= $roomNumber and date_in >= $checkIn and date_in< $checkOut)or (room_num= $roomNumber and date_out> $checkIn and date_out<= $checkOut )";	
		$result = $conn->query($query);
		  if (!$result) die($conn->error);
		$rows = $result->num_rows;


		   $hint =  "room not available";
		   if($checkIn < $checkOut){
		   if($rows == 1){
			     $result->data_seek(0);
				$row = $result->fetch_array(MYSQLI_ASSOC);
				if($idUpdate == $row['id']){
					$hint = "ok";
				}
		   }
			if ($rows == 0){
			 $hint ="ok";

			 }
		   }else{
			   $hint = "check in date should be earlier than check out";
		   }
					echo $hint;
					$result->close();
	}

$conn->close();
?>