<?php
include "conn.php";
?>
<?php

	
$email=$_POST['email'];
$password=$_POST['password'];
$sql = mysql_query("SELECT * FROM users WHERE email = '$email' and password = '$password'") or die(mysql_error());
$row = mysql_num_rows($sql);
if($row > 0) {
	session_start();
	$_SESSION['email']=$_POST['email'];
	$_SESSION['password']=$_POST['password'];
	echo "<center></center>";
	echo "<script> loginsuccessfully()</script>";
	header("Location:home.php");
}else {
	
	echo "<center>Usuario ou senha incorretos</center>";
	echo "<script>loginfailed()</script>";
	
}
?>

