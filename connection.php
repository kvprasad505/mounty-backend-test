<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "mounty";
$con = mysqli_connect($servername, $username, $password, $dbname);
if($con)
{
	
	//echo "connection success";
}
else
{
	//echo "not connected";
}
?>