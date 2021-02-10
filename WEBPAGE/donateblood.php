<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ANGNA  Blood Donate</title>
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
  <link href="assets/vendor/icofonts/icofont.min.css" rel="stylesheet">

  <!-- Angna Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/newcss.css">

<style type="text/css">
   
      body{
    background:#eee;    
}
.main-box.no-header {
    padding-top: 20px;
}
.main-box {
    background: #FFFFFF;
    -webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -o-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
    box-shadow: 1px 1px 2px 0 #CCCCCC;
    margin-bottom: 16px;
    -webikt-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}
.table a.table-link.danger {
    color: #e74c3c;
}
.label {
    border-radius: 3px;
    font-size: 0.875em;
    font-weight: 600;
}
.user-list tbody td .user-subhead {
    font-size: 0.875em;
    font-style: italic;
}

a {
    color: #3498db;
    outline: none!important;
}
.user-list tbody td>img {
    position: relative;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    box-shadow: 0px 0px 3px 0px orange;
    float: left;
    margin-right: 15px;
}

.table thead tr th {
    text-transform: uppercase;
    font-size: 0.875em;
}
.table thead tr th {
    border-bottom: 2px solid #e7ebee;
}
.table tbody tr td:first-child {
    font-size: 1.125em;
    font-weight: 300;
}
.table tbody tr td {
    font-size: 0.875em;
    vertical-align: middle;
    border-top: 1px solid #e7ebee;
    padding: 12px 8px;
}
a:hover{
text-decoration:none;
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
   $page="donate";
include 'parts/header.php';
 ?>
 <!-- End Header -->


<?php
$DonorType=$_GET['donor'];

?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php

unset($_SESSION['DonateActionSession']);
if($_GET['donor']=="register"){
  
if(empty($_SESSION['Email'])){
  echo ' <script>
      $(document).ready(function(){
          $("#verificationModal").modal("show");
      });</script>';

}
}

?>



 <div id="verificationModal" class="modal fade" onclick="window.location.replace('login.php?action=donateBlood')" style="background: orange">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alert</h5>
            </div>
            <div class="modal-body"><center>
                <h3><strong>Please Login to register yourself as a Blood Donor.</strong></h3>
                <a class="btn btn-danger" href="login.php?action=donateBlood">Click here to Login</a>
                <br>
                <br>
                </center>
                
            </div>
        </div>
    </div>
</div>


<?php
include 'database/connection.php';
if(!empty($_SESSION['Email'])){
$UserId= $_SESSION['AngnaUid'];
$userSql="SELECT * FROM user WHERE user_id='$UserId'";
$userFetch=mysqli_query($conn,$userSql);

  if($ProfileData=mysqli_fetch_assoc($userFetch)){
    $ProfileDp=$ProfileData['user_dp'];

    if($ProfileDp==""){
      if($ProfileData['gender']=="Male"){
        $ProfileUserDp="assets/img/function/maledefaultdp.png";

      }
      if($ProfileData['gender']=="Female"){
         $ProfileUserDp="assets/img/function/femaledefaultdp.png";
      }


}

else if($ProfileData['google_id']==""){
$ProfileUserDp="assets/img/userdp/".$ProfileDp;

}

else if(!empty($ProfileData['google_id']) && !empty($ProfileData['user_id'])){
                                              if($ProfileData['dp_c']=="Y"){
                                                $ProfileUserDp="assets/img/userdp/".$ProfileDp;
                                                
                                              }
                                              else{
                                                $ProfileUserDp=$ProfileDp; 
                                              }



}

else{
  $ProfileUserDp=$ProfileDp;
}



  };



if($ProfileData['iam']=="CRS"){
$CrsAlmTchr="Current Student";
}

else if($ProfileData['iam']=="ALM"){
$CrsAlmTchr="Alumni";
}

else if($ProfileData['iam']=="TCHR"){
$CrsAlmTchr="Teacher";
}
else{
  $CrsAlmTchr=" Profile Not updated";
}
}


?>




<section id="services" class="services section-bg" style="padding-top: 15% ">
      <div class="container" >

        <header class="section-header">
          <h3><span style="color: red"><i class="icofont-blood-drop" style="color: red"></i>Blood</span> Donation</h3>
          <p>If you’re a blood donor, you’re a hero to someone, somewhere, who received your gracious gift of life.</p>
         
          </header>

          <center>
            <div class="container topnavigation">
            <div class="btn-group" >
  <button type="button" class="btn btn-<?php if($DonorType=='register'){echo "warning";}else{echo "secondary";}?>" onclick="window.location.assign('donateblood.php?donor=register')" style="font-weight: bold;" > Register as a Donor</button>
  <button type="button" class="btn btn-<?php if($DonorType=='search'){echo "warning";}else{echo "secondary";}?>" onclick="window.location.assign('donateblood.php?donor=search')"style="font-weight: bold;"><i class="fa fa-search"></i>  Search a Donor</button>
   
         
</div>
</div></center>

        
        <br>
        <br>



        <div class="row text">



<div class="container" style="display: <?php if($_GET['donor']=='register')echo 'none';else '';?>">
  <div class="input-group mb-3">
  <input class="form-control" id="donorSearch" type="text" placeholder="Search..." style="border: 2px solid orange"> <br>
  <div class="input-group-append">
    <button  class="btn btn-warning" type="button"><i class="fa fa-search"></i></button>
  </div>
</div>
                


<script>
$(document).ready(function(){
  $("#donorSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#donorTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                  <th>&nbsp;</th>
                                <th><span>Donor</span></th>
                                <th><span>  Group</span></th>
                                <th class="text-center"><span>Phone</span></th>
                                <th>Profile/Call</th>
                                </tr>
                            </thead>
                            <tbody id="donorTable">
<?php
$donorsql="SELECT * FROM blood_donor";
$donorsqlq=mysqli_query($conn,$donorsql);
if(mysqli_num_rows($donorsqlq)>0){
    while($donor=mysqli_fetch_assoc($donorsqlq)){
      $DonorAngnaUid=$donor['donor_angnauid'];
      $DpFetch="SELECT * FROM user WHERE user_id='$DonorAngnaUid'";
      $DpFetchq=mysqli_query($conn,$DpFetch);
      $donorDP=mysqli_fetch_assoc($DpFetchq);

          if($donorDP['user_dp']==""){
            if($donorDP['gender']=="Male"){
              $donorUserDp="assets/img/function/maledefaultdp.png";
            }
            if($donorDP['gender']=="Female"){
                 $donorUserDp="assets/img/function/femaledefaultdp.png";
            }
    }

    else if($donorDP['google_id']==""){
$donorUserDp="assets/img/userdp/".$donorDP['user_dp'];
    }

    else if(!empty($donorDP['google_id']) && !empty($AngnaUid)){

if($donorDP['dp_c']=="Y"){
  $LogUserDp="assets/img/userdp/".$donorDP['user_dp'];
}
else{
  $donorUserDp=$donorDP['user_dp'];
}

}

    else{
      $donorUserDp=$donorDP['user_dp'];
    }




      echo '<tr>
                                  <td><img src="'.$donorUserDp.'" alt=""></td>
                                    <td> <a href="profile.php?user_id='.$donor['donor_angnauid'].'" style="font-size: 12px;font-weight: bold">'.$donor['donor_name'].'</a> </td>
                                     <td style="color: red"><b><i class="icofont-blood-drop"></i> '.$donor['donor_bg'].'</b></td>
                                    <td class="text-center"> '.$donor['donor_phone'].'</td>
                                    <td style="width: 20%;">
                                        <a href="profile.php?user_id='.$donor['donor_angnauid'].'" class="table-link text-warning">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <a href="tel:'.$donor['donor_phone'].'" class="table-link text-info">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                    
                                    </td>
                                </tr>';

    }





}
else{
  echo ' <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                           <td class="" style="font-weight:bold; font-size:20px; color:red">   Currently Donors are not avilable</td>
                                </tr>';
}
?>


                                
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>












<div class="container" style="display: <?php if($_GET['donor']=='search')echo 'none';else '';?>">

                <div class="col-md-8 offset-md-2" style="padding:40px; background:orange;color:black;font-weight: bold; border-radius: 5px;box-shadow: 0px 0px 2px 0px ">
                    <form method="post" class="php-email-form" action="forms/insertdonorblood.php">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Full Name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?php echo $ProfileData['name']?>" id="FullName"  name="FullName">
                  <div class="validate" style="color:red" id="FullNameVal"></div>
                            </div>
                        </div>

                        
<?php
$m="";
$f="";
$o="";
$ps="";
$focus="";
if($ProfileData['gender']=="Male"){
  $m="SELECTED";
}

else if($ProfileData['gender']=="Female"){
  $f="SELECTED";
}

else if($ProfileData['gender']=="Other"){
  $o="SELECTED";
}

else{
  $ps='SELECTED';
}
?>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Gender</label>
                            <div class="col-lg-9">
                               <select name="Gender" class="custom-select" id="Gender">
                                  <option value="NS" selected <?php echo $ps; ?>>Please Select Gender</option>
                                  <option value="Male" <?php echo $m; ?>>Male</option>
                                  <option value="Female" <?php echo $f; ?>>Female</option>
                                 <option value="Other" <?php echo $o; ?>>Other</option>
                                </select>
                                  <div class="validate" style="color:red" id="GenderVal"></div>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Date Of Birth</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="Dob" type="date" value="<?php echo $ProfileData['dob']; ?>" id="Dob"> 
                                <div class="validate" style="color:red" id="DobVal"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="Email" type="email" value="<?php echo $ProfileData['email']; ?>" id="Email">
                                 <div class="validate" style="color:red" id="EmailVal"></div>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                            <div class="col-lg-9  ">
                                <input name="Phone" class="form-control" type="phone" value="<?php echo $ProfileData['phone']; ?>" id="Phone">
                             <div class="validate" style="color:red" id="PhoneVal"></div>
                      
                            </div>
                    
                        </div>


                                                <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Blood Group</label>
                            <div class="col-lg-9">
                               <select name="BGroup" class="custom-select" id="BGroup">

                                <option value="NS" selected>Please select Blood Group</option>
                                  <option value="A+" >A+</option>
                                  <option value="B+">B+</option>
                                  <option value="AB+" >AB+</option>
                                 <option value="O+">O+</option>
                                 <option value="A-" >A-</option>
                                  <option value="B-">B-</option>
                                  <option value="AB-" >AB-</option>
                                 <option value="O-">O-</option>
                                </select>
                                  <div class="validate" style="color:red" id="BGroupVal"></div>

                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Have you ever donated blood</label>
                            <div class="col-lg-9">
                               <select name="BloodEd" class="custom-select" onchange="IamDet(this.value)" id="BloodEd">
                                  <option selected value="NS">Please select</option>
                                  <option value="Y" >Yes</option>
                                  <option value="N">No</option>
                                </select>
                                  <div class="validate" style="color:red" id="BloodEdVal"></div>

                            </div>
                        </div>

                        <script type="text/javascript">
                          function IamDet(n){
                            if(n=="Y"){
                              document.getElementById('NeverDonated').style.display="";
                              document.getElementById('crsalmlebel').innerHTML="Last Donation Date (Approx.) ";
                              document.getElementById('IAmData').type="date";
                               document.getElementById('IAmData').setAttribute("required", "");
                            }

                            else{
                                document.getElementById('NeverDonated').style.display="none";
                                document.getElementById('IAmData').removeAttribute("required");
                                document.getElementById('IAmData').type="text";
                                document.getElementById('IAmData').value="NOTDONATED";


                            }

                          }
                        </script>



                        <div class="form-group row" id="NeverDonated" style="display: none;">
                            <label class="col-lg-3 col-form-label form-control-label" id="crsalmlebel"></label>
                            <div class="col-lg-9">
                                <input class="form-control" name="IAmData" type="date" id="IAmData"> 
                                 <div class="validate" style="color:red" id="IAmDataVal"></div>
                            </div>
                        </div>
             
                   


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?php echo $ProfileData['add_street']; ?>" placeholder="Street" name="AddStreet">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-6">
                                <input class="form-control" type="text" value="<?php echo $ProfileData['add_city']; ?>" placeholder="City" name="AddCity">
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="text" value="<?php echo $ProfileData['add_state']; ?>" placeholder="State" name="AddState">
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">write Something about you</label>
                       
                            <div class="col-lg-9">
                               
        <textarea class="form-control" rows="5" name="ShortNote"  id="ShortNote">Write something...</textarea>
             <div class="validate" style="color:red" id="ShortNoteVal"></div>

                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                              <div class="mb-3">
                  <div class="loading" id="updateloader"></div>
                  <div class="error-message"></div>
                  <div class="sent-message" ></div>
                </div>
                                <input type="reset" class="btn btn-secondary" value="Cancel">
                                <input type="submit" class="btn btn-primary" value="Register Now" onclick="loading()">
                                <script>function loading(){
                                  document.getElementById('updateloader').innerHTML='<div class="alert alert-success" data-aos-delay="100"><strong><i class="fa fa-spinner fa-spin"></i>  Processing ! </strong>Hold on......</div>';
                                }</script>
                            </div>
                        </div>
                        </form>
                </div>


</div>





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