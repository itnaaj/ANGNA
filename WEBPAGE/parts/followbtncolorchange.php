<?php

include '../database/connection.php';
 $Bid=$_GET['benifited_id'];
 $AngnaUserId=$_GET['angnauid'];



$cheksql="SELECT * FROM follow WHERE benifited_id='$Bid' AND follower_id='$AngnaUserId'";
$chekq=mysqli_query($conn,$cheksql);


if(mysqli_num_rows($chekq)>0){

				echo "Y";
  

}



else{

				echo "N";

}


?>