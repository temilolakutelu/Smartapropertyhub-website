<link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/range-Slider.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
$bg = array(
    'http://1.bp.blogspot.com/-_-tCiQDi_NQ/T5-OaRASjJI/AAAAAAAACro/Qel92PNYdWM/s1600/city+night+wallpapers+%284%29.jpg',
    'http://propertyhub.com.ng/img/banner2.jpg',
);
// array of filenames

$i = rand(0, count($bg) - 1);
// generate random number size of the array
$selectedBg = "$bg[$i]";
// set variable equal to which random filename was chosen
?>

<style>
    .pattern-overlay {
        background: url(<?php echo $selectedBg; ?>) center center no-repeat;
        background-size: cover;
    }
</style>
<!-- Banner start -->
<section class="banner banner_video_bg">
    <div class="pattern-overlay" id="carousel-example-generic">

        <div class="carousel-inner" role="listbox">
            <div class="item active">

                <div class="carousel-caption banner-slider-inner banner-top-align text-left">

                    <div class="banner-search-box hidden-xs hidden-sm">
                        <!-- Search area start -->
                        <div class="search-area">
                            <div class="search-area-inner">
                                <div class="search-contents ">

                                    <div class="tab-style-2">
                                        <div class="tab-style-2-line">
                                            <ul class="nav nav-tabs ">
                                                <li class="active">
                                                    <a href="#tab_default_1" data-toggle="tab">BUY </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_default_2" data-toggle="tab">RENT </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_default_3" data-toggle="tab">SHORTLET</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_default_1">


                                                    <form action=<?=site_url('for_sale/filter');?> method="POST">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" id='location' class=" my-1 mr-sm-2 search-fields form-control" name='location' placeholder='Enter Area of Interest... state, city or area'>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">

                                                                <select data-width="100%" name="subtype" id="type" class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="property-types" data-live-search="true">
                                                                    <option selected="selected" value="0">All Types</option>
                                                                    <?php foreach ($type_data as $type): ?>
                                                                        <option value="<?php echo $type->subtype_name; ?>">
                                                                            <?php echo $type->subtype_name; ?>
                                                                        </option>
                                                                    <?php endforeach;?>
                                                                </select>

                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <select class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="bedroom" data-live-search="true" data-live-search-placeholder="Search value">
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
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <select class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="max-price" data-live-search="true" data-live-search-placeholder="Search value">
                                                                    <option value="0" selected="selected">Max Price
                                                                    </option>
                                                                    <option value='10000'>10,000</option>
                                                                    <option value='100000'>100,000</option>
                                                                    <option value='1000000'>1,000,000</option>
                                                                    <option value='10000000'>10,000,000</option>
                                                                    <option value='500000000'>500,000,000</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <button class="search-button float-shadow">Search</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <a href="<?=site_url('for_sale');?>" rel="more-options" id='more-options' class="button  btn-6">
                                                                    More Options <span class="caret"></span></a>

                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane" id="tab_default_2">
                                                    <form action=<?=site_url('to_let/filter');?> method="POST">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" id='location' class="custom-select my-1 mr-sm-2 form-control search-fields" name='location' placeholder='Enter Area of Interest... state, city or area'>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">

                                                                <select data-width="100%" name="subtype" id="type" class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="property-types" data-live-search="true">
                                                                    <option selected="selected" value="0">All Types</option>
                                                                    <?php foreach ($type_data as $type): ?>
                                                                        <option value="<?php echo $type->subtype_name; ?>">
                                                                            <?php echo $type->subtype_name; ?>
                                                                        </option>
                                                                    <?php endforeach;?>
                                                                </select>

                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <select class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="bedroom" data-live-search="true" data-live-search-placeholder="Search value">
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
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <select class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="max-price" data-live-search="true" data-live-search-placeholder="Search value">
                                                                    <option value="0" selected="selected">Max Price
                                                                    </option>
                                                                    <option value='10000'>10,000</option>
                                                                    <option value='100000'>100,000</option>
                                                                    <option value='1000000'>1,000,000</option>
                                                                    <option value='10000000'>10,000,000</option>
                                                                    <option value='500000000'>500,000,000</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <button class="search-button float-shadow">Search</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <a href="<?=site_url('to_let');?>" rel="more-options" id='more-options' class="button  btn-6">More Options <span class="caret"></span></a>

                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane" id="tab_default_3">
                                                    <form action=<?=site_url('short_let/filter');?> method="POST">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" id='location' class="custom-select my-1 mr-sm-2 form-control search-fields" name='location' placeholder='Enter Area of Interest... state, city or area'>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">

                                                                <select data-width="100%" name="subtype" id="type" class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="property-types" data-live-search="true">
                                                                    <option selected="selected" value="0">All Types</option>
                                                                    <?php foreach ($type_data as $type): ?>
                                                                        <option value="<?php echo $type->subtype_name; ?>">
                                                                            <?php echo $type->subtype_name; ?>
                                                                        </option>
                                                                    <?php endforeach;?>
                                                                </select>

                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <select class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="bedroom" data-live-search="true" data-live-search-placeholder="Search value">
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
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <select class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="max-price" data-live-search="true" data-live-search-placeholder="Search value">
                                                                    <option value="0" selected="selected">Max Price
                                                                    </option>
                                                                    <option value='10000'>10,000</option>
                                                                    <option value='100000'>100,000</option>
                                                                    <option value='1000000'>1,000,000</option>
                                                                    <option value='10000000'>10,000,000</option>
                                                                    <option value='500000000'>500,000,000</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <button class="search-button float-shadow ">Search</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <a href="<?=site_url('short_let');?>" rel="more-options" id='more-options' class="button  btn-6">More Options <span class="caret"></span></a>

                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Search area start -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner end -->

