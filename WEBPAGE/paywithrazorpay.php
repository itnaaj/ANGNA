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

  <title>ANGNA Billing Details</title>
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
if($_POST['payment-type']=="Donation"){
    $page="donate";
}
else{
 $page="contest";
}

include 'parts/header.php';
  include 'googleLog/settings.php';
   require_once "rp/constants.php";
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
                      <h4><?php echo $_POST['payment-type']; ?> : Confirmation</h4>
                  </div>
         






 <?php 
 include 'database/connection.php';
$DDes=$_POST['payment-type'];
$DName=$_POST['DName'];
$DClass=$_POST['DClass'];
$DRoll=$_POST['DRoll'];
$DPhone=$_POST['DPhone'];
$DEmail=$_POST['DEmail'];
$DAmount=$_POST['DAmount'];
$DDes=$_POST['payment-type'];
$DPartGroup=$_POST['part_group'];
if($DDes=="Angna Contest Participate"){
    $DCid=$_POST['contest-id'];

      $DFile=$_FILES['DFile']['tmp_name'];

                       


                   
                    $PaidFileName=$_GET['filename'];
                     $PaidFileName2=$_GET['filename2'];
                      $PaidFileName3=$_GET['filename3'];
                       $PaidFileName4=$_GET['filename4'];
          


                    $existC="SELECT * FROM contestpart WHERE part_file='$PaidFileName'";
                    $existQ=mysqli_query($conn, $existC);
                    if(mysqli_num_rows($existQ)>0){

                      if($DAmount=="FREE"){

               echo '<div class="alert alert-primary alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Alert:</strong>Already Participated.
                  </div>';
            }
            else{
               echo ' <div class="alert alert-danger alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Alert: </strong>File Uploaded. Please Complete Payment to participate.
                  </div>';
            }

                    }

                    else{

                         if(!empty($_FILES['DFile']['tmp_name'])){
                                                                      $DFile=$_FILES['DFile']['tmp_name'];
                                                                       if(move_uploaded_file($DFile,"assets/img/contestparticipate/$PaidFileName")){$a="T"; $LoadSms='<span class="badge badge-pill badge-primary">Page Uploaded</span>';}
                                                                    }
                                                                  else{
                                                                    $PaidFileName="";
                                                                    $a="T";
                                                                    $LoadSms="";
                                                                  }



                              if(!empty($_FILES['DFile2']['tmp_name'])){
                                                                      $DFile2=$_FILES['DFile2']['tmp_name'];
                                                                       if(move_uploaded_file($DFile2,"assets/img/contestparticipate/$PaidFileName2")){$a2="T";$LoadSms2='<span class="badge badge-pill badge-primary">Page 2 Uploaded</span>';}
                                                                    }
                                                                  else{
                                                                    $PaidFileName2="";
                                                                    $a2="T";
                                                                    $LoadSms2="";

                                                                  }

                               if(!empty($_FILES['DFile3']['tmp_name'])){
                                                                      $DFile3=$_FILES['DFile3']['tmp_name'];
                                                                       if(move_uploaded_file($DFile3,"assets/img/contestparticipate/$PaidFileName3")){$a3="T";$LoadSms3='<span class="badge badge-pill badge-primary">Page 3 Uploaded</span>';}
                                                                    }
                                                                  else{
                                                                    $PaidFileName3="";
                                                                    $a3="T";
                                                                    $LoadSms3="";
                                                                  }



                           if(!empty($_FILES['DFile4']['tmp_name'])){
                                                                      $DFile4=$_FILES['DFile4']['tmp_name'];
                                                                       if(move_uploaded_file($DFile4,"assets/img/contestparticipate/$PaidFileName4")){$a4="T"; $LoadSms4='<span class="badge badge-pill badge-primary">Page 4 Uploaded</span>';}
                                                                    }
                                                                  else{
                                                                    $PaidFileName4="";
                                                                    $a4="T";
                                                                    $LoadSms4="";
                                                                  }








                           if($a=="T" && $a2=="T" && $a3=="T" && $a4=="T"){
                        $paysql="INSERT INTO `contestpart` (`part_name`, `part_email`, `part_phone`, `part_amount`,`part_paystatus`,`part_file`,`part_contest_id`,`part_group`,`ex_2`,`ex_3`,`ex_4`,`part_class`,`part_roll`) VALUES ('$DName', '$DEmail', '$DPhone', '$DAmount', 'PENDING', '$PaidFileName','$DCid','$DPartGroup','$PaidFileName2','$PaidFileName3','$PaidFileName4','$DClass','$DRoll')";
   
              if ($paidq=mysqli_query($conn,$paysql)){
            
            if($DAmount=="FREE"){
                  if($DCid=="1"){$DC="Mehandi Design Contest";}
                  if($DCid=="2"){$DC="Art Contest";}
                  if($DCid=="3"){$DC="Essay Writing Contest";}
                  if($DPartGroup=="A"){$DPG="11th and 12th ";}
                  if($DPartGroup=="B"){$DPG="9th and 10th";}
                  if($DPartGroup=="C"){$DPG="6th to 8th ";}
                  
$to = $DEmail;
$subject = "ANGNA CONTEST";

$message = '

<html>
<head>
<title>ANGNA CONTEST</title>
</head>
<body>
<table class="body-wrap" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; width: 100%; background-color: orange; margin: 0;" bgcolor="red">
    <tbody>
    
                                    
        <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
            <td style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
            <td class="container" width="600" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
                <div class="content" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                    <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope="" itemtype="http://schema.org/ConfirmAction" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
                        <tbody>
                            
                        <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block" itemprop="handler" itemscope="" itemtype="http://schema.org/HttpActionHandler" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding:20px 0px 20px 20px; background:#f5f6fa" valign="top">
                                            <img src="https://www.jnvangna.com/assets/img/logo.png" style="width:100px">
                                        </td>
                                    </tr>
                        
                        
                        <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td class="content-wrap" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;padding: 30px; background-color: #fff;" valign="top">
                                <meta itemprop="name" content="Confirm Email" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <table width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <tbody><tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; margin: 0;">
                                        <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                           
                                              
                                          <b> Hello '.$DName.'!</b><br><br>
Thanks for participating in <b>ANGNA live contest</b>,<br> organised on the series of our <b>1st Virtual Alumni Meet.(8th November, 2020)</b>.
                                        </td>
                                    </tr>
                                    <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">

You have participated in <b> '.$DC.',  Group:  '.$DPartGroup.' ('.$DPG.').</b><br>
Results will be declared on November 8, 2020. Stay Tuned.<br><br>
For any queries, mail us at jnvgangna@gmail.com
                                        </td>
                                    </tr>
                                    <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block" itemprop="handler" itemscope="" itemtype="http://schema.org/HttpActionHandler" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                            <img src="https://www.jnvangna.com/assets/img/function/tick.gif" style="height:100px;width:100px">
                                        </td>
                                    </tr>
                                    <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                            Thanks
                                            
                                            <p>Regards<br>
                                            <b>ANGNA</b></p>
                                        </td>
                                    </tr>

                                    <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; margin: 0;width:100%; background:#f5f6fa;">
                                        <td class="content-block" style="text-align: center;font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 10px; vertical-align: top; margin: 0; padding:20px 0px 20px 20px;" valign="top">
                                           &copy; '.date('Y').' ANGNA
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody></table>
                </div>
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>
';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


$headers .= 'From: ANGNA CONTEST <jnvgangna@gmail.com>' . "\r\n";

mail($to,$subject,$message,$headers);

















               echo '
              <div class="alert alert-success alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Yaay: </strong>Participated successfully.
                  </div>
                   <p><img src="assets/img/function/tick.gif" style="height:200px;width:200px"><br>'.$LoadSms.''.$LoadSms2.''.$LoadSms3.''.$LoadSms4.'</p>
                ';




            }


            else{
               echo ' <div class="alert alert-success alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Done: </strong>File Uploaded successfully. Complete payment to participate
                  </div>';
            }
              
                }
                else{
                   echo ' <div class="alert alert-danger alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Oops.. </strong>Something went wrong
                  </div>';
                }


          }

           else{
                   echo ' <div class="alert alert-danger alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error: </strong>File not Uploaded
                  </div>';
                }

     }
}//if contest
                    
