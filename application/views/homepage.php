<link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/range-Slider.min.css">
<!-- Banner start -->
<section class="banner banner_video_bg">
    <div class="pattern-overlay" id="carousel-example-generic">
        <a id="bgndVideo" class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=5e0LxrLSzok',containment:'.banner_video_bg', quality:'large', autoPlay:true, mute:true, opacity:1}"></a>
        <!-- Wrapper for slides -->
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
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_default_1">


                                                    <form method="POST">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group">

                                                                <select class="custom-select my-1 mr-sm-2 selectpicker search-fields"
                                                                    name="location" data-live-search="true"
                                                                    data-live-search-style="startsWith"
                                                                    data-live-search-placeholder="Search value">
                                                                    <option selected>Location</option>
                                                                    <option value='United States'>United States</option>
                                                                    <option value='United Kingdom'>United Kingdom</option>
                                                                    <option value='American Samoa'>American Samoa</option>
                                                                    <option value='Belgium'>Belgium</option>
                                                                    <option value='Cameroon'>Cameroon</option>
                                                                    <option value='Canada'>Canada</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <select class="custom-select my-1 mr-sm-2 selectpicker search-fields"
                                                                    name="property-types" data-live-search="true"
                                                                    data-live-search-placeholder="Search value">
                                                                    <option selected>Property Types</option>
                                                                    <option>Residential</option>
                                                                    <option>Commercial</option>
                                                                    <option>Land</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <select class="custom-select my-1 mr-sm-2 selectpicker search-fields"
                                                                    name="bedrooms" data-live-search="true"
                                                                    data-live-search-placeholder="Search value">
                                                                    <option selected>Bedrooms</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <select class="custom-select my-1 mr-sm-2 selectpicker search-fields"
                                                                    name="minimum price" data-live-search="true"
                                                                    data-live-search-placeholder="Search value">
                                                                    <option selected>Min Price</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <select class="custom-select my-1 mr-sm-2 selectpicker search-fields"
                                                                    name="maximum price" data-live-search="true"
                                                                    data-live-search-placeholder="Search value">
                                                                    <option selected>Max Price</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                                            <div class="form-group">
                                                                <button class="search-button">Search</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane" id="tab_default_2">
                                                    <form method="POST">

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <select class="selectpicker search-fields" name="location"
                                                                    data-live-search="true"
                                                                    data-live-search-placeholder="Search value">
                                                                    <option>Location</option>
                                                                    <option>United States</option>
                                                                    <option>United Kingdom</option>
                                                                    <option>American Samoa</option>
                                                                    <option>Belgium</option>
                                                                    <option>Cameroon</option>
                                                                    <option>Canada</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <select class="selectpicker search-fields" name="property-types"
                                                                    data-live-search="true"
                                                                    data-live-search-placeholder="Search value">
                                                                    <option>Property Types</option>
                                                                    <option>Residential</option>
                                                                    <option>Commercial</option>
                                                                    <option>Land</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <select class="selectpicker search-fields" name="bedrooms"
                                                                    data-live-search="true"
                                                                    data-live-search-placeholder="Search value">
                                                                    <option>Bedrooms</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <select class="selectpicker search-fields" name="minimum price"
                                                                    data-live-search="true"
                                                                    data-live-search-placeholder="Search value">
                                                                    <option>Min Price</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <select class="selectpicker search-fields" name="maximum price"
                                                                    data-live-search="true"
                                                                    data-live-search-placeholder="Search value">
                                                                    <option>Max Price</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                                            <div class="form-group">
                                                                <button class="search-button btn">Search</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane" id="tab_default_3">
                                                    <form method="POST">

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <select class="selectpicker search-fields" name="location"
                                                                    data-live-search="true"
                                                                    data-live-search-placeholder="Search value">
                                                                    <option>Location</option>
                                                                    <option>United States</option>
                                                                    <option>United Kingdom</option>
                                                                    <option>American Samoa</option>
                                                                    <option>Belgium</option>
                                                                    <option>Cameroon</option>
                                                                    <option>Canada</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <select class="selectpicker search-fields" name="property-types"
                                                                    data-live-search="true"
                                                                    data-live-search-placeholder="Search value">
                                                                    <option>Property Types</option>
                                                                    <option>Residential</option>
                                                                    <option>Commercial</option>
                                                                    <option>Land</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <select class="selectpicker search-fields" name="bedrooms"
                                                                    data-live-search="true"
                                                                    data-live-search-placeholder="Search value">
                                                                    <option>Bedrooms</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <select class="selectpicker search-fields" name="minimum price"
                                                                    data-live-search="true"
                                                                    data-live-search-placeholder="Search value">
                                                                    <option>Min Price</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <div class="form-group">
                                                                <select class="selectpicker search-fields" name="maximum price"
                                                                    data-live-search="true"
                                                                    data-live-search-placeholder="Search value">
                                                                    <option>Max Price</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                                            <div class="form-group">
                                                                <button class="search-button">Search</button>
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
    border-bottom: 3px solid #f27e13;
