

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ANGNA Feeds</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons icon-->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Angna Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/newcss.css">

  <style type="text/css">



    #newpost{
      width: 120px;height:50px;box-shadow:1px 1px 3px 0.5px black; border-radius: 10px 0px 0px 10px; top:30%;right:0;padding: 5px;
    background: orange}
    .todaydate{
        font-size: 10px
      }
p{
font-size: 13px
}

.commentbox:hover{
  background: #edebe1; 
    color: black;
  transition: .5s;
}
.commentbox:hover .m-0{

}

    @media (max-width: 768px) {
      *{
        font-size: 13px;
      }
      #newpost{
        background: orange;
        height: 30px;
        width: 70px;
        font-size: 10px;
        padding: 0px  
      }

      .todaydate{
        font-size: 1px
      }
    }







  </style>


</head>

<body onload="chek()">

  <!-- ======= Top Bar ======= -->
<?php
include 'parts/social.php';
?>

  <!-- ======= Header ======= -->
   <?php
   $page="feeds";
include 'parts/header.php';
 ?>
 <!-- End Header -->



<!-- The Modal -->
<div class="modal" id="myModalAlert">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Alert</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="myModalAlertData">
   <center>Plese Login to use this feature <br>
   <a href="login.php" class="btn btn-danger">Click here to login</a>
 </center>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>





<!-- The Modal -->
<div class="modal" id="commentModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Comments</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
   <!-- Modal body -->
      <div class="modal-body" id="myCommentData">
     
<center><i class="fa fa-spinner fa-spin" style="color:blue"></i> 
        <i class="fa fa-spinner fa-spin" style="color:green"></i>
        <i class="fa fa-spinner fa-spin" style="color:purple"></i>
        <i class="fa fa-spinner fa-spin" style="color:red"></i>
        <i class="fa fa-spinner fa-spin" style="color:yellow"></i>
</center>
                 

    </div> 

      <div class="modal-footer">
  <?php
if(empty($_SESSION['Email'])){
  echo '  <div class="container alert alert-warning alert-dismissible fade show wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Please Login to comment! <strong><a href="login.php">Login Now</a></strong>
                  </div>';                                                

}

else{
   echo ' 
  <div id="postingstatus" style="width:100%;display:none;transition:.1s;"><div class="alert alert-success" >
 <span id="postingresult"> <strong><i class="fa fa-spinner fa-spin"></i>   Posting! </strong> Hold a second...</div><span>
</div>
  <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Enter comment" name="comm" id="commentdata">
  <div class="input-group-append">
    <button class="btn btn-primary" type="button" onclick="postcomm();" name="postcomm"><i class="fa fa-paper-plane"></i></button>
  </div>
</div> 
';
}

?>


<script>
function postcomm(){
  document.getElementById("postingstatus").style.display="inline";
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

  var feedidforcountupdate=document.getElementById("commentfeedid").value;
var commentid="comcount-"+feedidforcountupdate;
    document.getElementById(commentid).innerHTML=this.responseText;


     var feedidforfetch=document.getElementById("commentfeedid").value;
    document.getElementById("commentdata").value="";
 setTimeout(function(){ loadComment(feedidforfetch); }, 1000);

    }
  };
  var com=document.getElementById("commentdata").value;
  var feedid=document.getElementById("commentfeedid").value;
  var comurl="feedid="+feedid+"&&angnauid=<?php echo $AngnaUid;?>&&com="+com+"&&name=<?php echo $Name; ?>";
  xhttp.open("GET", "parts/commentpost.php?"+comurl, true);
  xhttp.send();
}




</script>
     

      </div>
    </div>
  </div>
</div>






 <a href="#new_post_upload" id="newpost" class="back-to-top" style=" "><i class="fa fa-plus"></i> Add Post</a>
<section id="services" class="services section-bg" style="padding-top: 15% ">



 <div class="row">
            <div class="col-md-3">
               <!--just to occupy-->
            </div>
            <div class="col-md-6 gedf-main" style="padding: 25px">

                <!--- \\\\\\\Post-->


<?php

if(empty($_SESSION['Email'])){
  echo '  <div class="container alert alert-warning alert-dismissible fade show wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Please Login to post something! <strong><a href="login.php">Login Now</a></strong>
                  </div><br></br></br></br>';                                                

}
else{
  $UploadImg="'assets/img/function/new_post_upload.jpg'";
  date_default_timezone_set("Asia/Calcutta");
  $mydate=getdate(date("U"));
$DateToday=date("h:i:A").', '."$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]"; 
echo ' 

  <div class="card gedf-card">
                    <div class="card-header">
<div id="warningforfeed">
                    
</div>

                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Create
                                    a post</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Attach Images</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                <div class="form-group">
                                    <label class="sr-only" for="message">post</label>
                                     <input type="text" class="form-control" id="feedTopic" rows="3" placeholder="Enter Topic" name="FeedTopic"><br>
                                    <textarea class="form-control" id="dataFeed" rows="3" placeholder="What are you thinking?" name="FeedData"></textarea>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file"class="fileToUpload form-control custom-file-input" id="customFile" name="FeedImg" onchange="document.getElementById('."'outputIMG'".').src = window.URL.createObjectURL(this.files[0])">
                                        <label class="custom-file-label" for="customFile">Upload image</label>
                                    </div><br><br>

                                    <div class="row">
  <div class="col-md-3 col-6">
    <img width="100%"style="max-height: 100px;border-radius:20px;; " id="outputIMG"> 
  </div>
</div> 

                                </div>
    
                            </div>
                        </div>
                        <div class="btn-toolbar justify-content-between">
                            <div class="btn-group">
                                <button class="btn btn-primary" onclick="uploadfile()">share</button>
                                 
                            </div>
                            <div class="btn-group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa fa-globe"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> Public</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <br>
';
}