else{
    $DFile="Null";
    $DCid="Null";
}



$InsData="DC78705934029110939035=".$DCid."&&DF78705934029110939035=".$DFile."&&DN78705934029110939035=".$DName."&&DE78705934029110939035=".$DEmail."&&DP78705934029110939035=".$DPhone."&&DA78705934029110939035=".$DAmount."&&DD78705934029110939035=".$DDes;
  ?>


  <div style="<?php if($DAmount=="FREE"){echo "display:none";} else{ echo "display:block"; }?>">

                  <div class="login-form mt-4">
                
<form name="razorpay_frm_payment" class="razorpay-frm-payment" id="razorpay-frm-payment" method="post">
<input type="hidden" name="merchant_order_id" id="merchant_order_id" value="12345"> 
<input type="hidden" name="language" value="EN"> 
<input type="hidden" name="currency" id="currency" value="INR"> 
<input type="hidden" name="surl" id="surl" value="thankyou.php?<?php echo $InsData; ?>"> 
<input type="hidden" name="furl" id="furl" value="failed.php"> 

                        <div class="form-row" >
                          <div class="input-group mb-3">
                               <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fa fa-inr"></i></span>
                                     </div>
                                     <input type="text" class="form-control" id="amount" name="amount" placeholder="amount" value="<?php echo $DAmount; ?>" readonly="readonly">
                                      </div>

                                          <div class="input-group mb-3" >
                               <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fa fa-user"></i></span>
                                     </div>
                                      <input type="text" name="billing_name" class="form-control" id="billing-name"  Placeholder="Name" value="<?php echo $DName; ?>" required> 
                                      </div>

                                          <div class="input-group mb-3" >
                               <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                     </div>
                                        <input type="email" name="billing_email"class="form-control" id="billing-email" Placeholder="Email" value="<?php echo $DEmail; ?>" required>
                                      </div>

                                          <div class="input-group mb-3" >
                               <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                     </div>
                                      <input type="text" name="billing_phone" class="form-control" id="billing-phone" Placeholder="Phone" value="<?php echo $DPhone; ?>" required>
                                      </div>
                           
                            </div>

                          </div>
                        
                        <div class="form-row">
                           <input type="hidden" name="payment-type" id="payment-type" value="Donation"> 
                            <div class="col-md-12"><button type="Submit" class="btn btn-danger btn-block" id="razor-pay-now"> Proceed to Pay</button></div>

                        </div>

                    </form>

                  </div>
                    <div style="<?php if($DAmount=="FREE"){echo "display:block";} else{ echo "display:none"; }?>">
                   <div class="form-row">
                           <input type="hidden" name="payment-type" id="payment-type" value="Donation"> 
                            <div class="col-md-12"><a class="btn btn-primary btn-block" href="index.php"> Go to homepage</a></div>

                        </div>
                 
               </div>
                  </div>
               <br>

              
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



