<?php
session_start();
include ('XownCMS/link.php');
require_once('XownCMS/functions.php');
$host = $_SERVER['HTTP_HOST'];
$url=rtrim(dirname($_SERVER['PHP_SELF']), '/\\/');

$pageURL= curPageURL();


$propID = $_GET['prop'];

//code to update counter
//updateCount($propID);



$_SESSION['propID'] = $propID;

			$query = "SELECT p.property_Name AS name, p.property_Street AS  street, p.property_City AS city,".
			"p.property_State AS state, p.property_Reference AS property_Reference, p.status_Details AS status, p.category_ID AS propCategory, p.currency AS pCurrency, p.user_ID AS user_ID, p.property_Country AS country, p.property_Price AS price, p.currency AS currency, p.property_Description AS description,  p.structure_Type AS structure, p.property_ID as PID, ".
			"f.no_Of_Bedrooms AS rooms, f.no_Of_Bathrooms AS bathrooms, f.no_Of_Toilets AS toilets, f.nature_Of_Property AS nature, f.square_Meter AS sqMeter, f.square_Foot AS sqFoot".
			" FROM agt_property AS p INNER JOIN prt_facilities AS f USING (property_ID) WHERE p.property_ID ='$propID'";
			 			
			//echo $query;
			
			$result = mysql_query($query, $link);
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			if ($row == 0) {
				echo '<script>window.location = "index.php"</script>';
			}
			else {
				
				insertView($propID);
				
			$name = $row['name'];
			$user_ID = $row['user_ID'];
			$propCategory = $row["propCategory"];
			$PID = $row['PID'];
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
			$status = $row["status"];
			
			$currency = $row["pCurrency"];
		
			if ($currency == "NAIRA")
			{
				$currencyQuote = "&#8358";
			}
			else
			{
				$currencyQuote = "&#36";
			}
			
			
}
$pageURL = curPageURL();
$image_fb = getPropertyImage($PID, $link);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="<?php echo ucwords($name); ?>"/>
<meta property="og:image" content="<?php echo "http://www.propertyhub.com.ng/smartpro/uploads/photos/".$image_fb; ?>"/>
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
<title><?php echo $name; ?> - Propertyhub</title>
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
<div class="clear"></div>
<div class="wrapper_content">

<?php
if (!empty($status))
{
echo '<div id="div_status_stat">'.$status.'</div>';
}
?>
    <div class="content">
<?php
		//get category_ID of current property
		$catID = mysql_fetch_array(mysql_query("SELECT category_ID FROM agt_property WHERE property_ID='$propID'"));
		$catID = $catID['category_ID'];
			$getPrevID = mysql_fetch_array(mysql_query("SELECT property_ID FROM agt_property WHERE property_ID <'$propID' AND category_ID='$catID' order by property_ID DESC limit 1"));
			$preID = $getPrevID['property_ID'];
			
			$getNextID = mysql_fetch_array(mysql_query("SELECT property_ID FROM agt_property WHERE property_ID >'$propID' AND category_ID='$catID' order by property_ID ASC limit 1"));
			$nextID = $getNextID['property_ID'];
		?>
		<div style="float:right;">
		<?php
		//echo $catID;
		if(!empty($preID)){ ?>
		<a href="propertyDetails.php?prop=<?php echo $preID;?>" class="new-active">&#10094; Previous </a>
		<?php } else{
			echo '<span class="inactive">&#10094; Previous</span>';
		}
		echo "<span class='separator'>&#x7c;</span>";
		if(!empty($nextID)){ ?>
		<a href="propertyDetails.php?prop=<?php echo $nextID;?>" class="new-active">Next &#10095;</a>
		<?php } else{
			echo '<span class="inactive">Next &#10095;</span>';
		} ?>
		</div>
		<div style="clear:both;"></div>
        <?php echo '
<div class="headInfoProp">'
.  ucwords($name).'</div>
<div class="propCatName_new">'.getPropertyCategoryName($propCategory).'</div>
<div class="clear"></div>
<div class="outer_loc"><div class="location"><i class="fa fa-map-marker"></i>'.ucwords($street).' '.ucwords($city).' '.ucwords($state).' '.ucwords($country).'</div>
<div class="price_det"><font class="color_blue">'.$currencyQuote.'</font><font class="price">'.$price.'</font></div>
</div>
'	
?>
	    <div id="tabs">
					<ul class="tabs">
					  <li style="border-top-right-radius: 6px; border-top-left-radius: 6px;"><a style="border-top-right-radius: 5px; border-top-left-radius: 5px;" href="#tab1">Property Image(s)</a></li>
					  <li style="border-top-right-radius: 6px; border-top-left-radius: 6px;"><a style="border-top-right-radius: 5px; border-top-left-radius: 5px; " href="#tab2">Map</a></li>
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
			//echo $imagePath;
			$imgDesc = $arr['imageDesc'];
				$imageSlide .= '<li data-thumb="smartpro/uploads/photos/'.$imagePath .'">
				<img src="smartpro/uploads/photos/'.$imagePath .'" /></li>';
			}