<!-- Search area start -->
<div class="search-area hidden-lg hidden-md" style="background: #1111111a;
    border-top: 3px solid #f27e13;
    border-bottom: 3px solid #f27e13;">
    <div class="container">
        <div class="search-area-inner">
            <div class="search-contents ">
                <div class="tab-style-2">
                    <div class="tab-style-2-line">
                        <ul class="nav nav-tabs ">
                            <li class="active">
                                <a href="#tab_default_1" data-toggle="tab">BUY </a>
                            </li>
                            <li>
                                <a href="#tab_default_2" data-toggle="tab">RENT </a>
                            </li>
                            <li>
                                <a href="#tab_default_3" data-toggle="tab">SHORTLET </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_default_1">
                                <form method="POST" action=<?=site_url('for_sale/filter');?>>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" id='location' class="custom-select my-1 mr-sm-2 form-control search-fields" name='location' placeholder='Enter Area of Interest... state, city or area'>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">

                                            <select name="subtype" id="type" class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="property-types" data-live-search="true">
                                                <option selected="selected">All Type</option>
                                                <?php foreach ($type_data as $type): ?>
                                                    <option value="<?php echo $type->subtype_name; ?>">
                                                        <?php echo $type->subtype_name; ?>
                                                    </option>
                                                <?php endforeach;?>
                                            </select>

                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="bedroom" data-live-search="true" data-live-search-placeholder="Search value">
                                                <option selected>Any no. of bed</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>+7</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="max-price" data-live-search="true" data-live-search-placeholder="Search value">
                                                <option value='' selected>Max Price</option>
                                                <option value='10000'>10,000</option>
                                                <option value='100000'>100,000</option>
                                                <option value='1000000'>1,000,000</option>
                                                <option value='10000000'>10,000,000</option>
                                                <option value='500000000'>500,000,000</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <button class="search-button float-shadow">Search</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <a href="<?=site_url('for_sale');?>" rel="more-options" id='more-options' class="button  btn-6">More Options <span class="caret"></span></a>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab_default_2">
                                <form method="POST" action=<?=site_url('to_let/filter');?>>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" id='location' class="custom-select my-1 mr-sm-2 form-control search-fields" name='location' placeholder='Enter Area of Interest... state, city or area'>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">

                                            <select name="subtype" id="type" class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="property-types" data-live-search="true">
                                                <option selected="selected">All Type</option>
                                                <?php foreach ($type_data as $type): ?>
                                                    <option value="<?php echo $type->subtype_name; ?>">
                                                        <?php echo $type->subtype_name; ?>
                                                    </option>
                                                <?php endforeach;?>
                                            </select>

                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="bedroom" data-live-search="true" data-live-search-placeholder="Search value">
                                                <option selected>Any no. of bed</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>+7</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="max-price" data-live-search="true" data-live-search-placeholder="Search value">
                                                <option value='' selected>Max Price</option>
                                                <option value='10000'>10,000</option>
                                                <option value='100000'>100,000</option>
                                                <option value='1000000'>1,000,000</option>
                                                <option value='10000000'>10,000,000</option>
                                                <option value='500000000'>500,000,000</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <button class="search-button float-shadow">Search</button>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <a href="<?=site_url('to_let');?>" rel="more-options" id='more-options' class="button  btn-6">More Options <span class="caret"></span></a>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab_default_3">
                                <form action=<?=site_url('short_let/filter');?> method="POST">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" id='location' class="custom-select my-1 mr-sm-2 form-control search-fields" name='location' placeholder='Enter Area of Interest... state, city or area'>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">

                                            <select name="subtype" id="type" class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="property-types" data-live-search="true">
                                                <option selected="selected">All Type</option>
                                                <?php foreach ($type_data as $type): ?>
                                                    <option value="<?php echo $type->subtype_name; ?>">
                                                        <?php echo $type->subtype_name; ?>
                                                    </option>
                                                <?php endforeach;?>
                                            </select>

                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="bedroom" data-live-search="true" data-live-search-placeholder="Search value">
                                                <option selected>Any no. of bed</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>+7</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="custom-select my-1 mr-sm-2 selectpicker search-fields" name="max-price" data-live-search="true" data-live-search-placeholder="Search value">
                                                <option value='' selected>Max Price</option>
                                                <option value='10000'>10,000</option>
                                                <option value='100000'>100,000</option>
                                                <option value='1000000'>1,000,000</option>
                                                <option value='10000000'>10,000,000</option>
                                                <option value='500000000'>500,000,000</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <button class="search-button float-shadow">Search</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <a href="<?=site_url('short_let');?>" rel="more-options" id='more-options' class="button  btn-6">More Options <span class="caret"></span></a>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search area start -->



