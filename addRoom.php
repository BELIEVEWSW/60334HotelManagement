<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$roomNumber = $_REQUEST['roomNum'];
$roomType = $_REQUEST['roomType'];
$roomPrice = $_REQUEST['price'];
$petAvai = $_REQUEST['pet'];
$smokeAvai = $_REQUEST['smoke'];

require('login1.php'); 
$conn = new mysqli($hn,$un,$pw,$db);
  if ($conn->connect_error) die($conn->connect_error);


if($roomType!=""&& $roomPrice!="" && $roomNumber!="" && $petAvai!=""&&$smokeAvai!=""){

	$stmt = $conn->prepare("INSERT INTO room (room_number, room_type,price,pet, smoke) VALUES (?,?,?,?,?)");
	$stmt->bind_param("isiii", $roomNumber,$roomType,$roomPrice,$petAvai,$smokeAvai);
	$stmt->execute();

	echo "Room created";
echo "<script>setTimeout(\"location.href = 'roomList.php';\",1500);</script>";
$stmt->close();
}

$conn->close();


?>