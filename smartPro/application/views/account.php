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
              <h1>Account Settings</h1>
            </div>
            <form action="http://uilove.in/realestate/listo/preview/index.php">
              <h3 class="subheadline">Social Connect</h3>
              <ul class="list-group no-border list-unstyled v2">
                <li><i class="fa fa-fw fa-twitter icon"></i> Twitter <a class="btn btn-primary btn-sm">Disconnect</a> <span class="connected">Connected</span></li>
                <li><i class="fa fa-fw fa-facebook icon"></i> Facebook <a class="btn btn-light btn-sm">Connect</a></li>
                <li><i class="fa fa-fw fa-google-plus icon"></i> Google Plus <a class="btn btn-light btn-sm">Connect</a></li>
              </ul>
              <h3 class="subheadline">Delete Account</h3>
              <p>If you are no longer interested in using your account click the button below to delete your account.</p>
              <a href="#" class="btn btn-lg btn-light">Delete Account</a>
              <hr>
              <div class="form-group action">
                <button type="submit" class="btn btn-lg btn-primary">Save Settings</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>