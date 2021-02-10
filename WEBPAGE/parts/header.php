<?php
ob_start();
session_start();
if(!empty($_SESSION['Email'])){


  $Email=$_SESSION['Email'];
include 'database/connection.php';
$LogSql="SELECT * FROM user WHERE email='$Email'";
$LogFetch=mysqli_query($conn,$LogSql);
if(mysqli_num_rows($LogFetch)>0){
  while ($LogUser=mysqli_fetch_assoc($LogFetch)) {
    $AngnaUid=  $LogUser["user_id"];
    $Name=  $LogUser["name"];
    $Gender=$LogUser["gender"];
    $Dob=   $LogUser["dob"];
    $Phone= $LogUser["phone"];
    $PhonePrivacy=$LogUser["phone_privacy"];
    $Iam=$LogUser['iam'];
    $IamData=$LogUser["user_batch"];
    $Pass=  $LogUser["password"];
    $Dp=  $LogUser["user_dp"];
    $GoogleID=$LogUser['google_id'];
    $Dp_C=$LogUser['dp_c'];
    $Verify=$LogUser['verify'];

    $MeetPrompt=$LogUser['meet_prompt'];

   $_SESSION['AngnaUid']=$LogUser["user_id"];
   $_SESSION['LoggedUserName']=$LogUser["user_id"];


   


    if($Dp==""){
            if($Gender=="Male"){
              $LogUserDp="assets/img/function/maledefaultdp.png";
            }
            if($Gender=="Female"){
                 $LogUserDp="assets/img/function/femaledefaultdp.png";
            }
    }
    else if($GoogleID==""){
$LogUserDp="assets/img/userdp/".$Dp;
    }

    else if(!empty($GoogleID) && !empty($AngnaUid)){

if($Dp_C=="Y"){
  $LogUserDp="assets/img/userdp/".$Dp;
}
else{
  $LogUserDp=$Dp;
}

}

    else{
      $LogUserDp=$Dp;
    }


  
}
}
}

?>

<script type="text/javascript">
document.onreadystatechange = function() { 
    if (document.readyState !== "complete") { 
        document.querySelector("body").style.visibility = "hidden"; 
        document.querySelector("#overlayloader").style.visibility = "visible"; 
    } else { 
        document.querySelector("#overlayloader").style.display = "none"; 
        document.querySelector("body").style.visibility = "visible"; 
    } 
}; 
</script>

<div style=" position: fixed;
  background: #fefcfe;height: 100%;width: 100%;z-index:5000;padding-top:200px" id="overlayloader">
  <div class="container">
    <div class="row">
  <div class="col-2 col-md-3"></div>
    <div class="col-2"></div>
    <div class="col-4 col-md-2 main" style="height:">
<img src="assets/img/function/load.gif"; style="width: 100%;">
<center><i class="fa fa-spinner fa-spin" style="color:blue"></i> 
        <i class="fa fa-spinner fa-spin" style="color:green"></i>
        <i class="fa fa-spinner fa-spin" style="color:purple"></i>
        <i class="fa fa-spinner fa-spin" style="color:red"></i>
        <i class="fa fa-spinner fa-spin" style="color:yellow"></i>
</center>
    </div>
      <div class="col-2"></div>
            <div class="col-2 col-md-3"></div>
</div>
</div>
</div>


<script type="text/javascript">

  setInterval(function(){

var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

    }
  };
  xhttp.open("GET", "parts/useronlinestatus.php?angnauid=<?php echo $AngnaUid; ?>", true);
  xhttp.send();

  },10000);



</script>




 <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">

       <a href="index.php" class="logo mr-auto"><img src="assets/img/logo.png" alt="angna logo" class="img-fluid"></a>

      <nav class="main-nav d-none d-lg-block">
        <ul>



