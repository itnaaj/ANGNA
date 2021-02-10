<?php
include '../database/connection.php';
  $filename = $_POST['filename']."_".rand().".jpg";
  $user=$filename;
  $dpc=$_POST['dpc'];
  $currDP=$_POST['currDP'];
  $delCurrDP="../assets/img/userdp/".$currDP;

  if($dpc=="Y"){
  	if(unlink($delCurrDP)){
  		if(move_uploaded_file($_FILES["ProfilePic"]["tmp_name"],"../assets/img/userdp/$filename")){
  				$updatesql="UPDATE user SET dp_c='Y',user_dp='$filename' WHERE user_id='$user'";
  									if(mysqli_query($conn,$updatesql)){
									echo '1';
  										}
  		}

  	}
  }

  else{
		if(move_uploaded_file($_FILES["ProfilePic"]["tmp_name"],"../assets/img/userdp/$filename")){
  				$updatesql="UPDATE user SET dp_c='Y',user_dp='$filename' WHERE user_id='$user'";
  									if(mysqli_query($conn,$updatesql)){
										echo '1';
  									}
  		}

  }

  
 ?>
