<link rel="stylesheet" href="<?php echo base_url(); ?>css/ui.ba43eb92.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/detail.2b0bf58f.css">


<main id="main-content" class="detail-page">
    <div class="container">
        <div class="property_data justify-content-md-center">
            <div class="col col-md-12 col-lg-12 col-xl-10">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$property_data->property_Name;?></li>
                </ol>

            </div>
        </div>

        <div class="ui-layout">
            <div class="dp-grid-wrapper" data-component="sticky-adverts-end">
                <div class="dp-gallery-wrapper">

                    <div style='margin-top: 20px;
    height: 500px;'>
                        <div id="main_area">
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-xs-12" id="slider" style='width:100%'>
                                    <!-- Top part of the slider -->
                                    <div class="row">
                                        <div class="col-sm-11" id="carousel-bounding-box">
                                            <div class="carousel slide" id="myCarousel">
                                                <!-- Carousel items -->
                                                <div class="carousel-inner">
                                                    <?php $i = 0;
foreach ($images as $img) {
    $i = $i + 1;
    ?>

                                                                                <div class="<?=$img->imageStatus;?> item" data-slide-number="<?=$i;?>">
                                                                                                                    <img class='img-fluid img-responsive pty-img' style='height: 450px;' src="http://smartpro.propertyhub.com.ng/uploads/<?=$img->imageURL;?>"></div>
                                                                                                                                                                                                                                                                                                                <?php
}?>

                                                </div><!-- Carousel nav -->
                                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                                </a>
                                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                                </a>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!--/Slider-->

                            <div class="row hidden-xs" id="slider-thumbs">
                                <!-- Bottom switcher of slider -->
                                <ul class="hide-bullets">
                                    <?php
