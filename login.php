<?php

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "AirPollution";

$con = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
mysql_select_db($mysql_database, $con) or die("Oops some thing went wrong");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{

$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 


$sql="SELECT * FROM companies WHERE Name='$myusername' and Password='$mypassword'";
$result=mysql_query($sql, $con);
if( !$result)
 echo "Error!! ";
$count=mysql_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
session_register("myusername");
$_SESSION["user"]=$myusername;

header("location: index.html");
}
else 
{
echo "<script> alert ('Invalid Name/Password') </script>";

}
}

?>

<!DOCTYPE html>

<html>
<head>
<title>Login</title>
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
      <div class="logo"><h1><a href="index.html">Air Pollution Management</a></h1></div>
      <div class="menu_nav">
        <ul>
          <li><a href="index.html"><span>Home</span></a></li>
          <li class="active"><a href="login.php"><span>Login</span></a></li>
          <li><a href="records.php"><span>View Records</span></a></li>
		  <li><a href="add.php"><span>Add record</span></a></li>
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
<tr><td>Username:</td><td><input type="text" name="username"></td></tr>
<tr><td>Password:</td><td><input type="password" name="password"></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" value="Submit"></td></tr><br>

<tr><td colspan=2>If you do not have an account, Click <a href="sign-up.html">here</a>!</td></tr>
</table>
</form>
</div></div></div>
      
  </div>
  </div>
  </div>
</div>
</body>
</html>
