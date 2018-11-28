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
                  <h1>Membership</h1>
                </div>
                <form action="http://uilove.in/realestate/listo/preview/index.php">

                  <h3 class="subheadline">Current Plans</h3>

                  <div class="card">
                    <div class="media mt-0">
                      <div class="media-left"> <a href="agent.html"> <img class="media-object rounded-circle" src="img/demo/badge.png"
                            width="100" height="100" alt=""> </a> </div>
                      <div class="media-body">
                        <a class="btn btn-link float-right" href="#">Cancel Plan</a>
                        <h4 class="media-heading"><a href="plans.html">Plan <strong>Pro</strong></a></h4>
                        <p class="text-muted">Expiring on 1st August 2018</p>

                      </div>
                    </div>
                  </div>
                  <a href="plans.html" class="btn btn-light">Upgrade Plan</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>