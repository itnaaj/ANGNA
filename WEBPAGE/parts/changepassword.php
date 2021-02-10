<?php
include '../database/connection.php';
$email=$_GET['email'];
$pass=$_GET['pass'];
$cpass=$_GET['cpass'];

if($pass==""){
	echo "EP";
}//empty if

else if(strlen($pass)<6){
	echo "LTS";
}
else if($pass!=$cpass){
	echo "PCMM";
}
else{
	
	$cheksql="UPDATE user SET password='$pass' WHERE email='$email'";
if($chekq=mysqli_query($conn,$cheksql)){
	
	$delsql="DELETE FROM forgetpass WHERE pass_email='$email'";
	if($delq=mysqli_query($conn,$delsql)){
		echo "OK";

	}
}


}//not empty else



?>