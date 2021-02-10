

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
  <link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet'>
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

      
 .body-data{
        padding: 150px;
      }

         .body-data img{
        height: 250px;
        width:250px;
        border-radius: 50%;
        box-shadow:  0px -30px 50px black;
        transition: .5s
      }
        .body-data img:hover{
          transform: scale(1.1);
        }

        .body-data .occupation{
          text-align:center
        }

        .body-data .occupation h2{
          font-family:Impact, Charcoal, 
          sans-serif; 
          color:white;
          text-shadow: 0px -30px 20px black;
        }

        .body-data .occupation p{
          text-align: justify; 
          padding:10px; 
          font-family: Arial Black; 
          color:white;
        
        }


       .button-row div button{
        background:transparent;
        width: 100%;
        border:3px solid #0984e3;
        color:#0984e3;
        font-weight: bold;
        transition: .5s;
        border-radius: 0 20px 0 20px

      }
       .button-row div{
        padding: 5px
       }
      .button-row div button:hover{
        background: #0984e3;
        color:white;
      }
  .social-row div{
    padding-top: 20px
  }
.social-row div i{
        color:#0984e3;
        color:white;
        transition: .5s;
        margin: 10px;
        transition: .3s


      }

      .social-row div i:hover{
         animation-name: shakeme;
  animation-duration: 1s;
      }
      


@media screen and (max-width: 767px) {

      

      .body-data{
        background: blue;
        padding: 15px;
        padding-top:100px;
      }


  
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
include 'database/connection.php';
$org_id=$_GET['org_id'];
$orgsql="SELECT * FROM organiser WHERE org_id='$org_id'";
$orgsqlq=mysqli_query($conn,$orgsql);
if(mysqli_num_rows($orgsqlq)>0){
    $org=mysqli_fetch_assoc($orgsqlq);
    
}
else{
    header ("location: index.php");
    echo "<script>alert('No Organiser Found')</script>";
}

?>

<div>
    <hr >
    <div class="container" >
        <h3 style="text-align:center"><?php echo $org['org_name']; ?></h3>
    </div>
    
	<div class="body-data container-fluid" style="background:rgba(0,0,0,.7);">
<div class="container">
	<div class="row">
		<div class="col-md-4 col-12"  style="text-align:center">
			<img src="assets/img/organiser/<?php echo $org['org_dp'];?>" id="myimg">
		</div>
		<div class="col-md-8 col-12 occupation">
			<h2 style="font-family
			:'anton'">I AM <span style="color: #0984e3; " id="myoccupation"></span></h2>
				<p><?php echo $org['org_det'];?> </p>
				<div class="row button-row">
					<div class="col-md-6 col-12 ">
					    <a href="contestparticipate.php?cid=<?php echo $_GET['cid'];?>"><button class="btn">My contest    <i class="fa fa-arrow-right"></i></button></a></div>
					    
					    	<div class="col-md-6 col-12 ">
					    <a href="<?php echo $org['org_insta']; ?>"><button class="btn">More Info <i class="fa fa-arrow-right"></i></button></a></div>
		
				</div>
				<div class="row social-row">
					<div class="col-md-12 col-12 ">
						<h4>
						<a href="<?php echo $org['org_fb']; ?>"><i class="fa fa-facebook"></i></a></a>
							<a href="<?php echo $org['org_tw']; ?>"><i class="fa fa-twitter"></i></a>
							<a href="<?php echo $org['org_insta']; ?>"><i class="fa fa-instagram"></i></a>
							<a href="<?php echo $org['org_wapp']; ?>"><i class="fa fa-whatsapp"></i></a>
							<a href="<?php echo $org['org_yt']; ?>"><i class="fa fa-youtube-play"></i></a>
						</h4>
					</div>
					
				</div>
		</div>
	</div>
</div>
</div>
</div>


     

    
    
    
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="section-title">My Showreel</h3>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <ul id="portfolio-flters">

              <li data-filter=".filter_school" class="btn filter-active"><button class="btn btn-danger">Expand <i class="fa fa-arrows-alt"></i></button></li>
 
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

<?php
include 'database/connection.php';
$sql="SELECT * FROM orgshowreel WHERE org_id='$org_id'";
$q=mysqli_query($conn,$sql);
while($cdata=mysqli_fetch_assoc($q)){

echo ' <div class="col-lg-4 col-md-6 col-6 portfolio-item filter_school">
            <div class="portfolio-wrap">
              <img src="assets/img/organiser/reels/'.$cdata['org_reel_img'].'" class="img-fluid" alt="'.$cdata['id'].'">
              <div class="portfolio-info">
                <h4>'.$cdata['id'].'</h4>
                <div>
                  <a href="assets/img/organiser/reels/'.$cdata['org_reel_img'].'" data-gall="portfolioGallery" title="'.$cdata['id'].'" class="link-preview venobox"><i class="ion ion-eye"></i></a>
                
                </div>
              </div>
            </div>
          </div>';


}
?>

        </div>

      </div>
    </section>
    
    
    
    
    

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
<script>
    $(document).ready(function(){
typeWR();
});

	var occuData = [ <?php echo $org['org_dest'];?>];
	i=0;
	j=0
					function typeWR(){
								data=occuData[i];
								document.getElementById('myoccupation').innerHTML=document.getElementById('myoccupation').innerHTML+data.charAt(j);
									j++;
									if(j>data.length){
										if(i==occuData.length-1){
											i=0;
											}
										else{
											i++;
											}		
											j=0;
											setTimeout(function(){document.getElementById('myoccupation').innerHTML="";typeWR(); },2000);	
											}
									else{
									setTimeout(function(){typeWR(); },100);	
									}
									
						}



    
    
</script>
</body>

</html>