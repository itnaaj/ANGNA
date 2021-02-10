<?php

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
    $Pass=  $LogUser["password"];

  }
}
}
else{

   $Name=  "";
    $Email=  "";
     $Phone=  "";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ANGNA  Donation</title>
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
 $page="donate";
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


<div class="modal" id="qrShowModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">QR CODE</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <center><img src="assets/img/function/upi.jpg" style="width:100%"></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

    <!-- ======= About Section ======= -->
    <section id="login" class="about " style="padding-top: 15% " >

      <div class="container ">
  <div class="row text-center mb-4 ">
    
  </div>
  <div class="row text-center">
      <div class="col-md-6 offset-md-3 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
          <div class="card" style="box-shadow: 1px 1px 3px .05px">
              <div class="card-body">
                  <div class="login-title">
                      <h4>Donation</h4>
                  </div>
         



                  <div class="login-form mt-4">
                      <form method="post" action="paywithrazorpay.php">
                        <div class="form-row">
                          <div class="input-group mb-3" id="Lpass">
                               <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fa fa-user"></i></span>
                                     </div>
                                      <input type="text" class="form-control" name="DName" class="form-control"  Placeholder="Name" value="<?php echo $Name; ?>" required>
                                      </div>

                                          <div class="input-group mb-3" >
                               <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                     </div>
                                      <input type="tel" class="form-control" name="DPhone" class="form-control"  Placeholder="10 digit Mobile Number" value="<?php echo $Phone; ?>" required>
                                      </div>

                                          <div class="input-group mb-3" >
                               <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                     </div>
                                      <input type="email" class="form-control" name="DEmail" class="form-control" Placeholder="Email" value="<?php echo $Email; ?>" required>
                                      </div>

                                          <div class="input-group mb-3" >
                               <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fa fa-inr"></i></span>
                                     </div>
                                      <input type="number" class="form-control" name="DAmount" id="DAmount" class="form-control"  Placeholder="Enter Amount " required="" onkeyup="chekINR()">
                                      </div>
                                      <script type="text/javascript">
                                          function chekINR(){
                           var inr=document.getElementById('DAmount');
                          
                          if(inr.value==0){
                            inr.value=1
                          }
                           
                          
                         }
                                      </script>

                            </div>

                          </div>
                        
                        <div class="form-row">
                           <input type="hidden" name="payment-type" id="payment-type" value="Donation"> 
                            <div class="col-md-12"><button type="Submit" class="btn btn-primary btn-block" name="DPay">Click here to Donate  </button></div>

                        </div><br>


                         <div class="form-row">
                            <div class="col-md-12"><a href="#paymentDetails" type="Submit" class="btn btn-secondary btn-block">Donate Manually </a></div>

                        </div>

                    </form>
                  </div>
               <br>

            </div>

               
              </div>
          </div>
      </div>
  </div>
</div>
    

    </section>
<?php 
include 'database/connection.php';
$paydetsql="SELECT * FROM custompay";
$paydetq=mysqli_query($conn,$paydetsql);
$det=mysqli_fetch_assoc($paydetq);
echo '<div id="paymentDetails">
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Payment Details</h3>
          <p>Want to donate manually? Here are some payment details</p>
        </header>

        <div class="row">

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <div class="icon" style="background: #fceef3;"><i class="fa fa-credit-card-alt"></i></div>
              <h4 class="title"><a href="">BANK ACCOUNT DETAILS</a></h4>
              <p class="description" ><center>'.$det['cus_acc_name'].'<br><strong>ACC:</strong>'.$det['cus_acc'].'  <strong>IFSC:</strong>'.$det['cus_ifsc'].'</strong>
               </center>
              </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="box">
             <div class="icon" style="background: #fceef3;"><i class="fa fa-bold"></i></div>
              <h4 class="title"><a href="">BHIM UPI</a></h4>
               <p class="description" ><center>BHIM UPI ID<br><strong>'.$det['cus_upi'].'</strong>
               </center>
              </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="box">
             <div class="icon" style="background: #fceef3;"><i class="fa fa-qrcode"></i></div>
              <h4 class="title">QR CODE</h4>
              <p class="description" ><center>PayTM<br><strong><h data-toggle="modal" data-target="#qrShowModal">Show QR CODE</h></strong>
               </center>
              </p>
            </div>
          </div>




          <div class="col-md-6 col-lg-4 wow" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <div class="icon" style="background: #fceef3;"><i class="fa fa-inr"></i></div>
              <h4 class="title"><a href="">PayTM</a></h4>
               <p class="description" ><center>PayTM Number<br><strong>'.$det['cus_paytm'].'</strong>
               </center>
              </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
        <div class=" box">
          <div class="icon" style="background: #fceef3;"><i class="fa fa-product-hunt"></i></div>
            <h4 class="title"><a href="">PHONE PAY</a></h4>
             <p class="description" ><center>PhonePay ID<br><strong>'.$det['cus_ppay'].'</strong>
               </center>
              </p>
            </div>
          </div>

        <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="box">
            <div class="icon" style="background: #fceef3;"><i class="fa fa-google"></i></div>
            <h4 class="title"><a href="">GOOGLE pay</a></h4>
             <p class="description" ><center>Google Pay ID<br><strong>'.$det['cus_gpay'].'</strong>
               </center>
              </p>
            </div>
          </div>

      </div>

      </div>
    </section><!-- End Services Section -->
</div>';
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