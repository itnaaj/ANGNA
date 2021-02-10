<?php
include '../database/connection.php';
  $receiving_email_address = 'spgautam.vfx@gmail.com';

$name=$_POST['feedbackname'];
$email=$_POST['feedbackemail'];
$msz=$_POST['feedbackmessage'];

$sql="INSERT INTO feedback (feedback_user,feedback_email,feedback_data) VALUES('$name','$email','$msz')";
if($sqlq=mysqli_query($conn,$sql)){
  echo "Submitted Successfully: Thanks for valuable time";
}

?>
