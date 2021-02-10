<?php
session_start();
if(!empty($_SESSION['AdminEmail'])){
include '../../database/connection.php';
  $Email=$_SESSION['AdminEmail'];
$LogSql="SELECT * FROM user WHERE email='$Email'";
$LogFetch=mysqli_query($conn,$LogSql);
if(mysqli_num_rows($LogFetch)>0){
  while ($LogUser=mysqli_fetch_assoc($LogFetch)) {
    $_SESSION['AdminAngnaUid']=  $LogUser["user_id"];
    $_SESSION['AdminName']=  $LogUser["name"];
    $_SESSION['AdminGender']=$LogUser["gender"];
    $_SESSION['AdminPhone']= $LogUser["phone"];
     $_SESSION['AdminPassword']=  $LogUser["password"];
    $Dp=  $LogUser["user_dp"];
    $GoogleID=$LogUser['google_id'];
    $Dp_C=$LogUser['dp_c'];

    if($Dp==""){
            if($Gender=="Male"){
              $LogUserDp="../../assets/img/function/maledefaultdp.png";
            }
            if($Gender=="Female"){
                 $LogUserDp="../../assets/img/function/femaledefaultdp.png";
            }
    }
    else if($GoogleID==""){
$LogUserDp="../../assets/img/userdp/".$Dp;
    }

    else if(!empty($GoogleID) && !empty($AngnaUid)){

if($Dp_C=="Y"){
  $LogUserDp="../../assets/img/userdp/".$Dp;
}
else{
  $LogUserDp=$Dp;
}

}

    else{
      $LogUserDp=$Dp;
    }

  
}
}
$_SESSION['AdminDp']=$LogUserDp;
}

else{
    echo "dd";
}




?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
                <title>ANGNA- Admin Panel</title>
        <link href="css/styles.css" rel="stylesheet" />
          <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
       <?php
       include "parts/sidelist.php";
       ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                     
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total User : <?php 
                        $usersql="SELECT * FROM user";
                        $userq=mysqli_query($conn,$usersql);
                        echo $user=mysqli_num_rows($userq);
                        ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="usertable.php?id=all">View All</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Total Donation:  <?php 
                        $donationsql="SELECT * FROM donation";
                        $donationq=mysqli_query($conn,$donationsql);
                        $donation=mysqli_num_rows($donationq);
                        $total=0;
                        while($dcount=mysqli_fetch_assoc($donationq)){
                            $total=$total+$dcount['donate_amount'];
                        }
                        echo $total." INR";
                        ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="donation.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Total Contest Participants:  <?php 
                        $partsql="SELECT * FROM contestpart";
                        $partq=mysqli_query($conn,$partsql);
                        echo $part=mysqli_num_rows($partq);
                        ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="contestparttable.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Total Feeds:   <?php 
                        $feedsql="SELECT * FROM feeds";
                        $feedq=mysqli_query($conn,$feedsql);
                        echo $feed=mysqli_num_rows($feedq);
                        ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="feeds.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

            </div>


<div class="container-fluid">
<div class="row">
    <div class="col-md-3">
        <div class="container-fluid">
  <div class="card" style="">
  <img class="card-img-top" src="../../assets/img/angnalogo.jpg" alt="Card image">
  <div class="card-body">
   <center> <p class="card-text">Home Notice Banner</p></center>
    <form method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="noticeimg">
                                        <label class="custom-file-label" for="customFile">Upload image</label>
                                    </div>
                                </div>
                 
    <a href="#"><button class="btn btn-primary" style="width: 100%" name="upload">Change</button></a>
    </form>
    <?php
    ob_start();
if(isset($_POST['upload'])){
    if(move_uploaded_file($_FILES['noticeimg']['tmp_name'],"../../assets/img/angnalogo.jpg")){
            echo "Updated succesfully.If its not updated on dashboard,Please wait a minute";
        header("location:index.php");
        ob_end_flush();
    }
}
    ?>
  </div>
</div>
</div>
</div>


 <div class="col-md-3">
        <div class="container-fluid">
  <div class="card" >
  <img class="card-img-top" src="../../assets/img/feed/donationdefault.jpg" alt="Card image">
  <div class="card-body">
   <center> <p class="card-text">Donation Feed Image</p></center>
    <form method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="donationimg">
                                        <label class="custom-file-label" for="customFile">Upload image</label>
                                    </div>
                                </div>
                 
    <a href="#"><button class="btn btn-primary" style="width: 100%" name="donationupload">Change</button></a>
    </form>
    <?php
    ob_start();
if(isset($_POST['donationupload'])){
    if(move_uploaded_file($_FILES['donationimg']['tmp_name'],"../../assets/img/feed/donationdefault.jpg")){
        header("location:index.php");
        ob_end_flush();
    }
}
    ?>
  </div>
</div>
</div>
</div>



<div class="col-md-6">

<?php
$sqlteam="SELECT * FROM team";
$sqlteamq=mysqli_query($conn,$sqlteam);
while ($team=mysqli_fetch_assoc($sqlteamq)){
    echo '<div class="gedf-card commentbox">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" height="45" src="../../assets/img/team/'.$team['img'].'" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0">'.$team['team_name'].'</div>
                                    <div class="h7"><strong>'.$team['team_role'].'</strong></div>
                                </div>
                            </div>
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                        <div class="h6 dropdown-header">Option</div>
                                        <a class="dropdown-item" href="'.$team['team_facebook'].'"><i class="fa fa-facebook"></i>   Facebook</a>
                                        <a class="dropdown-item" href="'.$team['team_wapp'].'"><i class="fa fa-whatsapp"></i>   Whatsapp</a>
                                        <a class="dropdown-item" href="'.$team['team_twitter'].'"><i class="fa fa-twitter"></i>   Twitter</a>                                  
                                        <a class="dropdown-item" href="tel:'.$team['team_call'].'"><i class="fa fa-phone"></i>   Call</a>
                                        <a class="dropdown-item" href=""><i class="fa fa-trash"></i>   Remove from Admin</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>';
}







?>
 </div>







</div>
</div>
        
                </main>
               <?php
               include 'parts/footer.php';
               ?>
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
