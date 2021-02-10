 <?php
 include 'database/connection.php';
 $ProfileID=$_GET["user_id"];
$FeedsFetch="SELECT * FROM feeds WHERE feed_uploader_id='$ProfileID' ORDER BY feed_id DESC";
$FeedsFetchQuery=mysqli_query($conn,$FeedsFetch);
while($Feed=mysqli_fetch_Assoc($FeedsFetchQuery)){
  $FeedFetchedImg=$Feed['feed_image'];

  $FeedUploaderId=$Feed['feed_uploader_id'];
  $UserFetch="SELECT * FROM user WHERE user_id='$FeedUploaderId'";
  $UserFetchquery=mysqli_query($conn,$UserFetch);
  $FeedUploader=mysqli_fetch_Assoc($UserFetchquery);
if($FeedUploader['user_dp']==""){
      if($FeedUploader['gender']=="Male"){
        $feedUploaderDp="assets/img/function/maledefaultdp.png";

      }
      if($FeedUploader['gender']=="Female"){
         $feedUploaderDp="assets/img/function/femaledefaultdp.png";
      }


}
else if($FeedUploader['google_id']==""){
 $feedUploaderDp="assets/img/userdp/".$FeedUploader['user_dp'];

}

else if(!empty($FeedUploader['google_id']) && !empty($FeedUploader['user_id'])){
 
    if($FeedUploader['dp_c']=="Y"){
 $feedUploaderDp="assets/img/userdp/".$FeedUploader['user_dp'];
}
else{
  $feedUploaderDp= $FeedUploader['user_dp'];
}

}

else{
   
}

  if($FeedFetchedImg==""){

    $ShareUrl="https://angna.cf/feeds.php#angnafeedid".$Feed['feed_id'];

            //comment count
$ComFeedIdCount=$Feed['feed_id'];
        $comcountsql="SELECT * FROM comment WHERE com_feed_id='$ComFeedIdCount'";
if($comcountq=mysqli_query($conn,$comcountsql)){
  $ComCount=mysqli_num_rows($comcountq);
    if($ComCount==0){
      $ComCountPrint="";
    }
    else{
      $ComCountPrint="(".$ComCount.")";

    }
}
//comment count


//like count start
$LikeFeedIdCount=$Feed['feed_id'];
$countsql="SELECT * FROM feedlikes WHERE like_feed_id='$LikeFeedIdCount'";
        $countq=mysqli_query($conn,$countsql);
        $total= mysqli_num_rows($countq);
        if($total>0){
$totallikes="(".$total.")";
}
else{
 $totallikes="";
}

if(!empty($_SESSION['Email'])){
    $logintolike='';

  $LikeFeedIdstatus=$Feed['feed_id'];
$statussql="SELECT * FROM feedlikes WHERE like_feed_id='$LikeFeedIdCount' AND like_user_id='$AngnaUid'";
        $statusq=mysqli_query($conn,$statussql);
        $status= mysqli_num_rows($statusq);
        if($status>0){
$finalstatus="primary";
}
else{
$finalstatus="secondary";
}

}
else{
  $finalstatus="secondary";

   
     $logintolike='data-toggle="modal" data-target="#myModalAlert"';
}



//like count close


    echo '  <!--- \\\\\\\Post-->
                <div class="card gedf-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                 <a href="profile.php?user_id='.$FeedUploader['user_id'].'">
                                 <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="'.$feedUploaderDp.'" alt="">
                                </div>
                                <div class="ml-2">
                                   <div class="h5 m-0">'.$FeedUploader['name'].'</div></a>
                                    <div class="h7 text-muted">'.$Feed['feed_upload_time']." ".$Feed['feed_upload_date'].'</div>
                                </div>
                            </div>
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                         <div class="h6 dropdown-header">Share to</div>
                                        <a class="dropdown-item" href="https://facebook.com/sharer?u='.$ShareUrl.'"><i class="fa fa-facebook"></i>   Facebook</a>
                                        <a class="dropdown-item" href="whatsapp://send?text='.$ShareUrl.'"><i class="fa fa-whatsapp"></i>   Whatsapp</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding:20px">
                       
                            <h5 class="card-title">'.$Feed['feed_topic'].'</h5>
                        

                        <p class="card-text">
                           '.$Feed['feed_data'].'
                        </p>
                    </div>
                       <div class="card-footer">
                        <button class=" btn btn-'.$finalstatus.'" type="button" onclick="insertlike('.$Feed['feed_id'].');" id="statuschangeid-'.$Feed['feed_id'].'" '.$logintolike.'><i class="fa fa-thumbs-up"></i> <span id="likebtnid-'.$Feed['feed_id'].'">'.$totallikes.'</span></button>

                        <button class=" btn btn-primary" type="button" onclick="loadComment('.$Feed['feed_id'].')" data-toggle="modal" data-target="#commentModal" ><i class="fa fa-comment" ></i>  <span id="comcount-'.$Feed['feed_id'].'">'.$ComCountPrint.'</span></button>    
                    </div>
                </div>
                <br>
                <!-- Post /////-->';



  }
  else{
        $ShareUrl="https://angna.cf/feeds.php#angnafeedid".$Feed['feed_id'];


        //comment count
$ComFeedIdCount=$Feed['feed_id'];
        $comcountsql="SELECT * FROM comment WHERE com_feed_id='$ComFeedIdCount'";
if($comcountq=mysqli_query($conn,$comcountsql)){
  $ComCount=mysqli_num_rows($comcountq);
    if($ComCount==0){
      $ComCountPrint="";
    }
    else{
      $ComCountPrint="(".$ComCount.")";

    }
}
//comment count


//like count start
$LikeFeedIdCount=$Feed['feed_id'];
$countsql="SELECT * FROM feedlikes WHERE like_feed_id='$LikeFeedIdCount'";
        $countq=mysqli_query($conn,$countsql);
        $total= mysqli_num_rows($countq);
        if($total>0){
$totallikes="(".$total.")";
}
else{
 $totallikes="";
}




if(!empty($_SESSION['Email'])){
    $logintolike='';

  $LikeFeedIdstatus=$Feed['feed_id'];
$statussql="SELECT * FROM feedlikes WHERE like_feed_id='$LikeFeedIdCount' AND like_user_id='$AngnaUid'";
        $statusq=mysqli_query($conn,$statussql);
        $status= mysqli_num_rows($statusq);
        if($status>0){
$finalstatus="primary";
}
else{
$finalstatus="secondary";
}

}
else{
  $finalstatus="secondary";

     $logintolike='data-toggle="modal" data-target="#myModalAlert"';
}




//like count close

         echo '  <!--- \\\\\\\Post-->
                <div class="card gedf-card" id="angnafeedid"'.$Feed['feed_id'].'>
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                 <a href="profile.php?user_id='.$FeedUploader['user_id'].'">
                                 <div class="mr-2">
                                    <img class="rounded-circle" width="45" height="45" src="'.$feedUploaderDp.'" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0">'.$FeedUploader['name'].'</div></a>
                                    <div class="h7 text-muted">'.$Feed['feed_upload_time']." ".$Feed['feed_upload_date'].'</div>
                                </div>
                            </div>
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-mail-forward"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                        <div class="h6 dropdown-header">Share to</div>
                                        <a class="dropdown-item" href="https://facebook.com/sharer?u='.$ShareUrl.'"><i class="fa fa-facebook"></i>   Facebook</a>
                                        <a class="dropdown-item" href="whatsapp://send?text='.$ShareUrl.'"><i class="fa fa-whatsapp"></i>   Whatsapp</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="card-body"  style="padding:20px">
                       <div class="row">
                         <div class="col-md-2"><center><img src="assets/img/feed/'.$FeedFetchedImg.'" height="120" width="120"></center></div>
                         <div class="col-md-10">
                           
                          
                            <h5 class="card-title">'.$Feed['feed_topic'].'</h5>
                        

                        <p class="card-text">
                           '.$Feed['feed_data'].'
                        </p>
                        </div>
                       </div>              
                    </div>
                      <div class="card-footer">
                        <button class=" btn btn-'.$finalstatus.'" type="button" onclick="insertlike('.$Feed['feed_id'].');" id="statuschangeid-'.$Feed['feed_id'].'" '.$logintolike.'><i class="fa fa-thumbs-up"></i> <span id="likebtnid-'.$Feed['feed_id'].'">'.$totallikes.'</span></button>

                        <button class=" btn btn-primary" type="button" onclick="loadComment('.$Feed['feed_id'].')" data-toggle="modal" data-target="#commentModal" ><i class="fa fa-comment" ></i>  <span id="comcount-'.$Feed['feed_id'].'">'.$ComCountPrint.'</span></button>    
                    </div>
                </div>
                <br>
                <!-- Post /////-->';


  }



}


 ?>

   <script type="text/javascript">
