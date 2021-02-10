
<?php
include '../database/connection.php';
$email=$_GET['email'];
if($email==""){
	echo "EM";
}//empty if
else{
	
$otp=mt_rand(100000, 999999);
$otpsql="UPDATE user SET otp='$otp' WHERE email='$email'";
if($otpq=mysqli_query($conn,$otpsql)){
echo $otp;
}	


}//not empty else



?>

