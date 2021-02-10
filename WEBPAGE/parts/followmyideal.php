<?php

include '../database/connection.php';
 $Bid=$_GET['benifited_id'];
 $AngnaUserId=$_GET['angnauid'];
 $Name=$_GET['name'];
date_default_timezone_set("Asia/Kolkata");
$mydate=getdate(date("U")); 
  $NewDate="$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
  $NewTime=date("h:i A");


$countsql="SELECT * FROM follow WHERE benifited_id='$Bid'";

$cheksql="SELECT * FROM follow WHERE benifited_id='$Bid' AND follower_id='$AngnaUserId'";
$chekq=mysqli_query($conn,$cheksql);


if(!mysqli_num_rows($chekq)>0){



$sql="INSERT INTO follow(benifited_id,follower_id) VALUES('$Bid','$AngnaUserId')";
  if($sqlq=mysqli_query($conn,$sql)){


    $FetchFollowForSMS="SELECT * FROM follow WHERE (follower_id='$AngnaUserId' AND benifited_id='$Bid') OR (benifited_id='$AngnaUserId' AND follower_id='$Bid')";
    if($FetchFollowForSMSq=mysqli_query($conn,$FetchFollowForSMS)){
      if(mysqli_num_rows($FetchFollowForSMSq)==2){

        $sms="You are now friends send hello";

        $UpdateOldSMS="UPDATE chat SET message='$sms' WHERE sender_id='$Bid' AND reciver_id='$AngnaUserId' AND fsms='Y'";
        mysqli_query($conn,$UpdateOldSMS);

        $sendfsmssql="INSERT INTO chat (sender_id,reciver_id,message,fsms) VALUES('$AngnaUserId','$Bid','$sms','Y')";
mysqli_query($conn,$sendfsmssql);
      }

          else{
        $sms="waiting for follow back";
$sendfsmssql="INSERT INTO chat (sender_id,reciver_id,message,fsms) VALUES('$AngnaUserId','$Bid','$sms','Y')";
mysqli_query($conn,$sendfsmssql);

    }


    }



  		$NotData=  '<a href="profile.php?user_id='.$AngnaUserId.'">'.$Name.'</a> started following you</b><br><small><i>'.$NewTime.','.$NewDate.".</small</i>";
  		$NotificationSql="INSERT INTO notification(not_for_id,notification,not_gby_id,not_type) VALUES('$Bid','$NotData','$AngnaUserId','FOLLOW')";
  		mysqli_query($conn,$NotificationSql);
				$countinsq=mysqli_query($conn,$countsql);
				$total= mysqli_num_rows($countinsq);
				$Status="FOLLOWED";
  }

}



else{

$sqldel="DELETE FROM follow WHERE benifited_id='$Bid' AND follower_id='$AngnaUserId'";
  if($sqldelq=mysqli_query($conn,$sqldel)){
  				$NotificationSql="DELETE FROM notification WHERE not_for_id='$Bid' AND not_gby_id='$AngnaUserId' AND not_type='FOLLOW'";
  		mysqli_query($conn,$NotificationSql);

				$countdelq=mysqli_query($conn,$countsql);
				$total= mysqli_num_rows($countdelq);
				$Status="UNFOLLOWED";

}
}





$insertToUser="UPDATE user SET follower='$total' WHERE user_id='$Bid'";
mysqli_query($conn,$insertToUser);
if($total>0){
echo $total=$total;
}
else{
	echo $total="0";
}

?>