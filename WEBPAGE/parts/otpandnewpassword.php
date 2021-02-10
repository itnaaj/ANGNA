<?php
include '../database/connection.php';
$email=$_GET['email'];
if($email==""){
	echo "EM";
}//empty if
else{
	
	$cheksql="SELECT email FROM user WHERE email='$email'";
$chekq=mysqli_query($conn,$cheksql);
if(mysqli_num_rows($chekq)>0){
$otp=mt_rand(100000, 999999);
$otpsql="INSERT INTO forgetpass(pass_email, pass_otp, pass_status) VALUES('$email','$otp','PENDING')";
if($otpq=mysqli_query($conn,$otpsql)){

 
echo $otp;
}	
}//found if
else{
	echo "NF";
}//not found else
}//not empty else



?>

