<!DOCTYPE html>

<html>
<head>
<title>View Records</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/georgia.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<!-- CuFon ends -->
<style>
.t1 {
	margin-left:200px;padding:0px;
	width:80%;
	box-shadow: 10px 10px 5px #888888;
	border:1px solid #3f7f00;
	
	-moz-border-radius-bottomleft:4px;
	-webkit-border-bottom-left-radius:4px;
	border-bottom-left-radius:4px;
	
	-moz-border-radius-bottomright:4px;
	-webkit-border-bottom-right-radius:4px;
	border-bottom-right-radius:4px;
	
	-moz-border-radius-topright:4px;
	-webkit-border-top-right-radius:4px;
	border-top-right-radius:4px;
	
	-moz-border-radius-topleft:4px;
	-webkit-border-top-left-radius:4px;
	border-top-left-radius:4px;
}.t1 table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.t1 tr:last-child td:last-child {
	-moz-border-radius-bottomright:4px;
	-webkit-border-bottom-right-radius:4px;
	border-bottom-right-radius:4px;
}
.t1 table tr:first-child td:first-child {
	-moz-border-radius-topleft:4px;
	-webkit-border-top-left-radius:4px;
	border-top-left-radius:4px;
}
.t1 table tr:first-child td:last-child {
	-moz-border-radius-topright:4px;
	-webkit-border-top-right-radius:4px;
	border-top-right-radius:4px;
}.t1 tr:last-child td:first-child{
	-moz-border-radius-bottomleft:4px;
	-webkit-border-bottom-left-radius:4px;
	border-bottom-left-radius:4px;
}.t1 tr:hover td{
	
}
.t1 tr:nth-child(odd){ background-color:#d4ffaa; }
.t1 tr:nth-child(even)    { background-color:#ffffff; }.t1 td{
	vertical-align:middle;
	
	
	border:1px solid #3f7f00;
	border-width:0px 1px 1px 0px;
	text-align:center;
	padding:9px;
	font-size:13px;
	font-family:Times New Roman;
	font-weight:normal;
	color:#000000;
}.t1 tr:last-child td{
	border-width:0px 1px 0px 0px;
}.t1 tr td:last-child{
	border-width:0px 0px 1px 0px;
}.t1 tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.t1 tr:first-child td{
		background:-o-linear-gradient(bottom, #5fbf00 5%, #3f7f00 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5fbf00), color-stop(1, #3f7f00) );
	background:-moz-linear-gradient( center top, #5fbf00 5%, #3f7f00 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5fbf00", endColorstr="#3f7f00");	background: -o-linear-gradient(top,#5fbf00,3f7f00);

	background-color:#5fbf00;
	border:0px solid #3f7f00;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:18px;
	font-family:Times New Roman;
	font-weight:bold;
	color:#ffffff;
}
.t1 tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #5fbf00 5%, #3f7f00 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5fbf00), color-stop(1, #3f7f00) );
	background:-moz-linear-gradient( center top, #5fbf00 5%, #3f7f00 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5fbf00", endColorstr="#3f7f00");	background: -o-linear-gradient(top,#5fbf00,3f7f00);

	background-color:#5fbf00;
}
.t1 tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.t1 tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}

</style>
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
          <li class="active"><a href="records.php"><span>View Records</span></a></li>
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

$result = mysql_query("SELECT * FROM pollutants where CID=$id");

if(!$result)
  echo("Error!");
  
 echo "<div class='content'>";
 echo "<table class='t1'>";
 echo "<tr>";
  echo "<td>Date</td>";
  echo "<td>Ozone</td>";
  echo "<td>Nitrogen Dioxide</td>";
  echo "<td>Particulate Matter</td>";
  echo "</tr>";
  
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>". $row['Date'] ."</td>";
  echo "<td>". $row['O3'] ."</td>";
  echo "<td>". $row['NO2'] ."</td>";
  echo "<td>". $row['PM'] ."</td>";
  echo "</tr>";
  }
  echo "</table>";
  
  $t= mysql_query("select * from companies where Name='$username'");

if(!$t)
  echo("Error!");
  
$x=mysql_fetch_array($t);
$aqi=$x['AQI'];
$aqhi=$x['AQHI'];
	echo "<br><br><center> Current AQI: $aqi<center><br>";
  echo "<br><br><center> Current AQHI: $aqhi<center>";
  echo "</div>";
 ?>