<?php
require_once('settings.php');
require_once('google-login-api.php');

// Google passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])) {
	try {
		$gapi = new GoogleLoginApi();
		
		// Get the access token 
		$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
		
		// Get user information
		$user_info = $gapi->GetUserProfileInfo($data['access_token']);
	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}
?>
<head>
</head>

<body>



</body>
</html>

<?php
include '../database/connection.php';
$Lmail=$user_info['email'];
$Id=$user_info['id'];
$Name=$user_info['name'];
$Dp=$user_info['picture'];


$glogsql="SELECT * FROM user WHERE email='$Lmail'";
$glogquery=mysqli_query($conn, $glogsql);
if(mysqli_num_rows($glogquery)>0){
	session_start();
$_SESSION["Email"] = $Lmail;
 if($_SESSION['DonateActionSession']=="donateBlood"){	
                           echo "<script>window.location.replace('../donateblood.php?donor=register')</script>";
                          }else{
                           echo "<script>window.location.replace('../index.php')</script>";
                          }


}
else{
	 $gloginsert = "INSERT INTO user (google_id,name,email, user_dp,verify)
VALUES ('$Id' , '$Name','$Lmail','$Dp','Y');";
	if($glogquery=mysqli_query($conn, $gloginsert)){
		session_start();
$_SESSION["Email"] = $Lmail;



$to = $Lmail;
$subject = "ANGNA REGISTRATION";

$message = '

<html>
<head>
<title>ANGNA REGISTRATION</title>
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
                                           
                                              
                                          <b> Hello '.$Name.'!</b><br><br>
Thanks for Registration on ANGNA.
</b>.
                                        </td>
                                    </tr>
                                    <tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">

You have registered on ANGNA using Google.<br>Stay connected with navodayans and navodayan alumni all over the word<br><br>
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


$headers .= 'From: ANGNA REGISTRATION <jnvgangna@gmail.com>' . "\r\n";

mail($to,$subject,$message,$headers);









 if($_SESSION['DonateActionSession']=="donateBlood"){	
                           echo "<script>window.location.replace('../donateblood.php?donor=register')</script>";
                          }else{
                           echo "<script>window.location.replace('../index.php')</script>";
                          }



	}

}



?>