$x = 0;
foreach ($images as $img) {
    ?>
                                                                                                                                                                                <li class="col-sm-2">
                                                                                                                                                                                    <a class="thumbnail carousel-selector" id="carousel-selector-<?=$x;?>"><img src="http://smartpro.propertyhub.com.ng/uploads/<?=$img->imageURL;?>"></a>
                                                                                                                                                                                </li>

                                                                                                                                                                                <?php $x++;
}?>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="dp-sidebar-wrapper" data-component="sticky-adverts-start">
                    <div id="dp-sticky-element" class="dp-sidebar-wrapper__content">
                        <article class="dp-sidebar-wrapper__summary">
                            <div class="ui-property-summary">
                                <h1 class="ui-property-summary__title ui-title-subgroup">
                                    <i class="fa fa-building-o"></i> <?=$property_data->property_Name;?> </h1>

                                <h2 class="ui-property-summary__address"><i class="fa fa-map-marker"></i> <?=$property_data->street;?>,
                                    <?=$property_data->state;?>,<?=$property_data->country;?></h2>
                            </div>
                            <ul class="ui-property-indicators ui-list-flat">
                                <li class="ui-property-indicators__item">
                                    <span class="ui-flag ui-flag--just-added">
                                        <?=$property_data->category_Name;?> </span>
                                </li>
                                <li class="ui-property-indicators__item">
                                    <span class="ui-tag">
                                        <?=$property_data->subtype;?> </span>
                                </li>
                            </ul>
                            <div class="ui-pricing">
                                <!-- <span class="ui-pricing__qualifier ui-text-secondary">Guide price</span> -->

                                <p class="ui-pricing__main-price ui-text-t4">
                                    <?php if ($property_data->currency == 'NGN') {
    echo '₦';
} elseif ($property_data->currency == 'USD') {
    echo '$';
} elseif ($property_data->currency == 'EUR') {
    echo '€';
} else {
    echo $property_data->currency;
}
?>

                                    <?=number_format($property_data->price);?>
                                </p>

                                <span class="user-favourite-panel">
                                    <a class="ui-button-favourite" href="<?=site_url('user/make_favourite/' . $property_data->property_ID);?>" rel="nofollow" data-track-category="listing details" data-track-action="signin to save" data-track-label="save listing">
                                        <i class='fa fa-star' style='font-size:20px'></i> Add To Favourite
                                    </a>
                                </span>

                                <div class="ui-pricing__other-price">

                                    <?php if ($property_data->square_meter) {?>
                                                                                                                                                                                <p class="ui-pricing__area-price"><?=$property_data->square_meter;?>/sqm</p>
                                                                                                                                                                                                                                                                                                                                <?php
}?>
                                </div>

                            </div>
                        </article>

                        <div class="dp-sidebar-wrapper__contact">





                            <div class="ui-agent">
                                <span class="ui-visually-hidden">Agent information</span>

                                <div class="ui-agent__logo">

                                    <img src="http://smartpro.propertyhub.com.ng/uploads/agent/<?=$agent_data->avatar_url;?>" alt="Agent_avatar" class="js-lazy">
                                    <noscript>
                                        <img src="http://smartpro.propertyhub.com.ng/uploads/agent/<?=$agent_data->avatar_url;?>" alt="Agent_avatar" class="">
                                    </noscript> </div>
                                <div class="ui-agent__text">
                                    <h4 class="ui-agent__name"><?=$agent_data->firstname . ' ' . $agent_data->lastname;?></h4>
                                    <address class="ui-agent__address"><?=$agent_data->office_address?></address>
                                </div>


                                <p class="ui-agent__tel ui-agent__text">

                                    <a class="ui-link" href="tel:<?=$agent_data->mobile;?>" data-track-category="listing details" data-track-action="Click to call" data-track-label="Agent phone number 1">
                                        <span class="ui-visually-hidden">Call </span>
                                        <i class='fa fa-phone'></i><?=$agent_data->mobile . ', ' . $agent_data->office_line;?>
                                    </a>
                                </p>

                            </div>
                            <div class="dp-contact-agent__wrapper">

                                <a target='_blank' href="<?php echo site_url("property_mgt/inspection/" . $property_data->property_ID); ?>" class="btn btn-sm animated-button thar-three">Email Broker</a>
                            </div>
                            <div class="dp-sidebar-wrapper__actions">


                                <!-- <div class="ui-social-sharing">
                                          <ul class="ui-social-sharing-list ui-list-flat">
                                              <li class="ui-social-sharing-list__item">
                                                  <a class="ui-social-sharing-list__item-link" href="https://www.zoopla.co.uk/friend/50844777?section=for-sale" data-track-category="listing details" data-track-action="click to share" data-track-label="email" data-track-value="50844777">
                                                      <svg class="ui-icon icon-email" role="presentation" aria-hidden="true">
                                                          <use xlink:href="static/svg/ui.dc393249.svg#icon-email"></use>
                                                      </svg>
                                                      <span class="ui-visually-hidden">Share this property via email</span>
                                                  </a>
                                              </li>
                                              <li class="ui-social-sharing-list__item">
                                                  <a class="ui-social-sharing-list__item-link" href="https://www.facebook.com/sharer/sharer.php?u=https://www.zoopla.co.uk/new-homes/details/50844777" target="_blank" data-track-category="listing details" data-track-action="click to share" data-track-label="facebook" data-track-value="50844777">
                                                      <svg class="ui-icon icon-facebook" role="presentation" aria-hidden="true">
                                                          <use xlink:href="static/svg/ui.dc393249.svg#icon-facebook"></use>
                                                      </svg>
                                                      <span class="ui-visually-hidden">Share this property on Facebook</span>
                                                  </a>
                                              </li>
                                              <li class="ui-social-sharing-list__item">
                                                  <a class="ui-social-sharing-list__item-link" href="https://twitter.com/intent/tweet?url=https://www.zoopla.co.uk/new-homes/details/50844777&amp;text=Check%20out%20this%203%20bed%20detached%20house%20for%20sale%20on%20%23Zoopla&amp;via=Zoopla" target="_blank" data-track-category="listing details" data-track-action="click to share" data-track-label="twitter" data-track-value="50844777">
                                                      <svg class="ui-icon icon-twitter" role="presentation" aria-hidden="true">
                                                          <use xlink:href="static/svg/ui.dc393249.svg#icon-twitter"></use>
                                                      </svg>
                                                      <span class="ui-visually-hidden">Share this property on Twitter</span>
                                                  </a>
                                              </li>
                                          </ul>
                                      </div> -->
                            </div>


                        </div>
                    </div>
                </div>

                <style class="cp-pen-styles">
                    .nav-tabs>li>a:hover,
                    .nav-tabs>li>a:focus {
                        background: none;
                        border: none;
                        color: #149ec5;
                    }


                    .nav-tabs>li.active {
                        cursor: pointer;
                        color: #149ec5;
                        border-top: 5px solid #ef7d1b;
                        border-bottom-color: transparent;
                    }

                    .nav-tabs>li.active>a:hover,
                    .nav-tabs>li.active>a:focus {
                        background: #f2f2f2;
                        border: none;
                        box-shadow: none;
                        color: #149ec5;
                    }

                    .nav-tabs>li {
                        padding: 1em 0.5em 0.5em;
                        border: 1px solid #fff;
                        border-top: 5px solid transparent;
                        border-right: 1px solid #bfbbbb;
                        border-bottom-color: #ddd;
                        margin: 0;
                        color: grey;
                        min-width: 125px;
                        font-size: 16px;
                        max-width: 200px;
                        /* white-space: normal; */
                        /* background: #f2f2f2; */
                        transition: border-top ease-out 0.3s, background ease-out 0.3s;
                    }

                    .nav-tabs>li a {
                        color: #a8adb4;
                        transition: color ease-out 0.3s;
                        padding: 0;
                        border: none;
                        background: none;
                    }

                    .nav-tabs>li:hover a {
                        color: #149ec5;
                        background: none;
                    }

                    .nav>li>a {
                        display: block;
                        position: relative;
                        width: 100%;
                        height: 100%;
                        line-height: 1.2em;
                        margin: 0;
                    }
                </style>

                <div class="container dp-tabs">
                    <ul class="nav nav-tabs ui-list-flat" role="tablist">
                        <li role="presentation" class="active">
                            <a id="property-details-control" href="#property-details-tab" role="tab" data-toggle="tab">

                                <span class="dp-tab__title">Property details</span>
                            </a>

                        </li>

                        <li role="presentation">
                            <a role="tab" id="map-control" href="#map-tab" data-toggle="tab">

                                <span class="dp-tab__title">Map &amp; Nearby</span>
                            </a>

                        </li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <section role="tabpanel" id="property-details-tab" aria-labelledby="property-details-control" class="tab-pane active">
                            <h2 class="ui-visually-hidden">Property details</h2>


                            <div class="dp-tabpanel__subgroup">

                                <ul class="dp-features-list dp-features-list--counts ui-list-icons">
                                    <li class="dp-features-list__item">
                                        <i class="flaticon-bed"></i>
                                        <span class="dp-features-list__text"><?=$property_data->bedroom;?> bedrooms</span>
                                    </li>
                                    <li class="dp-features-list__item">
                                        <i class="flaticon-holidays"></i>
                                        <span class="dp-features-list__text"><?=$property_data->toilet;?> bathrooms</span>
                                    </li>
                                    <li class="dp-features-list__item">
                                        <i class="flaticon-building"></i>
                                        <span class="dp-features-list__text"><span><?=$property_data->bathroom;?> Toilet(s)</span>
                                    </li>
                                    <?php if ($property_data->square_meter) {?>

                                                                                                                                                                                <i class="fa fa-building-o"></i>
                                                                                                                                                                                <span class="ui-visually-hidden">Floor area</span>
                                                                                                                                                                                <span class="dp-features-list__text"><span><?=$property_data->square_meter;?> sq.m</span>
                                                                                                                                                                                </li>
                                                                                                                                                                                                                                                                                                                    <?php
}?>

                                </ul>
                            </div>


                            <div class="dp-tabpanel__subgroup dp-features-with-ad">
                                <div id="view-features">
                                    <a href="http://c.jumia.io/?a=134508&c=441&p=r&E=kkYNyk2M4sk%3d&utm_source=cake&utm_medium=affiliation&utm_campaign=134508&utm_term="><img src="https://affiliates.jumia.com/banners/Jumia Nigeria/MensAccessories/728X90.jpg" /></a>
                                    <h3 class="headline">Property Features</h3>
                                    <ul class="checked_list feature-list">
                                        <?php

