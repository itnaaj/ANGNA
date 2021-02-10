

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ANGNA -Thankyou</title>
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
  <link rel="stylesheet" type="text/css" href="assets/css/newcss.css">

  <!-- Angna Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Top Bar ======= -->
<?php
include 'parts/social.php';
?>

  <!-- ======= Header ======= -->
 <?php
 $page="Donate";
include 'parts/header.php';
include 'database/connection.php';
 ?>



  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="login" class="about " style="padding-top: 15% " >

      <div class="container " >
  <div class="row text-center mb-4 ">
    
  </div>
  <div class="row text-center">
      <div class="col-md-6 offset-md-3 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100" >
          <div class="card" style="box-shadow: 1px 1px 3px .05px;">
              <div class="card-body" >
                  <div class="login-title">
                      <h4><?php echo $_GET['DD78705934029110939035'];

                       ?></h4>


                  </div>



               <?php

include 'database/connection.php';



if($_GET['DD78705934029110939035']=="Donation"){

  if(empty($_SESSION['payID'])){
  echo '
<div class="alert alert-danger alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Failed! </strong>Donation Failed
                  </div>
                   <div class="form-row">
                          <button type="button" class="btn btn-warning btn-block" onClick="document.location.href = '."'donation.php'".'">Retry Donation</button>
                        </div>';
}

else{



$PaidId = $_SESSION['payID'];
$PaidName=$_GET['DN78705934029110939035'];
$PaidEmail=$_GET['DE78705934029110939035'];
$PaidPhone=$_GET['DP78705934029110939035'];
$PaidAmount=$_GET['DA78705934029110939035'];
$PaidCurr=$_SESSION['payCurr'];


                      $payfetch="SELECT * FROM donation WHERE mojo_id='$PaidId'";
                    $payfetchq=mysqli_query($conn, $payfetch);

          if($paiddata=mysqli_fetch_assoc($payfetchq)>0){
           
           echo '

<div class="alert alert-warning alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Alert! </strong>Payment Already Done
                  </div>
                  <div class="alert alert-warning fade show" style="text-align:left">
             
                    <strong style="float-left">Payment ID:</strong> '.$PaidId.'<br>
                    <strong style="float-left">Name:</strong> '.$PaidName.'<br>
                    <strong style="float-left">Email:</strong> '.$PaidEmail.'
                  </div>
                   <div class="form-row">
                          <button type="button" class="btn btn-success btn-block" onClick="document.location.href = '."'index.php'".'">Go to Home</button>
                        </div>';
                  
                  unset($_SESSION["payID"]);
                  unset($_SESSION["payCurr"]);

                                  }



else{
  $paysql="INSERT INTO `donation` (`mojo_id`, `donate_name`, `donate_email`, `donate_phone`, `donate_amount`, `donate_curr`) VALUES ('$PaidId', '$PaidName', '$PaidEmail', '$PaidPhone', '$PaidAmount', '$PaidCurr')";
   
          if (!$paidq=mysqli_query($conn, $paysql)){

            echo "NO";


          }
          else{




//isert feed if donation ok


  $mydate=getdate(date("U")); 
  $FeedDate="$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
  $FeedTime=date("h:i A");
  $FeedTopic="Donation";
  $FeedData="<strong>".$PaidName."</strong> donated <strong>".$PaidAmount." ".$PaidCurr."</strong>. on ".$FeedDate.".<br>We just dont know how to say thanks for the deeds, but we must say this is unforgettable. All we could say at the moment is thank you thank you so much for your such a great help.<br>Once Again! Thankyou<br><b>Regards<br>ANGNA</b>";

$FeedInsert="INSERT INTO `feeds` ( `feed_uploader_id`, `feed_upload_time`, `feed_topic`, `feed_data`, `feed_image`, `feed_upload_date`) VALUES('1', '$FeedTime', '$FeedTopic', '$FeedData', 'donationdefault.jpg', '$FeedDate')";
          if($FeedInsertQuery=mysqli_query($conn,$FeedInsert)){
           
          }
       






            //close insert feed














            echo '

<div class="alert alert-success alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Thankyou! </strong>Donation Successfull
                  </div>
                  <div class="alert alert-warning fade show" style="text-align:left">
             
                    <strong style="float-left">Payment ID:</strong> '.$PaidId.'<br>
                    <strong style="float-left">Name:</strong> '.$PaidName.'<br>
                    <strong style="float-left">Email:</strong> '.$PaidEmail.'
                  </div>
                   <div class="form-row">
                          <button type="button" class="btn btn-success btn-block" onClick="document.location.href = '."'index.php'".'">Go to Home</button>
                        </div>';
          }

}





}
}//donation type close
















//contest start
if($_GET['DD78705934029110939035']=="Angna Contest Participate"){

  if(empty($_SESSION['payID'])){
  echo '
<div class="alert alert-danger alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Failed! </strong>Participation Failed
                  </div>
                   <div class="form-row">
                          <button type="button" class="btn btn-warning btn-block" onClick="document.location.href = '."'donation.php'".'">Retry Donation</button>
                        </div>';
}

else{



$PaidId = $_SESSION['payID'];
$PaidName=$_GET['DN78705934029110939035'];
$PaidEmail=$_GET['DE78705934029110939035'];
$PaidPhone=$_GET['DP78705934029110939035'];
$PaidAmount=$_GET['DA78705934029110939035'];
$PaidFile=$_GET['DF78705934029110939035'];
$PaidAmount=$_GET['DA78705934029110939035'];
$PaidContestId=$_GET['DC78705934029110939035'];
$PaidCurr=$_SESSION['payCurr'];


                      $payfetch="SELECT * FROM contestpart WHERE part_payid='$PaidId'";
                    $payfetchq=mysqli_query($conn, $payfetch);
                   $total=mysqli_num_rows($payfetchq)+1;
          if($paiddata=mysqli_fetch_assoc($payfetchq)>0){
            
           echo '

<div class="alert alert-warning alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Alert! </strong>Payment Already Participated
                  </div>
                  <div class="alert alert-warning fade show" style="text-align:left">
             
                    <strong style="float-left">Payment ID:</strong> '.$PaidId.'<br>
                    <strong style="float-left">Name:</strong> '.$PaidName.'<br>
                    <strong style="float-left">Email:</strong> '.$PaidEmail.'
                  </div>
                   <div class="form-row">
                          <button type="button" class="btn btn-success btn-block" onClick="document.location.href = '."'index.php'".'">Go to Home</button>
                        </div>';
                  
                  unset($_SESSION["payID"]);
                  unset($_SESSION["payCurr"]);

                                  }



else{
 

  $paysql="UPDATE `contestpart` SET part_curr='$PaidCurr', part_paystatus='PAID', part_payid='$PaidId'";
   
          if (!$paidq=mysqli_query($conn, $paysql)){

            echo "NO";


          }
          else{

               echo '

<div class="alert alert-success alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Congrats! </strong>Successfully Participated
                  </div>
                  <div class="alert alert-warning fade show" style="text-align:left">
             
                    <strong style="float-left">Payment ID:</strong> '.$PaidId.'<br>
                    <strong style="float-left">Name:</strong> '.$PaidName.'<br>
                    <strong style="float-left">Email:</strong> '.$PaidEmail.'
                  </div>
                   <div class="form-row">
                          <button type="button" class="btn btn-success btn-block" onClick="document.location.href = '."'index.php'".'">Go to Home</button>
                        </div>';
            
           
          }

}





}
}





      


    ?>



  


                  
                  
                 </div>

              </div>
          </div>
      </div>
  </div>
</div>
    

    </section><!-- End About Section -->

   



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