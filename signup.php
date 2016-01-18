<?php
	session_start();
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "AirPollution";

$con = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
mysql_select_db($mysql_database, $con) or die("Oops some thing went wrong");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$myusername=$_POST['username']; 
	$mypassword=$_POST['password']; 
	$myemail=$_POST['email'];
	$myaddress=$_POST['address'];
	$sql="INSERT INTO companies(Name, Password, Email, Address) VALUES('$myusername', '$mypassword','$myemail', '$myaddress')";	
	$result=mysql_query($sql,$con);
	if( !$result)
              echo "Error!! ";
	$_SESSION["user"]=$myusername;
	echo "<script language='Javascript'>document.location.href='index.html' ;</script>";
}

	
?>