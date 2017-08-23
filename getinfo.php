<?php
//receiving email and password from the form
$email = $_REQUEST['email'];
$password = $_REQUEST['pwd'];
$username = $_REQUEST['uname'];
//connecting to database to check whether the login combo (username and password ) exists or not.



if($email!=''&&$password!=''){
	require('login1.php'); 
	$conn = new mysqli($hn,$un,$pw,$db);
	if ($conn->connect_error) die($conn->connect_error);

	$un_temp = mysql_real_escape_string( $username);
    $pw_temp = mysql_real_escape_string( $password);
    $em_temp = mysql_real_escape_string($email);	
	$salt1 = "qm&h*";
	$salt2 = "pg!@";
    $token_un = hash('ripemd128', "$salt1$un_temp$salt2");
	$token_pw = md5($password);
    $token_em = hash('ripemd128', "$salt1$em_temp$salt2");	

	$stmt = $conn->prepare("SELECT email FROM `project_user` WHERE email = ? and psw =?");
	// $stmt1 = $conn->prepare("SELECT email FROM `employee` WHERE email = ? and password =?");
	$stmt->bind_param("ss", $email,$token_pw);
	$stmt->execute();
	$rows = $stmt->fetch();

	$hint = "username and password do not match our records or do not exists";
	if ($rows >0){
		$hint = "ok";
		session_destroy(); 
		session_start();
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "user";
	}else{
			$stmt1 = $conn->prepare("SELECT email FROM `employee` WHERE email = ? and password =?");
			$stmt1->bind_param("ss", $email,$token_pw);
			$stmt1->execute();
			$rows2 = $stmt1->fetch();
				if ($rows2 >0){
					$hint = "ok";
					session_destroy(); 
					session_start();
					$_SESSION['email'] = $email;
					$_SESSION['role'] = "employee";
				}
					$stmt1->close();
	}
	echo $hint ;
	$stmt->close();
$conn->close();
}
?>