<?php if (isset($message)) {

    echo '<div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <ul style="list-style-type:disc">' . $message . '</ul>
        </div>';
}?>
<?php if (isset($error)) {

    echo '<div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <ul style="list-style-type:disc">Error!!!  ' . $error . '</ul>
        </div>';
}?>
<!-- Featured properties start -->
<div class="content-area featured-properties">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1><span>Featured</span> Properties</h1>
        </div>

        <div id='category' class="list-inline-listing filters filters-listing-navigation">
            <button class="active btn btn-inline filtr-button filtr" onclick="filterSelection('all')">All</button>
            <button class="btn btn-inline filtr-button filtr" onclick="filterSelection('Commercial')">
                Commercial</button>
            <button class="btn btn-inline filtr-button filtr" onclick="filterSelection('Residential')">
                Residential</button>
            <button class="btn btn-inline filtr-button filtr" onclick="filterSelection('Mixed')"> Mixed</button>
        </div>

        <div class='row container'>

            <?php

foreach ($feature_data as $home) {?>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 filtr-item <?=$home->type_name;?>">

                    <div class="ribbon red"><span>Featured</span></div>

                    <div class="property">
                        <!-- Property img -->
                        <a href="<?=site_url('home/property_view/' . $home->property_ID);?>" class="property-img">

                            <div class="property-tag button sale">
                                <?=$home->category_Name;?>
                            </div>
                            <div class="property-price">
                                <?php if ($home->currency == 'NGN') {
    echo '₦';
} elseif ($home->currency == 'USD') {
    echo '$';
} elseif ($home->currency == 'EUR') {
    echo '€';
} else {
    echo $home->currency;
}
    ?>

                                <?=number_format($home->price);?>

                            </div>

                            <img src="http://smartpro.propertyhub.com.ng/uploads/<?=$home->imageURL;?>" alt="properties-1" class="img-responsive img-fluid">
                        </a>
                        <!-- Property content -->
                        <div class="property-content">
                            <!-- title -->
                            <h1 class="title">
                                <a href="<?=site_url('home/property_view/' . $home->property_ID);?>">
                                    <?=$home->property_Name;?></a>
                            </h1>
                            <a id='fav' href="<?=site_url('user/make_favourite/' . $home->property_ID);?>" data-toggle="tooltip" title="Add as Favorite!">
                                <span class="fa fa-star checked"></span>
                            </a>
                            <!-- Property address -->
                            <h3 class="property-address">
                                <a href="<?=site_url('home/property_view/' . $home->property_ID);?>">
                                    <i class="fa fa-map-marker"></i>
                                    <?=$home->street;?>,
                                    <?=$home->city;?>,
                                    <?=$home->state;?>
                                </a>



                            </h3>
                            <!-- Facilities List -->
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                    <span>
                                        <?=$home->square_meter;?> sqm</span>
                                </li>
                                <li>
                                    <i class="flaticon-bed"></i>
                                    <span>
                                        <?=$home->bedroom;?> Beds</span>
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i>
                                    <span>
                                        <?=$home->bathroom;?> Baths</span>
                                </li>
                                <li>
                                    <i class="flaticon-building"></i>
                                    <span>
                                        <?=$home->toilet;?> Toilet(s)</span>
                                </li>
                            </ul>
                            <!-- Property footer -->
                            <div class="property-footer">
                                <span class="left"><i class="fa fa-calendar-o icon"></i>
                                    <?php
$date = date_create($home->date_Added);
    echo date_format($date, "l, d F, Y");?></span>

                            </div>
                        </div>
                    </div>

                </div>
            <?php
}?>

        </div>
    </div>
