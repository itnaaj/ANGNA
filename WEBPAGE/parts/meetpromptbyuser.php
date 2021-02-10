<?php
include '../database/connection.php';
$User=$_GET['user_id'];
$Pr=$_GET['prompt'];

$Sql="UPDATE user SET meet_prompt='$Pr' WHERE user_id='$User'";
if(mysqli_query($conn,$Sql)){
	echo '<center>
               <h3 class="text-danger"><strong>Thanks for your response</strong></h3>
                <h6> It will be pleasure if you will join.</h6></center>';
}


?>