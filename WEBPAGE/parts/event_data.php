
        <?php 
         include 'database/connection.php';

if($eventType=$_GET['event']=="all"){

$EventSql="SELECT * FROM event ORDER BY event_id DESC";
$EventFetch=mysqli_query($conn,$EventSql);
if(mysqli_num_rows($EventFetch)>0){
  while ($TeamData=mysqli_fetch_assoc($EventFetch)) {
    $EventId=  $TeamData["event_id"];
    $EventType=$TeamData["event_type"];
    $EventGuest=   $TeamData["event_guest"];
    $EventTopic= $TeamData["event_topic"];
    $EventDate=  $TeamData["event_date"];
    $EventTime=  $TeamData["event_time"];
    $EventDes=  $TeamData["event_des"];
        $EventImg= $TeamData["event_img"];

    if($EventType=="lc"){
      $res="warning";
      $topbadge="Live Counselling";
    }
    else if($EventType=="ls"){
      $res="info";
      $topbadge="Live Session";
    }
     else if($EventType=="lp"){
        $res="danger";
        $topbadge="Live Play";
    }

       else if($EventType=="ue"){
        $res="dark";
        $topbadge="Upcoming Event";
    }

     else{
        $res="";
        $topbadge="";
    }

    echo ' <div class="col-md-6 col-lg-4 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100" id="'.$EventId.'">
           <div class="card" style="width:100%; margin-bottom: 20px;"><span style="border: none;" class="badge badge-'.$res.' float-right">'.$topbadge.'</span>
    <img class="card-img-top" src="assets/img/event/'.$EventImg.'" alt="Card image" style="width:">
    <div class="card-body">
      <h5 class="card-title">'.$EventGuest.'</h5>
      <p style="font-size: 12px"><i class="fa fa-bullhorn warning"></i>&nbsp; &nbsp;'.$EventTopic.'<br>
      <i class="fa fa-clock-o"></i>&nbsp; &nbsp;'.$EventTime.' '.$EventDate.'</p>
      <a href="'.$EventDes.'" class="btn btn-success float-left">Watch Now</a><a href="#'.--$EventId.'" class="btn btn-danger float-right">Watch Later</a>
    </div>
  </div>       
</div>';

  }
}
}

else{
  $eventType=$_GET['event'];

$EventSql="SELECT * FROM event WHERE event_type='$eventType' ORDER BY event_id DESC";
$EventFetch=mysqli_query($conn,$EventSql);
if(mysqli_num_rows($EventFetch)>0){
  while ($TeamData=mysqli_fetch_assoc($EventFetch)) {
    $EventId=  $TeamData["event_id"];
    $EventType=$TeamData["event_type"];
    $EventGuest=   $TeamData["event_guest"];
    $EventTopic= $TeamData["event_topic"];
    $EventDate=  $TeamData["event_date"];
    $EventTime=  $TeamData["event_time"];
    $EventDes=  $TeamData["event_des"];
    $EventImg= $TeamData["event_img"];

    if($EventType=="lc"){
      $res="warning";
      $topbadge="Live Counselling";
    }
    else if($EventType=="ls"){
      $res="info";
      $topbadge="Live Session";
    }
     else if($EventType=="lp"){
        $res="danger";
        $topbadge="Live Play";
    }

       else if($EventType=="ue"){
        $res="dark";
        $topbadge="Upcoming Event";
    }

     else{
        $res="";
        $topbadge="";
    }


    

    echo ' <div class="col-md-6 col-lg-4 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100" id='.$EventId.'>
           <div class="card" style="width:100%; margin-bottom: 20px;"><span style="border: none;" class="badge badge-'.$res.'">'.$topbadge.'</span>
    <img class="card-img-top" src="assets/img/event/'.$EventImg.'" alt="Card image" style="width:">
    <div class="card-body">
      <h5 class="card-title">'.$EventGuest.'</h5>
      <p style="font-size: 12px"><i class="fa fa-bullhorn warning"></i>&nbsp; &nbsp;'.$EventTopic.'<br>
      <i class="fa fa-clock-o"></i>&nbsp; &nbsp;'.$EventTime.' '.$EventDate.'</p>
      <a href="'.$EventDes.'" class="btn btn-success float-left">Watch Now</a><a href="#'.++$EventId.'" class="btn btn-danger float-right">Watch Later</a>
    </div>
  </div>       
</div>';

  }
}

}



?>

         