</div>
</div>
</div>
<!-- Featured properties end -->
<!-- Ads -->
<div id="ads" class="mrg-btm-70">
    <a href="http://c.jumia.io/?a=134508&c=624&p=r&E=kkYNyk2M4sk%3d&utm_source=cake&utm_medium=affiliation&utm_campaign=134508&utm_term="><img src="https://affiliates.jumia.com/banners/Jumia Nigeria/EverythingonJumia/782x90.jpg" /></a>
</div>
<!-- Ads end-->
<!-- Recently properties start -->
<div class="mrg-btm-70  recently-properties chevron-icon">
    <div class="container-fluid">
        <!-- Main title -->
        <div class="main-title animated" data-animation="fadeInUp" data-animation-delay="100">
            <h1><span>Recently </span> Uploaded Properties</h1>
        </div>
        <div id="recent" class='container'>
            <ul id="c" class="row">
                <?php

foreach ($recent_data as $recent) {?>
                    <li class="col-md-4 col-sm-6 col-xs-12">

                        <!-- Property start -->
                        <div class="property">
                            <!-- Property img -->
                            <div class="property_inner">
                                <figure>
                                    <div class="property-img hovereffect">
                                        <img class="img-responsive" src="http://smartpro.propertyhub.com.ng/uploads/<?=$recent->imageURL;?>" alt="recently-properties1">


                                        <div class="overlay">

                                            <a class="info" href="<?=site_url('home/property_view/' . $recent->property_ID);?>">
                                                <?=$recent->category_Name;?></a>
                                        </div>

                                </figure>

                                <!-- Property content -->
                                <div class="recent-property-content">
                                    <!-- title -->
                                    <h1 class="title">
                                        <a href="<?=site_url('home/property_view/' . $recent->property_ID);?>">
                                            <?=$recent->property_Name;?></a>
                                    </h1>
                                    <!-- Property address -->
                                    <h3 class="property-address">
                                        <a href="<?=site_url('home/property_view/' . $recent->property_ID);?>">
                                            <i class="fa fa-map-marker"></i>
                                            <?=$recent->city;?>,
                                            <?=$recent->state;?>
                                        </a>
                                    </h3>
                                    <!-- Facilities List -->
                                    <div class="facilities clearfix row">
                                        <div class='col-5'>
                                            <i class="flaticon-bed"></i>
                                            <span>
                                                <?=$recent->bedroom;?></span>
                                        </div>
                                        <div class='col-5'>
                                            <i class="flaticon-holidays"></i>
                                            <span>
                                                <?=$recent->bathroom;?></span>
                                        </div>
                                        <div class='col-5'>
                                            <i class="flaticon-building"></i>
                                            <span>
                                                <?=$recent->toilet;?></span>
                                        </div>
                                    </div>
                                    <!-- Property footer -->
                                    <div class="property-footer">
                                        <span class="left"><i class="fa fa-calendar-o icon"></i>
                                            <?php
$date = date_create($recent->date_Added);
    echo date_format($date, "l, d F, Y");?></span>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </li>
                <?php
}?>
            </ul>
        </div>
    </div>