">
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
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_default_1">
                                <form method="POST">

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="location" data-live-search="true"
                                                data-live-search-placeholder="Search value">
                                                <option>Location</option>
                                                <option>United States</option>
                                                <option>United Kingdom</option>
                                                <option>American Samoa</option>
                                                <option>Belgium</option>
                                                <option>Cameroon</option>
                                                <option>Canada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="property-types"
                                                data-live-search="true" data-live-search-placeholder="Search value">
                                                <option>Property Types</option>
                                                <option>Residential</option>
                                                <option>Commercial</option>
                                                <option>Land</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="bedrooms" data-live-search="true"
                                                data-live-search-placeholder="Search value">
                                                <option>Bedrooms</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="minimum price"
                                                data-live-search="true" data-live-search-placeholder="Search value">
                                                <option>Min Price</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="maximum price"
                                                data-live-search="true" data-live-search-placeholder="Search value">
                                                <option>Max Price</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                        <div class="form-group">
                                            <button class="search-button">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab_default_2">
                                <form method="POST">

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="location" data-live-search="true"
                                                data-live-search-placeholder="Search value">
                                                <option>Location</option>
                                                <option>United States</option>
                                                <option>United Kingdom</option>
                                                <option>American Samoa</option>
                                                <option>Belgium</option>
                                                <option>Cameroon</option>
                                                <option>Canada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="property-types"
                                                data-live-search="true" data-live-search-placeholder="Search value">
                                                <option>Property Types</option>
                                                <option>Residential</option>
                                                <option>Commercial</option>
                                                <option>Land</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="bedrooms" data-live-search="true"
                                                data-live-search-placeholder="Search value">
                                                <option>Bedrooms</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="minimum price"
                                                data-live-search="true" data-live-search-placeholder="Search value">
                                                <option>Min Price</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="maximum price"
                                                data-live-search="true" data-live-search-placeholder="Search value">
                                                <option>Max Price</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                        <div class="form-group">
                                            <button class="search-button">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab_default_3">
                                <form method="POST">

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="location" data-live-search="true"
                                                data-live-search-placeholder="Search value">
                                                <option>Location</option>
                                                <option>United States</option>
                                                <option>United Kingdom</option>
                                                <option>American Samoa</option>
                                                <option>Belgium</option>
                                                <option>Cameroon</option>
                                                <option>Canada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="property-types"
                                                data-live-search="true" data-live-search-placeholder="Search value">
                                                <option>Property Types</option>
                                                <option>Residential</option>
                                                <option>Commercial</option>
                                                <option>Land</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="bedrooms" data-live-search="true"
                                                data-live-search-placeholder="Search value">
                                                <option>Bedrooms</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="minimum price"
                                                data-live-search="true" data-live-search-placeholder="Search value">
                                                <option>Min Price</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="maximum price"
                                                data-live-search="true" data-live-search-placeholder="Search value">
                                                <option>Max Price</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                        <div class="form-group">
                                            <button class="search-button"><span>Search </span></button>
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

