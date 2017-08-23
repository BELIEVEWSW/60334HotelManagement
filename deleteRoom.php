<?php
$rooms = $_POST['rooms'];

require('login1.php'); 
$conn = new mysqli($hn,$un,$pw,$db);
  if ($conn->connect_error) die($conn->connect_error);


if($rooms!=''){
	
  for($i = 0; $i < count($rooms); $i++){
	  $stmt = $conn->prepare("DELETE FROM room WHERE room_number=?");
	  $stmt->bind_param("i", $rooms[$i]);
	  $stmt->execute();
  }
	echo "Selected room deleted";
	echo "<script>setTimeout(\"location.href = 'roomList.php';\",1500);</script>";
		$stmt->close();
}

		$conn->close();
?>