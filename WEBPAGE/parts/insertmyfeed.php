<?php
include '../database/connection.php';
$mydate=getdate(date("U")); 
  $FeedDate="$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
  $FeedTime=date("h:i A");


  $FeedTopic=$_POST['topic'];
  $FeedData=$_POST['datafeed'];
  $AngnaUid=$_POST['uid'];






  if($FeedTopic==""){
              echo '  <div class="alert alert-warning alert-dismissible fade show wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Ooops!</strong> Please enter Topic 
                  </div>';

  }
  else if($FeedData==""){

         echo '<div class="alert alert-warning alert-dismissible fade show wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Ooops!</strong> Please write something.. 
                  </div>';
  }

  else{






    					if(!empty($_FILES["file"]['tmp_name'])){                                                    
                                        $FeedCount="SELECT * FROM feeds";
                                        $FeedCountRes=mysqli_query($conn,$FeedCount);
                                        $FeedIdimg=1+mysqli_num_rows($FeedCountRes);
                                        $FeedImgname=$FeedIdimg.'_'.rand().'.jpg';
                                        $FeedImgtemp=$_FILES['file']['tmp_name'];
                                        $FeedDataFinal=str_replace("'","ANGNACODEAPS", $FeedData);
                                         $FeedTopicFinal=str_replace("'","ANGNACODEAPS", $FeedTopic);
                                          $FeedInsert = "INSERT INTO feeds(feed_uploader_id, feed_upload_time, feed_topic, feed_data,feed_image,feed_upload_date) VALUES('$AngnaUid', '$FeedTime', '$FeedTopicFinal', '$FeedDataFinal','$FeedImgname','$FeedDate')";
                                            $FeedInsertQuery=mysqli_query($conn,$FeedInsert);
                                          if($FeedInsertQuery){

                                              if(move_uploaded_file($FeedImgtemp,"../assets/img/feed/$FeedImgname")){
                                 

                                              echo '<div class="alert alert-success alert-dismissible fade show wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Yaay! </strong> Posted Successfully with image.
                  </div>';
                                                                                             }
                                                      

                                                                }
        

              
                 }

                 else{

                  $FeedDataFinal=str_replace("'","ANGNACODEAPS", $FeedData);
                  $FeedTopicFinal=str_replace("'","ANGNACODEAPS", $FeedTopic);

                 	$FeedInsert = "INSERT INTO feeds(feed_uploader_id, feed_upload_time, feed_topic, feed_data, feed_upload_date) VALUES('$AngnaUid', '$FeedTime', '$FeedTopicFinal', '$FeedDataFinal','$FeedDate')";
                                            $FeedInsertQuery=mysqli_query($conn,$FeedInsert);
                                          if($FeedInsertQuery){
                                                       
                                          	echo '<div class="alert alert-success alert-dismissible fade show wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Yaay! </strong> Posted Successfully
                  </div>';

                         }
                         else{
                         	echo '<div class="alert alert-warning alert-dismissible fade show wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Ooops!</strong> Something went wrong. Please remove  '."'".' from your post. We will fix this silly issue soon.
                  </div>';
                         }

                 }













}


?>

