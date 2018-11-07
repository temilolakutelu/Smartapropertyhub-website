<?php
include ('XownCMS/link.php');
//require_once('function.php');
require_once('XownCMS/functions.php');

$pageURL = curPageURL();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="PropertyHub - Smarter Search"/>
<meta property="og:image" content="http://www.propertyhub.com.ng/images/logo.png"/>
<meta property="og:site_name" content="PropertyHub"/>
<meta property="og:url" content="<?php echo $pageURL; ?>"/>
<meta property="og:description" content="<?php echo $description; ?>" />
<meta name="description" content="The right place to get the best property at the most appropriate fee at a click!"/>
<meta name="keywords" content="propertyhub, property, lagos property, properties in nigeria, apartments, houses, land, real estate "/>
<meta name="viewport" content="width=device-width" />
<link href="images/favicon.ico" rel="shortcut icon" type="image/ico"/>
<link href="css/layout.css" rel="stylesheet" type="text/css">
<link href="css/media.css" rel="stylesheet" type="text/css">
<link href="css/ticker.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/print.css" media="print">
<link href="jQuery/jquery.ui.css" rel="stylesheet" type="text/css" />
<link href="jQuery/css/jquery.ui.tabs.css" rel="stylesheet" type="text/css" />
<link href="jQuery/css/jquery.ui.theme.css" rel="stylesheet" type="text/css" />
<link href="SMK-Accordion-master/css/smk-accordion.css"  rel="stylesheet" type="text/css" />
<link href="lightSlider/css/lightSlider.css" rel="stylesheet" type="text/css" />
<title>PropertyHub || The right place to get the best property at the most appropriate fee at a click! </title>
<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=true'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script src="js/utilize.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="jquery-ui-1.7.2/js/jquery-ui-1.7.2.min.js"></script>
<script src="jQuery/jquery-ui.js"></script>

<script>
		  $(document).ready(function(){
				$('#login-trigger').click(function(){
					
					$(this).next('#login-content').slideToggle();
					$(this).toggleClass('active');
										
					if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
						else $(this).find('span').html('&#x25BC;')
					})
		  });
		 
</script>
<script src="lightSlider/js/jquery.lightSlider.js"></script> 
<script type="text/javascript">

window.document.onkeydown = function (e)
{
    if (!e){
        e = event;
    }
    if (e.keyCode == 27){
        lightbox_close();
    }
}

function lightbox_open(){
    window.scrollTo(0,0);
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block';  
}


function lightbox_close(){
    document.getElementById('light').style.display='none';
    document.getElementById('fade').style.display='none';
}

</script>



<script src="SMK-Accordion-master/js/smk-accordion.js"></script>




	<script type="text/javascript">
    jQuery(document).ready(function($){
        $(".accordion_example").smk_Accordion({
            showIcon: true, //boolean
            animation: true, //boolean
            closeAble: true, //boolean
            slideSpeed: 200 //integer, miliseconds
        });
    });
</script>



<script type="text/javascript">
$(function() {
    $( "#tabs" ).tabs();
		
  });
</script>

