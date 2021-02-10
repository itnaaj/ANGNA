

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ANGNA Signup</title>
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

<body onload="chek()">

  <!-- ======= Top Bar ======= -->
<?php
include 'parts/social.php';
?>

  <!-- ======= Header ======= -->
 <?php
 $page="signup";
include 'parts/header.php';
  include 'googleLog/settings.php';
 ?>
<?php
if (!empty($_SESSION["Email"])){
 header("Location:index.php");
}
?>


  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="login" class="about " style="padding-top: 15%; height:130vh; ">

      <div class="container" >
  <div class="row text-center mb-4" >
    
  </div>
  <div class="row text-center" >
      <div class="col-md-6 offset-md-3 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100 ">
          <div class="card" style="box-shadow: 1px 1px 3px .05px">
              <div class="card-body">
                 <form method="post">
                  <div class="login-title">                  
                      <h4>Sign Up</h4>
                  </div>

<?php
if(isset($_POST['Signup'])){

       $Fname=$_POST['Fname'];
       $Gender=$_POST['Gen'];
       $Dob=$_POST['Dob'];
        $Phone=$_POST['Phone'];
        $Email=$_POST['Email'];
        $Pass=$_POST['Pass'];
        $Cpass=$_POST['Cpass'];

        if ($Fname=='') {
          echo '<div class="alert alert-warning alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Warning!</strong> Plase Enter your Fullname.
                  </div><script>
                 function chek() {
                document.getElementById("Fname").style.boxShadow=".5px .5px 5px .5px red";
                 }
                </script>';
                  }
        else if ($Dob=='') {
          echo '<div class="alert alert-warning alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Warning!</strong> Plase Enter your Date Of Birth
                  </div><script>
                 function chek() {
                document.getElementById("Dob").style.boxShadow=".5px .5px 5px .5px red";
                 }
                </script>';
                  }

                      else if ($Phone=='') {
          echo '<div class="alert alert-warning alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Warning!</strong> Plase Enter your Phone Number
                  </div><script>
                 function chek() {
                document.getElementById("Phone").style.boxShadow=".5px .5px 5px .5px red";
                 }
                </script>';
                  }

                      else if ($Email=='') {
          echo '<div class="alert alert-warning alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Warning!</strong> Plase Enter your Email
                  </div><script>
                 function chek() {
                document.getElementById("Email").style.boxShadow=".5px .5px 5px .5px red";
                 }
                </script>';
                  }

                                  else if ($Pass=='') {
          echo '<div class="alert alert-warning alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Warning!</strong> Plase Enter your Password
                  </div><script>
                 function chek() {
                document.getElementById("Pass").style.boxShadow=".5px .5px 5px .5px red";
                 }
                </script>';
                  }
else{

                   if($Pass==$Cpass){  
                    include 'database/connection.php';


                    $Avil="SELECT * FROM user Where Email='$Email'";
                    $AvilCheck=mysqli_query($conn,$Avil);
                    if(mysqli_num_rows($AvilCheck)>0){

                      echo '<div class="alert alert-warning alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Warning!</strong> Already Registered with this Email address.
                  </div><script>
                 function chek() {
                document.getElementById("Email").style.boxShadow=".5px .5px 5px .5px red";
                 }
                </script>';

                    }

                    else{
                                          $sql = "INSERT INTO user (name, gender, dob, phone,email, password,verify)
VALUES ('$Fname' , '$Gender','$Dob','$Phone','$Email','$Pass','N');";
if ($conn->multi_query($sql) === TRUE) {
  echo '<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Registration Successfull!</strong></div>';


          $_SESSION["Email"] = $Email;

                         
                           echo "<script>setTimeout(function(){window.location.replace('verify.php');}, 3000)</script>";
                         


} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
                    }
                 



                         }
                   else{

                     echo '<div class="alert alert-warning alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Warning!</strong> Password and Confirm Password missmatch
                  </div><script>
           
                document.getElementById("Cpass").style.boxShadow=".5px .5px 5px .5px red";
                 
                </script>';


                   }
}

}

  ?>


            <div class="login-form mt-4">
                      <form>
                        <div class="form-row">

                           <div class="input-group mb-3" id="Fname">
                               <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                      <input type="text" class="form-control" placeholder="Fullname" name="Fname" >
                            </div>

                             <div class="input-group mb-3 " style="float: left; width: 50%">
                              <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fa fa-male"></i></span>
                                </div>
                               <select name="Gen" class="custom-select">
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Other">Other</option>
                                   </select>
                            </div>

                             <div class="input-group mb-3" style="float: right; width: 50%" id="Dob">
                               <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-calendar-o"></i></span>
                                </div>
                                <input type="date" class="form-control" name="Dob" placeholder="DOB">
                            </div>

                             <div class="input-group mb-3" id="Phone">
                               <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Phone Number" name="Phone">
                            </div>

                            <div class="input-group mb-3" id="Email">
                               <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                                      <input type="text" class="form-control" placeholder="Email" name="Email">
                            </div>

                            <div class="input-group mb-3" id="Pass">
                               <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                 <input type="password" class="form-control" placeholder="Password" name="Pass">
                            </div>


                            <div class="input-group mb-3" id="Cpass">
                               <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                      <input type="password" class="form-control" placeholder="Confirm Password" name="Cpass">
                            </div>

                          </div>
                         <div class="form-row">
                        <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="updatecheck1" required>
                                  <label class="form-check-label" for="updatecheck1">
                                    <small>By submitting this form you agree to our <a href="#">terms and conditions </a> </small>
                                    
                                  </label>
                                </div>
                              </div>
                    </div>                        
                        
                        <div class="form-row">
                            <button type="submit" name="Signup" class="btn btn-success btn-block">signup</button>
                        </div>
                    </form>
                  </div>
                  <br>
                          

 <div class=" row">
                            <div class=" col-md-12">
                               <?php if(!empty($_GET['action'])){$_SESSION['DonateActionSession']=$_GET['action'];} else{$_SESSION['DonateActionSession']="";} ?>
 <a id="login-button" href="<?php echo 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>">                                <button type="button" class="btn btn-outline-danger btn-block"><i class="fa fa-google"></i> Continue with Google</button></a>

                            </div>

                           
                            </div>


                
                  <div class="logi-forgot text mt-2">
                      <a href="login.php">Already Registered? Login Here </a>

                  </div>
                  <br><br>
              
              </div>
            </form>
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