<!-- Featured properties start -->
<div class="content-area featured-properties">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1><span>Featured</span> Properties</h1>
        </div>
        <ul class="list-inline-listing filters filters-listing-navigation">
            <li class="active btn filtr-button filtr" data-filter="all">All</li>
            <li data-filter="1" class="btn btn-inline filtr-button filtr">House</li>
            <li data-filter="2" class="btn btn-inline filtr-button filtr">Office</li>
            <li data-filter="3" class="btn btn-inline filtr-button filtr">Apartment</li>
            <li data-filter="4" class="btn btn-inline filtr-button filtr">Residential</li>
        </ul>
        <div class="row">
            <div class="filtr-container">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  filtr-item" data-category="1, 2, 3">
                    <div class="property">
                        <!-- Property img -->
                        <a href="#" class="property-img">

                            <div class="property-tag button sale">For Sale</div>
                            <div class="property-price">&#8358;150,000</div>
                            <img src="<?php echo base_url(); ?>img/properties\p-1.jpg" alt="properties-1" class="img-responsive img-fluid">
                        </a>
                        <!-- Property content -->
                        <div class="property-content">
                            <!-- title -->
                            <h1 class="title">
                                <a href="#">Beautiful Single Home</a>
                            </h1>
                            <!-- Property address -->
                            <h3 class="property-address">
                                <a href="#">
                                    <i class="fa fa-map-marker"></i>25, raymond dokpesi, Ikeja.
                                </a>
                            </h3>
                            <!-- Facilities List -->
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                    <span>4800 sq ft</span>
                                </li>
                                <li>
                                    <i class="flaticon-bed"></i>
                                    <span>3 Beds</span>
                                </li>
                                <li>
                                    <i class="flaticon-monitor"></i>
                                    <span>TV </span>
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i>
                                    <span> 2 Baths</span>
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i>
                                    <span>1 Garage</span>
                                </li>
                                <li>
                                    <i class="flaticon-building"></i>
                                    <span> 3 Balcony</span>
                                </li>
                            </ul>
                            <!-- Property footer -->
                            <div class="property-footer">
                                <span class="left"><i class="fa fa-calendar-o icon"></i> 5 days ago</span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  filtr-item" data-category="1, 2, 3">
                    <div class="property">
                        <!-- Property img -->
                        <a href="#" class="property-img">

                            <div class="property-tag button sale">For Rent</div>
                            <div class="property-price">&#8358;120,000</div>
                            <img src="<?php echo base_url(); ?>img/properties\p-2.jpg" alt="properties-2" class="img-responsive img-fluid">
                        </a>
                        <!-- Property content -->
                        <div class="property-content">
                            <!-- title -->
                            <h1 class="title">
                                <a href="#">Modern Family Home</a>
                            </h1>
                            <!-- Property address -->
                            <h3 class="property-address">
                                <a href="#">
                                    <i class="fa fa-map-marker"></i>22, Old road, Abuja.
                                </a>
                            </h3>
                            <!-- Facilities List -->
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                    <span>4500 sq ft</span>
                                </li>
                                <li>
                                    <i class="flaticon-bed"></i>
                                    <span>2 Beds</span>
                                </li>
                                <li>
                                    <i class="flaticon-monitor"></i>
                                    <span>TV </span>
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i>
                                    <span> 3 Baths</span>
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i>
                                    <span>1 Garage</span>
                                </li>
                                <li>
                                    <i class="flaticon-building"></i>
                                    <span> 2 Balcony</span>
                                </li>
                            </ul>
                            <!-- Property footer -->
                            <div class="property-footer">
                                <span class="left"><i class="fa fa-calendar-o icon"></i> 3 days ago</span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  filtr-item" data-category="1, 2, 3">
                    <div class="property">
                        <!-- Property img -->
                        <a href="#" class="property-img">

                            <div class="property-tag button sale">For Sale</div>
                            <div class="property-price">&#8358;180,000</div>
                            <img src="<?php echo base_url(); ?>img/properties\p-3.jpg" alt="properties-3" class="img-responsive img-fluid">
                        </a>
                        <!-- Property content -->
                        <div class="property-content">
                            <!-- title -->
                            <h1 class="title">
                                <a href="#">Sweet Family Home</a>
                            </h1>
                            <!-- Property address -->
                            <h3 class="property-address">
                                <a href="#">
                                    <i class="fa fa-map-marker"></i>21, palm Avenue estate, Ibadan.
                                </a>
                            </h3>
                            <!-- Facilities List -->
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                    <span>4500 sq ft</span>
                                </li>
                                <li>
                                    <i class="flaticon-bed"></i>
                                    <span>2 Beds</span>
                                </li>
                                <li>
                                    <i class="flaticon-monitor"></i>
                                    <span>TV </span>
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i>
                                    <span> 3 Baths</span>
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i>
                                    <span>1 Garage</span>
                                </li>
                                <li>
                                    <i class="flaticon-building"></i>
                                    <span> 2 Balcony</span>
                                </li>
                            </ul>
                            <!-- Property footer -->
                            <div class="property-footer">
                                <span class="left"><i class="fa fa-calendar-o icon"></i> 3 days ago</span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  filtr-item" data-category="1, 2, 3">
                    <div class="property">
                        <!-- Property img -->
                        <a href="#" class="property-img">

                            <div class="property-tag button sale">For Rent</div>
                            <div class="property-price">&#8358;120,000</div>
                            <img src="<?php echo base_url(); ?>img/properties\p-4.jpg" alt="properties-4" class="img-responsive img-fluid">
                        </a>
                        <!-- Property content -->
                        <div class="property-content">
                            <!-- title -->
                            <h1 class="title">
                                <a href="#">Big Head Home</a>
                            </h1>
                            <!-- Property address -->
                            <h3 class="property-address">
                                <a href="#">
                                    <i class="fa fa-map-marker"></i>22, Old road, Abuja.
                                </a>
                            </h3>
                            <!-- Facilities List -->
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                    <span>4800 sq ft</span>
                                </li>
                                <li>
                                    <i class="flaticon-bed"></i>
                                    <span>5 Beds</span>
                                </li>
                                <li>
                                    <i class="flaticon-monitor"></i>
                                    <span>TV </span>
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i>
                                    <span> 3 Baths</span>
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i>
                                    <span>1 Garage</span>
                                </li>
                                <li>
                                    <i class="flaticon-building"></i>
                                    <span> 2 Balcony</span>
                                </li>
                            </ul>
                            <!-- Property footer -->
                            <div class="property-footer">
                                <span class="left"><i class="fa fa-calendar-o icon"></i> 5 days ago</span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  filtr-item" data-category="1, 2, 3">
                    <div class="property">
                        <!-- Property img -->
                        <a href="#" class="property-img">

                            <div class="property-tag button sale">For Sale</div>
                            <div class="property-price">&#8358;120,000</div>
                            <img src="<?php echo base_url(); ?>img/properties\p-5.jpg" alt="properties-5" class="img-responsive img-fluid">
                        </a>
                        <!-- Property content -->
                        <div class="property-content">
                            <!-- title -->
                            <h1 class="title">
                                <a href="#">Big Head Home</a>
                            </h1>
                            <!-- Property address -->
                            <h3 class="property-address">
                                <a href="#">
                                    <i class="fa fa-map-marker"></i>22, Old road, Abuja.
                                </a>
                            </h3>
                            <!-- Facilities List -->
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                    <span>4800 sq ft</span>
                                </li>
                                <li>
                                    <i class="flaticon-bed"></i>
                                    <span>5 Beds</span>
                                </li>
                                <li>
                                    <i class="flaticon-monitor"></i>
                                    <span>TV </span>
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i>
                                    <span> 3 Baths</span>
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i>
                                    <span>1 Garage</span>
                                </li>
                                <li>
                                    <i class="flaticon-building"></i>
                                    <span> 2 Balcony</span>
                                </li>
                            </ul>
                            <!-- Property footer -->
                            <div class="property-footer">
                                <span class="left"><i class="fa fa-calendar-o icon"></i> 5 days ago</span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  filtr-item" data-category="1, 2, 3">
                    <div class="property">
                        <!-- Property img -->
                        <a href="#" class="property-img">

                            <div class="property-tag button sale">For Rent</div>
                            <div class="property-price">&#8358;120,000</div>
                            <img src="<?php echo base_url(); ?>img/properties\p-6.jpg" alt="properties-6" class="img-responsive img-fluid">
                        </a>
                        <!-- Property content -->
                        <div class="property-content">
                            <!-- title -->
                            <h1 class="title">
                                <a href="#">Big Head Home</a>
                            </h1>
                            <!-- Property address -->
                            <h3 class="property-address">
                                <a href="#">
                                    <i class="fa fa-map-marker"></i>22, Old road, Abuja.
                                </a>
                            </h3>
                            <!-- Facilities List -->
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                    <span>4800 sq ft</span>
                                </li>
                                <li>
                                    <i class="flaticon-bed"></i>
                                    <span>5 Beds</span>
                                </li>
                                <li>
                                    <i class="flaticon-monitor"></i>
                                    <span>TV </span>
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i>
                                    <span> 3 Baths</span>
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i>
                                    <span>1 Garage</span>
                                </li>
                                <li>
                                    <i class="flaticon-building"></i>
                                    <span> 2 Balcony</span>
                                </li>
                            </ul>
                            <!-- Property footer -->
                            <div class="property-footer">
                                <span class="left"><i class="fa fa-calendar-o icon"></i> 5 days ago</span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  filtr-item" data-category="1, 2, 3">
                    <div class="property">
                        <!-- Property img -->
                        <a href="#" class="property-img">

                            <div class="property-tag button sale">For Sale</div>
                            <div class="property-price">&#8358;120,000</div>
                            <img src="<?php echo base_url(); ?>img/properties\p-7.jpg" alt="properties-7" class="img-responsive img-fluid">
                        </a>
                        <!-- Property content -->
                        <div class="property-content">
                            <!-- title -->
                            <h1 class="title">
                                <a href="#">Office</a>
                            </h1>
                            <!-- Property address -->
                            <h3 class="property-address">
                                <a href="#">
                                    <i class="fa fa-map-marker"></i>22, Old road, Abuja.
                                </a>
                            </h3>
                            <!-- Facilities List -->
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                    <span>4800 sq ft</span>
                                </li>
                                <li>
                                    <i class="flaticon-bed"></i>
                                    <span>50 Office</span>
                                </li>
                                <li>
                                    <i class="flaticon-monitor"></i>
                                    <span>Kitchen</span>
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i>
                                    <span> 3 Restrooms</span>
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i>
                                    <span>1 Garage</span>
                                </li>
                                <li>
                                    <i class="flaticon-building"></i>
                                    <span> 2 Balcony</span>
                                </li>
                            </ul>
                            <!-- Property footer -->
                            <div class="property-footer">
                                <span class="left"><i class="fa fa-calendar-o icon"></i> 5 days ago</span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  filtr-item" data-category="1, 2, 3">
                    <div class="property">
                        <!-- Property img -->
                        <a href="#" class="property-img">

                            <div class="property-tag button sale">For Rent</div>
                            <div class="property-price">&#8358;120,000</div>
                            <img src="<?php echo base_url(); ?>img/properties\p-8.jpg" alt="properties-8" class="img-responsive img-fluid">
                        </a>
                        <!-- Property content -->
                        <div class="property-content">
                            <!-- title -->
                            <h1 class="title">
                                <a href="#">Big Head Home</a>
                            </h1>
                            <!-- Property address -->
                            <h3 class="property-address">
                                <a href="#">
                                    <i class="fa fa-map-marker"></i>22, Old road, Abuja.
                                </a>
                            </h3>
                            <!-- Facilities List -->
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                    <span>4800 sq ft</span>
                                </li>
                                <li>
                                    <i class="flaticon-bed"></i>
                                    <span>5 Beds</span>
                                </li>
                                <li>
                                    <i class="flaticon-monitor"></i>
                                    <span>TV </span>
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i>
                                    <span> 3 Baths</span>
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i>
                                    <span>1 Garage</span>
                                </li>
                                <li>
                                    <i class="flaticon-building"></i>
                                    <span> 2 Balcony</span>
                                </li>
                            </ul>
                            <!-- Property footer -->
                            <div class="property-footer">
                                <span class="left"><i class="fa fa-calendar-o icon"></i> 5 days ago</span>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Featured properties end -->


