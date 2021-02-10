

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
  ob_start();
if (!empty($_SESSION["Email"])){
  header('location:index.php');
}
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
                      <h4>Log In</h4>
                  </div>
                <?php
               

                  if(isset($_POST['Login'])){
                     $Lmail=$_POST['Lmail'];
                     $Lpass=$_POST['Lpass'];

                     if($Lmail==""){
                       echo '<div class="alert alert-warning alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Warning!</strong> Plase Enter Username
                  </div><script>
                 function chek() {
                document.getElementById("Lmail").style.boxShadow=".5px .5px 5px .5px red";
                 }
                </script>';

                     }
                     else if($Lpass==""){
                       echo '<div class="alert alert-warning alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Warning!</strong> Plase Enter Password
                  </div><script>
                 function chek() {
                document.getElementById("Lpass").style.boxShadow=".5px .5px 5px .5px red";
                 }
                </script>';
                       }
                       else{
                         include 'database/connection.php';
                        $auth="SELECT * FROM user WHERE email='$Lmail' && password='$Lpass'";
                        $authcheck=mysqli_query($conn,$auth);
                        if(mysqli_num_rows($authcheck)>0){
                          
                          $_SESSION["Email"] = $Lmail;

                          if($_GET['action']=="donateBlood"){
                           echo "<script>window.location.replace('donateblood.php?donor=register')</script>";
                          }else{
                           echo "<script>window.location.replace('index.php')</script>";
                          }
                        

                     ob_end_flush();
                        }
                        else{
                         echo '<div class="alert alert-warning alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Oops..!</strong> Email or Password is wrong.Please Enter valid Credentials
                  </div><script>
                 function chek() {
                document.getElementById("Lpass").style.boxShadow=".5px .5px 5px .5px red";
                 }
                </script>';
                        }

                       }

                  }
                  ?>



                  <div class="login-form mt-4">
                      <form method="post">
                        <div class="form-row">
                            <div class="input-group mb-3" id="Lmail">
                               <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                      <input type="text" class="form-control" placeholder="Email" name="Lmail">
                            </div>

                            <div class="input-group mb-3" id="Lpass">
                               <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                      <input type="Password" class="form-control" placeholder="Password" name="Lpass">
                            </div>

                          </div>
                         <div class="form-row">
                        <div class="form-group">
                               
                              </div>
                    </div>                        
                        
                        <div class="form-row">
                            <button type="Submit" class="btn btn-success btn-block" name="Login">Login</button>
                        </div>

                    </form>
                  </div>
               <br>

                   <div class=" row">
                            <div class=" col-md-12">
                              <?php if(!empty($_GET['action'])){$_SESSION['DonateActionSession']=$_GET['action'];} else{$_SESSION['DonateActionSession']="";} ?>
 <a id="login-button" href="<?php echo 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online'; ?>">                                <button type="button" class="btn btn-outline-danger btn-block"><i class="fa fa-google"></i> Continue with Google</button></a>

                            </div>

                          
                            </div>


                            <div class="logi-forgot text-right mt-2">
                      <a href="forgetpassword.php">Forgotten Password?</a>
                  </div>
                  
                              </div>

                           
                  <div class="logi-forgot text mt-2">
                      <a href="signup.php?action=<?php  if(!empty($_GET['action']))echo $_GET['action'];  ?>">Create New Account</a>
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