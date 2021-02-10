<?php
include '../database/connection.php';

$CommFeedId=$_GET['feedid'];
$sql="SELECT * FROM comment WHERE com_feed_id='$CommFeedId'";
$sqlq=mysqli_query($conn,$sql);
if(mysqli_num_rows($sqlq)<1){
echo '<h6>Nothing to load</h6>';
}

else{
	while($Com=mysqli_fetch_assoc($sqlq)){

$ComUserIdtemp=$Com['com_user_id'];
$commentorsql="SELECT * FROM user WHERE user_id='$ComUserIdtemp'";
$commentorq=mysqli_query($conn,$commentorsql);
$ComUserId=mysqli_fetch_assoc($commentorq);
$Dp=$ComUserId['user_dp'];

		 if($Dp==""){
            if($ComUserId['gender']=="Male"){
              $ComUserDp="assets/img/function/maledefaultdp.png";
            }
            if($ComUserId['gender']=="Female"){
                 $ComUserDp="assets/img/function/femaledefaultdp.png";
            }
    }
    else if($ComUserId['google_id']==""){
$ComUserDp="assets/img/userdp/".$Dp;
    }

    else if(!empty($ComUserId['google_id']) && !empty($ComUserId['user_id'])){

if($ComUserId['dp_c']=="Y"){
  $ComUserDp="assets/img/userdp/".$Dp;
}
else{
  $ComUserDp=$Dp;
}

}

    else{
      $ComUserDp=$Dp;
    }




		echo '
 <div class="card gedf-card commentbox">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" height="45" src="'.$ComUserDp.'" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0">'.$ComUserId['name'].'</div>
                                    <div class="h7"><strong>'.$Com['com_data'].'</strong></div>
                                </div>
                            </div>
                            <div>
                                <!--div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                        <div class="h6 dropdown-header">Option</div>
                                        <a class="dropdown-item" href=""><i class="fa fa-reply"></i>   Reply</a>
                                        <a class="dropdown-item" href=""><i class="fa fa-trash"></i>   Delete</a>

                                    </div>
                                </div-->
                            </div>
                        </div>
                    </div>
                  </div>';
	}


}


echo '<input type="hidden" value="'.$CommFeedId.'" id="commentfeedid">';
?>






                 



                                 
                   
                                   