<!-- Recently properties start -->
<div class="mrg-btm-70 recently-properties chevron-icon">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1><span>Recently </span> Uploaded Properties</h1>
        </div>
        <div class="row">
            <div class="carousel our-partners slide" id="ourPartners2">
                <!-- <div class="col-lg-12 mrg-btm-30">
                    <a class="right carousel-control" href="#" data-slide="prev"><i class="fa fa-chevron-left icon-prev"></i></a>
                    <a class="right carousel-control" href="#" data-slide="next"><i class="fa fa-chevron-right icon-next"></i></a>
                </div> -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <!-- Property start -->
                            <div class="property">
                                <!-- Property img -->
                                <a href="#" class="property-img">
                                    <img src="<?php echo base_url(); ?>img/my-properties/rp-1.jpg" alt="recently-properties1" class="img-responsive">
                                </a>
                                <!-- Property content -->
                                <div class="property-content">
                                    <!-- title -->
                                    <h1 class="title">
                                        <a href="#">Modern Family Home</a>
                                    </h1>
                                    <!-- Property address -->
                                    <h3 class="property-address">
                                        <a href="#">
                                            <i class="fa fa-map-marker"></i>25, raymond dokpesi, Ikeja.
                                        </a>
                                    </h3>
                                    <!-- Facilities List -->
                                    <ul class="facilities-list clearfix">
                                        <li>
                                            <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                            <span>4800 sq ft</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-bed"></i>
                                            <span>3 Beds</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-holidays"></i>
                                            <span> 2 Baths</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-vehicle"></i>
                                            <span>1 Garage</span>
                                        </li>
                                    </ul>
                                    <!-- Property footer -->
                                    <div class="property-footer">
                                        <span class="left"><i class="fa fa-calendar-o icon"></i> 5 days ago</span>

                                    </div>
                                </div>
                            </div>
                            <!-- Property end -->
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <!-- Property start -->
                            <div class="property">
                                <!-- Property img -->
                                <a href="#" class="property-img">
                                    <img src="<?php echo base_url(); ?>img/my-properties/rp-2.jpg" alt="properties-2" class="img-responsive">
                                </a>
                                <!-- Property content -->
                                <div class="property-content">
                                    <!-- title -->
                                    <h1 class="title">
                                        <a href="#">Beautiful Single Home</a>
                                    </h1>
                                    <!-- Property address -->
                                    <h3 class="property-address">
                                        <a href="#">
                                            <i class="fa fa-map-marker"></i>25, raymond dokpesi, Ikeja.
                                        </a>
                                    </h3>
                                    <!-- Facilities List -->
                                    <ul class="facilities-list clearfix">
                                        <li>
                                            <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                            <span>4800 sq ft</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-bed"></i>
                                            <span>3 Beds</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-holidays"></i>
                                            <span> 2 Baths</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-vehicle"></i>
                                            <span>1 Garage</span>
                                        </li>
                                    </ul>
                                    <!-- Property footer -->
                                    <div class="property-footer">
                                        <span class="left"><i class="fa fa-calendar-o icon"></i> 5 days ago</span>

                                    </div>
                                </div>
                            </div>
                            <!-- Property end -->
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <!-- Property start -->
                            <div class="property">
                                <!-- Property img -->
                                <a href="#" class="property-img">
                                    <img src="<?php echo base_url(); ?>img/my-properties/rp-3.jpg" alt="properties-3" class="img-responsive">
                                </a>
                                <!-- Property content -->
                                <div class="property-content">
                                    <!-- title -->
                                    <h1 class="title">
                                        <a href="#">Park Avenue</a>
                                    </h1>
                                    <!-- Property address -->
                                    <h3 class="property-address">
                                        <a href="#">
                                            <i class="fa fa-map-marker"></i>25, raymond dokpesi, Ikeja.
                                        </a>
                                    </h3>
                                    <!-- Facilities List -->
                                    <ul class="facilities-list clearfix">
                                        <li>
                                            <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                            <span>4800 sq ft</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-bed"></i>
                                            <span>3 Beds</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-holidays"></i>
                                            <span> 2 Baths</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-vehicle"></i>
                                            <span>1 Garage</span>
                                        </li>
                                    </ul>
                                    <!-- Property footer -->
                                    <div class="property-footer">
                                        <span class="left"><i class="fa fa-calendar-o icon"></i> 5 days ago</span>

                                    </div>
                                </div>
                            </div>
                            <!-- Property end -->
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <!-- Property start -->
                            <div class="property">
                                <!-- Property img -->
                                <a href="#" class="property-img">
                                    <img src="<?php echo base_url(); ?>img/my-properties/rp-4.jpg" alt="properties-4" class="img-responsive">
                                </a>
                                <!-- Property content -->
                                <div class="property-content">
                                    <!-- title -->
                                    <h1 class="title">
                                        <a href="#">Sweet Family Home</a>
                                    </h1>
                                    <!-- Property address -->
                                    <h3 class="property-address">
                                        <a href="#">
                                            <i class="fa fa-map-marker"></i>25, raymond dokpesi, Ikeja.
                                        </a>
                                    </h3>
                                    <!-- Facilities List -->
                                    <ul class="facilities-list clearfix">
                                        <li>
                                            <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                            <span>4800 sq ft</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-bed"></i>
                                            <span>3 Beds</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-holidays"></i>
                                            <span> 2 Baths</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-vehicle"></i>
                                            <span>1 Garage</span>
                                        </li>
                                    </ul>
                                    <!-- Property footer -->
                                    <div class="property-footer">
                                        <span class="left"><i class="fa fa-calendar-o icon"></i> 5 days ago</span>

                                    </div>
                                </div>
                            </div>
                            <!-- Property end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partners block end -->

