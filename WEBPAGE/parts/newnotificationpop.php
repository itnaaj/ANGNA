<?php
include '../database/connection.php';
$id=$_GET['user_id'];

$Countsql="SELECT * FROM notification WHERE not_for_id='$id' AND not_read='F'";
$Countsqlq=mysqli_query($conn,$Countsql);
echo mysqli_num_rows($Countsqlq);

?>