<?php
session_start();
include ('XownCMS/link.php');
require_once('XownCMS/functions.php');
$host = $_SERVER['HTTP_HOST'];
$url=rtrim(dirname($_SERVER['PHP_SELF']), '/\\/');

$propID = $_GET['prop'];

//code to update counter
updateCount($propID);

$_SESSION['propID'] = $propID;

			$query = "SELECT img.imageURL AS imagePath, img.imageDesc AS imgDesc, p.property_Name AS name, p.property_Street AS  street, p.property_City AS city,".
			"p.property_State AS state, p.property_Reference AS property_Reference, p.user_ID AS user_ID, p.property_Country AS country, p.property_Price AS price, p.currency AS currency, p.property_Description AS description,  p.structure_Type AS structure, p.property_ID as PID, ".
			"f.no_Of_Bedrooms AS rooms, f.no_Of_Bathrooms AS bathrooms, f.no_Of_Toilets AS toilets, f.nature_Of_Property AS nature, f.square_Meter AS sqMeter, f.square_Foot AS sqFoot ".
			"FROM prt_property_images AS img INNER JOIN agt_property AS p USING (property_ID) INNER JOIN prt_facilities AS f USING (property_ID) WHERE p.property_ID ='$propID'";
			 			
			//echo $query;
			
			$result = mysql_query($query, $link);
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			$name = $row['name'];
			$user_ID = $row['user_ID'];
			$PID = $row['PID'];
			//echo $PID;
			$street = $row['street'];
			$pRef= $row['property_Reference'];
			$city = $row['city'];
			$state = $row['state'];
			$country = $row['country'];
			$price = $row['price'];
			$price = number_format($price);
			$description = $row['description'];
			$rooms = $row['rooms'];
			$structure = $row['structure'];
			$bathrooms = $row['bathrooms'];
			$toilets = $row['toilets'];
			$nature = $row['nature'];
			$sqMeter = $row['sqMeter'];
			$sqFoot = $row['sqFoot'];			
			$host = $_SERVER['HTTP_HOST'];


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

 <div>
 	<header class="topHeader">
    	
    
    	<div class="blueStripe"></div>
        <div class="headerContent">
        	<div class="wrapper">
            	<div class="logoHolder">
                    <div class="logo">
                    	<a href="index.php" style="border:none;">
                    		<img src="images/logo.png" alt="logo">
                        </a>
                    </div>
                 </div>
                    <div class="contactDetails">
                    	<p><i class="fa fa-phone fa-rotate-90 fa-2x"></i>&nbsp;+234 1 293 1012<br/>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+234 817 204 3789 <br/><br/>
                        <i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;&nbsp; info@propertyhub.com.ng
                        </p>
                    </div>  
					
                <div class="like">
                	<div class="fb-like" data-href="https://www.facebook.com/pages/Propertyhub/234415650016031" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                </div>
                
                <div class="topTabSet" >
                <?php
				if(isset($_SESSION["pid"]))
				{
					echo'
							<ul class="loggers">
							<li><a href="user/main.php"> My PropertyHub </a> </li>
												
										 |   
										 
								<li><a href="user/logout.php">Logout </a></li>
						  </ul>
					';
					
				}
				else
				{
				echo'
                <ul class="loggers">
                	<li>
                		<a href="registerUser.php">Register</a>
					</li>                    
                                                   
                     |  
                     <li> 
                     <a id="login-trigger" href="#"> Sign In <span>  &#9660 </span> </a> 
                     
        				<div id="login-content">';
	if (isset($_GET['status'])) {
		echo " <span class=\"txtLabel\">&nbsp;</span><span class=\"errorMsg\"> ";
		echo $_GET['status'];	
		echo "</span>";
		}		
		?>
  <div id="rentSale">
    <form action="user/loginprocessor.php" method="post">
     
     
      <div class="" >E-mail:</div><input type="text" name="userEmail" class="textbox"  id="userEmail"  required pattern="([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})"  oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Invalid E-mail' : '');" /><br/>
     
      <div class="" >Password:</div><input type="password" name="userPassword" class="textbox" id="userPassword"   required pattern='.{8,}' oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Incorrect Password' : '');" /><br/>
      <span class="">&nbsp;</span> <input type="submit" name="userLogin" id="userLogin" class="search" value="LOGIN &#9654"/>
		
<br /><br />    <span class="">&nbsp;</span><p class="linRels"> Forgot Your Password? <a href="user/forgotPassword.php" class="forg">Click Here</a></p>
    </form>
  </div>		
  	</div>          
			</li>
			</ul>
              <?php } ?>
                     
  			  </div>
            </div>
        </div>

	<div class="clear"></div>

