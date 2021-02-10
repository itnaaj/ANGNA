<?php
include 'database/connection.php';
$UserId= $_GET["user_id"];
$userSql="SELECT * FROM user WHERE user_id='$UserId'";
$userFetch=mysqli_query($conn,$userSql);
if(mysqli_num_rows($userFetch)>0){
  if($ProfileData=mysqli_fetch_assoc($userFetch)){
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



  };
}


else{

    header("Location: error.php");
  
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



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ANGNA Profile</title>
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
   $page="profile";
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



<div id="profileEditModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title">Update Profile</h5>
            </div>
            <div class="modal-body" id="profileEditBody"><center><br><br>
                  <h4>Your profile is not updated</h4><br>
                  <button class="btn btn-danger" data-target="#edit" data-toggle="pill"  id="hideMe">Update Your Profile</button>
                                    <br><br><br><br><br><br><br><br>
               
                </center>
                
            </div> 
        </div>
    </div>
</div>


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


<script>
  function uploadProfilePic(){
    document.getElementById('myBar').style.animation='bar 50s';
    document.getElementById('uploadDpBTN').style.display="none";
    document.getElementById('myOutputDp').style.animation="imageupload 8s";
    document.getElementById('myProgress').style.display="";
  var filename = "<?php echo $AngnaUid; ?>";  
  var dpc="<?php echo $Dp_C; ?>";   
  var currDP="<?php echo $Dp; ?>";          
  var file_data = $('#ProfilePic').prop('files')[0];    

  var form_data = new FormData();
  form_data.append("ProfilePic",file_data);
  form_data.append("filename",filename);
  form_data.append("dpc",dpc);
  form_data.append("currDP",currDP);
  $.ajax({
      url: "parts/uploadMyProfilePic.php",                      
             type: "POST",
             dataType: 'script',
             cache: false,
             contentType: false,
             processData: false,
             data: form_data,

          success:function(dat2){
         
            if(dat2==1){
          
               document.getElementById('myOutputDp').style.animation="shakeme 1s";
              document.getElementById('myBar').style.animation='';
               document.getElementById('myBar').style.width="100%";
               document.getElementById('myBar').innerHTML='<i class="fa fa-check" style="color:white;margin: 8px">Uploaded</i>';
               setTimeout(function(){document.getElementById('myProgress').style.display="none";},5000);
           
            }
           
          }
    });

}



</script>


  <div class="container">
<div class="row">
        <div class="col-lg-4">
           <div class="profile-card-4 z-depth-3">
            <div class="card">
              <div class="card-body text-center rounded-top" style="background: orange">
               <div class="user-box">
                <img src="<?php echo $ProfileUserDp;  ?>" alt="user avatar" style=" height: 200px; width:200px; border-radius: 50%; box-shadow: 1px 1px 10px 1px" id="myOutputDp">


              </div><hr color="white">
               <div id="myProgress" style="display: none">
                <div id="myBar"><i class="fa fa-spinner fa-spin" style="color:white;margin: 8px"></i></div>
                </div>

               <?php if ($ShowOrNot==$UserId){
              echo '
             <form method="post" enctype="multipart/form-data" id="uploadDpBTN">
            <div class="form-group">
                                    <div class="custom-file">
            <input type="file" class="custom-file-input" id="ProfilePic" name="img"  onchange="document.getElementById('."'myOutputDp'".').src=window.URL.createObjectURL(this.files[0]);uploadProfilePic()">
                                        <label class="custom-file-label" for="customFile">Change Profile Picture</label>
                                    </div>
                                </div></form>';
             }?>


              <h5 class="mb-1 text-white"><b><?php echo $ProfileData['name'];?></b></h5>
              <h6 class="text-light text-light"><i class="fa fa-tag"></i> <?php echo $CrsAlmTchr;?></h6>

          

<script type="text/javascript">
  
  function followThisUser(n){
  document.getElementById('followBTN').innerHTML='<i class="fa fa-spinner fa-spin"></i>';
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('followerCount').innerHTML=this.responseText;
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
      if(this.responseText=="Y"){
 document.getElementById('followBTN').style.background='#6C757D';
   document.getElementById('followBTN').innerHTML='<i class="fa fa-check"></i> Following';
        document.getElementById('followBTN').style.width='49%';
           document.getElementById('messageBTN').style.display='';

      }
        if(this.responseText=="N"){
 document.getElementById('followBTN').style.background='#007AFF';
  document.getElementById('followBTN').innerHTML='<i class="fa fa-user-plus"></i> Follow';
     document.getElementById('followBTN').style.width='100%';
      document.getElementById('messageBTN').style.display='none';
      }

     
    }
  };
  var feedid=n;
  var comurl="benifited_id="+n+"&&angnauid=<?php echo $AngnaUid;?>";
  xhttp.open("GET", "parts/followbtncolorchange.php?"+comurl, true);
  xhttp.send();
}