$features = explode(',', $property_data->features);

foreach ($features as $feature) {
    echo '<li>' . $feature . '</li>';
}?>
                                    </ul>
                                </div>
                                <section class="dp-features">

                            </div>



                            <div class="dp-tabpanel__subgroup">

                                <section class="dp-description item-description" id="dp-description-collapse">
                                    <h3 id="dp-description-expand" class="ui-title-subgroup headline" data-target="desc-collapsed">
                                        Description</h3>

                                    <div class="dp-description__text ">
                                        <?=$property_data->description;?>
                                    </div>



                                </section>



                            </div>
                        </section>
                        <section class="tab-pane" role="tabpanel" id="map-tab" aria-labelledby="map-tab">
                            <h2 class="ui-visually-hidden">Map &amp; Nearby</h2>

                            <div class="mapouter">
                                <div class="gmap_canvas"><iframe width="2000" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=<?=$property_data->city;?><?=$property_data->state;?><?=$property_data->country;?>&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de/webdesign/">webdesign
                                        pure black</a></div>
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


                        </section>

                    </div>

                </div>



                <!-- <div class="dp-tabs">

                    <ul class="ui-list-flat" role="tablist" aria-label="Tabs">

                        <li role="presentation">
                            <a role="tab" aria-selected="true" aria-controls="property-details-tab" id="property-details-control" href="#property-details-tab" data-track-category="listing details" data-track-action="open tab" data-track-label="details tab">

                                <span class="dp-tab__title">Property details</span>
                            </a>
                        </li>

                        <li role="presentation">
                            <a role="tab" aria-selected="false" aria-controls="map-tab" id="map-control" href="#map-tab" data-track-category="listing details" data-track-action="open tab" data-track-label="map tab">

                                <span class="dp-tab__title">Map &amp; Nearby</span>
                            </a>
                        </li>

                    </ul>
                    <section tabindex="0" role="tabpanel" id="property-details-tab" aria-labelledby="property-details-control">
                        <h2 class="ui-visually-hidden">Property details</h2>


                        <div class="dp-tabpanel__subgroup">

                            <ul class="dp-features-list dp-features-list--counts ui-list-icons">
                                <li class="dp-features-list__item">
                                    <i class="flaticon-bed"></i>
                                    <span class="dp-features-list__text"><?=$property_data->bedroom;?> bedrooms</span>
                                </li>
                                <li class="dp-features-list__item">
                                    <i class="flaticon-holidays"></i>
                                    <span class="dp-features-list__text"><?=$property_data->toilet;?> bathrooms</span>
                                </li>
                                <li class="dp-features-list__item">
                                    <i class="flaticon-building"></i>
                                    <span class="dp-features-list__text"><span><?=$property_data->bathroom;?> Toilet(s)</span>
                                </li>
                                <?php if ($property_data->square_meter) {?>

                                                                                                                                                                                                                                            <i class="fa fa-building-o"></i>
                                                                                                                                                                                                                                            <span class="ui-visually-hidden">Floor area</span>
                                                                                                                                                                                                                                            <span class="dp-features-list__text"><span><?=$property_data->square_meter;?> sq.m</span>
                                                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <?php
}?>

                            </ul>
                        </div>


                        <div class="dp-tabpanel__subgroup dp-features-with-ad">
                            <div id="view-features">

                                <h3 class="headline">Property Features</h3>
                                <ul class="checked_list feature-list">
                                    <?php

