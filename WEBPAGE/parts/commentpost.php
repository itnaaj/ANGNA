<?php
include '../database/connection.php';
$FeedId=$_GET['feedid'];
$AngnaUserId=$_GET['angnauid'];
$Com=$_GET['com'];
 $Name=$_GET['name'];

$ComCountPrint="";
 $mydate=getdate(date("U")); 
  $ComDate="$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
  $ComTime=date("h:i A");


  $feedUploader="SELECT * FROM feeds WHERE feed_id='$FeedId'";
$feedUploaderq=mysqli_query($conn,$feedUploader);
$Bid=mysqli_fetch_assoc($feedUploaderq);
$BidUID=$Bid['feed_uploader_id'];



  $sql="INSERT INTO comment (com_feed_id,com_user_id,com_data,com_date,com_time) VALUES('$FeedId','$AngnaUserId','$Com','$ComDate','$ComTime')";
  if($sqlq=mysqli_query($conn,$sql)){
 
if($AngnaUserId!=$BidUID){
                
      $NotData=  '<a href="profile.php?user_id='.$AngnaUserId.'"><b>'.$Name.'</b></a> Commented Your <b><a href="feeds.php#angnafeedid'.$FeedId.'">Post</a></b></b><br><small>at <i> '.$ComTime.' </i> on <i>'.$ComDate."</i>.</small>";
      $NotificationSql="INSERT INTO notification(not_for_id,notification,not_gby_id,not_type,not_like_feedid) VALUES('$BidUID','$NotData','$AngnaUserId','COMMENT','$FeedId')";
      mysqli_query($conn,$NotificationSql);
              }




$comcountsql="SELECT * FROM comment WHERE com_feed_id='$FeedId'";
if($comcountq=mysqli_query($conn,$comcountsql)){
  $ComCount=mysqli_num_rows($comcountq);
    if($ComCount==0){
      $ComCountPrint="";
    }
    else{
      $ComCountPrint="(".$ComCount.")";

    }
}




  }
echo $ComCountPrint;



?>