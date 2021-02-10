
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


</head>

<body onload="chek()">

  <!-- ======= Top Bar ======= -->
<?php
include 'parts/social.php';
?>

  <!-- ======= Header ======= -->
   <?php
   $page="team";
include 'parts/header.php';

if(empty($_SESSION['Email'])){
$ShowOrNot="DONTSHOW";

}

else if(!empty($_SESSION['Email'])){
$ShowOrNot=$AngnaUid;
}


 ?>
 <!-- End Header -->







<section id="services" class="services section-bg" style="padding-top: 15% ">





  <div class="container text-center" >
<div class="row" style="">
    <div class="col-md-6 col-12 " style="margin-top:20px">
<div class="card text-center">
  <div class="card-header">
    <h5 class="card-title"><b>Founder Member</b></h5>
  </div>
  <div class="card-body" id="MemberData">
    <?php
    include  'database/connection.php';
    $Board="SELECT * FROM team WHERE team_cat='FM' ORDER BY team_id ASC";
    $Boardq=mysqli_query($conn,$Board);
    while($MemData=mysqli_fetch_assoc($Boardq)){
        echo '
        <div class="card bg-info text-white">
    <div class="card-body" style="text-align:left;">
    <div class="memberdp float-left" ><img src="assets/img/team/'.$MemData['img'].'" style="height:100px; width:100px; border-radius:50%"></div>
    <div style="float:right; width:70%"><h5 style=" font-weight:bold">'.$MemData['team_name'].'</h5>
    <h6>'.$MemData['team_role'].'</h6>
    </div>
    </div>
  </div>
  <br>';
    }
    ?>
  </div>
  <div class="card-footer text-muted">
       <a href="javasrcipt:void()" class="btn btn-primary" id="MemberViewBTN" style="width:100%">View Member</a>
  </div>
  </div>
</div>

    <div class="col-md-6 col-12 " style="margin-top:20px">
<div class="card text-center">
  <div class="card-header">
    <h5 class="card-title"><b>Board Member</b></h5>
  </div>
  <div class="card-body" id="MemberData2">
    
       <?php
    include  'database/connection.php';
    $Board="SELECT * FROM team WHERE team_cat='BM' ORDER BY team_id ASC";
    $Boardq=mysqli_query($conn,$Board);
    while($MemData=mysqli_fetch_assoc($Boardq)){
        echo '
        <div class="card bg-info text-white">
    <div class="card-body" style="text-align:left;">
    <div class="memberdp float-left" ><img src="assets/img/team/'.$MemData['img'].'" style="height:100px; width:100px; border-radius:50%"></div>
    <div style="float:right; width:70%"><h5 style=" font-weight:bold">'.$MemData['team_name'].'</h5>
    <h6>'.$MemData['team_role'].'</h6>
    </div>
    </div>
  </div>
  <br>';
    }
    ?>
  
  </div>
  <div class="card-footer text-muted">
       <a href="javasrcipt:void()" class="btn btn-primary" id="MemberViewBTN2" style="width:100%">View Member</a>
  </div>
  </div>
</div>


    <div class="col-md-6 col-12" style="margin-top:20px">
<div class="card text-center">
  <div class="card-header">
    <h5 class="card-title"><b>Executive Member</b></h5>
  </div>
  <div class="card-body" id="MemberData3">
    
       <?php
    include  'database/connection.php';
    $Board="SELECT * FROM team WHERE team_cat='EM' ORDER BY team_id ASC";
    $Boardq=mysqli_query($conn,$Board);
    while($MemData=mysqli_fetch_assoc($Boardq)){
        echo '
        <div class="card bg-info text-white">
    <div class="card-body" style="text-align:left;">
    <div class="memberdp float-left" ><img src="assets/img/team/'.$MemData['img'].'" style="height:100px; width:100px; border-radius:50%"></div>
    <div style="float:right; width:70%"><h5 style=" font-weight:bold">'.$MemData['team_name'].'</h5>
    <h6>'.$MemData['team_role'].'</h6>
    </div>
    </div>
  </div>
  <br>';
    }
    ?>
  
  </div>
  <div class="card-footer text-muted">
       <a href="javasrcipt:void()" class="btn btn-primary" id="MemberViewBTN3" style="width:100%">View Member</a>
  </div>
  </div>
</div>


    <div class="col-md-6 col-12 " style="margin-top:20px">
<div class="card text-center">
  <div class="card-header">
    <h5 class="card-title"><b>Mediarepresentative Member</b></h5>
  </div>
  <div class="card-body" id="MemberData4">
    
         <?php
    include  'database/connection.php';
    $Board="SELECT * FROM team WHERE team_cat='MR' ORDER BY team_id ASC";
    $Boardq=mysqli_query($conn,$Board);
    while($MemData=mysqli_fetch_assoc($Boardq)){
        echo '
        <div class="card bg-info text-white">
    <div class="card-body" style="text-align:left;">
    <div class="memberdp float-left" ><img src="assets/img/team/'.$MemData['img'].'" style="height:100px; width:100px; border-radius:50%"></div>
    <div style="float:right; width:70%"><h5 style=" font-weight:bold">'.$MemData['team_name'].'</h5>
    <h6>'.$MemData['team_role'].'</h6>
    </div>
    </div>
  </div>
  <br>';
    }
    ?>
  
  </div>
  <div class="card-footer text-muted">
       <a href="javasrcipt:void()" class="btn btn-primary" id="MemberViewBTN4" style="width:100%">View Member</a>
  </div>
  </div>
</div>
</div>
</div>






<script>

$(document).ready(function(){
    $("#MemberData").slideUp()
});

$(document).ready(function(){
  $("#MemberViewBTN").click(function(){
    $("#MemberData").slideToggle();
  });
});



$(document).ready(function(){
    $("#MemberData2").slideUp()
});

$(document).ready(function(){
  $("#MemberViewBTN2").click(function(){
    $("#MemberData2").slideToggle();
  });
});



$(document).ready(function(){
    $("#MemberData3").slideUp()
});

$(document).ready(function(){
  $("#MemberViewBTN3").click(function(){
    $("#MemberData3").slideToggle();
  });
});



$(document).ready(function(){
    $("#MemberData4").slideUp()
});

$(document).ready(function(){
  $("#MemberViewBTN4").click(function(){
    $("#MemberData4").slideToggle();
  });
});





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


