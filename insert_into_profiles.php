
<?php

$password = $_REQUEST['pwd'];
$username = $_REQUEST['uname'];
require('login1.php'); 
$conn = new mysqli($hn,$un,$pw,$db);
  if ($conn->connect_error) die($conn->connect_error);


if($username!=""&&$password!=""){
	$sql    = "SELECT MAX(id) as id FROM `project_user`";
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
$email = $_REQUEST['email'];
$password = $_REQUEST['pwd'];
$username = $_REQUEST['uname'];
//connecting to database to check whether the login combo (username and password ) exists or not.

require('login1.php'); 
$conn = new mysqli($hn,$un,$pw,$db);
  if ($conn->connect_error) die($conn->connect_error);

if($username!="" && $password!="" && $email!=""){
	$un_temp = mysql_real_escape_string( $username);
    $pw_temp = mysql_real_escape_string( $password);
    $em_temp = mysql_real_escape_string($email);	
	$salt1 = "qm&h*";
	$salt2 = "pg!@";
    $token_un = hash('ripemd128', "$salt1$un_temp$salt2");
	$token_pw = md5($password);
    $token_em = hash('ripemd128', "$salt1$em_temp$salt2");	

	$stmt = $conn->prepare("INSERT INTO project_user (id, uname,email,psw) VALUES (?,?,?,?)");
	$stmt->bind_param("ssss",$id,$username,$email, $token_pw);
	$stmt->execute();

	echo "Account created";
echo "<script>setTimeout(\"location.href = 'login.php';\",1500);</script>";
		$stmt->close();
}
	$conn->close();


?>