<script language="javascript" type="text/javascript">
        function OpenPopupCenter(pageURL, title, w, h) 
		{
            var left = (screen.width - w) / 2;
            var top = (screen.height - h) / 4;  
            var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
        } 
    </script>
    <script>
    	 $(document).ready(function() {
			$("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
		});
    </script>
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=134360026676331";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="topHeader">
	<div class="headerContent">
    	<div class="header_content_div">
    		<div class="logo"><a href="./"></a></div>
            
            <div class="contactDetails">
            <font><i class="fa fa-phone fa-rotate-90 fa-2x"></i>
            +234 1 293 1012 <br /> +234 817 204 3789
            <br /><br />
            <i class="fa fa-envelope" style="margin-right: 20px;"></i> <a href="mailto:info@propertyhub.com.ng">info@propertyhub.com.ng</a>
            </font>
            </div>
            
                <div class="like">
                	<div class="fb-like" data-href="https://www.facebook.com/pages/Propertyhub/234415650016031" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                </div>            
            
                <div class="topTabSet" >                
                <ul class="loggers">
                	<li>
                		<a href="registerUser.php">Register</a>
					</li>                    
                                                   
                     |  
                     <li> 
                     <a id="login-trigger" href="#"> Sign In <span>  &#9660 </span> </a> 
                     
    <div id="login-content">
    <?php if (isset($_GET['status'])) {
    echo " <span class=\"txtLabel\">&nbsp;</span><span class=\"errorMsg\"> ";
    echo $_GET['status'];	
    echo "</span>";
    } ?>
    <div id="rentSale">
    <form action="user/loginprocessor.php" method="post">
    
    
    <div class="" >E-mail:</div><input type="text" name="userEmail" class="textbox"  id="userEmail"  required pattern="([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})"  oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Invalid E-mail' : '');" /><br/>
    
    <div class="" >Password:</div><input type="password" name="userPassword" class="textbox" id="userPassword"   required pattern='.{8,}' oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Incorrect Password' : '');" /><br/>
    <span class="">&nbsp;</span> <input type="submit" name="userLogin" id="userLogin" class="search" value="LOGIN &#9654"/><br/>
    
    <span class="">&nbsp;</span><p class="linRels"> Forgot Your Password? <a href="user/forgotPassword.php" class="forg">Click Here</a></p>
    </form>
    </div>		
    </div>          
    </li>
    </ul>
    
<div class="app-download">
<a href="apps.php"><img src="images/app-download.png" align="left"> Download our <br />mobile App</a>
</div> 
    
</div><!--End of topTabSet-->                           
</div><!--header_content_div-->

<div class="clear"></div>

<div class="nav_cont">
        <div class="mainNav">
        	<ul>
                 <li><a href="http://propertyhub.com.ng/blog/">Blog</a></li>
                <li><a href="pages.php?pageID=5">Property Developers</a></li>
                <li><a href="pages.php?pageID=3">Property Advice</a></li>
                <li><a href="pages.php?pageID=2">Home Loans</a></li>
                <li><a href="findAgent.php">Find Agent</a></li>
                <li><a href="sale.php">For Sale</a></li>
                <li><a href="rent.php">To Rent</a></li>
             </ul>
        </div>
</div>
        <div class="greyStripe"></div>    
        
    </div><!--End of headerContent-->
</div>
<!--====================================================================================
									END OF HEADER
======================================================================================--> 
<div class="wrapper_content">
<div class="leftcontent"></div>
<div class="rightcontent">
<div class="upcontent">
<div align="left">
    <p><font class="style2"> <strong>Smarter Search at your finger tips</strong></font>    </p>
    <p>Everything you love about PropertyHub on your Android phone or tablet. 
    This app is designed to provide the best experience to Android users when browsing for property. 
    Best of all it's free!</p>
</div>
<ul>
  <li>
  <span>See all the properties available on the go in a sleek and clever app</span>
  </li>
  <li>
<span>Enjoy a faster and a convenient search with instant notifications on new properties.</span>
  </li>
  <li>
<span>Easy access to all property information you need, photos, and location on a map</span>
  </li>
  <li>
  <span>Check out the list of available agents.</span>
  </li>
  <li>
  <span>Request inspection about your favourite property from an agent</span>
  </li>
</ul>
<div align="left"><strong class="style2">Download the free app now!</strong><br /><br /> Enter your phone number below and we'll send a download link directly to your mobile phone.</div>
</div>
<div class="downcontent">
<div class="sendlinkcontainer">
<div class="textareacotainer">
<form action="" method="post" name="">
<input type="text" name="txtmsg" class="textstyle" pattern='(([0-9\-+]).{0}|.{9,})' oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid phone number is required' : '');" maxlength="15" />
 <input type="submit" name="sendmsg"  class="buttonstyle" value="SEND LINK"/>
</form>
</div>

</div>
<div class="downloadbuttoncontainer">
<div class="downloadbuttoncontainer-text">
<a href="https://play.google.com/store/apps/details?id=com.xownsolutions.propertyhub.smartpropertryhub&hl=en" class="play-store"></a>
</div>

</div>


</div>

</div><!---end of rightcontent-->
</div>
<?php
include('includes/footer.php');
?>
</body>
</html>