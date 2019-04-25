<!DOCTYPE html>
<html>


<head>

    <title>
        <?php echo $title; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-submenu/3.0.1/css/bootstrap-submenu.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.4.0/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.scrollbar/0.2.11/jquery.scrollbar.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dropzone.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="<?php echo base_url(); ?>css/skins/default.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.png" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">


</head>


<body>

    <!-- Top header start -->
    <header class="top-header" id="top">
        <div class="container">

            <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                <div class="list-inline">
                    <a href="tel:01 2931012" data-role="none"><i class="fa fa-phone"></i>01 2931012</a>
                    <a href="mail:sales@propertyhub.com.ng" data-role="none"><i class="fa fa-envelope"></i>sales@propertyhub.com.ng</a>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
                <button type="button" class="navbar-toggler navbar-toggle collapsed hidden-md-up pull-right" data-toggle="collapse" data-target="#app-navigation" data-role="none" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="top-social-media">
                    <?php if (!$username) {?>
                        <li>
                            <a href="<?=site_url('login');?>" class="sign-in" data-role="none">
                                <span>Login</span></a>
                        </li>


                        <style>
                            /* Wobble Horizontal */
                        </style>

                        <li>
                            <a href="<?=site_url('register');?>" class="sign-in wobble-horizontal" data-role="none"><i class="fa fa-user"></i>
                                Register</a>

                        </li>
                    <?php
} else {?>

                        <li class="sign-in" style='color:white;'>

                            Logged In</a>
                            <i class="fa fa-sign-in"></i>
                        </li>

                        <li style='background: #0d9ec0;'><a href="<?=site_url('user/profile');?>" style='text-transform: uppercase;color: #fc8c28;font-weight: bold;font-size: 12px;'>
                                <span><?php echo $username; ?></span></a>
                        </li>

                    <?php
}?>

                </ul>

            </div>
        </div>
    </header>
    <!-- Top header end -->

    <!-- Main header start -->


    <header class="main-header">
        <div class="container">
            <nav class="navbar navbar-default ">
                <div class='navbar-header'>
                    <a href="<?=site_url('home');?>" class="logo navbar-brand">
                        <img src="http://propertyhub.com.ng/img/logos/logo.png" alt="logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="navbar-collapse collapse navbar-toggleable" role="navigation" aria-expanded="true" id="app-navigation">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="nav-item"><a class="nav-link" href="<?=site_url('for_sale');?>">For Sale</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=site_url('to_let');?>">To Let</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=site_url('short_let');?>">Short Let</a></li>
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Our Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="<?=site_url('property_mgt');?>">Property Management</a></li>
                                <!-- <li><a href="<?=site_url('facilities');?>">Facilities Management</a></li> -->
                                <li> <a href="<?=site_url('real_estate');?>">Real Estate Financing Advisory</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="<?=site_url('subscription');?>">Subscription</a></li>

                        <li class="nav-item"><a href="<?=site_url('user/submit_request');?>">Submit Request</a></li>

                        <?php if ($username) {?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    My SPH
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a href="<?=site_url('user/profile');?>">My Profile</a></li>
                                    <li><a href="<?=site_url('user/');?>">My Favourites</a></li>
                                    <li> <a href="<?=site_url('user/logout');?>">Log out</a></li>
                                </ul>
                            </li>


                        <?php
}?>


                        <li id='sub-li' class="">

                            <ul id='sub-nav' class="" role="navigation">
                                <li><a href=" #">Realtor's Listing</a>
                                </li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">FAQs</a></li>

                            </ul>
                            <button id="sub-btn" type="button" class="" data-target="#sub-nav" data-role="none" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="fa fa-bars"></i>
                            </button>
                        </li>
                    </ul>
                </div>


            </nav>
        </div>
    </header>
    <!-- Main header end -->




    <div class="wrapper">

        <?php echo $body; ?>

    </div>





    <!-- Footer start -->
    <footer class="main-footer clearfix">
        <div class="container">
            <!-- Footer info-->
            <div class="footer-info">
                <div class="row">
                    <!-- About us -->
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-item">
                            <div class="main-title-2">
                                <img src="<?php echo base_url(); ?>img/logos/footer-logo.png" alt="" style='width: 220px;'>
                            </div>

                            <p>
                                <strong>PropertyHub.com.ng</strong> is the leading property website
                                in Nigeria with property listings for sale, rent and lease.
                                We offer Nigerian property seekers an easy way to find details
                                of property in Nigeria.
                                <a href="<?php echo site_url('about'); ?>" class="badge">Read more <i class="fa fa-arrow-circle-right"></i></a>

                            </p>

                        </div>
                    </div>
                    <!-- Links -->
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <div class="footer-item">
                            <div class="main-title-2">
                                <h1>Useful Links</h1>
                            </div>
                            <ul class="links">
                                <li>
                                    <a href="<?php echo site_url('about'); ?>">About Us</a>
                                </li>
                                <li>
                                    <a href="#">Realtors' Listing</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('contact'); ?>">Contact Us</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('faq'); ?>">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#">Terms & Conditions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Tags -->
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-item ">
                            <div class="main-title-2">
                                <h1>Contact Us</h1>
                            </div>
                            <ul class="personal-info">
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    3rd Floor, 19 Toyin Street,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Ikeja-Lagos, Nigeria
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    sales@propertyhub.com.ng
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    01-2931012
                                </li>
                                <li>
                                    <i class="fa fa-mobile"></i>
                                    +234-813 164 8171
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Recent cars -->
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                        <div class="footer-top tags-box ml-5">
                            <div class="main-title-2">
                                <h1>Social Media</h1>
                            </div>
                            <ul class="social-list clearfix">
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://twitter.com/PropertyHubNG1"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com/PropertyHubNG/"><i class="fa fa-facebook"></i></a></li>
                            </ul>
                        </div>

                        <div class="newsletter js-rollover" data-radius="50">


                            <form method="post" action="<?php echo site_url('home/subscribe'); ?>" class="newsletter-form">

                                <input type="email" name="email" id="email" placeholder="Enter your email" required>
                                <button type="submit" class="button">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer end -->

    <!-- Copy right start -->
    <div class="copy-right">
        <div class="container">

            &copy;
            <?php date_default_timezone_set("Africa/Lagos");
echo date("Y");
?>
            <span style="color:#ed8019;">PropertyHub.com.ng</span> All right reserved.
            <span>Powered By Xown Solutions Limited</span>
        </div>
    </div>
    <!-- Copy end right-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-submenu/3.0.1/js/bootstrap-submenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollup/2.4.1/jquery.scrollUp.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.4.0/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-providers/1.5.0/leaflet-providers.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/leaflet.markercluster.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/filterizr/1.3.5/jquery.filterizr-with-jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/app.js"></script>

</body>

</html>