<div class="clearfix"></div>
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
                                        <span class="category-subtitle">14 Properties</span>
                                        <br>
                                        <a href="#" class="btn button-sm button-theme">View All</a>
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
                                        <span class="category-subtitle">14 Properties</span>
                                        <br>
                                        <a href="#" class="btn button-sm button-theme ">View All</a>
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
                                        <span class="category-subtitle">27 Properties</span>
                                        <br>
                                        <a href="#" class="btn button-sm button-theme ">View All</a>
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
                                <span class="category-subtitle">14 Properties</span>
                                <br>
                                <a href="#" class="btn button-sm button-theme ">View All</a>
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
<section class="royal-agents-area section_100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="royal-section-title">
                    <h2>Our <span>Agents</span></h2>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="royal-agent-slide owl-carousel owl-theme owl-loaded owl-text-select-on">

                        <div class="owl-stage-outer" style='height: 350px;
                        padding: 0px 10px;'>
                            <div class="owl-stage" style="transform: translate3d(-1450px, 0px, 0px); transition: all 1.2s ease 0s; width: 3770px;">
                                <div class="owl-item cloned" style="width: 270px; margin-right: 20px;">
                                    <div class="single-agent">
                                        <div class="agent-details">
                                            <h3>Susan Peter</h3>
                                            <p class="position">Founder & CEO at Realty Properties Inc.</p>

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
                                </div>
                                <div class="owl-item cloned" style="width: 270px; margin-right: 20px;">
                                    <div class="single-agent">
                                        <div class="agent-details">
                                            <h3>John Ibe</h3>
                                            <p class="position">Company Agent at Cool Houses Inc.</p>

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
                                                <img src="<?php echo base_url(); ?>img/team/2.jpg" alt="agent image" />
                                                <div class="agent_img_overlay_1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 270px; margin-right: 20px;">
                                    <div class="single-agent">
                                        <div class="agent-details">
                                            <h3>Bidemi Enitan</h3>
                                            <p class="position">Founder & selling at Realty Properties Inc.</p>
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
                                </div>
                                <div class="owl-item cloned" style="width: 270px; margin-right: 20px;">
                                    <div class="single-agent">
                                        <div class="agent-details">
                                            <h3>Nnamdi Okukwe</h3>
                                            <p class="position">Founder & CEO at Realty Properties Inc.</p>
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
                                <div class="owl-item cloned" style="width: 270px; margin-right: 20px;">
                                    <div class="single-agent">
                                        <div class="agent-details">
                                            <h3>Victor Ibu</h3>
                                            <div class="agent-contact">
                                                <p>
                                                    <i class="fa fa-phone"></i>
                                                    080345673876
                                                </p>
                                                <p>
                                                    <i class="fa fa-envelope-o"></i>
                                                    victor@sph.com
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
                                </div>
                                <div class="owl-item active" style="width: 270px; margin-right: 20px;">
                                    <div class="single-agent">
                                        <div class="agent-details">
                                            <h3>Susan Peter</h3>
                                            <p class="position">Founder & CEO at Realty Properties Inc.</p>

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
                                </div>
                                <div class="owl-item active" style="width: 270px; margin-right: 20px;">
                                    <div class="single-agent">
                                        <div class="agent-details">
                                            <h3>John Ibe</h3>
                                            <p class="position">Company Agent at Cool Houses Inc.</p>

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
                                                <img src="<?php echo base_url(); ?>img/team/2.jpg" alt="agent image" />
                                                <div class="agent_img_overlay_1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="owl-item active" style="width: 270px; margin-right: 20px;">
                                    <div class="single-agent">
                                        <div class="agent-details">
                                            <h3>Bidemi Enitan</h3>
                                            <p class="position">Founder & selling at Realty Properties Inc.</p>
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
                                </div>
                                <div class="owl-item active" style="width: 270px; margin-right: 20px;">
                                    <div class="single-agent">
                                        <div class="agent-details">
                                            <h3>Nnamdi Okukwe</h3>
                                            <p class="position">Founder & CEO at Realty Properties Inc.</p>
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Agents Area End -->