<nav class="mainNav">
        	<ul>
            	<li><a href="rent.php">To Rent</a></li>
                <li><a href="sale.php">For Sale</a></li>
                <li><a href="findAgent.php">Find Agent</a></li>
                <li><a href="pages.php?pageID=2">Home Loans</a></li>
                <li><a href="pages.php?pageID=3">Property Advice</a></li>
                <li><a href="pages.php?pageID=5">Property Developers</a></li>
                 <li><a href="http://propertyhub.com.ng/blog/">Blog</a></li>
             </ul>
        </nav> 

    <div class="greyStripe"></div>    
        
    </header>
	
	<div class="clear"></div>
	<br/><br/>
  <div class="clear"></div>
  <?php

//Query to generate agent details using propertyID
?>

	<aside class="sideAgency">
	<div class="sideAgencyDet">
    <div class="sideAgencyHead">Marketed By</div>
    <?php
	$agent_ID = getAgent_ID($user_ID);
	$status = getIfPaidAgent($agent_ID);
	if ($status == "paid") {
		$agent_Logo = getAgentLogo($agent_ID);
    echo '<div class="sideAgentLogo"><img src="smartpro/'.$agent_Logo .'" alt="AgencyLogo" /></div>';
	echo '<h3>'.getAgencyName($user_ID).'</h3>';
	echo '<h5 class="orange"><i class="fa fa-map-marker"></i>'.getAgentAddress($agent_ID).'</h5>';
	}
	else {
		echo '<div class="sideAgentLogo"><img src="images/agent_Logo.jpg" alt="AgencyLogo" /></div>';
		echo '<h3>Smart PropertyHub Limited</h3>';
		echo '<h5 class="orange"><i class="fa fa-map-marker"></i> 33, Toyin Street, Ikeja, Lagos.</h5>';
		echo '<h5><strong>Mobile</strong> : +234-1-293-1012 </h5><br />';
		//echo '<h5><strong>Office Line </strong> : 01-9087-90</h5><br />';
		echo '<a href="#" onclick="OpenPopupCenter(\'messageAgent.php?agentID='.$user_ID.'\', \'Arrange Inspection\', \'650\', \'500\');" class="view_det btn_margin_left" >MESSAGE AGENT</a><br /><br />';
	}
	?>

    <?php 
		if(paidAgent)
		{
		//Show email
		//telephone
		//addy
		}
		else
		{
			//show SmartAdmin number	
		}
	?>
    
    </div>
    <div class="sideBarLinks">
    <ul>
    <li><div class="favList"></div>
    <?php
    if(isset($_SESSION["pid"]))
	{
		echo'
		<a href="user/main.php?page=addFave.php&prop='.$propID.'">Add as Favourite</a>';
	}
	else
	{
		echo'
		<a href="user/index.php">Add as Favourite </a>';
	}
    
	?>
    </li>
    <li ><div class="printList"></div><a href="javascript:window.print()">Print</a></li>
    <li ><div class="pdfList"></div><a href="generatePDF.php?prop=<?php echo $propID ?>">Generate PDF</a></li>
    <li ><div class="repList"></div><a href="#" onclick="OpenPopupCenter('reportProperty.php', 'Property Report', '650','600');">Report Listing</a></li>
    <li ><div class="inspectList"></div><a href="#" onclick="OpenPopupCenter('inspection.php', 'Arrange Inspection', '650','500');" >Arrange Inspection</a></li>
    </ul>    
    </div>
    <div class="sideSharer">
    <div class="sideAgencyHead">Share Property</div>
    	<ul>
						                     
            <!--<li><a  class="fbk" title="facebook" id="facebook" href="#" target="_blank"></a></li>
            <li><a  class="twt" id="twitter" title="twitter" href="#" target="_blank"></a></li>
            <li><a  class="gplus" title="googleplus" id="googleplus" href="#" target="_blank"></a></li>-->
            
            <div class="pw-widget pw-size-large">
             	<a class="pw-button-facebook"></a>
                <a class="pw-button-twitter"></a>
                <a class="pw-button-gmail"></a>
                <a class="pw-button-linkedin"></a>
                <a class="pw-button-googleplus"></a>
                <a class="pw-button-email"></a>
                <!--<a class="pw-button-post"></a>-->
            </div>
            <script src="http://i.po.st/static/v3/post-widget.js#publisherKey=cgoluhvb8ubg4jof5cpu&retina=true" type="text/javascript"></script>
                        
            
            
         </ul>
    </div>
	</aside>
    
    
    

