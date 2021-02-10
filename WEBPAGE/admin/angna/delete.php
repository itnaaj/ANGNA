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
        <title>Tables - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
            include 'parts/sidelist.php';
            ?>


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       

                    	<div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Data Delete Request </h3></div>                 
                                    <div class="card-body">
                                       
                                             

                                    	<?php
                                    	include '../../database/connection.php';
                                    	$Table=$_GET['table'];
                                    	$Column=$_GET['column'];
                                    	$Did=$_GET['id'];

                                    	$delsql="DELETE FROM $Table WHERE $Column=$Did";
                                    	if($delq=mysqli_query($conn,$delsql)){
                                    		echo '<center><h3 style="color:red">Data Deleted</h3></center>
                                    		<hr><center><h5>Deleted data Information</h4></center>
                                    	<hr>
                                    	<p><STRONG>Table Name: </STRONG>'.$Table.'<br>
                                    	<STRONG>Column Name</STRONG>: '.$Column.'<br>
                                    	<STRONG>ID</STRONG>: '.$Did.'<br>
                                    </p>';
                                    	}
                                    	else{
                                    		echo '<center><h2 style="color:red">Not Deleted</h3></center>
                                    		';
                                    	}
                                    	?>
                                    	
                                    
                                    	

                                          
                                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" onclick="window.history.back()" name="AddEvent">Go Back</button></div>
                                        
                      
                                        
                                    </div>
                
                                   
                                </div>
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
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
