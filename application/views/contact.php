<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="page-header" style="background: url(<?php echo base_url(); ?>img/page-banner.jpg);background-size:cover;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-wrapper">
          <h2 class="page-title">Contact Us</h2>
          <a href="./home">Home</a>
          <span>/</span>
          <span><a href="./contact">Contact</a></span>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="contact" class="container_fluid">
    <div class="mapouter">
      <div class="gmap_canvas"><iframe width="2000" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=19a%20%20toyin%20street%20ikeja%20lagos&t=&z=15&ie=UTF8&iwloc=&output=embed"
          frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de/webdesign/">webdesign
          pure black</a></div>
      <style>.mapouter{text-align:right;height:600px;}.gmap_canvas {overflow:hidden;background:none!important;}</style>
    </div>
    <div class="row">
       <div class='container'>
          <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="row">
                <div class="col-md-12">
                  <h3 class="subheadline mt0">Head Office</h3>
                  <address>
                    <strong>Smart Property Hub Limited</strong><br>
                    19a, Polaris Bank building,<br>
                    Toyin street, Ikeja, Lagos, Nigeria.<br>
                    <abbr title="Phone">P:</abbr> 01 2931012
                  </address>
                </div>
                <div class="col-md-12">
                  <h3 class="subheadline mt0">Office Hours</h3>
      
                  <p>Monday - Friday<span class="float-right"> 9:00am-6:00pm</span></p>
      
                </div>
              </div>
      
            </div>
        <div class="col-md-8 col-lg-7 col-xl-8">
          <div class="card">
            <form>
              <div class="form-group">
                <label for="contact_name">Your Name</label>
                <input type="text" class="form-control" id="contact_name" placeholder="Your Name">
              </div>
              <div class="form-group">
                <label for="contact_email">Your Email</label>
                <input type="email" class="form-control" id="contact_email" placeholder="Your Email">
              </div>
              <div class="form-group">
                <label for="contact_subject">Subject</label>
                <input type="text" class="form-control" id="contact_subject" placeholder="Subject">
              </div>
              <div class="form-group">
                <label for="contact_message">Message</label>
                <textarea rows="4" class="form-control" id="contact_message" placeholder="Message"></textarea>
              </div>
              <div class="g-recaptcha" data-sitekey="6LccY4UUAAAAAEaCl1Nbo3Lls6I8ds7palFt_crc"></div>
              <button type="submit" class="btn btn-lg ">Send Message</button>
            </form>
          </div>
        </div>
       </div>
     
    </div>


</div>