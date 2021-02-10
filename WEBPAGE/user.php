
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ANGNA Users</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons icon-->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Angna Main CSS File -->
  <link rel="stylesheet" type="text/css" href="assets/css/newcss.css">
  <link href="assets/css/style.css" rel="stylesheet">
  <style type="text/css">
    #newpost{
      width: 120px;height:50px;box-shadow:1px 1px 3px 0.5px black; border-radius: 10px 0px 0px 10px; top:30%;right:0;padding: 5px;
    background: orange}
    .todaydate{
        font-size: 10px
      }
.nav-ul li a{
color: black;
  font-weight: bold;

}

.nav-pills > li > a.active {
    background-color: orange!important;
}


  @keyframes shakeme {
  0%{ transform:rotate(30deg);transform: scale(1);}
    10%{transform:rotate(-30deg);}
      20%{transform:rotate(30deg);}
        25%{transform:rotate(-30deg);transform: scale(1.1);}
        30%{transform:rotate(30deg);transform: scale(1.3);}
        35%{transform:rotate(-30deg);transform: scale(1.5);}
          40%{transform:rotate(30deg);transform: scale(1.3);}
        50%{transform:rotate(-30deg);}
         60%{transform:rotate(30deg);}
  100% {transform:rotate(0deg);transform: scale(1);}
}

  @keyframes imageupload {
  0%{filter:blur(10px);}
  50%{filter:blur(5px);}
  100%{filter:blur(0px);}
}


#myProgress {
  width: 100%;
  background: #6C757D;
  border-radius: 10px
}

#myBar {
  width: 0%;
  height: 30px;
  background-color: #DC3545;
    border-radius: 10px;
    
}

  @keyframes bar {
  0%{width:0%;}
  10%{width:10%;}
  24%{width:23%;}
  58%{width:58%;}
  59%{width:59%;}
  60%{width:60%;}
  61%{width:61%;}
  1001%{width:100%;}
}


    @media (max-width: 768px) {
      #newpost{
        background: orange;
        height: 30px;
        width: 70px;
        font-size: 10px;
        padding: 0px  
      }

      .todaydate{
        font-size: 10px
      }
      .hidden-xs{
        display: none;
      }
    }
  </style>

</head>

<body onload="chek()">

  <!-- ======= Top Bar ======= -->
<?php
include 'parts/social.php';
?>

  <!-- ======= Header ======= -->
   <?php
   $page="user";
include 'parts/header.php';

if(empty($_SESSION['Email'])){
$ShowOrNot="DONTSHOW";

}

else if(!empty($_SESSION['Email'])){
$ShowOrNot=$AngnaUid;
}


 ?>
 <!-- End Header -->
 <?php
 if(isset($_GET['action'])){
if($_GET["action"]=="edit"){
echo '<script>
    $(document).ready(function(){
        $("#profileEditModal").modal("show");


    });

  $(document).ready(function(){
  $("#hideMe").click(function(){
   $("#profileEditModal").modal("hide");
   $("#FirstName").focus();
  });

});
 
  </script>';
}
}
 ?>






<div class="modal" id="myModalAlert">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Alert</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="myModalAlertData">
   <center><h3><b>Plesae Login to follow someone <br></h3><br></b>  
   <a href="login.php" class="btn btn-danger">Click here to login</a>
 </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>






<section id="services" class="services section-bg" style="padding-top: 15% ">





  <div class="container">
<div class="row" style="">