$features = explode(',', $property_data->features);

foreach ($features as $feature) {
    echo '<li>' . $feature . '</li>';
}?>
                                </ul>
                            </div>
                            <section class="dp-features">

                        </div>



                        <div class="dp-tabpanel__subgroup">

                            <section class="dp-description item-description" id="dp-description-collapse">
                                <h3 id="dp-description-expand" class="ui-title-subgroup headline" data-target="desc-collapsed">
                                    Description</h3>

                                <div class="dp-description__text ">
                                    <?=$property_data->description;?>
                                </div>



                            </section>



                        </div>
                    </section>
                    <section tabindex="0" role="tabpanel" id="map-tab" aria-labelledby="map-tab">
                        <h2 class="ui-visually-hidden">Map &amp; Nearby</h2>

                        <div class="ui-interactive-map">

                        </div>


                    </section>


                </div> -->
            </div>


            <div class="ui-layout__halves">
                <section class="dp-agent-block">
                    <h2 class="ui-title-group">The Agent</h2>


                    <div class="ui-agent">
                        <span class="ui-visually-hidden">Agent information</span>
                        <div class='row'>
                            <div class="ui-agent__logo col-4">
                                <img src="http://smartpro.propertyhub.com.ng/uploads/agent/<?=$agent_data->avatar_url;?>" alt="avaetar" class="js-lazy">
                                <noscript>
                                    <img src="http://smartpro.propertyhub.com.ng/uploads/agent/<?=$agent_data->avatar_url;?>" alt="avaetar" class="">
                                </noscript>
                            </div>

                            <div class='col-8'>
                                <div class="ui-agent__text">
                                    <h4 class="ui-agent__name"><?=$agent_data->firstname . '  ' . $agent_data->lastname;?></h4>
                                    <span class="ui-visually-hidden">Agent address, </span>
                                    <address class="ui-agent__address"><?=$agent_data->office_address;?></address>
                                </div>


                                <p class="ui-agent__tel ui-agent__text">

                                    <a class="ui-link" href="tel:<?=$agent_data->mobile;?>" data-track-category="listing details" data-track-action="Click to call" data-track-label="Agent phone number 2">
                                        <span class="ui-visually-hidden">Call </span>
                                        <?=$agent_data->mobile . ' ,  ' . $agent_data->office_line;?>
                                    </a>
                                </p>
                                <p class="ui-agent__tel ui-agent__text" style='color: #91919b;'> <?=$agent_data->email;?></p>


                            </div>
                        </div>


                    </div>
                    <!-- <p class="ui-agent__link ui-agent__text">
                        <a href="#" class="ui-link" data-track-category="listing details" data-track-action="clickthrough" data-track-label="agent properties link">View agent properties</a>
                    </p> -->
                </section>

            </div>

            <a href="http://c.jumia.io/?a=134508&c=1399&p=r&E=kkYNyk2M4sk%3d&utm_source=cake&utm_medium=affiliation&utm_campaign=134508&utm_term="><img src="https://affiliates.jumia.com/banners/Jumia Nigeria/JumiaHomeMakeOver2019/728x90.jpg" /></a>
            <div class="dp-similar-wrapper">
                <div class="ui-listings-carousel-container">
                    <h2 class="ui-title-group">Similar properties</h2>
                    <ul class="ui-listings-carousel">
                        <?php foreach ($similar_data as $similar) {?>


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <li class="ui-listings-carousel__item">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <article class="ui-property-card">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <a class="ui-property-card__link" href="<?=site_url('home/property_view/' . $similar->property_ID);?>" data-track-category="listing details" data-track-action="clickthrough" data-track-label="similar listing card image" data-track-value="1">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="ui-property-card__media">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <img data-src="http://smartpro.propertyhub.com.ng/uploads/<?=$similar->imageURL;?>" src="http://smartpro.propertyhub.com.ng/uploads/<?=$similar->imageURL;?>" alt="3 bed semi-detached house for sale in Station Road, Bramley, Guildford GU5" class="js-lazy ui-property-card__media-image">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="ui-pricing">

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <p class="ui-pricing__main-price ui-text-t4">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <?php if ($similar->currency == 'NGN') {
    echo '₦';
} elseif ($similar->currency == 'USD') {
    echo '$';
} elseif ($similar->currency == 'EUR') {
    echo '€';
} else {
    echo $similar->currency;
}
    ?>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <?=number_format($similar->price);?></p>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="ui-property-summary">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <h3 class="ui-property-summary__title ui-title-component">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <a class="ui-property-summary__link" href="<?=site_url('home/property_view/' . $similar->property_ID);?>" data-track-category="listing details" data-track-action="clickthrough" data-track-label="similar listing card title" data-track-value="1">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <?=$similar->property_Name;?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </h3>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <h4 class="ui-property-summary__address"><?=$similar->street;?>,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <?=$similar->city;?>,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <?=$similar->state;?>,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <?=$similar->country;?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </h4>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </article>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <?php
}?>
                    </ul>
                </div>
            </div>


            <div>


            </div>
        </div>



</main>


<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script>
    jQuery(document).ready(function($) {

        $('#myCarousel').carousel({
            interval: 5000
        });

        $('#carousel-text').html($('#slide-content-0').html());

        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function() {
            var id = this.id.substr(this.id.lastIndexOf("-") + 1);
            var id = parseInt(id);
            $('#myCarousel').carousel(id);
        });


        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function(e) {
            var id = $('.item.active').data('slide-number');
            $('#carousel-text').html($('#slide-content-' + id).html());
        });
    });
</script>