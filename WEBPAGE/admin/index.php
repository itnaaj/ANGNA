<?php
session_start();
if(!empty($_SESSION['AdminEmail'])){
  header('location:angna/index.php');
}

?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
         <title>ANGNA | Admin Login</title>
        <link href="angna/css/styles.css" rel="stylesheet" />
          <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
     <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                         <?php
               ob_start();

                  if(isset($_POST['Login'])){
                     $Lmail=$_POST['Lmail'];
                     $Lpass=$_POST['Lpass'];

                  
                       
                         include '../database/connection.php';
                        $auth="SELECT * FROM user WHERE email='$Lmail' AND password='$Lpass' AND badge='ADMIN'";
                        $authcheck=mysqli_query($conn,$auth);
                        if(mysqli_num_rows($authcheck)>0){
                          session_start();
                          $_SESSION["AdminEmail"] = $Lmail;
                        header('Location:angna/');
                     
                        }
                        else{
                         echo '<div class="alert alert-warning alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Oops..!</strong> Either credentials are wrong or you are not admin
                  </div>';
                        }

                       

                  }
                  ?>
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress" >Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress"name="Lmail" type="email" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword" >Password</label>
                                                <input class="form-control py-4" id="inputPassword" name="Lpass" type="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                               
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="mailto:jnvangna@gmail.com">Forgot Password? Contact administrator</a>
                                                <button class="btn btn-primary" name="Login" >Login</button>
                                            </div>
                                        </form>


                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="mailto:jnvangna@gmail.com">Need an account? Contact to admin</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <?php
               include 'angna/parts/footer.php';
               ?>
            </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="angna/js/scripts.js"></script>
    </body>
</html>
