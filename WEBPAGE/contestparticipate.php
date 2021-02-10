<?php
if(empty($_GET['cid'])){
    header("location: contest.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ANGNA Contest Participate</title>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Angna Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/newcss.css">
  <style>
      @keyframes shakeme {
  0%{ transform:rotate(20deg);transform: scale(1);}
    10%{transform:rotate(-20deg);}
      20%{transform:rotate(20deg);}
        25%{transform:rotate(-20deg);transform: scale(1.1);}
        30%{transform:rotate(20deg);transform: scale(1.2);}
        35%{transform:rotate(-20deg);transform: scale(1.1);}
          40%{transform:rotate(20deg);transform: scale(1);}
        50%{transform:rotate(-20deg);}
         60%{transform:rotate(20deg);}
  100% {transform:rotate(0deg);transform: scale(1);}
}

      
      
.services div{

  text-align: center;
  padding: 5px;

}
.services .service-content{
  background-image: linear-gradient(to bottom right, black,black, grey );
    color: white;
    padding: 20px;
    transition: .5s;


}
.service-content:hover{
  background-image: linear-gradient(to bottom right,grey,black, black );
}

.services .service-content .large-ic{
  background: white;
  padding: 50px;
  font-size: 60px;
  color:#2d3436;  
  border-radius: 50%;

}



.services h3{
font-weight: bold;
line-height:10px;
}

.services .service-content .large-ic:hover{

  animation-name: shakeme;
  animation-duration: 1s;
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


   <?php
   include 'database/connection.php';
   $cid=$_GET['cid'];
    $contestsql="SELECT * FROM contest WHERE contest_id='$cid'";
    $contestq=mysqli_query($conn,$contestsql);
    $Cdata=mysqli_fetch_assoc($contestq);
   ?>


         <section id="contest" class="about " data-aos="fade-up" style="padding-top: 15% ">



<?php
$cidtc=$_GET['cid'];
$tcsql="SELECT * FROM contest WHERE contest_id='$cidtc'";
$tcsqlq=mysqli_query($conn,$tcsql);
$tandc=mysqli_fetch_assoc($tcsqlq);
?>

<div class="container services">
	<div class="row">
		<div class="col-md-12 col-12">   
			<div class="service-content">
				<i class="large-ic fa fa-<?php echo $tandc['contest_tc_icon'];?>"></i><br>
			<h4><?php echo $tandc['contest_name'];?></h4>
			<h6>Organiser: <b><a  href="organiser.php?org_id=<?php echo $tandc['org_id'];?>&&cid=<?php echo $_GET['cid'];?>"><?php echo $tandc['org_name'];?></a></b></h6>
			<hr color="white">
			<p style="text-align: center; text-decoration:underline;font-weight:bold">Terms and Condition </p>
			<div class="service-body">
				    <ul style="text-align:left;font-weight:bold">
				         <li>First Position holder Prize: <?php echo $tandc['contest_1st'];?></li>
				         <li>Second Position holder Prize: <?php echo $tandc['contest_2nd'];?></li>
<?php echo $tandc['contest_tc'];?>
</ul>
</div>
<hr color="white">
	<a class="btn btn-info" href="organiser.php?org_id=<?php echo $tandc['org_id'];?>&&cid=<?php echo $_GET['cid'];?>">View Organiser Profile</a><br><br>
	<a class="btn btn-danger" href="#participatePanel">Accept and Participate</a>
			</div>
		</div>
</div>
	








      <div class="container " id="participatePanel">
  <div class="row text-center mb-4 ">
    
  </div>
  <div class="row text-center">
      <div class="col-md-6 offset-md-3 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
          <div class="card" style="box-shadow: 1px 1px 3px .05px">
              <div class="card-body">

                  <div class="login-title">
                  
                      <h4><b>Participate</b></h4>
                        <button class="btn btn-primary" style="width:100%; border-radious:0">Selected Contest: <b><?php echo $tandc['contest_name']; ?></b></button>




                      
                  </div>
                  <?php
                  include 'database/connection.php';
                  $existCFILE="SELECT part_id FROM contestpart ORDER BY part_id DESC LIMIT 1";
                    $existQFILE=mysqli_query($conn, $existCFILE);
                   $MaxID=mysqli_fetch_assoc($existQFILE);
                   $DCid=$_GET['cid'];
                          if(mysqli_num_rows($existQFILE)==0){
                            $MaxInsID=1;
                          }
                          else{
                             $MaxInsID=$MaxID['part_id']+1;
                           }
                     
                    $PaidFileName=$MaxInsID."_".$DCid."_".rand().".jpg";
                    $PaidFileName2=$MaxInsID."_".$DCid."_2_".rand().".jpg";
                    $PaidFileName3=$MaxInsID."_".$DCid."_3_".rand().".jpg";
                    $PaidFileName4=$MaxInsID."_".$DCid."_4_".rand().".jpg";
               
                  
                  ?>
                  <form method="post" action="paywithrazorpay.php?filename=<?php echo $PaidFileName;?>&&filename2=<?php echo $PaidFileName2;?>&&filename3=<?php echo $PaidFileName3;?>&&filename4=<?php echo $PaidFileName4;?>" enctype="multipart/form-data">
                                             <div class="form-group">
                                                <label class="small mb-1" style="float: left;">Full Name</label>
                                                <input class="form-control py-4" name="DName" type="text" placeholder="Full name" value="<?php if(!empty($_SESSION['Email'])){echo $Name;} ?>" data-msg="Please enter at least 4 chars" required>
                                               </div>

                                               <div class="form-group">
                                                <label class="small mb-1" style="float: left;">Class</label>
                                                <input class="form-control py-4" name="DClass" type="text" placeholder="Enter Your Class" data-msg="Please enter at least 4 chars" required>
                                               </div>

                                               <div class="form-group">
                                                <label class="small mb-1" style="float: left;">Roll Number</label>
                                                <input class="form-control py-4" name="DRoll" type="text" placeholder="Enter Your Roll" data-msg="Please enter at least 4 chars" required>
                                               </div>



                                             <div class="form-group">
                                                <label class="small mb-1" style="float: left;">Email</label>
                                                <input class="form-control py-4" name="DEmail"  type="email" placeholder="Email" value="<?php if(!empty($_SESSION['Email'])){echo $Email;} ?>" required>
                                               </div>

                                                 <div class="form-group">
                                                <label class="small mb-1" style="float: left;">Phone</label>
                                                <input class="form-control py-4" name="DPhone" type="phone" placeholder="Phone number" value="<?php if(!empty($_SESSION['Email'])){echo $Phone;} ?>" required>
                                               </div>

                                            <div class="form-group">
  <label class="small mb-1" style="float: left;">Select Group</label>
  <select class="form-control" id="sel1" name="part_group" required>
    <option value="A">A. 11th & 12th</option>
    <option Value="B">B: 9th & 10th</option>
    <option Value="C">C: 6th to 8th</option>
  </select>
</div>

<div class="row">
  <div class="col-md-3 col-3">
    <img width="100%"style="max-height: 100px; " id="output"> 
  </div>

   <div class="col-md-3 col-3">
    <img width="100%"style="max-height: 100px; " id="output2"> 
  </div>

   <div class="col-md-3 col-3">
    <img width="100%"style="max-height: 100px; " id="output3"> 
  </div>

   <div class="col-md-3 col-3">
    <img width="100%" style="max-height: 100px; "id="output4"> 
  </div>


</div>  

                                                  
                                                 <label class="small mb-1" style="text-align: left;">File  (Scanned Image/pdf of your art,Essey etc)</label>
                                              
                                  
                                                  <div class="form-group" id="page1" style="">      
                                                    <input type="file" id="myInput"  name="DFile" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" style="width:100%;border: 1px solid grey" required>
                                                 </div>

                                                 <div class="form-group" style="display: none;" id="page2"> Page 2     
                                                    <input type="file" id="myInput"  name="DFile2" onchange="document.getElementById('output2').src = window.URL.createObjectURL(this.files[0])" style="width:100%;border: 1px solid grey">
                                                 </div>
                                              
                                              <div class="form-group"  style="display: none;" id="page3"> Page 3    
                                                    <input type="file" id="myInput"  name="DFile3" onchange="document.getElementById('output3').src = window.URL.createObjectURL(this.files[0])" style="width:100%;border: 1px solid grey">
                                                 </div>
                                              
                                              <div class="form-group"  style="display: none;" id="page4"> Page 4    
                                                    <input type="file" id="myInput"  name="DFile4" onchange="document.getElementById('output4').src = window.URL.createObjectURL(this.files[0])" style="width:100%;border: 1px solid grey">
                                                 </div>

                                              
                                                 <?php
                                                 if($_GET['cid']=="3"){
                                                  echo '  <button type="button" class="btn btn-primary" onclick="addPage();"><i   class="fa fa-plus"></i> Add Page</button>

                                                   <script type="text/javascript">
                                                    var i=2;
                                                     function addPage(){
                                                      var page="page"+i;
                                                      if(i>=5){
                                                        alert("More then 4 pages are not allowed")
                                                      }
                                                      else{
                                                         document.getElementById(page).style.display="block";
                                                        i++;
                                                      }
                                                     }


                                     </script>
              
';
                                                 }
                                                 ?>

                                                
                                                 <div class="form-group">
                                                <label class="small mb-1" style="float: left;">Entry Fee</label>
                                                <input class="form-control py-4" type="text" placeholder="Full name" value="<?php echo $Cdata['contest_fee']; ?> INR" readonly="" >
                                               </div>

                                                <div class="form-row">
                                                        <input type="hidden" name="contest-id" id="payment-type" value="<?php echo $Cdata['contest_id']; ?>"> 
                                                         <input type="hidden" name="DAmount" id="DAmount" value="<?php echo $Cdata['contest_fee']; ?>"> 
                           <input type="hidden" name="payment-type" id="payment-type" value="Angna Contest Participate"> 
                            <div class="col-md-12"><button type="Submit" class="btn btn-danger btn-block" name="DPay"> Proceed To Participate</button></div>

                        </div>



        </form>
               

                  
                </div>          
              </div>
          </div>
      </div>
  </div>
</div>
</div>

<hr color="black">
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
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</body>

</html>