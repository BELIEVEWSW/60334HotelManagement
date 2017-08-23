<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

  require_once 'login1.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) 
      die($conn->connect_error);
$query  = "SELECT * FROM room";
  $result = $conn->query($query);
  if (!$result) die($conn->error);
$rows = $result->num_rows;
echo '<form action="updateRoomPrice.php" method="post">';
echo '<table class="table table-striped table-bordered table-hover"> <thead> <tr> <th class="center">';
echo 'Room Number </th>  <th class="center"> Room Type</th><th class="center"> Price </th><th class="center">Pet Available</th><th class="center">Smoke Available</th><th class="center">Update  <input type="checkbox" name="all" value="all" onclick="check_all()"></th></tr></thead> <tbody>';
for ($j = 0 ; $j < $rows ; ++$j)
  { echo '<tr>';
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
		if($row['pet'] == 1){
		$pet = 'Yes';
	}else{
		$pet = 'No';
	}
	if($row['smoke'] == 1){
		$smoke = 'Yes';
	}else{
		$smoke = 'No';
	}
    echo '<td class="center">'   . $row['room_number']   . '</td>';
    echo '<td class="center">'    . $row['room_type']    . '</td>';
    echo '<td class="center"><input type="text" value=" '    . $row['price']    . '"name="price[]" class = "table_price" id="'.$row['room_number'].' "  disabled = "true"></td>';	
    echo '<td class="center">'    . $pet . '</td>';		
    echo '<td class="center">'    . $smoke    . '</td>';	
	echo '<td class="center"><input type="checkbox" name="rooms[]" class="table_check" value="'.$row['room_number'].' " onchange="updatePricevalue(value,this)"> </td>';
	
    echo '</tr>';
  }
 echo '</div> </tbody> </table> <input type="submit" value="UPDATE RECORD"></form>'; 

  $result->close();
  $conn->close();
?>
