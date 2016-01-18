<!DOCTYPE html>

<html>
<head>
<title>Add Record</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/georgia.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<!-- CuFon ends -->
</head>
<body>
<div class="main">

  <div class="header">
    <div class="header_resize">
      <div class="logo"><h1><a href="index.html">Air Pollution Management System</a></h1></div>
      <div class="menu_nav">
        <ul>
          <li><a href="index.html"><span>Home</span></a></li>
          <li><a href="login.php"><span>Login</span></a></li>
          <li><a href="records.php"><span>View Records</span></a></li>
		  <li class="active"><a href="add.php"><span>Add record</span></a></li>
		  <li><a href="calculate.php"><span>Calculate index</span></a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>

  <div class="content">
  <div class="content_resize">
      <div class="mainbar"><div class="submb">
    <div style="text-align: center;">
	<div style="box-sizing: border-box; display: inline-block; width: auto; max-width: 480px; background-color: #FFFFFF; border: 2px solid #D4D4D4; border-radius: 5px; box-shadow: 0px 0px 8px #D4D4D4; margin: 50px auto auto;">
	<div style="background: #D4D4D4; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold; background-color:#ffaaaa"></span></div>
	<div style="background: ; padding: 15px">
	<style type="text/css" scoped>
	td { text-align:left; font-family: verdana,arial; color: #000000; font-size: 1.00em; }
	input { border: 1px solid #CCCCCC; border-radius: 5px; color: #666666; display: inline-block; font-size: 1.00em;  padding: 5px; width: 100%; }
	input[type="button"], input[type="reset"], input[type="submit"] { height: auto; width: auto; cursor: pointer; box-shadow: 0px 0px 5px #D4D4D4; float: right; margin-top: 10px; }
	table.center { margin-left:auto; margin-right:auto; }
	</style>
<form method="post" action="" name="aform" target="_top">
<table class='center'>
<tr><td>Date:</td><td><input type="date" name="d"></td></tr>
<tr><td>Ozone:</td><td><input type="number" step="0.01" name="o"></td></tr>
<tr><td>Nitrogen Dioxide:</td><td><input type="number" step="0.01" name="n"></td></tr>
<tr><td>Particulate Matter:</td><td><input type="number" step="0.01" name="pm"></td></tr><br>
<tr><td>&nbsp;</td><td><input type="submit" value="Submit"></td></tr><br>
</table>
</form>
</div></div></div>
      
  </div>
</div>
</div> </div>
</body>
</html>

<?php
	session_start();
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "AirPollution";

$con = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
mysql_select_db($mysql_database, $con) or die("Oops some thing went wrong");

$username = $_SESSION["user"];

$t= mysql_query("select * from companies where Name='$username'");

if(!$t)
  echo("Error!");
  
$x=mysql_fetch_array($t);
$id=$x['ID'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$date=$_POST['d'];
	$ozone=$_POST['o']; 
	$no2=$_POST['n']; 
	$pm=$_POST['pm'];
	
	$sql="INSERT INTO Pollutants( Date, CId, O3, NO2, PM) VALUES('$date', '$id', '$ozone','$no2', '$pm')";	
	$result=mysql_query($sql,$con);
	if( !$result)
              echo "Error!! ";
	echo "<script language='Javascript'>
	alert('Record added!');
	document.location.href='index.html' ;</script>";
}
?>