<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">
  jQuery(document).on('click', '#razor-pay-now', function (e) {
    var total = (jQuery('form#razorpay-frm-payment').find('input#amount').val() * 100);
    var merchant_order_id = jQuery('form#razorpay-frm-payment').find('input#merchant_order_id').val();
    var merchant_surl_id = jQuery('form#razorpay-frm-payment').find('input#surl').val();
    var merchant_furl_id = jQuery('form#razorpay-frm-payment').find('input#furl').val();
    var card_holder_name_id = jQuery('form#razorpay-frm-payment').find('input#billing-name').val();
    var merchant_total = total;
    var merchant_amount = jQuery('form#razorpay-frm-payment').find('input#amount').val();
    var currency_code_id = jQuery('form#razorpay-frm-payment').find('input#currency').val();
    var key_id = "<?php echo RAZOR_KEY_ID; ?>";
    var store_name = 'ANGNA ';
    var store_description = '<?php echo $DDes ;?>';
    var store_logo = 'http://jnvangna.com/assets/img/function/rplogo.jpg';
    var email = jQuery('form#razorpay-frm-payment').find('input#billing-email').val();
    var phone = jQuery('form#razorpay-frm-payment').find('input#billing-phone').val();
    
    jQuery('.text-danger').remove();

    if(card_holder_name_id=="") {
      jQuery('input#billing-name').after('<small class="text-danger">Please enter full mame.</small>');
      return false;
    }
    if(email=="") {
      jQuery('input#billing-email').after('<small class="text-danger">Please enter valid email.</small>');
      return false;
    }
    if(phone=="") {
      jQuery('input#billing-phone').after('<small class="text-danger">Please enter valid phone.</small>');
      return false;
    }
    
    var razorpay_options = {
        key: key_id,
        amount: merchant_total,
        name: store_name,
        description: store_description,
        image: store_logo,
        netbanking: true,
        currency: currency_code_id,
        prefill: {
            name: card_holder_name_id,
            email: email,
            contact: phone
        },
        notes: {
            soolegal_order_id: merchant_order_id,
        },
        handler: function (transaction) {
            jQuery.ajax({
                url:'rp/callback.php',
                type: 'post',
                data: {razorpay_payment_id: transaction.razorpay_payment_id, merchant_order_id: merchant_order_id, merchant_surl_id: merchant_surl_id, merchant_furl_id: merchant_furl_id, card_holder_name_id: card_holder_name_id, merchant_total: merchant_total, merchant_amount: merchant_amount, currency_code_id: currency_code_id}, 
                dataType: 'json',
                success: function (res) {
                    if(res.msg){
                        alert(res.msg);
                        return false;
                    } 
                    window.location = res.redirectURL;
                }
            });
        },
        "modal": {
            "ondismiss": function () {
             
            }
        }
    };
    // obj        
    var objrzpv1 = new Razorpay(razorpay_options);
    objrzpv1.open();
        e.preventDefault();
            
});
</script>