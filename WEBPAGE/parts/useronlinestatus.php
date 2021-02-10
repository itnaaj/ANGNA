<?php
session_start();
include '../database/connection.php';
$AngnaUid=$_GET['angnauid'];
$Status=time()+10;
$Update="UPDATE user SET user_online_status=$Status WHERE user_id='$AngnaUid'";
if($Updateq=mysqli_query($conn,$Update)){
}
?>