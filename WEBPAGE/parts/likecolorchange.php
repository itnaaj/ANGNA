<?php

include '../database/connection.php';
 $FeedId=$_GET['feedid'];
 $AngnaUserId=$_GET['angnauid'];



$cheksql="SELECT * FROM feedlikes WHERE like_feed_id='$FeedId' AND like_user_id='$AngnaUserId'";
$chekq=mysqli_query($conn,$cheksql);


if(mysqli_num_rows($chekq)>0){

				echo "Y";
  

}



else{

				echo "N";

}







?>