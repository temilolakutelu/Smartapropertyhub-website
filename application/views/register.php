<div class="page-header" style="background: url(<?php echo base_url(); ?>img/page-banner.jpg);background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Sign Up</h2>
                    <a href="./home">Home</a>
                    <span>/</span>
                    <span><a href="./register">Register</a></span>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="register-content">
    <div class="container-fluid">
        <div id="reg" class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                        <h1>Register With Us</h1>
                        <p><strong>PropertyHub.com.ng</strong> is the leading property website
                            in Nigeria <br> with property listings for sale, rent and lease.
                            We offer Nigerian property seekers <br> an easy way to find details
                            of property in Nigeria.
                        </p>
                        <p>Agents, Developers, Landlords,Architects and Others interested in posting their properties/designs should check out our subscription <a href="<?php echo site_url('subscription');?>"><span style='color:orange;font-weight:bold;'>Page</span></a>.</p>



                    </div>
            <div class="col-sm-12 col-md-6">
                <div class="page-login-form box">
                    <h3><i class="fa fa-user-o"></i>
                        Register
                    </h3>
                    <?php
if (validation_errors() != false) {
    echo '<div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-exclamation-triangle"></i></i>&nbsp; <strong>Error!</strong> There are some errors in your form
                <ul style="list-style-type:disc">' . validation_errors() . '</ul>
            </div>';
}
                    ?>
                    <?php if (isset($message)) {

                        echo '<p class="alert alert-info">'.$message.'</p>';
                    } elseif (isset($error)) {
                    
                        echo '<div class="alert alert-dismissable alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-exclamation-triangle"></i></i>&nbsp; <strong>Error!</strong> There are some errors in your form
                                <ul style="list-style-type:disc">' .$error. '</ul>
                            </div>';
                    }?>
                   
                    <form class="login-form"  action="<?= site_url('register/register_action'); ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                                <div class="form-group col-md-6">
                                        <div class="input-icon">
                                            <i class="fa fa-user"></i>
                                            <input type="text" class="form-control" name="fname" placeholder="Firstname" value="<?= $fname; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-icon">
                                            <i class="fa fa-user"></i>
                                            <input type="text" class="form-control" name="lname" placeholder="Lastname" value="<?= $lname; ?>" required>
                                        </div>
                                    </div>
                        </div>
                        <div class="row">
                                <div class="form-group col-md-6">
                                        <div class="input-icon">
                                            <i class="fa fa-user"></i>
                                            <input type="text" class="form-control" name="username" placeholder="Username" value="<?=$username; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-icon">
                                            <i class="fa fa-envelope-o"></i>
                                            <input type="text" class="form-control" name="email" value="<?=$email?>" placeholder="Email Address" required>
                                        </div>
                                    </div>
                        </div>
                       <div class="row">
                            <div class="form-group col-md-6">
                                    <div class="input-icon">
                                        <i class="fa fa-lock"></i>
                                        <input type="password" name="password" class="form-control"  placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-icon">
                                        <i class="fa fa-unlock"></i>
                                        <input type="password" name='cpassword' class="form-control" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                       </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="fa fa-phone"></i>
                                <input type="phone" name='phone' class="form-control" value="<?= $phone; ?>" placeholder="Phone number" required>
                            </div>
                        </div>
                        <div class="form-group col-md-7">
                            <label>
                                <input type="radio" name="type" value="User" checked>
                                <small class="rad">User</small>
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                <input type="radio" name="type" value="Agent">
                                <small class="rad">Agent</small>
                            </label>
                            <label>
                                <input type="radio" name="type" value="Developer">
                                <small class="rad">Developer</small>
                            </label>
                            <label>
                                <input type="radio" name="type" value="Landlord">
                                <small class="rad">Landlord</small>
                            </label>
                            <label>
                                <input type="radio" name="type" value="Architect">
                                <small class="rad">Architect</small>
                            </label>
                            <span class="help-block"></span>
                        </div>

                        <div id="sub" class='form-group col-md-5'>
                               <select name="plan" id="type" class="form-control">
                                   <option value="1">Freemium</option>
                                   <option value="2">Starter - ₦5,000/mnth</option>
                                   <option value="3">Standard - ₦7,500/mnth</option>
                                   <option value="4">Premium - ₦10,000</option>
                                   <option value="5">Ultimate - ₦20,000</option>
                                   
                                </select>
                        </div>
                        <div style='margin-bottom: 80px;' class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div> 
                        <div class="checkbox">
                            <input type="checkbox" id="terms" name="accept_terms" value="yes" style="float: left;"> 
                            <label for="terms">By creating account you agree to our Terms & Conditions</label>
                        </div>
                        <button class="btn btn-common log-btn">Register</button>
                    </form>
                    <p class="text-center">Already registered? <a href="./login">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

<script>
        $(document).ready(function() {
            $('#sub').hide();
            
          $('input[type=radio][name=type]').change(function() {
              if (this.value !== 'User') {
                  $('#sub').show();
              }
              else{
                  $('#sub').hide();
              }
          });
        }); 
      </script>