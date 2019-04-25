<head>

    <link href="<?=base_url()?>assets/dist/css/pages/widget-page.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/dist/css/style.min.css" rel="stylesheet">


    <script src="<?=base_url()?>assets/dist/js/pages/widget-data.js"></script>
</head>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Consultant Details</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active">Consultant Details</li>
                    </ol>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->

        <div class="row">
            <!-- Column -->
            <?php if (isset($message)) {

    echo '<div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <ul style="list-style-type:disc">' . $message . '</ul>
        </div>';
} elseif (isset($error)) {

    echo '<div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-exclamation-triangle"></i></i>&nbsp; <strong>Error!</strong> There are some errors in your form
            <ul style="list-style-type:disc">' . $error . '</ul>
        </div>';
}?>
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <img class="card-img" src="<?=base_url()?>assets/images/background/socialbg.jpg" height="456" alt="Card image">
                    <div class="card-img-overlay card-inverse text-white social-profile d-flex justify-content-center">
                        <div class="align-self-center">

                            <div id='profileImage' class="img-circle">
                                <input type="hidden" id='fname' value='<?=$user_data->firstname;?>'>
                                <input type="hidden" id='lname' value='<?=$user_data->lastname;?>'>
                            </div>

                            <h4 class="card-title"><?=$user_data->firstname . ' ' . $user_data->lastname;?></h4>

                            <h5 class="card-title"><?=$user_data->username;?></h5>
                            <h6 class="card-subtitle"><?=$user_data->email;?></h6>
                            <p class="text-white"><?=$user_data->phone;?> </p>
                            <p class="text-white"><?=$user_data->loaction;?></p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <small class="text-muted"><i class='fa fa-envelope'></i> </small>
                        <span>&nbsp;&nbsp;<?=$user_data->email;?></span>
                        <br>
                        <br>
                        <small class="text-muted p-t-30 db"><i class='fa fa-phone'></i>&nbsp;&nbsp;</small>
                        <span><?=$user_data->phone;?></span>
                        <br>
                        <br>
                        <small class="text-muted p-t-30 db"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;</small>
                        <span><?=$user_data->location;?></span>
                        <br>
                        <br>
                        <div class="map-box">
                            <div class="mapouter">
                                <div class="gmap_canvas">
                                    <iframe width="2000" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=<?=$user_data->location;?>&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de/webdesign/"></a></div>
                                <style>
                                    .mapouter {
                                        text-align: right;
                                        height: 600px;
                                    }

                                    .gmap_canvas {
                                        overflow: hidden;
                                        background: none !important;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <!-- <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Timeline</a> </li> -->
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#edit-profile" role="tab">Edit Profile</a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card-body">
                                        <h4 class="font-medium m-t-30">Most Recent Activities</h4>
                                        <div class="profiletimeline">
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="<?=base_url()?>assets/images/users/1.jpg" alt="user" class="img-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <p>assign a new task <a href="javascript:void(0)"> Design
                                                                weblayout</a></p>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="<?=base_url()?>assets/images/big/img1.jpg" class="img-responsive radius" /></div>
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="<?=base_url()?>assets/images/big/img2.jpg" class="img-responsive radius" /></div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="<?=base_url()?>assets/images/users/2.jpg" alt="user" class="img-circle" /> </div>
                                                <div class="sl-right">
                                                    <div> <a href="javascript:void(0)" class="link">John Doe</a>
                                                        <span class="sl-date">5 minutes ago</span>
                                                        <div class="m-t-20 row">
                                                            <div class="col-md-3 col-xs-12"><img src="<?=base_url()?>assets/images/big/img1.jpg" alt="user" class="img-responsive radius" /></div>
                                                            <div class="col-md-9 col-xs-12">
                                                                <p> Lorem ipsum dolor sit amet, consectetur
                                                                    adipiscing
                                                                    elit. Integer nec odio. Praesent libero. Sed
                                                                    cursus
                                                                    ante dapibus diam. </p> <a href="javascript:void(0)" class="btn btn-success"> Design weblayout</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="<?=base_url()?>assets/images/users/3.jpg" alt="user" class="img-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">John Doe</a>
                                                        <span class="sl-date">5 minutes ago</span>
                                                        <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit. Integer nec odio. Praesent libero. Sed
                                                            cursus ante dapibus diam.</p>
                                                    </div>

                                                </div>
                                            </div>
                                            <hr>

                                        </div>
                                    </div>
                                </div> -->
                        <!--second tab-->
                        <div class="tab-pane active" id="profile" role="tabpanel">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                        <br>
                                        <p class="text-muted"><?=$user_data->firstname . ' ' . $user_data->lastname;?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Telephone</strong>
                                        <br>
                                        <p class="text-muted"><?=$user_data->phone;?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                        <br>
                                        <p class="text-muted"><?=$user_data->email;?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6"> <strong>Address</strong>
                                        <br>
                                        <p class="text-muted"><?=$user_data->location;?></p>
                                    </div>
                                </div>
                                <hr>

                                <h4 class="font-medium m-t-30">Favourite properties</h4>
                                <hr>

                                <!-- Main title -->


                                <div class='row'>

                                    <?php

foreach ($fav_data as $fav) {?>

                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                                            <div class="ribbon red"><span>Featured</span></div>

                                            <div class="property">
                                                <!-- Property img -->
                                                <a href="<?=site_url('home/property_view/' . $fav->property_ID);?>" class="property-img" style='height: 200px;'>

                                                    <div class="property-tag button sale">
                                                        <?=$fav->category_Name;?>
                                                    </div>
                                                    <div class="property-price">
                                                        <?php if ($fav->currency == 'NGN') {
    echo '₦';
} elseif ($fav->currency == 'USD') {
    echo '$';
} elseif ($fav->currency == 'EUR') {
    echo '€';
} else {
    echo $fav->currency;
}
    ?>

                                                        <?=number_format($fav->price);?>

                                                    </div>

                                                    <img src="http://smartpro.propertyhub.com.ng/uploads/<?=$fav->imageURL;?>" alt="properties-1" class="img-responsive img-fluid">
                                                </a>
                                                <!-- Property content -->
                                                <div class="property-content">
                                                    <!-- title -->
                                                    <h1 class="title">
                                                        <a href="<?=site_url('home/property_view/' . $fav->property_ID);?>">
                                                            <?=$fav->property_Name;?></a>
                                                    </h1>

                                                    <!-- Property address -->
                                                    <h3 class="property-address">
                                                        <a href="<?=site_url('home/property_view/' . $fav->property_ID);?>">
                                                            <i class="fa fa-map-marker"></i>
                                                            <?=$fav->street;?>,
                                                            <?=$fav->city;?>,
                                                            <?=$fav->state;?>
                                                        </a>



                                                    </h3>
                                                    <!-- Facilities List -->
                                                    <ul class="facilities-list clearfix">
                                                        <li>
                                                            <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                                            <span>
                                                                <?=$fav->square_meter;?> sqm</span>
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-bed"></i>
                                                            <span>
                                                                <?=$fav->bedroom;?> Beds</span>
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-holidays"></i>
                                                            <span>
                                                                <?=$fav->bathroom;?> Baths</span>
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-building"></i>
                                                            <span>
                                                                <?=$fav->toilet;?> Toilet(s)</span>
                                                        </li>
                                                    </ul>
                                                    <!-- Property footer -->
                                                    <div class="property-footer">
                                                        <span class="left"><i class="fa fa-calendar-o icon"></i>
                                                            <?php
$date = date_create($fav->date_Added);
    echo date_format($date, "l, d F, Y");?></span>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    <?php
}?>

                                </div>
  <?=$this->pagination->create_links()?>


                            </div>
                        </div>
                        <div class="tab-pane" id="edit-profile" role="tabpanel">
                            <div class="card-body">
                                <form action="<?=site_url('user/edit/' . $user_data->user_id);?>" method='post'>
                                    <div class="row mt-4">
                                        <div class="col-sm-6 pb-3">
                                            <label for="fname">First Name</label>
                                            <input class="form-control" id="fname" name='firstname' type="text" required value='<?=$user_data->firstname?>'>
                                        </div>
                                        <div class="col-sm-6 pb-3">
                                            <label for="lname">Last Name</label>
                                            <input class="form-control" id="lname" name='lastname' type="text" required value='<?=$user_data->lastname;?>'>
                                        </div>
                                        <div class="col-sm-12 pb-3">
                                            <label for="email">Email</label>
                                            <input class="form-control" id="email" name='email' required type="email" value='<?=$user_data->email;?>'>
                                        </div>
                                        <div class="col-sm-6 pb-3">
                                            <label for="email">Username</label>
                                            <input class="form-control" id="username" name='username' required type="username" value='<?=$user_data->username;?>'>
                                        </div>

                                        <div class="col-sm-6 pb-3">
                                            <label for="exampleFirst">Phone</label>
                                            <input class="form-control" id="exampleFirst" required name='phone' type="text" value='<?=$user_data->phone;?>'>
                                        </div>

                                        <div class="col-sm-12 pb-3">
                                            <label for="exampleLast">Address</label>
                                            <input class="form-control" required id="exampleLast" name='location' type="text" value='<?=$user_data->location;?>'>
                                        </div>



                                        <input type="submit" value='Update Profile'>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->


    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>

<script>
    $(document).ready(function() {
        var firstName = $('#fname').val();
        var lastName = $('#lname').val();
        var intials = firstName.charAt(0) + lastName.charAt(0);
        var profileImage = $('#profileImage').html('<h1>' + intials + '</h1>');
    });
</script>