<section class="wrapper">
    	<article class="content propPageInfo">
        <?php echo '
<div class="headInfoProp">'
.  ucwords($name).'</div>
<div class="clear"></div>
<div class="outer_loc"><div class="location"><i class="fa fa-map-marker"></i>'.ucwords($street).' '.ucwords($city).' '.ucwords($state).' '.ucwords($country).'</div>
<div class="price_det"><font class="color_blue">&#8358</font><font class="price">'.$price.'</font></div>
</div>
'	
?>
	    <div id="tabs">
					<ul class="tabs">
					  <li><a href="#tab1">Property Image(s)</a></li>
					  <li><a href="#tab2">Map</a></li>
					  <!--<li><a href="#tab3">Street View</a></li>-->
                     </ul>
              <div id="tab1">               		
<?php
$querImg = "Select * from prt_property_images where property_ID=$PID";
$resImg = mysql_query($querImg);
$imageSlide = '<div class="pixProp">
				<ul id="image-gallery" class="gallery list-unstyled cS-hidden">';		
			while ($arr = mysql_fetch_array($resImg)){
				
			$imagePath = $arr['imageURL'];
			echo $imagePath;
			$imgDesc = $arr['imageDesc'];
				$imageSlide .= '<li data-thumb="smartpro/uploads/photos/'.$imagePath .'">
				<img src="smartpro/uploads/photos/'.$imagePath .'" /></li>';
			}
$imageSlide .= '</ul>
				</div>';				
echo $imageSlide;
					
