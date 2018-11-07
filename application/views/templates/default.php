<!DOCTYPE html>
<html>


<head>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    '..www.googletagmanager.com/gtm5445.html?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-P5MJCCG');</script>
    <!-- End Google Tag Manager -->
    <title>
        <?php echo $title; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap-submenu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/leaflet.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/map.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>fonts/linearicons/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dropzone.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
        crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="<?php echo base_url(); ?>css/skins/default.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.png" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ie10-viewport-bug-workaround.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script type="text/javascript" src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5shiv.min.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <![endif]-->
</head>


<body>


    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P5MJCCG" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <!-- Top header start -->
    <header class="top-header hidden-xs" id="top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="list-inline">
                        <a href="tel:1-8X0-666-8X88" data-role="none"><i class="fa fa-phone"></i>+234-813
                            164 8171</a>
                        <a href="tel:info@themevessel.com" data-role="none"><i class="fa fa-envelope"></i>sales@propertyhub.com.ng</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <ul class="top-social-media pull-right">
                        <li>
                            <a href="<?= site_url('login'); ?>" class="sign-in" data-role="none"><i class="fa fa-sign-in"></i>
                                Login</a>
                        </li>
                        <li>
                            <a href="<?= site_url('register'); ?>" class="sign-in" data-role="none"><i class="fa fa-user"></i>
                                Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- Top header end -->

    <!-- Main header start -->
    <header class="main-header">
        <div class="container">
            <nav class="navbar navbar-default ">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navigation"
                        data-role="none" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?= site_url('home'); ?>" class="logo">
                        <img src="<?php echo base_url(); ?>img/logos/logo.png" alt="logo">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="navbar-collapse collapse" role="navigation" aria-expanded="true" id="app-navigation">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('for_sale'); ?>">For Sale</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('to_let'); ?>">To Let</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('short_let'); ?>">Short Let</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Our Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="<?= site_url('property_mgt'); ?>">Property Management</a></li>
                                <li><a href="<?= site_url('facilities'); ?>">Facilities Management</a></li>
                                <li> <a href="<?= site_url('real_estate'); ?>">Real Estate Financing Advisory</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= site_url('consultant'); ?>">Our Consultants</a></li>
                        <li><a href="<?= site_url('faq'); ?>">Faq<span style="text-transform:lowercase">s</span></a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right rightside-navbar">
                        <li>
                            <a href="#" class="button" id="prop">
                                Submit Request
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- /.navbar-collapse -->
                <!-- /.container -->
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
                                <img src="<?php echo base_url(); ?>img/logos/logo.png" alt="" style='width: 220px;'>
                            </div>

                            <p>
                                <strong>PropertyHub.com.ng</strong> is the leading property website
                                in Nigeria with property listings for sale, rent and lease.
                                We offer Nigerian property seekers an easy way to find details
                                of property in Nigeria.
                                <a href="#" class="badge">Read more <i class="fa fa-arrow-circle-right"></i></a>



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
                                    <a href="#">Agents</a>
                                </li>

                                <li>
                                    <a href="#">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Contact Us</a>
                                </li>
                                <li>
                                    <a href="#">To Let</a>
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
            <a href="#"><span style="color:#ed8019;">PropertyHub.com.ng</span></a>. All right reserved.
        </div>
    </div>
    <!-- Copy end right-->

    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-submenu.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/rangeslider.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.mb.YTPlayer.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.scrollUp.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/leaflet.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/leaflet-providers.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/leaflet.markercluster.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/dropzone.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.filterizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/maps.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/app.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/ie10-viewport-bug-workaround.js"></script>
    <!-- Custom javascript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/ie10-viewport-bug-workaround.js"></script>


</body>

</html>