</div>
<!-- Partners block end -->

<br>
<br>
<br>
<!-- Categories strat -->
<div class="categories">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1><span>Popular</span> Places</h1>
        </div>
        <div class="clearfix"></div>
        <div class="row wow">
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="row">
                    <div class="col-sm-6 col-pad wow fadeInLeft delay-01s">
                        <div class="category">
                            <div class="category_bg_box cat-1-bg">
                                <div class="category-overlay">
                                    <span class="category-content">
                                        <span class="category-title">Lagos</span>
                                        <br>
                                        <span class="category-subtitle"><?=$lagos_count;?> Properties</span>
                                        <br>
                                        <a href="#" class="btn button-sm button-theme pulse-grow">View All</a>
                                    </span><!-- /.category-content -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-pad wow fadeInLeft delay-01s">
                        <div class="category">
                            <div class="category_bg_box cat-2-bg">
                                <div class="category-overlay">
                                    <span class="category-content">
                                        <span class="category-title">Benin</span>
                                        <br>
                                        <span class="category-subtitle"><?=$benin_count;?> Properties</span>
                                        <br>
                                        <a href="#" class="btn button-sm button-theme pulse-grow ">View All</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-pad wow fadeInUp delay-01s">
                        <div class="category">
                            <div class="category_bg_box cat-3-bg">
                                <div class="category-overlay">
                                    <span class="category-content">
                                        <span class="category-title">Port-Harcourt</span>
                                        <br>
                                        <span class="category-subtitle"><?=$ph_count;?> Properties</span>
                                        <br>
                                        <a href="#" class="btn button-sm button-theme pulse-grow ">View All</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-12 col-pad wow fadeInRight delay-01s">
                <div class="category">
                    <div class="category_bg_box category_long_bg cat-4-bg">
                        <div class="category-overlay">
                            <span class="category-content">
                                <span class="category-title">Abuja</span>
                                <br>
                                <span class="category-subtitle"><?=$abuja_count;?> Properties</span>
                                <br>
                                <a href="#" class="btn button-sm button-theme pulse-grow ">View All</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Categories end-->
