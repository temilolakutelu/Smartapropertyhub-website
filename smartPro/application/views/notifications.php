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
                  <h1>Notifications</h1>
                </div>
                <form action="http://uilove.in/realestate/listo/preview/index.php">
                  <h3 class="subheadline">Digest emails for messages</h3>
                  <div class="form-group">
                    <div class="checkbox">
                      <input type="checkbox" id="private_message" checked>
                      <label for="private_message">When you receive a private message from a contact</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="checkbox">
                      <input type="checkbox" id="item_message" checked>
                      <label for="item_message">When you receive a message for your posted item</label>
                    </div>
                  </div>
                  <h3 class="subheadline">Other Notifications</h3>

                  <div class="form-group">
                    <div class="checkbox">
                      <input type="checkbox" id="monthly_newsletter" checked>
                      <label for="monthly_newsletter">Monthly Newsletter</label>
                    </div>
                  </div>

                  <hr>
                  <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary">Save Settings</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>