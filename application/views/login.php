<div class="page-header" style="background: url(<?php echo base_url(); ?>img/page-banner.jpg);background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Login to account</h2>
                    <a href="./home">Home</a>
                    <span>/</span>
                    <span><a href="./login">Login</a></span>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="login-content">
    <div class="container">
        <div id="login" class="row">
            <div class="col-sm-6 col-md-4 col-lg-4">
                <h1>Login To User Page</h1>
                <p><strong>PropertyHub.com.ng</strong> is the leading property website
                    in Nigeria with property listings for sale, rent and lease.
                    We offer Nigerian property seekers an easy way to find details
                    of property in Nigeria.


                </p>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="page-login-form box">
                    <h3><i class="fa fa-sign-in"></i>
                        Login
                    </h3>

                    <?php
                    if (validation_errors() != false) {
                        echo '<div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-exclamation-triangle"></i>&nbsp; <strong>Error!</strong><ul style="list-style-type:disc">' . validation_errors() . '</ul>
            </div>';
                    }
                    ?>
                    <?php if (isset($message)) {

                        echo '<div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <ul style="list-style-type:disc">' . $message. '</ul>
        </div>';
                    } elseif (isset($error)) {

                        echo '<div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-exclamation-triangle"></i></i>&nbsp; <strong>Error!</strong> There are some errors in your form
            <ul style="list-style-type:disc">' . $error . '</ul>
        </div>';
                    } ?>

                    <form class="login-form" action="<?php echo $action; ?>" method='post'>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="fa fa-user"></i>
                                <input type="text" id="email" class="form-control" placeholder="email address" name="email" required value="<?php echo $email; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="fa fa-unlock-alt"></i>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div>
                        <div class="form-group">
                            <input type="checkbox" name="remember_me" value="forever"> Remember me
                        </div>

                        <button type="submit" class="btn btn-common log-btn">Login</button>
                    </form>

                    <ul class="form-links">
                        <li class="text-center"><a href="./register">Don't have an account?</a></li>
                        <li class="text-center"><a href="">Forgot Password</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<script src='https://www.google.com/recaptcha/api.js'></script> 