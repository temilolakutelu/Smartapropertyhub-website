<?php
include('includes/header.php');
?>

<section class="wrapper">
    	<article class="content">
			<div id="salesRent" >SMART PROPERTY SEARCH</div>
            <div class ="searcher">
			<div id="tabs">
					<ul class="tabs">
					  <li><a href="#tab1">TO RENT</a></li>
					  <li><a href="#tab2">FOR SALE</a></li>
					  <li><a href="#tab3">ON AUCTION</a></li>
					</ul>
                    <p>&nbsp;</p>
					<div id="tab1">
					  	<div id="rentSale" >
						 <?php
							include('includes/rent.php');
						?>
					  
					  <p>&nbsp;</p>
					</div>
                    </div>
					<div id="tab2">
					  		<div id="rentSale" >
						 <?php
							include('includes/sales.php');
						?>
					  
					  <p>&nbsp;</p>
					</div>
					</div>
					<div id="tab3">
                   	<div id="rentSale" >
						 <?php
							include('includes/auction.php');
						?>
					  
					  <p>&nbsp;</p>
					</div>
					</div>
                   </div>
					<div class="clear"></div>
                   <div class="subscriberForm">
						<p>NEWSLETTER SUBSCRIPTION</p>
						<form name="subForm" class="subForm" action="" method="">
							<input type="text" required  name="subscribe" id ="subscribe"  placeholder="Enter your email address.."/><br/>
							<input type="submit"  name="subSubscribe" id ="subSubscribe" class="search" value="SUBSCRIBE &#9654"  />
						</form>
					</div>
                   
					<div class="mainBanner"> 
						<div id="sliderFrame">
								<div id="slider">
									<img src="banners/SPH.jpg" />
									<a target="_blank" href="http://marketing.net.jumia.com.ng/ts/i3556158/tsc?amc=aff.jumia.21961.34552.21627&tst=!!TIMESTAMP"><img src="banners/getImage (1).jpg"/></a>
									<a target="_blank" href="http://marketing.net.jumia.com.ng/ts/i3556158/tsc?amc=aff.jumia.21961.34552.9001&tst=!!TIMESTAMP!!"><img src="banners/NG_BA_COMP_LAPT_ALLB_728x90 (1).jpg"/></a>
									<a target="_blank" href="http://marketing.net.jumia.com.ng/ts/i3556158/tsc?amc=aff.jumia.21961.34552.9046&tst=!!TIMESTAMP"><img src="banners/getImage.jpg" /></a>
                                    <a target="_blank" href="http://marketing.net.jumia.com.ng/ts/i3556158/tsc?amc=aff.jumia.21961.34552.14875&tst=!!TIMESTAMP"><img src="banners/NG_BA_VIDE_AUDI_ALLB_728X90.jpg" /></a>
                                    <a target="_blank" href="http://marketing.net.jumia.com.ng/ts/i3556158/tsc?amc=aff.jumia.21961.34552.8993&tst=!!TIMESTAMP"><img src="banners/NG_BA_MOBI_BBRY_ALLB_728x90.jpg"/></a>
                                    <a target="_blank" href="http://marketing.net.jumia.com.ng/ts/i3556158/tsc?amc=aff.jumia.21961.34552.18298&tst=!!TIMESTAMP"><img src="banners/NG_BA_MOBI_INNJ_ALLB_728X90.jpg" /></a>
                                    <a target="_blank" href="http://marketing.net.jumia.com.ng/ts/i3556158/tsc?amc=aff.jumia.21961.34552.9606&tst=!!TIMESTAMP"><img src="banners/NG_BA_MOBI_SMAR_SAMS_728x90.jpg" /></a>								  								  
								</div>
						</div>
					</div>
					
					
			



</article>
         
         
         <div class="clear"></div>
        
    </section>
<div class="clear"></div>
<?php
include('includes/footer.php');
?>