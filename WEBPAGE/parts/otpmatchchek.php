<?php
include '../database/connection.php';
$email=$_GET['email'];
$entotp=$_GET['entotp'];

$cheksql="SELECT * FROM forgetpass WHERE pass_email='$email' AND pass_otp='$entotp'";
$chekq=mysqli_query($conn,$cheksql);

if(mysqli_num_rows($chekq)>0){
	echo "MAT";
}

else{
	echo "MISMAT";
}


?>