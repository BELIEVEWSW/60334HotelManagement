<?php
$records = $_POST['records'];

require('login1.php'); 
$conn = new mysqli($hn,$un,$pw,$db);
  if ($conn->connect_error) die($conn->connect_error);


if($records!=''){

  for($i = 0; $i < count($records); $i++){
	  $stmt = $conn->prepare("DELETE FROM reservation WHERE id=?");
	  $stmt->bind_param("i", $records[$i]);
	  $stmt->execute();
  }
	echo "Selected records deleted";
	echo "<script>setTimeout(\"location.href = 'allReservation.php';\",1500);</script>";
		$stmt->close();
}

		$conn->close();
?>