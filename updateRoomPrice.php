<?php
$rooms = $_POST['rooms'];
$price = $_POST['price'];
require('login1.php'); 
$conn = new mysqli($hn,$un,$pw,$db);
  if ($conn->connect_error) die($conn->connect_error);


if($rooms!=''){
	
  for($i = 0; $i < count($rooms); $i++){
	  $stmt = $conn->prepare("UPDATE room SET price = ? WHERE room_number = ? ");
	  $stmt->bind_param("ii",$price[$i] ,$rooms[$i]);
	  $stmt->execute();
  }
	echo "Selected room updated";
	echo "<script>setTimeout(\"location.href = 'updateRoom.php';\",1500);</script>";
$stmt->close();}
$conn->close();
?>