<?php
include 'database/connection.php';
$userSql="SELECT * FROM user";
$userFetch=mysqli_query($conn,$userSql);
  while($ProfileData=mysqli_fetch_assoc($userFetch)){
    $ProfileDp=$ProfileData['user_dp'];

    if($ProfileDp==""){
      if($ProfileData['gender']=="Male"){
        $ProfileUserDp="assets/img/function/maledefaultdp.png";

      }
      if($ProfileData['gender']=="Female"){
         $ProfileUserDp="assets/img/function/femaledefaultdp.png";
      }


}
else if($ProfileData['google_id']==""){
$ProfileUserDp="assets/img/userdp/".$ProfileDp;

}

else if(!empty($ProfileData['google_id']) && !empty($ProfileData['user_id'])){
                                              if($ProfileData['dp_c']=="Y"){
                                                $ProfileUserDp="assets/img/userdp/".$ProfileDp;
                                                
                                              }
                                              else{
                                                $ProfileUserDp=$ProfileDp; 
                                              }



}

else{
  $ProfileUserDp=$ProfileDp;
}


if($ProfileData['iam']=="CRS"){
$CrsAlmTchr="Current Student";
}

else if($ProfileData['iam']=="ALM"){
$CrsAlmTchr="Alumni";
}

else if($ProfileData['iam']=="TCHR"){
$CrsAlmTchr="Teacher";
}
else{
  $CrsAlmTchr=" Profile Not updated";
}



$Bid=$ProfileData["user_id"];

if(!empty($_SESSION['Email'])){
$logintofollow='';
 $FollowerChek="SELECT * FROM follow WHERE benifited_id='$Bid' AND follower_id=$AngnaUid";
$FollowerChekq=mysqli_query($conn,$FollowerChek);
if(mysqli_num_rows($FollowerChekq)>0){
  $FollowStatus='<i class="fa fa-check"></i>Following';
  $FollowBTNColor="#6C757D";
  $FollowBTNWidth="49%";
  $MessageBTNDisplay="";
}
else{
  $FollowStatus='<i class="fa fa-user-plus"></i> Follow';
  $FollowBTNColor="#007AFF";
  $FollowBTNWidth="100%";
    $MessageBTNDisplay="none";
}
}
else{
  $logintofollow='data-toggle="modal" data-target="#myModalAlert"';
    $FollowStatus='<i class="fa fa-user-plus"></i> Follow';
  $FollowBTNColor="#007AFF";
  $FollowBTNWidth="100%";
    $MessageBTNDisplay="none";
}



              
             if($ProfileData['phone_privacy']==""){
            
                $UserPhone= '<li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-phone-square"></i>
                  </div>
                  <div class="list-details">
                    <span>+91 XXXXXXXXXX</span>
                    <small>Mobile Number</small><i class="fa fa-lock fa-lg" style="float:right;color:blue"></i>
                  </div>
                </li>';
            

             }else{

              if($ProfileData['phone_privacy']=="P"){
                $UserPhone= '  <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-phone-square"></i>
                  </div>
                  <div class="list-details">
                    <span>'.$ProfileData['phone'].'</span>
                    <small>Mobile Number</small><i class="fa fa-globe fa-lg" style="float:right;color:blue"></i>
                  </div>
                </li>';
              }

              

                if($ProfileData['phone_privacy']=="OM"){
                $UserPhone= '  <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-phone-square"></i>
                  </div>
                  <div class="list-details">
                    <span>+91 XXXXXXXXXX</span>
                    <small>Mobile Number</small><i class="fa fa-lock fa-lg" style="float:right;color:blue"></i>
                  </div>
                </li>';
              }

             }

                  
              if($ProfileData['meet_prompt']=="Y"){
                $MeetPrompt='';

              }
              else if($ProfileData['meet_prompt']=="N"){

$MeetPrompt='';
      }
              else{

$MeetPrompt='';
              }


            

 
                $FeedCountUserId=$ProfileData['user_id'];
                $FeedCount="SELECT * FROM feeds WHERE feed_uploader_id='$FeedCountUserId'";
                $totalFeedCount=mysqli_num_rows(mysqli_query($conn,$FeedCount));



              if(empty($_SESSION['Email'])){
                  $FollowButtonAction='';
                   $FollowButtonForMe='';
                 
              }
              else{
                  
                  $FollowButtonAction='onclick';
                  if($ProfileData['email']==$_SESSION['Email']){
                      $FollowButtonForMe='none';
                  }
                  else{
                       $FollowButtonForMe='';
                  }
              }
              
              
              
              


echo '<div class="col-lg-4" style="margin-bottom:30px;">
           <div class="profile-card-4 z-depth-3">
            <div class="card">
              <div class="card-body text-center rounded-top" style="background: orange">
               <div class="user-box">
                <img src=" '.$ProfileUserDp.'" alt="user avatar" style=" height: 100px; width:100px; border-radius: 50%; box-shadow: 1px 1px 10px 1px" id="myOutputDp">


              </div><hr color="white">
             




              <h5 class="mb-1 text-white"><b>'.$ProfileData['name'].'</b></h5>
              <h6 class="text-light text-light"><i class="fa fa-tag"></i>'.$CrsAlmTchr.'</h6>

          



              <div class="row" style="display:'.$FollowButtonForMe.'">
                <div class="col-12">
                <button '.$logintofollow.' id="followBTN_'.$ProfileData['user_id'].'" class="btn btn-danger" style="width:'.$FollowBTNWidth.';background: '.$FollowBTNColor.' " '.$FollowButtonAction.'="followThisUser('."'".$ProfileData['user_id']."'".')"> '.$FollowStatus.'</button>

              <button onclick="MessageBTN()"class="btn btn-danger" style="width: 49%; display: '.$MessageBTNDisplay.'" id="messageBTN_'.$ProfileData['user_id'].'" >Message</button></div>  
            </div><br>

<div class="col-12">
'.$MeetPrompt.'
</div>
             </div>


              <div class="card-body">
             
                <ul class="list-group shadow-none">
             
                '.$UserPhone.'

                <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div class="list-details">
                    <span>'.$ProfileData['email'].'</span>
                    <small>Email</small>
                  </div>
                </li>
                </ul>

               
                <div class="row text-center mt-4">
                  <div class="col p-2">
                   <h4 class="mb-1 line-height-5">'.$totalFeedCount.'</h4>
                    <small class="mb-0 font-weight-bold">Post</small>
                   </div>
                    <div class="col p-2">
                      <h4 class="mb-1 line-height-5" id="followerCount_'.$ProfileData['user_id'].'">'.$ProfileData['follower'].'</h4>
                     <small class="mb-0 font-weight-bold">Followers</small>
                    </div>
                   
                 </div>


             
               </div>

             <a href="profile.php?user_id='.$ProfileData['user_id'].'">  <button class="btn btn-danger" style="width:100%;">View Profile</button></a>
             </div>
           </div>
        </div>';







  };