<!-- Agents Area Start -->
<!-- <section class="royal-agents-area">
    <div class="main-title">
        <h1>Our <span>Agents</span></h1>
    </div>
    <div class="royal-agent-slide">
        <div class='row container' style="margin: auto;">

            <div class="single-agent col-md-3 col-xs-12 col-sm-6 col-xl-3">
                <div class="agent-details">
                    <h3>Susan Peter</h3>
                    <p class="position">Team Lead.</p>

                    <div class="agent-contact">
                        <p>
                            <i class="fa fa-phone"></i>
                            08023435647
                        </p>
                        <p>
                            <i class="fa fa-envelope-o"></i>
                            susan@sph.com
                        </p>

                        <div class="social-link">
                            <a class="twitter" target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="facebook" target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                            <a class="google" target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                            <a class="linkedin" target="_blank" href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="agent-image">
                        <img src="<?php echo base_url(); ?>img/team/1.jpg" alt="agent image" />
                        <div class="agent_img_overlay_1"></div>
                    </div>
                </div>
            </div>


            <div class="single-agent col-md-3 col-xs-12 col-sm-6 col-xl-3">
                <div class="agent-details">
                    <h3>John Ibe</h3>
                    <p class="position">Company Agent.</p>

                    <div class="agent-contact">
                        <p>
                            <i class="fa fa-phone"></i>
                            09023556473
                        </p>
                        <p>
                            <i class="fa fa-envelope-o"></i>
                            john@sph.com
                        </p>

                        <div class="social-link">
                            <a class="twitter" target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="facebook" target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                            <a class="google" target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                            <a class="linkedin" target="_blank" href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="agent-image">
                        <img src="<?php echo base_url(); ?>img/team/5.jpg" alt="agent image" />
                        <div class="agent_img_overlay_1"></div>
                    </div>
                </div>
            </div>



            <div class="single-agent col-md-3 col-xs-12 col-sm-6 col-xl-3">
                <div class="agent-details">
                    <h3>Bidemi Enitan</h3>
                    <p class="position">Company Agent.</p>
                    <div class="agent-contact">
                        <p>
                            <i class="fa fa-phone"></i>
                            0902347586
                        </p>
                        <p>
                            <i class="fa fa-envelope-o"></i>
                            bidemi@sph.com
                        </p>
                        <div class="social-link">
                            <a class="twitter" target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="facebook" target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                            <a class="google" target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                            <a class="linkedin" target="_blank" href="#"><i class="fa fa-linkedin"></i></a>
                        </div>

                    </div>
                    <div class="agent-image">
                        <img src="<?php echo base_url(); ?>img/team/3.jpg" alt="agent image" />
                        <div class="agent_img_overlay_1"></div>
                    </div>
                </div>
            </div>


            <div class="single-agent col-md-3 col-xs-12 col-sm-6 col-xl-3">
                <div class="agent-details">
                    <h3>Nnamdi Okukwe</h3>
                    <p class="position">Company Agent.</p>
                    <div class="agent-contact">
                        <p>
                            <i class="fa fa-phone"></i>
                            07037485768
                        </p>
                        <p>
                            <i class="fa fa-envelope-o"></i>
                            okukwe@sph.com
                        </p>
                        <div class="social-link">
                            <a class="twitter" target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="facebook" target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                            <a class="google" target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                            <a class="linkedin" target="_blank" href="#"><i class="fa fa-linkedin"></i></a>
                        </div>

                    </div>
                    <div class="agent-image">
                        <img src="<?php echo base_url(); ?>img/team/4.jpg" alt="agent image" />
                        <div class="agent_img_overlay_1"></div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section> -->
<!-- Agents Area End -->


<!-- Agent section end -->


<div class="mrg-btm-70 customer-say chevron-icon">
    <br>
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1><span>What </span>clients Say </h1>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="2500">
                        <!-- Carousel indicators -->
                        <ol class="carousel-indicators">
                            <!-- <li data-target="#fade-quote-carousel" data-slide-to="0"></li>
                            <li data-target="#fade-quote-carousel" data-slide-to="1"></li>
                            <li data-target="#fade-quote-carousel" data-slide-to="2" class="active"></li> -->
                            <!-- <li data-target="#fade-quote-carousel" data-slide-to="3"></li>
                            <li data-target="#fade-quote-carousel" data-slide-to="4"></li>
                            <li data-target="#fade-quote-carousel" data-slide-to="5"></li> -->
                        </ol>

                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <div class="item">
                                <div class="profile-circle">
                                    <h2>Dr. Tinu</h2>
                                    <h5>Landlord|seller, Lagos</h5>
                                </div>
                                <blockquote>
                                    <i class="fa fa-quote-left quote fa-2x"></i>
                                    <p>Highly effective and reliable</p>
                                    <i class="fa fa-quote-right quote fa-2x"></i>
                                </blockquote>
                            </div>
                            <div class="active item">
                                <div class="profile-circle">
                                    <h2>Dr. Tinu</h2>
                                    <h5>Landlord|seller, Lagos</h5>
                                </div>
                                <blockquote>
                                    <i class="fa fa-quote-left quote fa-2x"></i>
                                    <p>Highly effective and reliable</p>
                                    <i class="fa fa-quote-right quote fa-2x"></i>
                                </blockquote>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<!-- Counters strat -->
