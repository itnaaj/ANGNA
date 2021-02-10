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
                        <h1 class="mt-4">Users</h1>
                        <ol class="breadcrumb mb-4">
                           
                    
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Donation Detail
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Donator Name</th>
                                                <th>Donator Email</th>
                                                <th>Donator Phone</th>
                                                <th>Amount</th>
                                                <th>Payment ID</th>
                                                  <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Donator Name</th>
                                                <th>Donator Email</th>
                                                <th>Donator Phone</th>
                                                <th>Amount</th>
                                                <th>Payment ID</th>
                                                  <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                           <?php
                                           include '../../database/connection.php';

                                           $usersql="SELECT * FROM donation";
                                           $usersqlq=mysqli_query($conn,$usersql);
                                           while($donatedata=mysqli_fetch_assoc($usersqlq)){
                                          

                                             echo '<tr>
                                             
                                                <td>'.$donatedata['donate_id'].'</td>
                                                <td>'.$donatedata['donate_name'].'</td>
                                                 <td>'.$donatedata['donate_email'].'</td>
                                                <td>'.$donatedata['donate_phone'].'</td>
                                                 <td>'.$donatedata['donate_amount'].' '.$donatedata['donate_curr'].'</td>
                                                <td>'.$donatedata['mojo_id'].'</td>
                                                <td><a href="delete.php?table=donation&&column=donate_id&&id='.$donatedata['donate_id'].'"><button class="btn btn-danger">Delete</button></a></td>
                                                
                                                
                                                          </tr>';
                                            }



                                             
                                          
                                           
                                           ?>

                                        </tbody>
                                    </table>
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
