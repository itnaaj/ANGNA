   <section id="pricing" class="pricing section-bg wow fadeInUp">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Live Contest</h3>
          <p>Participate in our contest and win exclusive prizes.</p>
        </header>

        <div class="row flex-items-xs-middle flex-items-xs-center">


<?php
include 'database/connection.php';
$sql="SELECT * FROM contest ORDER BY contest_id ASC";
$q=mysqli_query($conn,$sql);

if(mysqli_num_rows($q)>0){
  while($cdata=mysqli_fetch_assoc($q)){

  echo '
       <div class="col-xs-12 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <div class="card-header">
              <img src="assets/img/contestreel/'.$cdata['contest_img'].'" style="width:100%;margin-top:-15px"></img>
              </div>
              <div class="card-block">
                <h4 class="card-title" style="font-weight:bold">
                 '.$cdata['contest_name'].'
                </h4>
                <hr>
                <ul class="list-group" style="li{">
                  <li class="list-group-item"><i class="fa fa-trophy" style="color: #FFD700"></i>1st Position Holder:  '.$cdata['contest_1st'].'</li>
                  <li class="list-group-item"><i class="fa fa-trophy" style="color: grey"></i>2nd Position Holder:  '.$cdata['contest_2nd'].' </li>
                 
                
                
                   
                  <li class="list-group-item" style="font-size: 15px;font-weight: bold; color:orange">Entry Fee: '.$cdata['contest_fee'].'</li>
                </ul>
                <hr>
                Last submission date: '.$cdata['contest_lastdate'].'<br><br>
           <a href="contestparticipate.php?cid='.$cdata['contest_id'].'" class="btn">Participate Now</a>
              </div>
            </div>
          </div>';
}

}

else{

  echo '<div class="container">
              <center> <h4>No any contest is live</h4>
               <p>WE will be back soon with awesome contest and prizes</p>
               <a href=""><button class="btn btn-primary">Stay Tuned</button></a></center>
              </div><hr style="height:150px;">';
}

?>



  

        </div>
      </div>

    </section>