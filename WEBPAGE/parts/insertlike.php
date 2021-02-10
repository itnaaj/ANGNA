<?php

date_default_timezone_set("Asia/Kolkata");

include '../database/connection.php';
 $FeedId=$_GET['feedid'];
 $AngnaUserId=$_GET['angnauid'];
 $Name=$_GET['name'];

 $mydate=getdate(date("U")); 
  $NewDate="$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
  $NewTime=date("h:i A");

$feedUploader="SELECT * FROM feeds WHERE feed_id='$FeedId'";
$feedUploaderq=mysqli_query($conn,$feedUploader);
$Bid=mysqli_fetch_assoc($feedUploaderq);
$BidUID=$Bid['feed_uploader_id'];


$countsql="SELECT * FROM feedlikes WHERE like_feed_id='$FeedId'";

$cheksql="SELECT * FROM feedlikes WHERE like_feed_id='$FeedId' AND like_user_id='$AngnaUserId'";
$chekq=mysqli_query($conn,$cheksql);


if(!mysqli_num_rows($chekq)>0){
$sql="INSERT INTO feedlikes(like_feed_id,like_user_id) VALUES('$FeedId','$AngnaUserId')";
  if($sqlq=mysqli_query($conn,$sql)){

  						if($AngnaUserId!=$BidUID){
  							
  		$NotData=  '<a href="profile.php?user_id='.$AngnaUserId.'"><b>'.$Name.'</b></a> Liked Your <b><a href="feeds.php#angnafeedid'.$FeedId.'">Post</a></b></b><br><small>at <i> '.$NewTime.' </i> on <i>'.$NewDate."</i>.</small>";
  		$NotificationSql="INSERT INTO notification(not_for_id,notification,not_gby_id,not_type,not_like_feedid) VALUES('$BidUID','$NotData','$AngnaUserId','LIKE','$FeedId')";
  		mysqli_query($conn,$NotificationSql);
  						}



  				
				$countinsq=mysqli_query($conn,$countsql);
				$total= mysqli_num_rows($countinsq);
  }


}



else{

$sqldel="DELETE FROM feedlikes WHERE like_feed_id='$FeedId' AND like_user_id='$AngnaUserId'";
  if($sqldelq=mysqli_query($conn,$sqldel)){

  	$NotificationSql="DELETE FROM notification WHERE not_for_id='$BidUID' AND not_gby_id='$AngnaUserId' AND not_like_feedid='$FeedId' AND not_type='LIKE'";
  	mysqli_query($conn,$NotificationSql);

				$countdelq=mysqli_query($conn,$countsql);
				$total= mysqli_num_rows($countdelq);

}
}






if($total>0){
echo $total="(".$total.")";
}
else{
	echo $total="";
}

?>