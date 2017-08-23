
<?php

$roomNumber= $_REQUEST['roomNumHidden'];
$checkIn = $_REQUEST['dayIn'];
$checkOut = $_REQUEST['dayOut'];

require('login1.php'); 
$conn = new mysqli($hn,$un,$pw,$db);
  if ($conn->connect_error) die($conn->connect_error);


if($roomNumber!=""&&$checkIn !=""&&$checkOut!=""){
	$sql    = "SELECT MAX(id) as id FROM `reservation`";
	$result = $conn->query($sql);
	if (!$result) die ("Database access failed: " . $sql);
	$row = $result->fetch_array(MYSQLI_NUM); 
	$id = $row[0] ;

	$id = $id + 1;
	mysql_free_result($result);

}
?>


<?php
$roomNumber= $_REQUEST['roomNumHidden'];
$checkIn = $_REQUEST['dayIn'];
$checkOut = $_REQUEST['dayOut'];
//connecting to database to check whether the login combo (username and password ) exists or not.

require('login1.php'); 
$conn = new mysqli($hn,$un,$pw,$db);
  if ($conn->connect_error) die($conn->connect_error);

if($roomNumber!=""&&$checkIn !=""&&$checkOut!=""){
 session_start();
	$stmt = $conn->prepare("INSERT INTO reservation (id, date_in,date_out, room_num, customer_email) VALUES (?,?,?,?,?)");
	$stmt->bind_param("issss",$id,$checkIn,$checkOut ,$roomNumber, $_SESSION['email']);
	$stmt->execute();

	echo "Reservation Made";
echo "<script>setTimeout(\"location.href = 'roomListCustomer.php';\",1500);</script>";
$stmt->close();
}

 $conn->close();


?>