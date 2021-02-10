<?php
include '../database/connection.php';
$email=$_GET['email'];


	
	$cheksql="UPDATE user SET otp='',verify='Y' WHERE email='$email'";
if($chekq=mysqli_query($conn,$cheksql)){
	echo "OK";
	}



?>