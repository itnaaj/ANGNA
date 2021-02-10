<?php
$servername = "YOUR SERVERNAME";
$username = "DATABSE USERNAME";
$password = "DATABASE PASSWORD";
$dbname="DATABASE NAME";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
	echo "Server down";
}

?>