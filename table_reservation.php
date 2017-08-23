<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

  require_once 'login1.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) 
      die($conn->connect_error);
  session_start();
  $email = $_SESSION['email'];
$query  = "SELECT * FROM `reservation` WHERE customer_email='$email'";
  $result = $conn->query($query);
  if (!$result) die($conn->error);
$rows = $result->num_rows;
echo '<form action="deleteReservation.php" method="post">';
echo '<table class="table table-striped table-bordered table-hover"> <thead> <tr> <th class="center">';
echo 'ID </th>  <th class="center"> Check In Date</th><th class="center"> Check Out Date </th><th class="center">Room Number</th><th class="center">Select   <input type="checkbox" name="all" value="all" onclick="check_all()"></th></tr></thead> <tbody>';
for ($j = 0 ; $j < $rows ; ++$j)
  { echo '<tr>';
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    echo '<td class="center">'   . $row['id']   . '</td>';
    echo '<td class="center">'    . $row['date_in']    . '</td>';
    echo '<td class="center">'    .$row['date_out'].'</td>';	
    echo '<td class="center">'    . $row['room_num']  . '</td>';		
	echo '<td class="center"><input type="checkbox" name="records[]" class="table_check" value="'.$row['id'].'"> </td>';
    echo '</tr>';
  }
 echo '</div> </tbody> </table> <input type="submit" value="DELETE RECORD"></form>'; 
$result ->close();
$conn->close();
?>