echo				'<div class="propSummary">
					<ul>
					<li><div class="bedroomIcon"></div><div class="figs">'.$rooms .' Bedroom(s)</div></li>
					<li><div class="bathroomIcon"></div><div class="figs">'.$bathrooms .' Bathrooms(s)</div></li>
					<li><div class="toiletIcon"></div><div class="figs">'.$toilets .' Toilets(s)</div></li>
					</ul>
				</div>
				<div class="clear"></div>
				<div class="infoProp">
					<div class="detPropHead">Property Description</div>
				<div class="clear"></div>'.$description.'</div>
				<div class="infoProp">
					<div class="detPropHead">Property Features</div>
				<div class="clear"></div>';
				$sql = "Select * from agt_property_facilities where property_Reference= $pRef";
				//echo $sql;
				$res = mysql_query($sql);
				while ($arr= mysql_fetch_array($res))
				{
					echo '<li>'.$arr["facility_Name"].'</li>';
				}
				
				/*$query= "SELECT structure_Type FROM prt_structures WHERE structure_ID ='$structure'";
				$result= mysql_query($query, $link);
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				$structureType = $row['structure_Type'];*/
				
				echo '</div><div class="detProp">
				<div class="detPropHead">Property Details</div>
				<div class="clear"></div>
				<div class="detPropItem left">Web Reference</div>
				<div class="detPropItem right">'.$pRef .'</div>
				<div class="clear"></div>
				<div class="detPropItem left">Type Of Property</div>
				<div class="detPropItem right">'.ucfirst($structure).'</div>
				<div class="clear"></div>
				<div class="detPropItem left">Nature Of Property</div>
				<div class="detPropItem right">'.ucfirst($nature).'</div>
				<div class="clear"></div>
				<div class="detPropHead">Dimension</div>
				<div class="clear"></div>
				<div class="detPropItem left">Square Metre</div>
				<div class="detPropItem right">'.$sqMeter .'</div>
				<div class="clear"></div>
				<div class="detPropItem left">Square Foot</div>
				<div class="detPropItem right">'.$sqFoot .'</div>
				<div class="clear"></div>
						
				</div>';
		?>
        </div>
        <div id="tab2">
        	<?php
				 $address = $street.' '.$city.' '.$state.' '.$country;


				function getCoordinates($address)
				{
			 
					$address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
					 
					$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
					 
					$response = file_get_contents($url);
					 
					$json = json_decode($response,TRUE); //generate array object from the response from the web
					 
					return ($json['results'][0]['geometry']['location']['lat'].",".$json['results'][0]['geometry']['location']['lng']);
					 
				}

				
				echo'
				<div class="pixProp">
				<div class="map">
                    <div id="mapCanvas" style="width:600px; height:500px;">';
					
					
					?>
             <script type="text/javascript">
            function initializeGoogleMap() {
                    // initialize the google Maps
                    var latlng = new google.maps.LatLng(<?php echo getCoordinates($address) ?>);
                    
                    // set up the default options
                    var myOptions = {
                      zoom: 15,
                      center: latlng,
                      navigationControl: true,
                      navigationControlOptions: 
                        {style: google.maps.NavigationControlStyle.DEFAULT,
                         position: google.maps.ControlPosition.TOP },
                      mapTypeControl: true,
                      mapTypeControlOptions: 
                        {style: google.maps.MapTypeControlStyle.DEFAULT,
                         position: google.maps.ControlPosition.TOP_RIGHT },
            
                      scaleControl: true,
                       scaleControlOptions: {
                            position: google.maps.ControlPosition.BOTTOM_LEFT
                      }, 
                      mapTypeId: google.maps.MapTypeId.ROADMAP,
                      draggable: true,
                      disableDoubleClickZoom: false,
                      keyboardShortcuts: true
                    };
                    var map = new google.maps.Map(document.getElementById("mapCanvas"), myOptions);
                    if (false) {
                        var trafficLayer = new google.maps.TrafficLayer();
                        trafficLayer.setMap(map);
                    }
                    if (false) {
                        var bikeLayer = new google.maps.BicyclingLayer();
                        bikeLayer.setMap(map);
                    }
                    if (true) {
                        addMarker(map, <?php echo getCoordinates($address) ?> , "Property Location");
                    }
                  }	
            
                  window.onload = initializeGoogleMap();
            
                 // Add a marker to the map at specified latitude and longitude with tooltip
                 function addMarker(map,lat,long,titleText) {
                    var markerLatlng = new google.maps.LatLng(lat,long);
                    var marker = new google.maps.Marker({
                        position: markerLatlng, 
                        map: map, 
                        title:"Property Location",
                        icon: ""});   
                 }
                      </script>
        </div>
      </div>
      <!--End of map-->
				</div>
			
            
        </div>
<!--        <div id="tab3">
        	Usable later for street view or anything else
    </div>
-->        </div>


		</article>    
<div class="clear"></div>
</section>

<?php
include('includes/footer.php');
?>

