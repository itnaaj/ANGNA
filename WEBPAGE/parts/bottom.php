
<a href="https://wa.me/919110939035"><div class="help-head-BTN" style="  position: fixed;right: 0;bottom:10%;z-index: 2000;">
<div id="help-head-BTN-id">
  <button type="button" class="btn btn-xl" style="background:#25D366; color:white; font-weight:bold; font-size:10px"><i class="fa fa-whatsapp fa-lg" style="anination:shakeme 2s infinite"></i> Need Help?</button></div>
</div></a>




<!--div class="timer_ribbon">
<div class="container-fluid ">
<center>
<small style="font-family: sans-serif;">Submission deadline expire in</small><br>
<span class="badge badge-warning" id="day">-:</span>
<span class="badge badge-warning" id="hour">-:</span>
<span class="badge badge-warning" id="min">-:</span>
<span class="badge badge-warning" id="sec">-</span>
</center>
</div>  

<a href="contest.php"><button class="btn btn-danger" style="font-family: sans-serif; width: 100%; font-size: 10px; position: absolute;bottom: 0; border-radius: 0px;font-weight: bold">CONTEST IS LIVE <i class="fa fa-circle" style="color:green;"></i>  <span class="badge badge-warning" style=" animation: shakeme 2s infinite">Participate Now</span> </button>
</a>
</div>





<script>
var countDownDate = new Date("Oct 25, 2020 24:00:00").getTime();
var x = setInterval(function() {
  var now = new Date().getTime();

  var distance = countDownDate - now;
  
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
  document.getElementById("day").innerHTML = days+"<sub>D</sub>";
  document.getElementById("hour").innerHTML = hours +"<sub>H</sub>";
  document.getElementById("min").innerHTML = minutes+"<sub>M</sub>";
  document.getElementById("sec").innerHTML = seconds+"<sub>S</sub>";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script-->









  <hr><footer id="footer" class="section-bg">
    <div class="footer-top">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">

              <div class="col-sm-6">

                <div class="footer-info">
                  <h3><img src="assets/img/logo.png" style="width:200px"></h3>
                  <p>ANGNA: Association Of Garhwa Navodaya Alumni<br>We are connecting navodayan all over the world.</p>
                </div>

                <div class="footer-newsletter">
                  <h4>DONATE US</h4>
                  <p>Wanna buy a cup of coffee for us? <br><a class="btn btn-danger" href="donation.php">Donate Us</a><br>We are working continuously to create a bond of love.Join us to help our community <br><a class="btn btn-primary" href="signup.php">Get Started</a></p>
                  
                </div>

              </div>

              <div class="col-sm-6">
             

                <div class="footer-links">
                  <h4>Contact Us</h4>
                  <p>
                    JNV Garhwa <br>
                    Jharkhand, <br>
                    India <br>
                    <strong>Phone:</strong> <a href="tel:919691582903">+91 969 158 2093<br></a>
                    <strong>Email:</strong>  <a href="mailto:jnvgangna@gmail.com">jnvgangna@gmail.com<br></a>
                  </p>
                </div>

                <div class="social-links">
                  <a href="" class="twitter"><i class="fa fa-twitter"></i></a>
                  <a href="https://www.facebook.com/groups/jnvangna" class="facebook"><i class="fa fa-facebook"></i></a>
                  <a href="https://www.instagram.com/jnvgangna" class="instagram"><i class="fa fa-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="fa fa-whatsapp"></i></a>
                </div>

              </div>

            </div>

          </div>

          <div class="col-lg-6">

            <div class="form" id="feedback-form">

              <h4>Send us a Feedback</h4>
              <p></p>

              <form action="forms/contact.php" method="post" role="form" class="php-email-form">

                
                <div class="form-group">
                  <input type="text" name="feedbackname" class="form-control" id="feedbackname" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="feedbackemail" id="feedbackemail" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
               
                <div class="form-group">
                  <textarea class="form-control" name="feedbackmessage" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validate"></div>
                </div>

                <div class="mb-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>

                <div class="text-center"><button type="submit" title="Send Message" name="feedbacksubmit">Send Feedback</button></div>
              </form>

            </div>

          </div>

        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>ANGNA</strong>. All Rights Reserved
      </div>
      <div class="credits" style="font-size: 10px">
        Designed with <i class="fa fa-heart"></i> by <a onclick="ViewAdminFb()">Suraj Prakash Gautam</a>
        <script>
function ViewAdminFb(){
  window.open("https://www.facebook.com/itzspgautam", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=1000,width=500,height=800");
}
</script>
      </div>
    </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  </footer>
</div>
