<section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3>Team</h3>
          <p>Talent wins games, but teamwork and intelligence win championships.</p>
        </div>

        <div class="row" style="align:center" >


<?php
include 'database/connection.php';
$TeamSql="SELECT * FROM team";
$TeamFetch=mysqli_query($conn,$TeamSql);
if(mysqli_num_rows($TeamFetch)>0){
  while ($TeamData=mysqli_fetch_assoc($TeamFetch)) {
    $TeamName=  $TeamData["team_name"];
    $TeamRole=$TeamData["team_role"];
    $TeamImg=   $TeamData["img"];
    $TeamFb= $TeamData["team_facebook"];
    $TeamWapp=  $TeamData["team_wapp"];
    $TeamTwitter=  $TeamData["team_twitter"];
    $TeamCall=  $TeamData["team_call"];

    echo '<div class="col-lg-3 col-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="assets/img/team/'.$TeamImg.'" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4 style="font-size:15px">'.$TeamName.'</h4>
                  <span>'.$TeamRole.'</span>
                  <div class="social">
                    <a href="'.$TeamFb.'"><i class="fa fa-facebook"></i></a>
                    <a href="'.$TeamWapp.'"><i class="fa fa-whatsapp"></i></a>
                    <a href="'.$TeamTwitter.'"><i class="fa fa-twitter"></i></a>
                    <a href="'.$TeamCall.'"><i class="fa fa-phone"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>';

  }
}


?>
       

        </div>
      </div>
    </section>