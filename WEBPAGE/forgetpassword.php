<?php
if (!empty($_SESSION["Email"])){
 header("Location:index.php");
}
ob_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ANGNA  Login</title>
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
 $page="login";
include 'parts/header.php';
  include 'googleLog/settings.php';
  ?>



  <main id="main">

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
                      <h4>Reset Password</h4>
                  </div>
                  <div class="login-form mt-4" id="otpdata">
                   <div class="alert alert-success alert-dismissible" id="alertbox" style="display: none">
                                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                                   <strong id="alertcontent"></strong>
                      </div>  
                        <div class="form-row">
                                 <div class="input-group mb-3">
                                   <input type="text" class="form-control" placeholder="Enter Email" id="email">
                                      <div class="input-group-append">
                                          <button class="btn btn-success" onclick="otpsend()" id="otpBTN">Send OTP</button>
                                      </div>
                                   </div>

                                   <div class="input-group mb-3">
                                   <input type="hidden" class="form-control" placeholder="Enter OTP" id="otpbox">   
                                   </div>

                          </div>
                        <div class="form-row">
                            <button onclick="submit()" class="btn btn-success btn-block" name="submitotp">Submit</button>
                        </div>

                 
                  </div>




                   <div class="login-form mt-4" id="resetdata" style="display: none;">
                   <div class="alert alert-success alert-dismissible" id="alertboxreset" style="display: none">
                                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                                   <strong id="alertcontentreset"></strong>
                      </div>  
                        <div class="form-row">
                                 <div class="input-group mb-3">
                                   <input type="password" class="form-control" placeholder="New Password" id="newpass">
                                     
                                   </div>

                                   <div class="input-group mb-3">
                                   <input type="password" class="form-control" placeholder="Confirm Password" id="newcpass">   
                                   </div>

                          </div>
                        <div class="form-row">
                            <button onclick="submitnewpass()" class="btn btn-success btn-block" name="submitotp">Submit</button>
                        </div>
                  </div>



               <br>

                



                           
                  <div class="logi-forgot text mt-2">
                      <a href="login.php">Cancel </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
    <script type="text/javascript">
  

      function otpsend(){
          var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
var alertbox=document.getElementById('alertbox');
var res=this.responseText;
if(res=="NF"){
alertbox.style.display="block";
var alertcontent=document.getElementById('alertcontent').innerHTML="This Email is not registered. Please enter a valid email";
}

if(res=="EM"){
alertbox.style.display="block";
var alertcontent=document.getElementById('alertcontent').innerHTML="Email Should not be blank";
}


else{
  startTime();
  emailSent(email,res);
  document.getElementById('otpBTN').setAttribute("disabled","");
   document.getElementById('otpbox').setAttribute("type","text");
alertbox.style.display="block";
var alertcontent=document.getElementById('alertcontent').innerHTML="OTP sent successfully.<br>If not recived,please check in junk mails";

}


    }
  };

 var email=document.getElementById('email').value;
  xhttp.open("GET", "parts/otpandnewpassword.php?email="+email, true);
  xhttp.send();

      }

//email send otp

 function emailSent(a,b){
          var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
var alertbox=document.getElementById('alertbox');
var res=this.responseText;
    }
  };

 var email=document.getElementById('email').value;
  xhttp.open("GET", "REQUEST/MAIL/BACKPAGE/AUTH/OTPAUTH/forgetpassword.php?email="+a+"&&otp="+b, true);
  xhttp.send();

      }

//timer
        var s=60;
function startTime(){
s=s-1;
if(s==0){
  document.getElementById('otpBTN').innerHTML="Resend";
    document.getElementById('otpBTN').removeAttribute("disabled");
}
else{
    document.getElementById('otpBTN').innerHTML="Resend in "+s+"s";
setTimeout(function(){ startTime(); }, 1000);
}

}

//otp send close

    function submit(){
     var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
var alertbox=document.getElementById('alertbox');
var res=this.responseText;


if(res=="MISMAT"){
alertbox.style.display="block";
var alertcontent=document.getElementById('alertcontent').innerHTML="Invalid OTP.Please enter carefully";
}


if(res=="MAT"){
  document.getElementById('otpdata').style.display="none";
  document.getElementById('resetdata').style.display="block";
}


    }
  };

 var email=document.getElementById('email').value;
 var entotp=document.getElementById('otpbox').value;
  xhttp.open("GET", "parts/otpmatchchek.php?email="+email+"&&entotp="+entotp, true);
  xhttp.send();

      }


//otp chek


function submitnewpass(){
     var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
var alertbox=document.getElementById('alertboxreset');
var res=this.responseText;
if(res=="EPT"){
alertbox.style.display="block";
var alertcontent=document.getElementById('alertcontentreset').innerHTML="Password should not be blank";
}

if(res=="LTS"){
alertbox.style.display="block";
var alertcontent=document.getElementById('alertcontentreset').innerHTML="Password is too short.Please choose atleast 6 digit password";
}

if(res=="PCMM"){
alertbox.style.display="block";
var alertcontent=document.getElementById('alertcontentreset').innerHTML="Password and Confirm password missmatch";
}

if(res=="OK"){
  document.getElementById('resetdata').innerHTML='<center><h5>Password changed Successfully</h5></center><a href="login.php" class="btn btn-primary">Login now</a>'

}



    }
  };

 var email=document.getElementById('email').value;
 var pass=document.getElementById('newpass').value;
 var cpass=document.getElementById('newcpass').value;
  xhttp.open("GET", "parts/changepassword.php?email="+email+"&&pass="+pass+"&&cpass="+cpass, true);
  xhttp.send();

      }
 
      






    </script>

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