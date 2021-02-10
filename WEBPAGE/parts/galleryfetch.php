<section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="section-title">Gallery</h3>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter_school">School</li>
              <li data-filter=".filter_members">Students</li>
              <li data-filter=".filter_pride">Pride</li>
              <li data-filter=".filter_art">Competition</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

<?php
include 'database/connection.php';
$sql="SELECT * FROM gallery";
$q=mysqli_query($conn,$sql);
while($cdata=mysqli_fetch_assoc($q)){

echo ' <div class="col-lg-4 col-md-6 col-6 portfolio-item filter_'.$cdata['gallery_type'].'">
            <div class="portfolio-wrap">
              <img src="assets/img/gallery/'.$cdata['gallery_img'].'" class="img-fluid" alt="'.$cdata['gallery_des'].'">
              <div class="portfolio-info">
                <h4 class="text-info">'.$cdata['gallery_des'].'</h4>
                <div>
                  <a href="assets/img/gallery/'.$cdata['gallery_img'].'" data-gall="portfolioGallery" title="'.$cdata['gallery_des'].'" class="link-preview venobox"><i class="ion ion-eye"></i></a>
                
                </div>
              </div>
            </div>
          </div>';


}
?>

        </div>

      </div>
    </section>