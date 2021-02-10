<?php
session_start();
if(empty($_SESSION['AdminEmail'])){
  header('location:../');
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
     <title>Admin -ANGNA Participants</title>
        <link href="css/styles.css" rel="stylesheet" />
          <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        
       	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="assets/demo/table2ex/dist/jquery.table2excel.min.js"></script>

        
    </head>
    <body class="sb-nav-fixed">
        <?php
            include 'parts/sidelist.php';
            ?>


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Participants</h1>
                        <ol class="breadcrumb mb-4">
                          

<script>
			$(function() {
				$(".exportToExcel").click(function(e){
				
					var table = $(this).prev('.table2excel');
					if(table && table.length){
						var preserveColors = (table.hasClass('table2excel_with_colors') ? true : false);
						$(table).table2excel({
							exclude: ".noExl",
							name: "Excel Document Name",
							filename: "myFileName" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
							fileext: ".xls",
							exclude_img: true,
							exclude_links: true,
							exclude_inputs: true,
							preserveColors: preserveColors
						});
					}
				});
				
			});
		</script>
                    
                        </ol>

<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               Contest Participants Data
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table2excel" id="dataTable" width="100%" cellspacing="0" id="toExcel">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Time and Date</th>
                                                <th>Contest ID</th>
                                                 <th>Group</th>
                                                <th>Participants Name</th>
                                                 <th>Class</th>
                                                  <th>Roll</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Amount</th>
                                                <th>Currency</th>
                                                <th>Payment Status</th>
                                                <th>Payment ID</th>
                                                 <th>Sheet 1</th>
                                                 <th>Sheet 2</th>
                                                 <th>Sheet 3</th>
                                                 <th>Sheet 4</th>
                                                 <th>Action</th>

                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                  <th>ID</th>
                                                  <th>Time and Date</th>
                                                <th>Contest ID</th>
                                                <th>Group</th>
                                                <th>Participants Name</th>
                                                 <th>Class</th>
                                                  <th>Roll</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Amount</th>
                                                <th>Currency</th>
                                                <th>Payment Status</th>
                                                <th>Payment ID</th>
                                                 <th>Sheet 1</th>
                                                 <th>Sheet 2</th>
                                                 <th>Sheet 3</th>
                                                 <th>Sheet 4</th>
                                                  
                                               
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                           <?php
                                           include '../../database/connection.php';

                                           $usersql="SELECT * FROM contestpart";
                                           $usersqlq=mysqli_query($conn,$usersql);
                                           while($donatedata=mysqli_fetch_assoc($usersqlq)){
                                          

                                             echo '<tr>
                                             
                                                <td>'.$donatedata['part_id'].'</td>
                                                <td>'.$donatedata['part_dt'].'</td>
                                                <td>'.$donatedata['part_contest_id'].'</td>
                                                <td>'.$donatedata['part_group'].'</td>
                                                <td>'.$donatedata['part_name'].'</td>
                                                 <td>'.$donatedata['part_class'].'</td>
                                                  <td>'.$donatedata['part_roll'].'</td>
                                                 <td>'.$donatedata['part_email'].'</td>
                                                 <td>'.$donatedata['part_phone'].'</td>
                                                <td>'.$donatedata['part_amount'].'</td>
                                                 <td>'.$donatedata['part_curr'].'</td>
                                                <td>'.$donatedata['part_paystatus'].'</td>
                                                <td>'.$donatedata['part_payid'].'</td>
                                                <td><img src="../../assets/img/contestparticipate/'.$donatedata['part_file'].'" height="50" width="50"></td>

                                                <td><img src="../../assets/img/contestparticipate/'.$donatedata['ex_2'].'" height="50" width="50"></td>

                                                <td><img src="../../assets/img/contestparticipate/'.$donatedata['ex_3'].'" height="50" width="50"></td>

                                                <td><img src="../../assets/img/contestparticipate/'.$donatedata['ex_4'].'" height="50" width="50"></td>
                                                 
                                                <td><a href="delete.php?table=contestpart&&column=part_id&&id='.$donatedata['part_id'].'"><button class="btn btn-danger">Delete</button></a></td>
                                                
                                                
                                                          </tr>';
                                            }



                                             
                                          
                                           
                                           ?>

                                        </tbody>
                                    </table>
                                     <button class="exportToExcel">EXCEL</button>
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
    
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
