<div id="content">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col col-lg-12 col-xl-10">
            <div class="row has-sidebar">
              <div class="col-md-5 col-lg-4 col-xl-4 col-sidebar">
              <div id="sidebar" class="sidebar-left">
                  <div class="sidebar_inner">
                    <div class="list-group no-border list-unstyled">
                      <span class="list-group-item heading">Manage Listings</span>
                      <a href="<?= site_url('add_listing'); ?>" class="list-group-item"><i class="fa fa-fw fa-plus-square-o"></i>
                        Add Listing</a>

                      <a href="<?= site_url('listings'); ?>" class="list-group-item active d-flex justify-content-between align-items-center"><span><i
                            class="fa fa-fw fa-bars"></i> My Listings</span>
                        <span class="badge badge-primary badge-pill">7</span>
                      </a>
                      <span class="list-group-item heading">Manage Account</span>
                      <a href="<?= site_url('profile'); ?>" class="list-group-item"><i class="fa fa-fw fa-pencil"></i> My Profile</a>
                      <a href="<?= site_url('password'); ?>" class="list-group-item"><i class="fa fa-fw fa-lock"></i> Change
                        Password</a>
                      <a href="<?= site_url('notifications'); ?>" class="list-group-item"><i class="fa fa-fw fa-bell-o"></i>
                        Notifications</a>
                      <a href="<?= site_url('membership'); ?>" class="list-group-item"><i class="fa fa-fw fa-cubes"></i> Membership</a>
                      <a href="<?= site_url('payment'); ?>" class="list-group-item"><i class="fa fa-fw fa-credit-card"></i>
                        Payments</a>
                      <a href="<?= site_url('account'); ?>" class="list-group-item"><i class="fa fa-fw fa-cog"></i> Account</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-8 col-xl-8">
                <div class="page-header bordered">
                  <h1>My profile <small>Manage your public profile</small></h1>
                </div>
                <form action="http://uilove.in/realestate/listo/preview/index.php">
                  <h3 class="subheadline">Basic Information</h3>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control form-control-lg" placeholder="" value="John">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control form-control-lg" placeholder="" value="Doe">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Your Email</label>
                    <input type="text" class="form-control form-control-lg" value="john.doe@email.com">
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control form-control-lg" placeholder="" value="+14155552671">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Fax</label>
                        <input type="text" class="form-control form-control-lg" placeholder="" value="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>About Me</label>
                    <textarea class="form-control form-control-lg text-editor" placeholder=""></textarea>
                  </div>
                  <h3 class="subheadline">Social Links</h3>
                  <div class="form-group">
                    <label>Twitter</label>
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-fw fa-twitter"></i></span></div>
                      <input type="text" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Facebook</label>
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-fw fa-facebook"></i></span></div>
                      <input type="text" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Google Plus</label>
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-fw fa-google-plus"></i></span></div>
                      <input type="text" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Linkedin</label>
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-fw fa-linkedin"></i></span></div>
                      <input type="text" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
                  <h3 class="subheadline">Agent/Company Profile</h3>
                  <div class="form-group">
                    <label>Agent/Company Title</label>
                    <input type="text" class="form-control form-control-lg">
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control form-control-lg" id="autocomplete" placeholder="Enter your location">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control form-control-lg" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control form-control-lg" placeholder="" id="locality">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control form-control-lg" placeholder="" id="administrative_area_level_1">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control form-control-lg" placeholder="" id="country">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Zipcode</label>
                        <input type="text" class="form-control form-control-lg" placeholder="" id="postal_code">
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group action">
                    <button type="submit" class="btn btn-lg btn-primary">Update Profile</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>