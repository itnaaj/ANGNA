<?php
include '../database/connection.php';
$Bid=$_GET['benifited_id'];

$read="UPDATE notification SET not_read='T' WHERE not_for_id='$Bid'";
if(mysqli_query($conn,$read)){
echo "T";
}



?>