$imageSlide .= '</ul>
				</div>';				
echo $imageSlide;

?>              
</div><!--End of tab1-->
              
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
             <?php
			 echo "</div></div></div>";
			 ?>             
              </div><!--End of tab2-->
              
		</div><!--End of tabs-->              

<?php
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
				<div class="clear"></div><p>'.$description.'</p></div>
				<div class="infoProp">
					<div class="detPropHead">Property Features</div>
				<div class="clear"></div>';
				
				$count=$dbo->prepare("select property_Features from agt_property where property_ID= '".$propID."'");
				if($count->execute()){
				$row = $count->fetch(PDO::FETCH_OBJ);
				}
				$features_array= split(",",$row->property_Features);

foreach ($features_array as $ind_feat) {
					echo '<div class="feat_list_array">'.$ind_feat.'</div>';
}
				/*$query= "SELECT structure_Type FROM prt_structures WHERE structure_ID ='$structure'";
				$result= mysql_query($query, $link);
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				$structureType = $row['structure_Type'];*/
				
				echo '</div><div class="clear"></div><div class="detProp">
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
<!--====================================================================================
									END OF CONTENT
======================================================================================--> 

<div id="side_div_cont">

<div id="sideBar_cont">
<div class="sideBar">

	<div class="sideAgencyDet">
    <div class="sideAgencyHead">AGENT</div>
    <?php
	$agent_ID = getAgent_ID($user_ID);
	$status = getIfPaidAgent($agent_ID);
	
		$agent_Logo = getAgentLogo($agent_ID);
		if ($agent_Logo == null){
			$agency_logo = '<div class="sideAgentLogo"><img src="smartpro/images/no-logo-agent.png" alt="AgencyLogo" /></div>';
		}
		else
		{
			$agency_logo = '<div class="sideAgentLogo"><img src="smartpro/'.$agent_Logo.'" alt="AgencyLogo" /></div>';
		}
		
    echo $agency_logo;
	echo '<h3>'.strtoupper(getAgencyName($user_ID)).'</h3>';
	echo '<h5 class="orange"><i class="fa fa-map-marker"></i>'.getAgentAddress($agent_ID).'</h5>';			
	
	//show agent details if paid
	if ($status == "paid") {
	echo '<h5><font class="font_no">Mobile</font> : '.getAgentMobile($agent_ID).' </h5>';
	echo '<h5><font class="font_no">Office Line </font> : '.getAgentOfficeLine($agent_ID).'</h5><br />';	
	}
	else {
	echo '<h5><font class="font_no">Mobile</font> : +2348172043791 </h5>';
	echo '<h5><font class="font_no">Office Line </font> : 012931012</h5><br />';
	echo '<a href="#" onclick="OpenPopupCenter(\'messageAgent.php?agentID='.$user_ID.'\', \'Arrange Inspection\', \'650\', \'500\');" class="view_det btn_margin_left">MESSAGE AGENT</a><br /><br />';
	}
	?>
    
    </div>
</div>
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
    
    <div class="sideSharer margin-top">
    <div class="sideAgencyHead">Share Property</div>
    	<div class="share-div">
        	<ul>
                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $pageURL; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="fb-share"></a></li>
                <li><a href="https://twitter.com/share?url=<?php echo $pageURL ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="tw-share"></a></li>
                <li><a href="mailto: ?subject=<?php echo $name; ?>&cc= &body=I would like you to check out this property: <?php echo "%0A%0A".$description."%0ALink to property: http://www.propertyhub.com.ng/propertyDetails.php?propID=".$propID."%0A%0ARegards." ?>" class="mail-share"></a></li>
                <li><a href="https://www.linkedin.com/shareArticle?summary=&ro=false&mini=true&url=<?php echo $pageURL; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="linked-share"></a></li>
                <li><a href="https://plus.google.com/share?url=<?php echo $pageURL ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="plus-share"></a></li>
            </ul>
        </div><!--End of share-div-->
    </div>
    </div>


</div>
<!--====================================================================================
									END OF SIDEBAR
======================================================================================-->            
</div> 
<?php
include('includes/footer.php');
?>       
</body>
</html>