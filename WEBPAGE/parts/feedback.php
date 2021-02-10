 <section id="testimonials" class="testimonials">
      <div class="container" data-aos="zoom-in">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-8">

            <div class="owl-carousel testimonials-carousel">
<?php
 include 'database/connection.php';
$FeedsFetch="SELECT * FROM feedback";
$FeedsFetchQuery=mysqli_query($conn,$FeedsFetch);

if(mysqli_num_rows($FeedsFetchQuery)<1){
echo '<div class="container">
              <center> <h4>No feedback received yet</h4>
               <p>Feel free to write something for us</p>
               <a href="#feedback-form"><button class="btn btn-primary">Send Feedback</button></a></center>
              </div>';
}

else{
  while($Feedback=mysqli_fetch_Assoc($FeedsFetchQuery)){

echo '<div class="testimonial-item">
               
                <h3>'.$Feedback['feedback_user'].'</h3>
                <h4><i class="fa fa-envelope"></i> '.$Feedback['feedback_email'].'</h4>
                <p>
                  '.$Feedback['feedback_data'].'
                </p>
              </div>
';

 }

}



  ?>
          

            </div>

          </div>
        </div>

      </div>
    </section>