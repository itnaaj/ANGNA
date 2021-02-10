<!DOCTYPE html>
<html lang="en">

<head>

<script data-ad-client="ca-pub-4789957642548526" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ANGNA  Home</title>
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
.effect2{

  box-shadow:1px 1px 5px 1px;
 }
 
 .blinking{
	animation:blinkingText 1s infinite;
}
@keyframes blinkingText{
	0%{		color: red;	}
	50%{	color: transparent;	}
	100%{	color: red;	}
}

</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
        $("#verificationModal").modal("show");
        $("#profileEditModal").modal("show");
    });</script>
</head>

<body>

  <!-- ======= Top Bar ======= -->
<?php
include 'parts/social.php';
$page='index.php';
include 'parts/header.php';
?>
  <!-- ======= Header ======= -->
  

<?php
if(!empty($_SESSION['Email'])){
if($Verify=="N"){
  echo ' <div id="verificationModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Verification Alert</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body"><center>
                <h3><strong>Your account is not verified.</strong></h3>
                <a class="btn btn-danger" href="verify.php">Click here to verify</a>
                <br>
                <br>
                </center>
                
            </div>
        </div>
    </div>
</div>';
} 





if(empty($Gender) OR empty($Iam) OR empty($IamData) OR empty($Phone) OR empty($PhonePrivacy) OR empty($Dob)){
  echo '<script>window.location.replace("profile.php?user_id='.$AngnaUid.'&&action=edit");</script>';
}
}
?>
<script type="text/javascript">
  function meetPrompt(n){
       var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

        document.getElementById('meetPromptBox').innerHTML=this.responseText;
      

  };

}
 xhttp.open("GET", "parts/meetpromptbyuser.php?user_id=<?php echo $AngnaUid; ?>&&prompt="+n, true);
  xhttp.send();
}
 

</script>





 




 <!-- End Header -->
  <section id="hero" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center" data-aos="fade-up">
        <div class="col-md-6 intro-info order-md-first order-last" data-aos="zoom-in" data-aos-delay="100">
          <h2>One Team<br> <span>One Dream</span></h2>
          <div>
            <a href="<?php echo $exploreBTN; ?>" class="btn-get-started scrollto">Explore Now</a>
          </div>
        </div>

        <div class="col-md-6 intro-img order-md-last order-first" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/intro-img.png" alt="" class="img-fluid">
        </div>
      </div>

    </div>
  </section>

  <main id="main">

    <!-- ======= About notice board ======= -->
    <section id="about" class="about" style="padding: 20px">
      <div class="container effect2" data-aos="fade-up" >
        <div class="row">
         
          <div class="col-lg-5 col-md-6" style="padding: 20px">
            <div class="about-img" data-aos="fade-right" data-aos-delay="100">
              <img src="assets/img/angnalogo.jpg" alt="Notice Image">
            </div>
          </div>

          <div class="col-lg-7 col-md-6">
            <div class="about-content" data-aos="fade-left" data-aos-delay="100">
              <h2>Notice Board</h2> 
               <ul>
               <?php
            include 'parts/noticefetch.php';
               ?>
              </ul>

     
            </div>
          </div>
        </div>
      </div>
    </section>





 <!-- ======= Angna Mission and Vission ======= -->
<section id="why-us" style="background:#FEFCFE">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h3>Mission And Vision</h3>
          <p></p>
        </header>

        <div class="row">

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="why-us-img">
              <img src="assets/img/missionandvision.gif" alt="" class="img-fluid" height="400" width="400">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="why-us-content">
              <div class="features clearfix" data-aos="fade-up" data-aos-delay="100">
                <i class="fa fa-crosshairs" style="color: #f058dc;"></i>
                <h4>Mission</h4>
                <p>The ASSOCIATION OF GARHWA NAVODAYA ALUMNI (ANGNA)
(hereafter as “Association”) is formed to consolidate the school’s worldwide
alumni network, to connect alumni to the school and other alumni, to
provide valued services to its members and mainly to support the current
students of the school attaining their goal.</p>
              </div>

              <div class="features clearfix" data-aos="fade-up" data-aos-delay="200">
                <i class="fa fa-eye" style="color: #ffb774;"></i>
                <h4>Vision</h4>
                <p>To see JNVites emerging as a global leader/ a complete human committed to
serve the humanity of India and World, by establishing mutual cooperation,
support, knowledge share and help social sustainable growth through best
education practices from school to universities and experience attained from
all the spheres of life.</p>
              </div>

            </div>

          </div>

        </div>
<hr>
      </div>
      
      
 <!-- ======= contest ======= -->
 <?php
include 'parts/contestfetch.php';
 ?>
 <!-- contest close -->


    <!-- ======= Gallery ======= -->
     <?php
include 'parts/galleryfetch.php';
 ?>
    <!-- End Gallery Section -->

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