</script>
<?php
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


?>


              <div class="row" style="display:<?php if ($ShowOrNot==$UserId){echo "none";}else{ echo ''; }?>">
                <div class="col-12">
                <button <?php echo $logintofollow; ?> id="followBTN" class="btn btn-danger" style="width:<?php echo $FollowBTNWidth; ?>;background: <?php echo $FollowBTNColor; ?> " <?php if(!empty($_SESSION['Email'])){echo 'onclick'; }else{ echo ''; } ?>="followThisUser('<?php echo $ProfileData['user_id']?>')"><?php echo $FollowStatus;?></button>

              <button onclick="alert('Currently Unavailable. Developers team is working')"class="btn btn-danger" style="width: 49%; display: <?php echo $MessageBTNDisplay; ?>" id="messageBTN" >Message</button></div>  
            </div><br>



             </div>


              <div class="card-body">
                <ul class="list-group shadow-none">
              <?php
              if(!empty($_SESSION['Email'])){

                if($ProfileData['email']==$_SESSION['Email']){
                  if($ProfileData['phone_privacy']=="P"){
                echo '  <li class="list-group-item">
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
                echo '  <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-phone-square"></i>
                  </div>
                  <div class="list-details">
                    <span>'.$ProfileData['phone'].'</span>
                    <small>Mobile Number</small><i class="fa fa-lock fa-lg" style="float:right;color:blue"></i>
                  </div>
                </li>';
              }
              }
              
               else{
                    if($ProfileData['phone_privacy']=="P"){
                echo '  <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-phone-square"></i>
                  </div>
                  <div class="list-details">
                    <span>'.$ProfileData['phone'].'</span><i class="fa fa-globe fa-lg" style="float:right;color:blue"></i>
                    <small>Mobile Number</small>
                  </div>
                </li>';
              }
              else{
                    if($ProfileData['phone_privacy']=="OM"){
                   echo '  <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-phone-square"></i>
                  </div>
                  <div class="list-details">
                    <span>+91 XXXXXXXXXX</span><i class="fa fa-lock fa-lg" style="float:right;color:blue"></i>
                    <small>Mobile Number</small>
                  </div>
                </li>';
                    }
              }
               }
              
              }
              
              else{
                    if($ProfileData['phone_privacy']=="P"){
                echo '  <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-phone-square"></i>
                  </div>
                  <div class="list-details">
                    <span>'.$ProfileData['phone'].'</span><i class="fa fa-globe fa-lg" style="float:right;color:blue"></i>
                    <small>Mobile Number</small>
                  </div>
                </li>';
              }
              else{
                    if($ProfileData['phone_privacy']=="OM"){
                   echo '  <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-phone-square"></i>
                  </div>
                  <div class="list-details">
                    <span>+91 XXXXXXXXXX</span><i class="fa fa-lock fa-lg" style="float:right;color:blue"></i>
                    <small>Mobile Number</small>
                  </div>
                </li>';
                    }
              }
              }
            

              ?>
                <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div class="list-details">
                    <span><?php echo $ProfileData['email'];?></span>
                    <small>Email Address</small>
                  </div>
                </li>
                </ul>
                <?php
                $FeedCountUserId=$ProfileData['user_id'];
                $FeedCount="SELECT * FROM feeds WHERE feed_uploader_id='$FeedCountUserId'";
                $totalFeedCount=mysqli_num_rows(mysqli_query($conn,$FeedCount));

                ?>
                <div class="row text-center mt-4">
                  <div class="col p-2">
                   <h4 class="mb-1 line-height-5"><?php echo $totalFeedCount; ?></h4>
                    <small class="mb-0 font-weight-bold">Post</small>
                   </div>
                    <div class="col p-2">
                      <h4 class="mb-1 line-height-5" id="followerCount"><?php echo $ProfileData['follower'];?></h4>
                     <small class="mb-0 font-weight-bold">Followers</small>
                    </div>
                   
                 </div>
               </div>
            
             </div>
           </div>
        </div>
        <script type="text/javascript">
          function NotRead(n){
             var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
if(this.responseText=="T"){
  document.getElementById('NotBell').style.animation="";
    document.getElementById('NotBell').style.color="black";
    document.getElementById('NotCount').style.display="none";
}
     
    }
  };
  xhttp.open("GET", "parts/notificationreadcomplete.php?benifited_id="+n, true);
  xhttp.send();
}
         
        </script>


        <div class="col-lg-8">
           <div class="card z-depth-3">
            <div class="card-body">
            <ul class="nav nav-pills nav-justified nav-ul">
                <li class="nav-item">
                    <a href="#" data-target="#profile" data-toggle="pill" class="nav-link active show"><i class="icon-user"></i> <i class="fa fa-user fa-lg"></i>  Profile</a>
                </li>

                 <?php if ($ShowOrNot==$UserId){
                   $notsqlread="SELECT * FROM notification WHERE not_for_id=$AngnaUid AND not_read='F'";
                          $notqread=mysqli_query($conn,$notsqlread);
                          if($NotCount=mysqli_num_rows($notqread)>0){
                            $BellAnim='animation: shakeme 2s infinite;color:#ff0000';
                          }
                          else{
                            $BellAnim='';
                          }
                  echo ' 
                   <li class="nav-item" onclick="NotRead('."'$AngnaUid'".')">
                    <a href="javascript:void();" data-target="#mynotification" data-toggle="pill" class="nav-link"><i class="fa fa-bell fa-lg" style="'.$BellAnim.'" id="NotBell"></i> <span class="badge badge-danger" id="NotCount">'.$NotCount.'</span><span class="hidden-xs"> Notification</span></a>
                </li>
               ';}

                 ?>
               <div id="focusme"></div>

                  <?php if ($ShowOrNot==$UserId){echo ' 
                   <li class="nav-item">
                    <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i><i class="fa fa-cog fa-lg"></i>  <span class="hidden-xs">Edit</span></a>
                </li>
               ';}

                 ?>


                    


            </ul>
            <HR style="">
            <div class="tab-content p-3">
                <div class="tab-pane active show" id="profile">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 style="color: orange;text-shadow: .5px .5px 0px grey"><b><i class="fa fa-info-circle"></i> About</b></h6>
                            <p>
                              <strong>Full Name: </strong><?php echo $ProfileData['name'];?><br>
                                <strong>Gender: </strong> <?php if($ProfileData['gender']!="")echo $ProfileData['gender']; else echo "__________"?><br>
                                <strong>Date Of Birth: </strong> <?php if($ProfileData['dob']!="")echo $ProfileData['dob']; else echo "__________"?>

                            </p>
                            <h6 style="color: orange;text-shadow: .5px .5px 0px grey"><b><i class="fa fa-graduation-cap"></i> Academic Details</b></h6>
                            <p>
                                <strong>
                                <?php     
                                    if($ProfileData['iam']=="CRS") echo "Class: ";
                                    if($ProfileData['iam']=="ALM"){ echo "Batch: ";}
                                    if($ProfileData['iam']=="TCHR") echo "Teacher's Subject: ";

                                ?>  </strong>
                                        
                                        <?php 
                                        echo $ProfileData['user_batch'];
                                        if($ProfileData['iam']=="ALM"){
                                           if($ProfileData['user_batch']=="1")echo 'st';
                                        else if($ProfileData['user_batch']=="2")echo 'nd';
                                        else if($ProfileData['user_batch']=="3")echo 'rd';
                                        else if($ProfileData['user_batch']=="")echo '__________';
                                        else echo "th";
                                        }
                                        ?> <br>
                                       <strong>School: </strong><?php if($ProfileData['jnv']!="")echo $ProfileData['jnv']; else echo "__________"?><br>
                                       <?php if($ProfileData['iam']=="ALM"){echo  "<strong>Passout Year: </strong>"; if($ProfileData['passout_year']!="")echo $ProfileData['passout_year']; else echo"__________";}?>

                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 style="color: orange;text-shadow: .5px .5px 0px grey"><b><i class="fa fa-pen"></i> Biodata</b></h6>
                           <p>
                           <?php echo $ProfileData['shortnote'];?>
                           <hr>

                           <i class="fa fa-map-marker"></i> <?php if($ProfileData['add_street']!="")echo $ProfileData['add_street']; else echo "__________"?><br>
                            <?php if($ProfileData['add_city']!="")echo $ProfileData['add_city']; else echo "__________"?>,  <?php if($ProfileData['add_state']!="")echo "[ ".$ProfileData['add_state'].' ]'; else echo "__________"?>
                           </p> 
                        </div>

                        <div class="col-md-12">
                            <!--h5 class="mt-2 mb-3"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>
                            <table class="table table-hover table-striped">
                                <tbody>    
                                                          
                                    <tr>
                                        <td>
                                            <strong>for future</strong> tre <strong>commented for now</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table-->
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="mynotification">
                    <table class="table table-hover table-striped">
                        <tbody> 
                          <?php
                          $notsql="SELECT * FROM notification WHERE not_for_id=$AngnaUid ORDER BY not_id DESC";
                          $notq=mysqli_query($conn,$notsql);
                          while($notification=mysqli_fetch_assoc($notq)){
                            if($notification['not_type']=="LIKE"){$sideBTN="fa-thumbs-up";}
                              if($notification['not_type']=="FOLLOW"){$sideBTN="fa-user-plus";}
                              if($notification['not_type']=="COMMENT"){$sideBTN="fa-comment";}

                            echo '<tr>
                                <td class="text-dark">
                                   <span class="float-right font-weight-bold" style="padding:10px;background:orange;color:white;border-radius:10%"><i class="fa '.$sideBTN.' fa-lg"></i></span><b>'.$notification['notification'].'
                                </td>
                            </tr>';
                          }
                          ?>

                            
                            
                        </tbody> 
                    </table>
                </div>








                <div class="tab-pane" id="edit">
                    <form method="post" class="php-email-form" action="forms/updatemyprofile.php">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Full Name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?php echo $ProfileData['name']?>" id="FullName"  name="FullName">
                  <div class="validate" style="color:red" id="FullNameVal"></div>
                            </div>
                        </div>

                        
<?php
$m="";
$f="";
$o="";
$ps="";
$focus="";
if($ProfileData['gender']=="Male"){
  $m="SELECTED";
}

else if($ProfileData['gender']=="Female"){
  $f="SELECTED";
}

else if($ProfileData['gender']=="Other"){
  $o="SELECTED";
}

else{
  $ps='SELECTED';
}
?>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Gender</label>
                            <div class="col-lg-9">
                               <select name="Gender" class="custom-select" id="Gender">
                                  <option value="NS" selected <?php echo $ps; ?>>Please Select Gender</option>
                                  <option value="Male" <?php echo $m; ?>>Male</option>
                                  <option value="Female" <?php echo $f; ?>>Female</option>
                                 <option value="Other" <?php echo $o; ?>>Other</option>
                                </select>
                                  <div class="validate" style="color:red" id="GenderVal"></div>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Date Of Birth</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="Dob" type="date" value="<?php echo $ProfileData['dob']; ?>" id="Dob"> 
                                <div class="validate" style="color:red" id="DobVal"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="Email" type="email" value="<?php echo $ProfileData['email']; ?>" id="Email">
                                 <div class="validate" style="color:red" id="EmailVal"></div>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                            <div class="col-lg-6 col-9">
                                <input name="Phone" class="form-control" type="phone" value="<?php echo $ProfileData['phone']; ?>" id="Phone">
                             <div class="validate" style="color:red" id="PhoneVal"></div>
                      
                            </div>
                            <div class="col-lg-3 col-3">
                               <select name="phoneSWith" class="custom-select" id="phoneSWith">
                                  <option selected value="NS">+Share with</option>
                                  <option value="OM">Only me</option>
                                  <option value="P">Public</option>
                                </select>
                                 <div class="validate" style="color:red" id="phoneSWithVal"></div>
                            </div>
                        </div>

<?php
$crs="";
$alm="";
$tchr="";
$psiam="";
$focus="";
if($ProfileData['iam']=="CRS"){
  $crs="SELECTED";
}

else if($ProfileData['iam']=="ALM"){
  $alm="SELECTED";
}

else if($ProfileData['iam']=="TCHR"){
  $tchr="SELECTED";
}

else{
  $psiam='SELECTED';
}
?>

                                                <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">I Am</label>
                            <div class="col-lg-9">
                               <select name="IAm" class="custom-select" onchange="IamDet(this.value)" id="IAm">
                                  <option value="NS" <?php echo $psiam; ?>>Please Select</option>
                                  <option value="CRS" <?php echo $crs; ?>>Current Student</option>
                                  <option value="ALM" <?php echo $alm; ?>>Alumni</option>
                                 <option value="TCHR" <?php echo $tchr; ?>>Teacher</option>
                                </select>
                                  <div class="validate" style="color:red" id="IAmVal"></div>

                            </div>
                        </div>
                        <script type="text/javascript">
                          function IamDet(n){
                            if(n=="CRS"){
                              document.getElementById('crsalmlebel').innerHTML="Class: ";
                              document.getElementById('IAmData').type="text";
                              document.getElementById('IAmData').placeholder="Enter Your Class";
                              document.getElementById('IAmData').value="";
                                document.getElementById('IAmDataprof').style.display="none";
                            }
                            else  if(n=="ALM"){
                              document.getElementById('crsalmlebel').innerHTML="Batch: ";
                              document.getElementById('IAmData').type="number";
                              document.getElementById('IAmData').placeholder="Enter Your Batch";
                              document.getElementById('IAmData').value="";
                              document.getElementById('IAmDataprof').style.display="";

                            }

                            else{document.getElementById('crsalmlebel').innerHTML="Subject: ";
                              document.getElementById('IAmData').type="text";
                              document.getElementById('IAmData').placeholder="Enter Your Subject";
                              document.getElementById('IAmData').value="";
                                document.getElementById('IAmDataprof').style.display="none";

                            }

                          }
                        </script>



                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label" id="crsalmlebel"><?php     
                                    if($ProfileData['iam']=="CRS") echo "Class: ";
                                    if($ProfileData['iam']=="ALM"){ echo "Batch: ";}
                                    if($ProfileData['iam']=="TCHR") echo "Teacher's Subject: ";

                                ?></label>
                            <div class="col-lg-9">
                                <input class="form-control" name="IAmData" type="text" value="<?php echo$ProfileData['user_batch']; ?>" id="IAmData">
                                 <div class="validate" style="color:red" id="IAmDataVal"></div>
                            </div>
                        </div>
             
                        <div class="form-group row" style="display: <?php     
                                    if($ProfileData['iam']=="CRS") echo 'none';
                                    if($ProfileData['iam']=="ALM"){ echo ' ';}
                                    if($ProfileData['iam']=="TCHR") echo 'none';

                                ?>" id="IAmDataprof">
                            <label class="col-lg-3 col-form-label form-control-label" id="crsalmprof">Passout year</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="IAmDataProf" type="text" value="<?php echo $ProfileData['passout_year']; ?>" id="IAmDataProf">
                                 <div class="validate" style="color:red" id="IAmDataProfVal"></div>
                            </div>
                        </div>




                                                <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Enter your JNV Distric with State</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="MyJNV" type="text" value="<?php echo $ProfileData['jnv']; ?>" placeholder="JNV Dist./State" id="MyJNV">
                                <div class="validate" style="color:red" id="MyJNVVal"></div>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?php echo $ProfileData['add_street']; ?>" placeholder="Street" name="AddStreet">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-6">
                                <input class="form-control" type="text" value="<?php echo $ProfileData['add_city']; ?>" placeholder="City" name="AddCity">
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="text" value="<?php echo $ProfileData['add_state']; ?>" placeholder="State" name="AddState">
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Short note about your profession</label>
                       
                            <div class="col-lg-9">
                               
        <textarea class="form-control" rows="5" name="ShortNote"  id="ShortNote"><?php echo $ProfileData['shortnote']; ?></textarea>
             <div class="validate" style="color:red" id="ShortNoteVal"></div>

                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                              <div class="mb-3">
                  <div class="loading" id="updateloader"></div>
                  <div class="error-message"></div>
                  <div class="sent-message" ></div>
                </div>
                                <input type="reset" class="btn btn-secondary" value="Cancel">
                                <input type="submit" class="btn btn-primary" value="Save Changes" onclick="loading()">
                                <script>function loading(){
                                  document.getElementById('updateloader').innerHTML='<div class="alert alert-success" data-aos-delay="100"><strong><i class="fa fa-spinner fa-spin"></i>  Updatating ! </strong>Hold on......</div>';
                                }</script>
                            </div>
                        </div>
                        </form>
                </div>
            </div>
        </div>
      </div>
      </div>
        
    </div>
</div>








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


