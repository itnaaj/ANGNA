
<?php
$eventType=$_GET['event'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ANGNA  Event</title>
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

<style type="text/css">
    #newpost{
      width: 120px;height:50px;box-shadow:1px 1px 3px 0.5px black; border-radius: 10px 0px 0px 10px; top:30%;right:0;padding: 5px;
    background: orange}
    .todaydate{
        font-size: 10px
      }
    @media (max-width: 768px) {
      .topnavigation *{
        font-size: 10px;
     
    }



  </style>
</head>

<body>

  <!-- ======= Top Bar ======= -->
 <?php
include 'parts/social.php';
?>

  <!-- ======= Header ======= -->
   <?php
   $page="event";
include 'parts/header.php';
 ?>
 <!-- End Header -->



<!--====Counselling Data====-->
<section id="services" class="services section-bg" style="padding-top: 15% ">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Events</h3>
         
          </header>

          <center>
            <div class="container topnavigation">
            <div class="btn-group">
  <button type="button" class="btn btn-<?php if($eventType=='all'){echo "warning";}else{echo "primary";}?>" onclick="window.location.assign('events.php?event=all')" >All</button>
  <button type="button" class="btn btn-<?php if($eventType=='lc'){echo "warning";}else{echo "primary";}?>" onclick="window.location.assign('events.php?event=lc')">Live Counselling</button>
    <button type="button" class="btn btn-<?php if($eventType=='lp'){echo "danger";}else{echo "primary";}?>" onclick="window.location.assign('events.php?event=lp')">Live Play</button>
      <button type="button" class="btn btn-<?php if($eventType=='ls'){echo "info";}else{echo "primary";}?>" onclick="window.location.assign('events.php?event=ls')">Live Session</button>
        <button type="button" class="btn btn-<?php if($eventType=='ue'){echo "dark";}else{echo "primary";}?>" onclick="window.location.assign('events.php?event=ue')">Upcoming Events</button>
         

</div>
</div></center>

        
        <br>
        <br>
        <div class="row">

     <?php
   $page="event";
include 'parts/event_data.php';
 ?>




</div>
</div>
</section>

<!--==== close Counselling Data==-->




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