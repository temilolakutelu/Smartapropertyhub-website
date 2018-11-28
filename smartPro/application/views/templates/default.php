<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>
        <?php echo $title; ?>
    </title>
  <!-- Favicon icon -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.png" type="image/x-icon">
  <!-- Bootstrap -->
  <link href="https://fonts.googleapis.com/css?family=libre+Franklin:100,200,300,400,500,700" rel="stylesheet">

  <link href="<?php echo base_url(); ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>lib/animate.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>lib/selectric/selectric.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>lib/swiper/css/swiper.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>lib/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>lib/Magnific-Popup/magnific-popup.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="<?php echo base_url(); ?>lib/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url(); ?>lib/popper.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo base_url(); ?>lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>lib/selectric/jquery.selectric.js"></script>
  <script src="<?php echo base_url(); ?>lib/swiper/js/swiper.min.js"></script>
  <script src="<?php echo base_url(); ?>lib/aos/aos.js"></script>
  <script src="<?php echo base_url(); ?>lib/Magnific-Popup/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url(); ?>lib/sticky-sidebar/ResizeSensor.min.js"></script>
  <script src="<?php echo base_url(); ?>lib/sticky-sidebar/theia-sticky-sidebar.min.js"></script>
  <script src="<?php echo base_url(); ?>lib/lib.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div id="main">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-over absolute-top" id="menu">
      <div class="container">
        <a class="navbar-brand" href="<?= site_url('home'); ?>"><img src="<?php echo base_url(); ?>img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-content" aria-controls="menu-content"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu-content">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item ">
              <a class="nav-link" href="<?= site_url('plan'); ?>" role="button" aria-haspopup="true" aria-expanded="false">
                Plans
              </a>

            </li>

          </ul>

          <ul class="navbar-nav ml-auto">


            <li class="nav-item dropdown user-account">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <span class="user-image" style="background-image:url('<?php echo base_url(); ?>img/demo/profile3.jpg');"></span> Hi, John
              </a>
              <div class="dropdown-menu">
                <a href="<?= site_url('profile'); ?>" class="dropdown-item">My Profile</a>
                <a href="<?= site_url('password'); ?>" class="dropdown-item">Change Password</a>
                <a href="<?= site_url('notifications'); ?>" class="dropdown-item">Notifications</a>
                <a href="<?= site_url('membership'); ?>" class="dropdown-item">Membership</a>
                <a href="<?= site_url('payment'); ?>" class="dropdown-item">Payments</a>
                <a href="<?= site_url('account'); ?>" class="dropdown-item">Account</a>
              </div>
            </li>
            <li class="nav-item"><a class="nav-link nav-btn" href="<?= site_url('add_listing'); ?>"><span><i class="fa fa-plus"
                    aria-hidden="true"></i> Add listing</span></a></li>
          </ul>

        </div>
      </div>
    </nav>
    <div class="home-search">
      <div class="main search-form v7">
        <div class="container">
          <div class="row justify-content-md-center">
            <div class="col-md-12 col-lg-10">
              <div class="heading">
                <h2>Welcome To SmartPRO</h2>
              </div>
            </div>
          </div>
        </div>
        <video class="search-video" autoplay loop width="0" height="0" src="<?php echo base_url(); ?>img/demo/video.mp4"></video>
      </div>
    </div>

    <div class="clearfix"></div>
  

        <?php echo $body; ?>

    </div>




<button class="btn btn-primary btn-circle" id="to-top"><i class="fa fa-angle-up"></i></button>
    <!-- Footer start -->
    <footer id="footer" class="footer-light">
      <div class="container container-1000">
        <div class="row">
          <div class="col-lg-4">
            <p><img src="img/logo.png" alt=""></p>
            <address class="mb-3">
              <strong>Smart Property Hub</strong><br>
              3rd Floor, 19 Toyin Street, <br>
              Ikeja-Lagos, Nigeria<br>
              <abbr title="Phone">P:</abbr> +234-813 164 8171
            </address>
            <div class="footer-social mb-4"><a href="#" class="ml-2 mr-2"><span class="fa fa-twitter"></span></a> <a
                href="#" class="ml-2 mr-2"><span class="fa fa-facebook"></span></a> <a href="#" class="ml-2 mr-2"><span
                  class="fa fa-instagram"></span></a></div>
          </div>


          <div class="col-lg-4 col-sm-4">
            <div class="footer-links">
              <ul class="list-unstyled">
                <li class="list-title"><a href="#">Help</a></li>
                <li><a href="<?= site_url('payment'); ?>">Payments</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="text-lg-right ml-lg-2">
              <form>
                <div class="list-title">Subscribe</div>
                <div class="input-group input-group-lg">
                  <input type="text" name="email" class="form-control form-control-lg subscribe-input" placeholder="Email">
                  <div class="input-group-append ml-0">
                    <button class="btn subscribe-button" type="button"><i class="fa fa-envelope"></i></button>
                  </div>
                </div>
              </form>
              <div class="footer-payments"><span class="fa fa-cc-visa"></span> <span class="fa fa-cc-mastercard"></span>
                <span class="fa fa-cc-amex"></span> </div>
            </div>
          </div>

        </div>

      </div>
    </footer>
    <!-- Footer end -->
    </div>
</body>

</html>