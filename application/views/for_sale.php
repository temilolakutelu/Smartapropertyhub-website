<link rel="stylesheet" href="css/bootstrap-select.min.css">
<link rel="stylesheet" href="css/range.css">


<div class="page-header" style="background: url(<?php echo base_url(); ?>img/page-banner.jpg);background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">For Sale</h2>
                    <a href="./home">Home</a>
                    <span>/</span>
                    <span><a href="./for_sale">For Sale</a></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Listing Sidebar Area Start -->
<section class="royal-listing-sidebar-area ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12 page-content">
                <div>
                    <div class="well well-sm">
                        <strong>Properties & Houses for sale.</strong>
                        <div class="btn-group">
                            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
                                </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th"></span>Grid</a>
                        </div>
                    </div>

                    <!-- <div class="dropdown float-right">
                        Sort by
                        <button class="btn defualt" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Price</span></button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Most
                                Recent</a>
                            <a class="dropdown-item" href="#">Lowest
                                Price</a>
                            <a class="dropdown-item" href="#">Highest
                                Price</a>
                            <a class="dropdown-item" href="#">Beds</a>
                        </div>
                    </div> -->

                </div>

                <div id="products" class="list-group" style='box-shadow: none;'>
                    <?php foreach ($results as $sale) {?>

                                                    <div class="item list-group-item col-xs-12 col-sm-6 col-md-4">
                                                        <div class="thumbnail">
                                                            <?php
if ($sale->featured == 1) {?>
                                                        <div class="ribbon red"><span>Featured</span></div>
                                                                                <?php
}?>
                                                    <img class="group list-group-image" src="http://smartpro.propertyhub.com.ng/uploads/<?=$sale->imageURL;?>" alt="" />
                                                                                                                <div class="property_overlay"></div>
                                                                                                                <div class="pro-info">
                                                                                                                    <ul>
                                                                                                                        <li>
                                                                                                                            <i class="fa fa-bed"></i>
                                                                                                                            <?=$sale->bedroom;?>
                                                                                                                </li>
                                                                                                                <li>
                                                                                                                    <i class="fa fa-bath"></i>
                                                                                                                    <?=$sale->bathroom;?>
                                                                                                                </li>
                                                                                                                <li>
                                                                                                                    <i class="fa fa-beer"></i>
                                                                                                                    <?=$sale->toilet;?>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </div>
                                                                                                        <div class="caption">
                                                                                                            <div class="property-text">
                                                                                                                <h4><a href="<?=site_url('home/property_view/' . $sale->property_ID);?>">
                                                                                                                <?=$sale->property_Name;?></a></h4>

                                                                                                                <p style='font-size: 10px;'><i class="fa fa-map-marker"></i>
                                                                                                                 <?=$sale->street;?>
                                                                                                                <?=$sale->city;?>,
                                                                                                                <?=$sale->state;?></p>

                                                                                                                <div class="pro-details-price">
                                                                                                                    <p>
                                                                                                                        <?php if ($sale->currency == 'NGN') {
    echo '₦';
} elseif ($sale->currency == 'USD') {
    echo '$';
} elseif ($sale->currency == 'EUR') {
    echo '€';
} else {
    echo $sale->currency;
}
    ?>
                                                                                                                <?=number_format($sale->price);?>
                                                                                                                </p>
                                                                                                                <a href="<?=site_url('home/property_view/' . $sale->property_ID);?>">More Details</a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                                                                                        <?php
}?>
                </div>

                <div id="pagination">
                    <?php echo $links; ?>
                </div>

            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 widget-area-sidebar">
                <!-- <div class="side-fliter">
                    <div class="post-request text-center">
                        <h3 class="sidebar-caption">States</h3>
                        <ul class="filter-conditions">
                            <?php foreach ($state as $state) {?>
                                                                                                                <li> <a itemprop="item" href="property-for-sale/in/lagos.html">
                                                                                                                        <?=$state->state;?></a> </li>
                                                                                                                                                                                                        <?php
}?>
                        </ul>


                    </div>
                </div> -->
                <div class="side-fliter">
                    <div class="post-request text-center">
                        <h3 class="sidebar-caption">Can't Find the Property you want?</h3>
                        <div class="container-2">
                            <a href="<?=site_url('user/property_alert');?>">
                                <div class="btn btn-two" style='  width: 260px;'>
                                    <span>Submit Property Alert</span>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>

                 <div class="side-fliter" style='margin-top:10px'>

                    <div class="single-listing-widget">
                        <h3>Property Advanced Search</h3>
                        <form action='<?=base_url();?>for_sale/filter' method="post">


                            <select name="location" id="location" class="single-search-property">
                                <option selected="selected">Select Location...</option>
                                <?php foreach ($state_data as $state): ?>
                                                                                                                <option value="<?php echo $state->name; ?>">
                                                                                                                <?php echo $state->name; ?>
                                                                                                                </option>
                                                                                                                                                                                            <?php endforeach;?>
                            </select>

                            <select name="type" id="type" class="single-search-property">
                                <option selected="selected">Select Type...</option>
                                <?php foreach ($type_data as $type): ?>
                                                                                                                <option value="<?php echo $type->type_id; ?>">
                                                                                                                <?php echo $type->type_name; ?>
                                                                                                                </option>
                                                                                                                                                                                            <?php endforeach;?>
                            </select>
                            <select id="subtype" name="subtype" disabled="" class="single-search-property">
                                <option>Select Subtype...</option>
                            </select>


                            <select name="bedroom" data-live-search="true" data-live-search-placeholder="Search value" class="single-search-property">
                                <option selected="selected" value='0' selected>
                                    Any no. of Bed</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                                <option value='7'>7</option>
                            </select>

                            <select name="max-price" data-live-search="true" data-live-search-placeholder="Search value" class="single-search-property">
                                <option value="0" selected="selected">Max Price
                                </option>
                                <option value='10000'>10,000</option>
                                <option value='100000'>100,000</option>
                                <option value='1000000'>1,000,000</option>
                                <option value='10000000'>10,000,000</option>
                                <option value='500000000'>500,000,000</option>
                            </select>
                            <div class="slidecontainer">
                                <!-- <input type="range" min="10000" max="100000" value="50000" class="slider" id="min">
                                <p>Min. Price: ₦ <span id="minval"></span></p>

                                <input type="range" min="100000" max="100000000" value="100000" class="slider" id="max">
                                <p>Max. Price: ₦ <span id="maxval"></span></p> -->





                            </div>


                            <div class="single-listing-search-property">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="listing-search">
                                            <button type="submit" data-role='none'>Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>



                    </div>