?>




   <!-- Post /////-->
<script type="text/javascript">
$(document).ready(function(){
loadFeeds();
});

  function loadFeeds(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
  document.getElementById("feedsLoadArea").innerHTML=this.responseText;
    }
  };
  xhttp.open("GET", "parts/feedsfetch.php", true);
  xhttp.send();
}
</script>


<script type="text/javascript">
function loadComment(n){
   var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("myCommentData").innerHTML=this.responseText;

document.getElementById("postingresult").innerHTML="Posted Successfully";
      setTimeout(function(){document.getElementById("postingstatus").style.display="none"; }, 1000); 
    }
  };
  var feedid=n;
  xhttp.open("GET", "parts/commentfetch.php?feedid="+feedid, true);
  xhttp.send();
}
//load comment of particular feed close
</script>

<script type="text/javascript">
function insertlike(n,m){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      colorchange(n);
      var counteraID="likebtnid-"+n;
      document.getElementById(counteraID).innerHTML=this.responseText;
    }
  };
  var feedid=n;
  var comurl="feedid="+feedid+"&&angnauid=<?php echo $AngnaUid;?>&&name=<?php echo $Name; ?>";
  xhttp.open("GET", "parts/insertlike.php?"+comurl, true);
  xhttp.send();
}
//insert like close


function colorchange(n){
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

       var statuscID="statuschangeid-"+n;
      if(this.responseText=="Y"){
 document.getElementById(statuscID).style.background='#007AFF';
      }
        if(this.responseText=="N"){
 document.getElementById(statuscID).style.background='#6C757E';
      }
     
    }
  };
  var feedid=n;
  var comurl="feedid="+feedid+"&&angnauid=<?php echo $AngnaUid;?>&&com=";
  xhttp.open("GET", "parts/likecolorchange.php?"+comurl, true);
  xhttp.send();
}
//like btn color change
</script>

<script type="text/javascript">


  function delFeed(n){
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        
      if(this.responseText=="T"){
        document.getElementById('angnafeedid'+n).style.display="none";
        alert("Deleted Successfully");
      }
    }
  };
  var feedid=n;
  var delurl="feedid="+feedid+"&&angnauid=<?php echo $AngnaUid;?>";
  xhttp.open("GET", "parts/deletemypost.php?"+delurl, true);
  xhttp.send();
  }

</script>


<div id="feedsLoadArea">


<center><i class="fa fa-spinner fa-spin" style="color:blue"></i> 
        <i class="fa fa-spinner fa-spin" style="color:green"></i>
        <i class="fa fa-spinner fa-spin" style="color:purple"></i>
        <i class="fa fa-spinner fa-spin" style="color:red"></i>
        <i class="fa fa-spinner fa-spin" style="color:yellow"></i>
</center>

</div>                                                            
   
        </div>
    </div>
      </section>






<script>

function uploadfile(){
document.getElementById('warningforfeed').innerHTML='<div class="alert alert-success alert-dismissible fade show wow bounceInUp" data-aos="zoom-in" data-aos-delay="100"><button type="button" class="close" data-dismiss="alert">&times;</button><strong><i class="fa fa-spinner fa-spin"></i>  Postiong! </strong>Hold on......</div>';

  var topic = $('#feedTopic').val();  
    var datafeed = $('#dataFeed').val();  
    var uid="<?php echo $AngnaUid; ?>";                  //To save file with this name
  var file_data = $('.fileToUpload').prop('files')[0];    //Fetch the file
  var form_data = new FormData();

  form_data.append("file",file_data);
    form_data.append("topic",topic);
  form_data.append("datafeed",datafeed);
    form_data.append("uid",uid);
  //Ajax to send file to upload
  $.ajax({
      url: "parts/insertmyfeed.php",                      //Server api to receive the file
             type: "POST",
             dataType: 'script',
             cache: false,
             contentType: false,
             processData: false,
             data: form_data,

          success:function(dat2){
     
              document.getElementById('warningforfeed').innerHTML=dat2;
              loadFeeds();
    
          }
    });

}


</script>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
<?php
include 'parts/feedback.php';
include 'parts/team.php';
include 'parts/bottom.php';
?><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/js/main.js"></script>

     


</body>

</html>