<div class="counters">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 bordered-right">
                <div class="counter-box">
                    <i class="flaticon-tag"></i>
                    <h1 class="counter">
                        <?=$forsale_count;?>
                    </h1>
                    <p>Listing For Sales</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 bordered-right">
                <div class="counter-box">
                    <i class="flaticon-symbol-1"></i>
                    <h1 class="counter">
                        <?=$rent_count;?>
                    </h1>
                    <p>Listing For Rents</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 bordered-right">
                <div class="counter-box">
                    <i class="flaticon-people-1"></i>
                    <h1 class="counter">
                        <?=$shortlet_count;?>
                    </h1>
                    <p>Listing For ShortLets</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-people"></i>
                    <h1 class="counter">
                        <?=$agent_count;?>
                    </h1>
                    <p>Brokers/Consultants</p>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Counters end -->

<!-- Partners block start -->
<div class="partners-block">
    <div class="container">
        <div class="main-title">
            <h1><span>Our Partners</span></h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel our-partners slide" id="ourPartners">
                    <div class="carousel-inner">

                        <div class="item active">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <a href="#">
                                    <img src="<?php echo base_url(); ?>img/brand/adron.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <a href="#">
                                    <img src="<?php echo base_url(); ?>img/brand/arc-view.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <a href="#">
                                    <img src="<?php echo base_url(); ?>img/brand/landwey.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <a href="#">
                                    <img src="<?php echo base_url(); ?>img/brand/propertymart.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <a href="#">
                                    <img src="<?php echo base_url(); ?>img/brand/revolutionplus.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- <a class="left carousel-control" href="#" data-slide="prev"><i class="fa fa-chevron-left icon-prev"></i></a>
                    <a class="right carousel-control" href="#" data-slide="next"><i class="fa fa-chevron-right icon-next"></i></a> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    filterSelection("all")

    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filtr-item");
        if (c == "all") c = "";
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("category");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }

    var timer = 10000;

    var i = 0;
    var max = $('#c > li').length;

    $("#c > li").eq(i).addClass('active').css('left', '0');
    $("#c > li").eq(i + 1).addClass('active').css('left', '25%');
    $("#c > li").eq(i + 2).addClass('active').css('left', '50%');
    $("#c > li").eq(i + 3).addClass('active').css('left', '75%');


    setInterval(function() {

        $("#c > li").removeClass('active');

        $("#c > li").eq(i).css('transition-delay', '0.25s');
        $("#c > li").eq(i + 1).css('transition-delay', '0.5s');
        $("#c > li").eq(i + 2).css('transition-delay', '0.75s');
        $("#c > li").eq(i + 3).css('transition-delay', '1s');

        if (i < max - 4) {
            i = i + 4;
        } else {
            i = 0;
        }

        $("#c > li").eq(i).css('left', '0').addClass('active').css('transition-delay', '1.25s');
        $("#c > li").eq(i + 1).css('left', '25%').addClass('active').css('transition-delay', '1.5s');
        $("#c > li").eq(i + 2).css('left', '50%').addClass('active').css('transition-delay', '1.75s');
        $("#c > li").eq(i + 3).css('left', '75%').addClass('active').css('transition-delay', '2s');

    }, timer);
</script>
<script src="<?php echo base_url(); ?>js/owl.carousel.min.js"></script>

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<!-- <script src="<?php echo base_url(); ?>js/range-Slider.min.js"></script>  -->