<?php
         if(empty($_SESSION["Email"])){
          date_default_timezone_set("Asia/Calcutta");
                $li1='';
                $li2='';

        
         
         }
         else{
          echo ' <li class="drop-down"><a href=""style="color:orange;text-decoration:none;" id="navUserCircleMob">
          <center><img src="'.$LogUserDp.'" style="height:100px;width:100px;border-radius:50%;border:2px solid orange"></center><br><br>
          <strong>'.$Name.'</strong></a>
            <ul>
              <li><a href="profile.php?user_id='.$AngnaUid.'"><i class="fa fa-user" style="color:" ></i> Profile</a></li>

              <li><a href="profile.php?user_id='.$AngnaUid.'#messages"><i class="fa fa-bell" style="color:red"></i> Notification &nbsp; &nbsp;<span class="badge badge-pill badge-danger" style="padding:5px; margin-bottom:5px" id="ProfileListNotMob"></span></a></li>

              <li><a href="profile.php?user_id='.$AngnaUid.'#dit"><i class="fa fa-cog" style="color:orange"></i> Setting</a></li>

               <li><a href="logout.php"><i class="fa fa-power-off" style="color:red"></i> Logout</a></li>
            </ul>
          </li>';
         }
         ?>






          <li><a href="index.php"<?php if($page=="index.php"){echo 'style="color: orange"';}?>>Home</a></li>
          <li><a href="feeds.php"<?php if($page=="feeds"){echo 'style="color: orange"';}?>>Feeds</a></li>
                       <li><a href="contest.php" <?php if($page=="contest"){echo 'style="color: orange"';}?>>Contest</a></li>

          <li class="drop-down"><a href="events.php?event=all"<?php if($page=="event"){echo 'style="color: orange"';}?>>Events</a>
            <ul>
              <li><a href="events.php?event=lc">Live Counselling</a></li>
              <li><a href="events.php?event=lp">Live Play</a></li>
              <li><a href="events.php?event=ls">Live Session</a></li>
               <li><a href="events.php?event=ue">Upcoming Events</a></li>
            </ul>
          </li>
          <li class="drop-down"><a href="javascript:Void()"<?php if($page=="donate"){echo 'style="color: orange"';}?>>Donate</a>
            <ul>
              <li><a href="donation.php">Amount</a></li>
               <li class="drop-down"><a href="javascript:Void()"<?php if($page=="donate"){echo 'style="color: orange"';}?>>Blood</a>
            <ul>
              <li><a href="donateblood.php?donor=register">Register as a Donor</a></li>
              <li><a href="donateblood.php?donor=search">Search a Donor</a></li>  
            </ul>
          </li>
            </ul>
          </li>


          <li><a href="user.php" <?php if($page=="user"){echo 'style="color: orange"';}?>>Users</a></li>
                    <li><a href="team.php" <?php if($page=="team"){echo 'style="color: orange"';}?>>Team</a></li>
      




         <?php
         if(empty($_SESSION["Email"])){
          date_default_timezone_set("Asia/Calcutta");
                $li1='<li><a href="login.php">Login</a></li>';
                $li2='<li><a href="signup.php">Signup</a></li>';

               if ($page=="login"){ $li1= '<li><a href="login.php" style="color: orange">Login</a></li>';
               }
               echo $li1;

               if ($page=="signup"){ $li2= '<li><a href="signup.php" style="color: orange">Signup</a></li>';
               }
               echo $li2;
         
         }
         else{
          echo ' <li class="drop-down"><a href="profile.php?user_id='.$AngnaUid.'" style="color:orange;text-decoration:none;" id="navUserCircleLap">
          <img src="'.$LogUserDp.'" style="height:25px;width:25px;border-radius:50%;border:2px solid orange">
            </a><ul>
            <li><a href="profile.php?user_id='.$AngnaUid.'"><i class="fa fa-user" style="color:" ></i> '.$Name.'</a></li>
              <li><a href="profile.php?user_id='.$AngnaUid.'"><i class="fa fa-user" style="color:" ></i> Profile</a></li>

              <li><a href="profile.php?user_id='.$AngnaUid.'#messages"><i class="fa fa-bell" style="color:red"></i> Notification &nbsp; &nbsp;<span class="badge badge-pill badge-danger" style="padding:5px; margin-bottom:5px" id="ProfileListNotLap">6</span></a></li>

              <li><a href="profile.php?user_id='.$AngnaUid.'#dit"><i class="fa fa-cog" style="color:orange"></i> Setting</a></li>

               <li><a href="logout.php"><i class="fa fa-power-off" style="color:red"></i> Logout</a></li>
            </ul>
          </li>';
         }
         ?>
      
         
        </ul>
      </nav><!-- .main-nav-->

    </div>
  </header>
<?php
if (!empty($_SESSION["Email"])){
echo '<a href="profile.php?user_id='.$AngnaUid.'"><div class="chat-head-BTN"><span id="notificationpopcount" class="badge" style="display:none; color:white; position: absolute;background: red; animation: shakeme 2s infinite">10</span>
<div id="chat-head-BTN-id">
  <button type="button" class="btn btn-warning btn-circle btn-xl"><i class="fa fa-bell-o"></i></button></div>
</div></a>';
}
?>






<script type="text/javascript">
  
$(document).ready(function(){
  newNotification();
});

      function newNotification(){

             var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
   
if(this.responseText>0){
document.getElementById('notificationpopcount').style.display="";
document.getElementById('notificationpopcount').innerHTML=this.responseText;
document.getElementById('ProfileListNotMob').innerHTML=this.responseText;
document.getElementById('ProfileListNotLap').innerHTML=this.responseText;

}
else{
  document.getElementById('notificationpopcount').style.display="none";
  document.getElementById('ProfileListNotMob').innerHTML=this.responseText;
document.getElementById('ProfileListNotLap').innerHTML=this.responseText;

}
     
    }
  };
  xhttp.open("GET", "parts/newnotificationpop.php?user_id=<?php echo $AngnaUid; ?>", true);
  xhttp.send();
}

setInterval(function(){newNotification()},5000);


</script>