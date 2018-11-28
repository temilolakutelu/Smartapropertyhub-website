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
                  <h1>Payments Settings</h1>
                </div>
                <form action="http://uilove.in/realestate/listo/preview/index.php">
                  <div class="form-group">
                    <div class="checkbox">
                      <input type="checkbox" id="private_message" checked="">
                      <label for="private_message">Allow auto debit from default payment source on renewal</label>
                    </div>
                  </div>
                  <h3 class="subheadline">Credit Cards &amp; Gateways</h3>
                  <ul class="list-group no-border list-unstyled v2">
                    <li><i class="fa fa-fw fa-cc-paypal icon"></i> Paypal <a href="#" class="btn btn-sm btn-link set-default">Set
                        Default</a></li>
                    <li><i class="fa fa-fw fa-cc-stripe icon"></i> Stripe <a href="#" class="btn btn-sm btn-link set-default">Set
                        Default</a></li>
                    <li><i class="fa fa-fw fa-credit-card icon hidden-xs"></i> <span class="card-number">**** **** ****
                        2132</span><a class="btn btn-sm btn-primary"><i class="fa fa-trash-o"></i></a> <span class="default">Default</span></li>
                    <li><i class="fa fa-fw fa-credit-card icon hidden-xs"></i> <span class="card-number">**** **** ****
                        5643</span><a class="btn btn-sm btn-primary"><span><i class="fa fa-trash-o"></i></span></a> <a
                        href="#" class="btn btn-sm btn-link set-default">Set Default</a></li>
                    <li><i class="fa fa-fw fa-credit-card icon hidden-xs"></i> <span class="card-number">**** **** ****
                        9843</span><a class="btn btn-sm btn-primary"><i class="fa fa-trash-o"></i></a> <a href="#"
                        class="btn btn-sm btn-link set-default">Set Default</a></li>
                  </ul>
                  <h3 class="subheadline">Add Credit Card</h3>
                  <div class="card">
                    <div class="form-group">
                      <label>Card Number</label>
                      <div class="input-group input-group-lg">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="icon fa fa-fw fa-credit-card-alt"></i></span></div>
                        <input type="text" class="form-control form-control-lg" id="cc_number" value="">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <label>Expiration Date (Month/Year)</label>
                        <div class="row">
                          <div class="col-md-7">
                            <div class="form-group">
                              <select class="form-control form-control-lg ui-select">
                                <option value="jan">January</option>
                                <option value="feb">February</option>
                                <option value="mar">March</option>
                                <option value="apr">April</option>
                                <option value="may">May</option>
                                <option value="jun">June</option>
                                <option value="jul">July</option>
                                <option value="aug">August</option>
                                <option value="sep">September</option>
                                <option value="oct">October</option>
                                <option value="nov">November</option>
                                <option value="dec">December</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                              <select class="form-control form-control-lg ui-select">
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                              </select>
                            </div>
                          </div>
                        </div>



                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Security Code</label>
                          <input type="text" class="form-control form-control-lg">
                        </div>
                      </div>
                    </div>
                    <p>You agree to authorize the use of your credit card for this deposit and future payments.</p>
                    <button class="btn btn-light" id="add_card">Add Card</button>
                  </div>
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