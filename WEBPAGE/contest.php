

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ANGNA  Contest</title>
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
 $page="contest";
include 'parts/header.php';
  include 'googleLog/settings.php';

  if(empty($_SESSION['Email'])){
$Verify='NOTANUSER';
  }
  else{
     if($Verify=='N'){
      header('location:verify.php');
    }
  }
     
 ?>



  <main id="main">

  
      <section id="portfolio-details" class="portfolio-details" style="padding-top: 15% " >
      <div class="container" data-aos="fade-up">

        <div class="portfolio-details-container">
        <center>  <div class="owl-carousel portfolio-details-carousel" style="text-align: center;">

            <?php
            include 'database/connection.php';
            $reelsql="SELECT * FROM contestreel";
            $reelq=mysqli_query($conn,$reelsql);
            while($reelimg=mysqli_fetch_assoc($reelq)){
              echo ' <img src="assets/img/contestreel/'.$reelimg['reelimg'].'" class="img-fluid" alt="">';
            }
            ?>
       
          </div>
        </div>      
        </div>
</center>

    </section>


 


        <?php
         include 'parts/contestfetch.php';
        ?>






  


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