?>
</div>
</div>

<script>

function MessageBTN(){
    alert("Currently Unavailable. Developers team is working");
}
</script>







 <!-- ======= feedback and team Section ======= -->
   <?php
   include 'parts/feedback.php';
   include 'parts/team.php';
    ?><!-- End feedback and Team Section -->


    

   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
<?php
include 'parts/bottom.php';
?><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<script type="text/javascript">
  
  function followThisUser(n){
    var followBTN="followBTN_"+n;
  document.getElementById(followBTN).innerHTML='<i class="fa fa-spinner fa-spin"></i> ';
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var followerCount="followerCount_"+n;
      document.getElementById(followerCount).innerHTML=this.responseText;
followcolorchange(n);

    }
  };
  var feedid=n;
  var comurl="benifited_id="+n+"&&angnauid=<?php echo $AngnaUid;?>&&name=<?php echo $Name; ?>";
  xhttp.open("GET", "parts/followmyideal.php?"+comurl, true);
  xhttp.send();
}


function followcolorchange(n){
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       var followBTN="followBTN_"+n;
       var messageBTN="messageBTN_"+n;
      if(this.responseText=="Y"){
 document.getElementById(followBTN).style.background='#6C757D';
   document.getElementById(followBTN).innerHTML='<i class="fa fa-check"></i> Following';
        document.getElementById(followBTN).style.width='49%';
           document.getElementById(messageBTN).style.display='';

      }
        if(this.responseText=="N"){
 document.getElementById(followBTN).style.background='#007AFF';
  document.getElementById(followBTN).innerHTML='<i class="fa fa-user-plus"></i> Follow';
     document.getElementById(followBTN).style.width='100%';
      document.getElementById(messageBTN).style.display='none';
      }

     
    }
  };
  var feedid=n;
  var comurl="benifited_id="+n+"&&angnauid=<?php echo $AngnaUid;?>";
  xhttp.open("GET", "parts/followbtncolorchange.php?"+comurl, true);
  xhttp.send();
}


</script>



  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>


