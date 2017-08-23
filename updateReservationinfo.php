<?php

$roomNumber= $_REQUEST['roomNumHidden'];
$checkIn = $_REQUEST['dateInHidden'];
$checkOut = $_REQUEST['dateOutHidden'];
$idUpdate= $_REQUEST['idUpdateHidden'];

require('login1.php'); 

$conn = new mysqli($hn,$un,$pw,$db);
  if ($conn->connect_error) die($conn->connect_error);


	if($roomNumber!="" && $checkIn !="" && $checkOut!=""){
		
	$sql    = "SELECT MAX(id) as id FROM `reservation`";
	$result = $conn->query($sql);

	if (!$result) die ("Database access failed: " . $sql);
	$row = $result->fetch_array(MYSQLI_NUM); 
	$id = $row[0] ;

	$id = $id + 1;
	mysql_free_result($result);
	
		
					$result->close();
	}

$conn->close();





?>


<?php

$roomNumber= $_REQUEST['roomNumHidden'];
$checkIn = $_REQUEST['dateInHidden'];
$checkOut = $_REQUEST['dateOutHidden'];
$idUpdate= $_REQUEST['idUpdateHidden'];

require('login1.php'); 

$conn = new mysqli($hn,$un,$pw,$db);
  if ($conn->connect_error) die($conn->connect_error);


	if($roomNumber!="" && $checkIn !="" && $checkOut!=""){
		$query  = "SELECT id FROM `reservation` WHERE id = $idUpdate";
				$result = $conn->query($query);
				  if (!$result) die($conn->error);
				$rows = $result->num_rows;


					if ($rows > 0){
						$stmt = $conn->prepare("DELETE FROM `reservation` WHERE id = ?");
						$stmt->bind_param("s",$idUpdate);
						$stmt->execute();
						echo "<h3>Old reservation delete successful.</h3>";
					 
							session_start();
							$email = $_SESSION['email'];

	$stmt1 = $conn->prepare("INSERT INTO `reservation` (id, date_in,date_out,room_num,customer_email) VALUES (?,?,?,?,?)");
	$stmt1->bind_param("sssss",$idUpdate,$checkIn,$checkOut, $roomNumber,$email);
	$stmt1->execute();

	echo " <br><br><h3>Reservation Updated</h3>";
echo "<script>setTimeout(\"location.href = 'updateReservation.php';\",1500);</script>";
		$stmt->close();
$stmt1->close();		
	}}
	$conn->close();
	
	


?>