<!-- Agent section end -->


<div class="mrg-btm-70 customer-say chevron-icon">
    <br>
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
                            <li data-target="#fade-quote-carousel" data-slide-to="0"></li>
                            <li data-target="#fade-quote-carousel" data-slide-to="1"></li>
                            <li data-target="#fade-quote-carousel" data-slide-to="2" class="active"></li>
                            <!-- <li data-target="#fade-quote-carousel" data-slide-to="3"></li>
                            <li data-target="#fade-quote-carousel" data-slide-to="4"></li>
                            <li data-target="#fade-quote-carousel" data-slide-to="5"></li> -->
                        </ol>

                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <div class="item">
                                <div class="profile-circle">
                                    <h2>Mrs Ajisafe</h2>
                                    <h5>Landlord, Lagos</h5>
                                </div>
                                <blockquote>
                                    <i class="fa fa-quote-left quote fa-3x"></i>
                                    <p>Every time we viewed a new property, Smart PropertyHub
                                        would perform a methodical inspection, looking for signs
                                        of problems and commenting on the quality of construction,
                                        finish, appliances, etc.</p>
                                    <i class="fa fa-quote-right quote fa-3x"></i>
                                </blockquote>
                            </div>
                            <div class="item">
                                <div class="profile-circle">
                                    <h2>Honorable Dabiri</h2>
                                    <h5>Tenant, Lagos</h5>
                                </div>
                                <blockquote>
                                    <i class="fa fa-quote-left quote fa-3x"></i>
                                    <p>I recently found the need and desire to
                                        purchase a larger home. I spoke to a variety of different
                                        realtors that showed me a variety of
                                        homes i did not like until I found Smart PropertyHub. </p>
                                    <i class="fa fa-quote-right quote fa-3x"></i>
                                </blockquote>
                            </div>
                            <div class="active item">
                                <div class="profile-circle">
                                    <h2>Dr. Tinu</h2>
                                    <h5>Landlord|seller, Lagos</h5>
                                </div>
                                <blockquote>
                                    <i class="fa fa-quote-left quote fa-3x"></i>
                                    <p>Highly effective and reliable</p>
                                    <i class="fa fa-quote-right quote fa-3x"></i>
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
                    <h1 class="counter">9</h1>
                    <p>Listing For Sales</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 bordered-right">
                <div class="counter-box">
                    <i class="flaticon-symbol-1"></i>
                    <h1 class="counter">176</h1>
                    <p>Listing For Rents</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 bordered-right">
                <div class="counter-box">
                    <i class="flaticon-people"></i>
                    <h1 class="counter">6</h1>
                    <p>Agents/Brokers</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-people-1"></i>
                    <h1 class="counter">7</h1>
                    <p>Requests</p>
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
                                    <img src="<?php echo base_url(); ?>img/brand/company.fw.png" alt="">
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
                    <a class="left carousel-control" href="#" data-slide="prev"><i class="fa fa-chevron-left icon-prev"></i></a>
                    <a class="right carousel-control" href="#" data-slide="next"><i class="fa fa-chevron-right icon-next"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>js/range-Slider.min.js"></script>