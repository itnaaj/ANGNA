<?php
session_start();
if(empty($_SESSION['AdminEmail'])){
  header('location:../');
}
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
         <title>Admin -ANGNA INSERT-EVENT</title>
        <link href="css/styles.css" rel="stylesheet" />
          <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
       <?php
       include "parts/sidelist.php";
       include "../../database/connection.php";
       ?>
            <div id="layoutSidenav_content">
                <main>
                    <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Insert Event</h3></div>

                                    
                                                                     <?php

                                        if(isset($_POST['AddEvent'])){
                                        
                    $UpName=$_POST['AddGuest'];
                    $UpTopic=$_POST['AddTopic'];  
                    $UpDes=$_POST['AddDes'];
                     $UpDate=$_POST['AddDate'];
                     $UpTime=$_POST['AddTime'];
                     $UpType=$_POST['AddType'];

                     $sqlforfile="SELECT * FROM event";
                     $total=mysqli_num_rows(mysqli_query($conn, $sqlforfile));
                     $prefix=$total+1;
                     $UpImgName=$prefix.'.jpg';
                     $UpImgtemp=$_FILES['AddImg']['tmp_name'];

                   
                                 if(move_uploaded_file($UpImgtemp,"../../assets/img/event/$UpImgName")){
                                         $InsertEvent="INSERT INTO event (`event_id`, `event_type`, `event_guest`, `event_topic`, `event_date`, `event_time`, `event_des`, `event_img`) VALUES ('$prefix','$UpType','$UpName','$UpTopic','$UpDate','$UpTime','$UpDes','$UpImgName')";
                    if(mysqli_query($conn, $InsertEvent)){
                          echo '<div class="alert alert-success alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Done!  </strong> Event Added Successfully
                  </div>';

                    }




                                  
                                 }
                    
                
               
            }
                    

                                    

                                        ?>
                     
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data">
                                             <div class="form-group">
                                                <label class="small mb-1" >Guest</label>
                                                <input class="form-control py-4" name="AddGuest" type="text" placeholder="Enter Guest Name" />
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Topic</label>
                                                        <input class="form-control py-4" name="AddTopic" type="text" placeholder="Topic" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Watch Now Link</label>
                                                        <input class="form-control py-4"  type="text" placeholder="Description" name="AddDes">
                                                    </div>
                                                </div>
                                            </div>
                                         

                                          <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Date</label>
                                                        <input class="form-control py-4" id="inputFirstName" type="date" placeholder="Date" name="AddDate">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Time</label>
                                                        <input class="form-control py-4" type="time" placeholder="Time" name="AddTime">
                                                    </div>
                                                </div>
                                            </div>

                                          

                                               <div class="form-group">
                                                 <label class="small mb-1" for="inputLastName">Event Type</label>
                                                <div><select class="form-control" name="AddType">
                                                    <option value="lc" selected>Live Counselling</option>
                                                      <option value="lp">Live Play</option>
                                                        <option value="ls">Live Session</option>
                                                          <option value="ue">Upcoming Session</option>
                                                            <option value="cpt">Competition</option>
                                                </select></div>
                                            </div>

                                             <div class="form-group">
                                                 <label class="small mb-1" >Event Poster</label>
                                                <div class="form-control">
                                                    <input type="file" name="AddImg">
                                                      
                                                </div>
                                            </div>
                                    


                                          
                                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit" name="AddEvent">Add Data</button></div>
                                        </form>
                      
                                        
                                    </div>
                
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                  
                </main>
                 <?php
               include 'parts/footer.php';
               ?>
            </div>
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
