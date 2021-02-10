	<?php
include '../database/connection.php';
session_start();
$AngnaUid=$_SESSION['AngnaUid'];



if(strlen($_POST['FullName'])<4){echo "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  Oops! </strong>Please enter a valid name</div><script>setTimeout(function(){ ;document.getElementById('FullName').focus()}, 2000)</script>
";
}


else if($_POST['Gender']=="NS"){echo  "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  Oops! </strong>Pleas select your gender</div><script>setTimeout(function(){ ;document.getElementById('Gender').focus()}, 2000)</script>
";
}



else if($_POST['Dob']=="") {echo  "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  Oops! </strong>Please enter your Date of Birth</div><script>setTimeout(function(){ ;document.getElementById('Dob').focus()}, 2000)</script>
";}


 
else if($_POST['Email']=="") {echo  "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  Oops! </strong>Please enter a valid email address</div><script>setTimeout(function(){ ;document.getElementById('Email').focus()}, 2000)</script>
";}


else if($_POST['Phone']<10) {echo  "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  Oops! </strong>Please enter a valid phone number</div><script>setTimeout(function(){ ;document.getElementById('Phone').focus()}, 2000)</script>
";}


else if($_POST['BGroup']=="NS"){echo  "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  Oops! </strong>Pleas select your blood Group</div><script>setTimeout(function(){ ;document.getElementById('BGroup').focus()}, 2000)</script>
";
}


else if($_POST['BloodEd']=="NS"){echo  "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  Oops! </strong>Pleas select if ever donated or not </div><script>setTimeout(function(){ ;document.getElementById('BloodEd').focus()}, 2000)</script>
";
}



else if(strlen($_POST['IAmData'])<5){ echo  "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  Oops! </strong>Please enter a valid Date</div><script>setTimeout(function(){ ;document.getElementById('IAmData').focus()}, 2000)</script>
";}

	


else if(strlen($_POST['ShortNote'])<4){ echo  "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  Oops! </strong>Please write something about you</div><script>setTimeout(function(){document.getElementById('ShortNote').focus()}, 2000)</script>
";}


else{


if(empty($_POST['AddStreet'])){$AddStreet=""; }else{$AddStreet=$_POST['AddStreet'];}

 if(empty($_POST['AddCity'])) {$AddCity=""; }else{$AddCity=$_POST['AddCity'];}

if(empty($_POST['AddState'])) {$AddState=""; }else{$AddState=$_POST['AddState'];}


$FullName=$_POST['FullName'];
$Gender=$_POST['Gender'];
 $Dob=$_POST['Dob'];
 $Email=$_POST['Email'];
 $Phone=$_POST['Phone'];
 $BGroup=$_POST['BGroup']; 
 $IAm=$_POST['BloodEd'];
 $IAmData=$_POST['IAmData'];
$ShortNote=$_POST['ShortNote'];

$myEmailAvil="SELECT * FROM blood_donor where donor_angnauid=$AngnaUid";
$myEmailq=mysqli_query($conn,$myEmailAvil);

if(mysqli_num_rows($myEmailq)==0){
    
    $UpdateSql="INSERT INTO `blood_donor`(donor_angnauid, donor_name, donor_dob, donor_gender, donor_phone, donor_email, donor_bg, donor_street, donor_ed, donor_ldd, donor_dist, donor_state,shortnote) VALUES ('$AngnaUid','$FullName','$Dob','$Gender','$Phone','$Email','$BGroup','$AddStreet','$IAm','$IAmData','$AddCity','$AddState','$ShortNote')";

if(mysqli_query($conn,$UpdateSql)){
  echo "<div class='alert alert-success'><strong><i class='fa fa-check'></i>  Yaay!  </strong> You have registered Sucessfully as a Donor. We will contact your when we need your help</div>
  <script>setTimeout(function(){window.location.replace('donateblood.php?donor=search');}, 4000)</script>";
  

$to =  $Email;
$subject = "ANGNA BLOOD DONOR REGISTRATION";

$message = '

<html>
<head>
<title>ANGNA BLOOD DONOR REGISTRATION</title>
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
                                           
                                              
                                          <b> Hello '.$FullName.'!</b><br><br>
Thanks for Registering yourself as a blood donor on ANGNA.<br>
We will be grateful for your big decision.
</b>.
                                        </td>
                                    </tr>
                                    <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">

We will contact you when we need your help in future.
<br><br>
For any queries, mail us at jnvgangna@gmail.com
                                        </td>
                                    </tr>
                                    <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block" itemprop="handler" itemscope="" itemtype="http://schema.org/HttpActionHandler" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                            <img src="https://www.jnvangna.com/assets/img/function/bloodthanks.gif" style="height:100px;width:100px">
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


$headers .= 'From: ANGNA BLOOD DONOR REGISTRATION <jnvgangna@gmail.com>' . "\r\n";

mail($to,$subject,$message,$headers);


















  
  
  
}
else{
  echo "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  ERROR!  </strong> Something went wrong. Please try again later. </div>";
}


}




else{
    

      echo "<div class='alert alert-danger'><strong><i class='fa fa-check'></i>  OMG!  </strong> You are already registered. </div>";
    

    
}

}
?>


