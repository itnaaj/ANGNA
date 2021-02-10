<?php
include '../database/connection.php';
$feedID=$_GET['feedid'];
$feedUserID=$_GET['angnauid'];

$sql="SELECT * FROM feeds WHERE feed_id='$feedID' && feed_uploader_id='$feedUserID'";
$sqlq=mysqli_query($conn,$sql);
if(mysqli_num_rows($sqlq)>0){
	$del="DELETE FROM `feeds` WHERE `feed_id`='$feedID' AND `feed_uploader_id`='$feedUserID'";
	if($delq=mysqli_query($conn,$del)){
		echo "T";
	}
}


?>