</div>

                <form action="<?php echo site_url('home/subscribe'); ?>" method="POST" class="envelope-cont text-center alert2-form">
                    <img src="<?php echo base_url(); ?>img/page-banner.jpg" alt="">
                    <p>Receive alerts when new properties are available:</p>
                    <input type="text" name="name" required="required" class="form-control" placeholder="Name" value="">
                    <input type="email" name="email" required="required" class="form-control" placeholder="Email Address" value="">

                    <button class="btn secondry btn-block alert2-btn" type="button">Subscribe</button>
                </form>
                <div id="side" class="mrg-btm-70 ">
                    <a href="http://c.jumia.io/?a=134508&c=442&p=r&E=kkYNyk2M4sk%3d&utm_source=cake&utm_medium=affiliation&utm_campaign=134508&utm_term="><img src="https://affiliates.jumia.com/banners/Jumia Nigeria/MensClothing/250X250.jpg" /></a>
                </div>


                    <!-- <div class="single-listing-widget">
                        <h3>recent properties</h3>
                        <ul>
                            <?php

foreach ($recent_data as $recent) {?>
                                                                                                                <li>
                                                                                                                    <div class="recent-img">
                                                                                                                        <a href="<?=site_url('home/property_view/' . $recent->property_ID);?>">
                                                                                                                <img src="http://smartpro.propertyhub.com.ng/uploads/<?=$recent->imageURL;?>" alt="recent image">
                                                                                                                </a>
                                                                                                            </div>
                                                                                                            <div class="recent-text">
                                                                                                                <h4>
                                                                                                                    <a href="<?=site_url('home/property_view/' . $recent->property_ID);?>">
                                                                                                                <?=$recent->property_Name;?></a>
                                                                                                                </h4>
                                                                                                                <p>
                                                                                                                    <?php if ($recent->currency == 'NGN') {
    echo '₦';
} elseif ($recent->currency == 'USD') {
    echo '$';
} elseif ($recent->currency == 'EUR') {
    echo '€';
} else {
    echo $recent->currency;
}
    ?>
                                                                                                                <?=number_format($recent->price);?>
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </li>
                                                                                                                                                                                <?php
}?>
                        </ul>
                    </div> -->

            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

<script>
    var minslider = document.getElementById("min");
    var minoutput = document.getElementById("minval");

    var maxslider = document.getElementById("max");
    var maxoutput = document.getElementById("maxval");

    minoutput.innerHTML = minslider.value;
    maxoutput.innerHTML = maxslider.value;

    minslider.oninput = function() {
        minoutput.innerHTML = this.value;
    }
    maxslider.oninput = function() {
        maxoutput.innerHTML = this.value;
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#type').on('change', function() {
            var type_id = $(this).val();
            if (type_id == '') {
                // window.location.reload();
            } else {
                $('#subtype').prop('disabled', false);
                $.ajax({
                    url: "<?=base_url('for_sale/get_subtype');?>",
                    type: "POST",
                    data: {
                        'type_id': type_id
                    },
                    success: function(data) {
                        $('#subtype').html(data);
                    },
                    error: function() {
                        alert('Error Occur....!!');
                    }
                });
            }

        });
    });
</script>