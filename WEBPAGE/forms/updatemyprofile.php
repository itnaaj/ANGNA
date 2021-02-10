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

else if($_POST['phoneSWith']=="NS"){echo "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  Oops! </strong>Please Choose phone number privacy</div><script>setTimeout(function(){ ;document.getElementById('phoneSWith').focus()}, 2000)</script>
";}


else if($_POST['IAm']=="NS"){echo  "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  Oops! </strong>Please select Current Student/Alumni/Teacher</div><script>setTimeout(function(){ ;document.getElementById('IAm').focus()}, 2000)</script>
";}

else if(strlen($_POST['IAmData'])<1){ echo  "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  Oops! </strong>Please enter a valid Class/Batch/Subject</div><script>setTimeout(function(){ ;document.getElementById('IAmData').focus()}, 2000)</script>
";}

	

else if(strlen($_POST['MyJNV'])<5) {echo  "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  Oops! </strong>Please enter valid JNV with Dist/State</div><script>setTimeout(function(){ document.getElementById('MyJNV').focus()}, 2000)</script>
";}

else if(strlen($_POST['ShortNote'])<4){ echo  "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  Oops! </strong>Please write something about your profession</div><script>setTimeout(function(){document.getElementById('ShortNote').focus()}, 2000)</script>
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
 $phoneSWith=$_POST['phoneSWith'];
 $IAm=$_POST['IAm'];
 $IAmData=$_POST['IAmData'];
$IAmDataProf=$_POST['IAmDataProf'];

$MyJNV=$_POST['MyJNV'];
$ShortNote=$_POST['ShortNote'];

$myEmailAvil="SELECT * FROM user where user_id=$AngnaUid";
$myEmailq=mysqli_query($conn,$myEmailAvil);
$myEmailCurr=mysqli_fetch_assoc($myEmailq)['email'];

if($myEmailCurr==$_POST['Email']){
    
    $UpdateSql="UPDATE user SET name='$FullName', email='$Email', phone='$Phone', phone_privacy='$phoneSWith', gender='$Gender', dob='$Dob', iam='$IAm', user_batch='$IAmData', passout_year='$IAmDataProf', jnv='$MyJNV', add_street='$AddStreet', add_city='$AddCity', add_state='$AddState', shortnote='$ShortNote' WHERE user_id='$AngnaUid'";

if(mysqli_query($conn,$UpdateSql)){
  echo "<div class='alert alert-success'><strong><i class='fa fa-check'></i>  Yaay!  </strong> Profile Updated Successfully</div>
  <script>setTimeout(function(){window.location.replace('index.php');}, 2000)</script>";
}
else{
  echo "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  ERROR!  </strong> Something went wrong. Please try again later. </div><script>setTimeout($('profileEditModal').modal('Show')}, 2000)</script>";
}


}else{
    
    $EmailAvil="SELECT * FROM user WHERE email='$Email'";
$EmailAvilq=mysqli_query($conn,$EmailAvil);
if(mysqli_num_rows($EmailAvilq)>0){
      echo "<div class='alert alert-danger'><strong><i class='fa fa-check'></i>  Oops !  </strong> This Email is already registered with anaother account </div>";
    
    
}else{
    
$UpdateSql="UPDATE user SET name='$FullName', email='$Email', phone='$Phone', phone_privacy='$phoneSWith', gender='$Gender', dob='$Dob', iam='$IAm', user_batch='$IAmData', passout_year='$IAmDataProf', jnv='$MyJNV', add_street='$AddStreet', add_city='$AddCity', add_state='$AddState', shortnote='$ShortNote' WHERE user_id='$AngnaUid'";

if(mysqli_query($conn,$UpdateSql)){
  echo "<div class='alert alert-success'><strong><i class='fa fa-check'></i>  Yaay!  </strong> Profile Updated Successfully</div>
  <script>setTimeout(function(){window.location.replace('index.php');}, 2000)</script>";
}
else{
  echo "<div class='alert alert-danger'><strong><i class='fa fa-times'></i>  ERROR!  </strong> Something went wrong. Please try again later. </div><script>setTimeout($('profileEditModal').modal('Show')}, 2000)</script>";
}

}
    
}

}
?>


