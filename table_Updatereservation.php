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
echo '<form action="updateReservationinfo.php" method="post" onsubmit="validate_room">';
echo '<table id="recordsTable" class="table table-striped table-bordered table-hover"> <thead> <tr> <th class="center">';
echo 'ID </th>  <th class="center"> Check In Date</th><th class="center"> Check Out Date </th><th class="center">Room Number</th><th class="center">Select   </th></tr></thead> <tbody>';
for ($j = 0 ; $j < $rows ; ++$j)
  { echo '<tr>';
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    echo '<td class="center">'   . $row['id']   . '</td>';
    echo '<td class="center"> <input type="text"   value ="' .$row['date_in'].'" class = "inDate" id="textareaIn'.$row['id'].'"  disabled = "true"</td>';
    echo '<td class="center"><input type="text"   value ="' .$row['date_out'].'" class = "outDate" id="textareaOut'.$row['id'].'"  disabled = "true"</td>';	
    echo '<td class="center">'    . $row['room_num']  . '</td>';		
	echo '<td class="center"><input type="checkbox" name="records[]" class="table_check" value="'.$row['id'].'"onchange="updateOutdatevalue(value,this)"> </td>';
    echo '</tr>';
  }
 echo '</div> </tbody> </table><input type="hidden" name="roomNumHidden" id="roomNumHidden" value =""><input type="hidden" name="dateInHidden" id="dateInHidden" value =""> <input type="hidden" name="dateOutHidden" id="dateOutHidden" value =""><input type="hidden" name="idUpdateHidden" id="idUpdateHidden" value =""><input type="submit" value="Update Record"></form>'; 
$result ->close();
$conn->close();
?>