function loadComment(n){
   var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("myCommentData").innerHTML=this.responseText;

document.getElementById("postingresult").innerHTML="Posted Successfully";
      setTimeout(function(){document.getElementById("postingstatus").style.display="none"; }, 1000);
        
    }
  };
  var feedid=n;
  xhttp.open("GET", "parts/commentfetch.php?feedid="+feedid, true);
  xhttp.send();
}


</script>




<script type="text/javascript">
function insertlike(n){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      colorchange(n);
      var counteraID="likebtnid-"+n;
      document.getElementById(counteraID).innerHTML=this.responseText;
    }
  };

  var feedid=n;
  var comurl="feedid="+feedid+"&&angnauid=<?php echo $AngnaUid;?>&&com=";
  xhttp.open("GET", "parts/insertlike.php?"+comurl, true);
  xhttp.send();
}


function colorchange(n){
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

       var statuscID="statuschangeid-"+n;
      if(this.responseText=="Y"){
 document.getElementById(statuscID).style.background='#007AFF';
      }
        if(this.responseText=="N"){
 document.getElementById(statuscID).style.background='#6C757E';
      }
     
     
   
    }
  };
  var feedid=n;
  var comurl="feedid="+feedid+"&&angnauid=<?php echo $AngnaUid;?>&&com=";
  xhttp.open("GET", "parts/likecolorchange.php?"+comurl, true);
  xhttp.send();


}




</script>


  

    </div>
  </div>
</div>
