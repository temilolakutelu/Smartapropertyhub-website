<?php
ob_start();
include('includes/header.php');

if(isset($_POST['searchRent']))
{
	$loc = $_POST['searchCriteria'];
	$minPrice = getInteger($_POST['minPrice']);
	$maxPrice = getInteger($_POST['maxPrice']);
	$propType = $_POST['propertyType'];
	$rooms = $_POST['numberOfRooms'];
	$propCategory = 2 ;
	
	
	$part = "searchProp.php?stringy=$loc&propType=$propType&rooms=$rooms&mini=$minPrice&maxi=$maxPrice&propCat=$propCategory#saveSearch";
	
		
	header("Location:".$part);
}

if(isset($_POST['searchSale']))
{
	$loc = $_POST['searchCriteria'];
	$minPrice = getInteger($_POST['minPrice']);
	$maxPrice = getInteger($_POST['maxPrice']);
	$propType = $_POST['propertyType'];
	$rooms = $_POST['numberOfRooms'];
	$propCategory = 1 ;
	
	$part = "searchProp.php?stringy=$loc&propType=$propType&rooms=$rooms&mini=$minPrice&maxi=$maxPrice&propCat=$propCategory#saveSearch";
	
		
	header("Location:".$part);
}


if(isset($_POST['searchAuction']))
{
	
	$loc = $_POST['searchCriteria'];
	$minPrice = getInteger($_POST['minPrice']);
	$maxPrice = getInteger($_POST['maxPrice']);
	$propType = $_POST['propertyType'];
	$rooms = $_POST['numberOfRooms'];
	$propCategory = 3 ;
	
	$part = "searchProp.php?stringy=$loc&propType=$propType&rooms=$rooms&mini=$minPrice&maxi=$maxPrice&propCat=$propCategory#saveSearch";
	
		
	header("Location:".$part);

}


?>

<div class="wrapper_div">
    	<div class="content_div">
			<div id="salesRent" >SMART PROPERTY SEARCH</div>
            <div class ="searcher">
			<div id="tabs" style="margin-left: -20px;">
					<ul class="tabs">
					  <li class="border-radius-left"><a href="#tab1" class="border-radius-left">TO LET</a></li>
					  <li><a href="#tab2">FOR SALE</a></li>
					  <li class="border-radius-right"><a href="#tab3" class="border-radius-right">ON AUCTION</a></li>
                      </ul>
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
   </div>                   

</div><!--End of content-->

	<div class="sideBar">
		<div class="socials">
			<ul>
				<li><a href="#" class="gplus" target="_blank"></a></li>
				<li><a href="#" class="twitter" target="_blank"></a></li>
				<li><a href="#" class="facebook" target="_blank"></a></li>
				<li><a href="#" class="socialLove" target="_blank"></a></li>
			</ul>
		</div>
        
   <div class="clear"></div>
        
		<div class="vticker">
                   			
		     <ul id="ticker_02" class="ticker">
        <?php
			$newsContent='';
			$query = "SELECT newsID, newsTitle, newsDetails, newsImage FROM  news";
			$result = mysql_query($query,$link);
			if(mysql_num_rows($result) > 0)
			{
				while($row = mysql_fetch_array($result,MYSQL_ASSOC))
				{	
					$img = $row['newsImage'];
					$img = 'XownCMS/'.$img;
					$title  = $row['newsTitle'];
					$title = substr($title, 0, 30);
					$details = html_entity_decode($row['newsDetails']);
					$details = strip_tags($details);
					$details = substr($details, 0, 60);
					$newsID = $row['newsID'];
	              	$newsContent .='<li>';
					$newsContent .='<div class="left"><img src="'.$img.'" width="97" height="97" class="newsImage" /></div>';
					$newsContent .='<p class="right">';
					$newsContent .='<p class="tit">'.strtolower(ucwords(($title))).'</p>';
					$newsContent .='<p class="newsCon">'.$details.'...<br />';
					$newsContent .='<button class="readMore" onclick="lightbox_open();" value="'.$newsID.'"> Read More </button>';
					$newsContent .='</p></p></li>';
				}
				}
				echo $newsContent;
			 ?>
			 
			</ul>
           </div>

        <div id="light">
        <button id="closeBox" onclick="lightbox_close();"> </button>
        <br/>
            <p id="newsHead"> </p>
            <p id="newsBody"></p>
            </div>
        <div id="fade" onClick="lightbox_close();"></div>
        
		<div class="stakeholdersLog">
			<div class="accordion_example">
                <div class="accordion_in" style="border-radius:8px;">
                  <div class="acc_head" >LOGIN AREA FOR STAKEHOLDERS </div>
                  <div class="acc_content firstcontent">
                  <li><a href="smartpro/index.php">Agent Login/Landlord Login</a></li>
				  <br/>
				  <li><a href="user/index.php">User Login</a></li>
                  <br/>
                  </div>
                </div>  
            </div>
		
		</div><!--End of stakeholdersLog-->
        
                   <div class="subscriberForm">
						<form name="subForm" class="subForm" action="" method="post">
							<input type="text" required  name="subscribe" id ="subscribe"  placeholder="Newsletter Email Address..."/>
							<input type="submit"  name="subSubscribe" id ="subSubscribe" value="GO &#9654"  />
						</form>
					</div>


		
	</div><!--End of sidebar-->
<div class="clear"></div>
</div><!--End of Wrapper-->
                   <div class="clear"></div>
<div id="bottom_content">                   

<div class="mainBanner"> 
	<div id="sliderFrame">
		<div id="slider">
        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.xownsolutions.propertyhub.smartpropertryhub&hl=en"><img src="banners/mobileAD.jpg" /></a>
        	<a href="#"><img src="banners/developerAD.jpg" /></a>
            <a target="_blank" href="http://marketing.net.jumia.com.ng/ts/i3556158/tsc?amc=aff.jumia.37384.43579.27126&tst=!!TIMESTAMP!!"><img src="banners/jumiad1.jpg"/></a>
            <a target="_blank" href="http://www.konga.com/lenovo-a5000?k_id=4080"><img src="banners/konga1.gif" /></a>
            <a target="_blank" href="http://marketing.net.jumia.com.ng/ts/i3556158/tsc?amc=aff.jumia.37384.43579.26015&tst=!!TIMESTAMP!!"><img src="banners/jumiad2.jpg"/></a>
            <a target="_blank" href="http://www.konga.com/nokia-lumia?k_id=4080"><img src="banners/konga2.gif" /></a>
            <a target="_blank" href="http://www.konga.com/galaxy-s6?k_id=4080"><img src="banners/konga1.jpg" /></a>				  								
		</div>
	</div>
</div><!--End of mainBanner-->
<div class="clear"></div>

<div class="prop_listing">
<br/>
	<div class="ribbon-wrapper"><div class="glow">&nbsp;</div>
		<div class="ribbon-front blue_ribbon">
			NEWLY LISTED [TO LET]
		</div>
		<div class="ribbon-edge-topleft"></div>
		<div class="ribbon-edge-topright"></div>
		<div class="ribbon-edge-bottomleft"></div>
		<div class="ribbon-edge-bottomright"></div>
	</div>
<div class="list_bottom">
<ul class="list_bottom_ul">  
<?php
	$query = "SELECT p.property_ID AS property_ID, p.property_Name AS property_Name, p.property_Street AS property_Street,".
	" p.property_City AS property_City, p.property_State AS property_State, p.property_Country AS property_Country,".
	" p.property_Price AS property_Price, p.property_Description AS property_Description,".
	" f.no_Of_Bedrooms AS property_no_of_rooms, f.no_Of_Bathrooms AS property_no_of_bathrooms, f.no_Of_Toilets AS property_no_of_toilets, i.imageURL AS imgPath FROM agt_property AS p INNER JOIN".
	" prt_property_images AS i USING (property_ID) INNER JOIN prt_facilities AS f USING (property_ID) ".
	"WHERE category_ID = 2 GROUP BY p.property_ID ORDER BY p.property_ID DESC LIMIT 0,3";

	//echo $query;
	$result = mysql_query($query);
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$name = strtolower(ucwords($row['property_Name']));
			$name = substr($name, 0, 30).'...';
			$prop_ID = $row['property_ID'];
			$imgPath = $row['imgPath'];
			$street = $row['property_Street'];
			$city = $row['property_City'];
			$state = $row['property_State'];
			$price = $row['property_Price'];
			$price = number_format($price);
			$property_no_of_bedrooms = $row['property_no_of_rooms'];
			$property_no_bathrooms = $row['property_no_of_bathrooms'];
			$property_no_of_toilets = $row['property_no_of_toilets'];
			
		if ($property_no_of_bedrooms >= 1 ) {
			$property_no_of_bedrooms = $property_no_of_bedrooms.' Bedroom (s)';
		}
		else {
			$property_no_of_bedrooms = '';
		}
		
		if ($property_no_bathrooms >= 1) {
			$property_no_bathrooms = ' | '.$property_no_bathrooms.' Bathroom (s) | ';
		}
		else {$property_no_bathrooms = '<br />';}
		
		if($property_no_of_toilets >= 1) {
			$property_no_of_toilets = ' '.$property_no_of_toilets.' Toilet (s)';
		}
		else {
			$property_no_of_toilets = '<br />';
		}				
//echo $imgPath;
    	echo '<li><a href="propertyDetails.php?prop='.$prop_ID.'"><img src="smartpro/uploads/photos/'.$imgPath.'" alt="image" /></a><span class="tickerHead"><a href="propertyDetails.php?prop='.$prop_ID.'">'.$name.'</a></span><br />
        <font style="font-size: 14px; font-weight: bold;"><font class="orange">&#8358 </font> <span class="tickerPrice">'.$price.'</span></font><br />
        <font style="font-weight: bold;">'.$city.', '.$state.'</font><br />
		<font>'.$property_no_of_bedrooms.' '.$property_no_bathrooms.' <br />'.$property_no_of_toilets.'</font>
        </li>';
	}
?>	
    </ul>   
    
    </div> 
<div class="clear"></div> 
<div class="read">   
<a href="rent.php" class="viewMore">VIEW MORE &#9654 </a>
</div>
</div><!--End of prop_listing-->


<div class="prop_listing">
<br/>
	<div class="ribbon-wrapper"><div class="glow">&nbsp;</div>
		<div class="ribbon-front orange_ribbon">
			NEWLY LISTED [FOR SALE]
		</div>
		<div class="ribbon-edge-topleft"></div>
		<div class="ribbon-edge-topright2"></div>
		<div class="ribbon-edge-bottomleft"></div>
		<div class="ribbon-edge-bottomright2"></div>
	</div>
<div class="list_bottom">
<ul class="list_bottom_ul">  
<?php
	$query = "SELECT p.property_ID AS property_ID, p.property_Name AS property_Name, p.property_Street AS property_Street,".
	" p.property_City AS property_City, p.property_State AS property_State, p.property_Country AS property_Country,".
	" p.property_Price AS property_Price, p.property_Description AS property_Description,".
	" f.no_Of_Bedrooms AS property_no_of_rooms, f.no_Of_Bathrooms AS property_no_of_bathrooms, f.no_Of_Toilets AS property_no_of_toilets, i.imageURL AS imgPath FROM agt_property AS p INNER JOIN".
	" prt_property_images AS i USING (property_ID) INNER JOIN prt_facilities AS f USING (property_ID) ".
	"WHERE category_ID = 1 GROUP BY p.property_ID ORDER BY p.property_ID Desc LIMIT 0,3";

	//echo $query;
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$name = strtolower(ucwords($row['property_Name']));
			$name = substr($name, 0, 30).'...';
			$prop_ID = $row['property_ID'];
			$imgPath = $row['imgPath'];
			$street = $row['property_Street'];
			$city = $row['property_City'];
			$state = $row['property_State'];
			$price = $row['property_Price'];
			$price = number_format($price);
			$property_no_of_bedrooms = $row['property_no_of_rooms'];
			$property_no_bathrooms = $row['property_no_of_bathrooms'];
			$property_no_of_toilets = $row['property_no_of_toilets'];
			
		if ($property_no_of_bedrooms >= 1 ) {
			$property_no_of_bedrooms = $property_no_of_bedrooms.' Bedroom (s)';
		}
		else {
			$property_no_of_bedrooms = '';
		}
		
		if ($property_no_bathrooms >= 1) {
			$property_no_bathrooms = ' | '.$property_no_bathrooms.' Bathroom (s)';
		}
		else {$property_no_bathrooms = '<br />';}
		
		if($property_no_of_toilets >= 1) {
			$property_no_of_toilets = ' | '.$property_no_of_toilets.' Toilet (s)';
		}
		else {
			$property_no_of_toilets = '<br />';
		}				

    	echo '<li><a href="propertyDetails.php?prop='.$prop_ID.'"><img src="smartpro/uploads/photos/'.$imgPath.'" alt="image" /></a><span class="tickerHead"><a href="propertyDetails.php?prop='.$prop_ID.'">'.$name.'</a></span><br />
        <font style="font-size: 14px; font-weight: bold;"><font class="orange">&#8358 </font> <span class="tickerPrice">'.$price.'</span></font><br />
        <font style="font-weight: bold;">'.$city.', '.$state.'</font><br /><br />
		<font>'.$property_no_of_bedrooms.''.$property_no_bathrooms.''.$property_no_of_toilets.'</font>
        </li>';
	}
?>	
    </ul>
    
    </div>
<div class="clear"></div>
<div class="read">     
<a href="sale.php" class="viewMore">VIEW MORE &#9654 </a>
</div>
</div><!--End of prop_listing-->

<div class="prop_listing">
<br/>
	<div class="ribbon-wrapper"><div class="glow">&nbsp;</div>
		<div class="ribbon-front black_ribbon">
			MOST VIEWED PROPERTIES
		</div>
		<div class="ribbon-edge-topleft"></div>
		<div class="ribbon-edge-topright2"></div>
		<div class="ribbon-edge-bottomleft"></div>
		<div class="ribbon-edge-bottomright2"></div>
	</div>
<div class="list_bottom">
<ul class="list_bottom_ul">  
<?php
$que_Views = "select count(property_ID) AS v , property_ID, p.property_Name AS property_Name, p.property_Street AS". "property_Street, p.property_City AS property_City, p.property_State AS property_State, p.property_Country AS property_Country, p.property_Price AS property_Price, p.property_Description AS property_Description,".
	" f.no_Of_Bedrooms AS property_no_of_rooms, f.no_Of_Bathrooms AS property_no_of_bathrooms, f.no_Of_Toilets AS property_no_of_toilets, i.imageURL AS imgPath FROM prt_count_views INNER JOIN agt_property AS p USING (property_ID) INNER JOIN prt_property_images AS i USING (property_ID) INNER JOIN prt_facilities AS f USING (property_ID)".
	"GROUP BY property_ID ORDER BY v DESC LIMIT 0,3";
//echo $que_Views;

	//echo $query;
	$res_Views = mysql_query($que_Views);
	while ($row_Views = mysql_fetch_array($res_Views, MYSQL_ASSOC)) {
			$name = strtolower(ucwords($row_Views['property_Name']));
			$name = substr($name, 0, 30).'...';
			$prop_ID = $row_Views['property_ID'];
			$imgPath = $row_Views['imgPath'];
			$street = $row_Views['property_Street'];
			$city = $row_Views['property_City'];
			$state = $row_Views['property_State'];
			$price = $row_Views['property_Price'];
			$price = number_format($price);
			$property_no_of_bedrooms = $row_Views['property_no_of_rooms'];
			$property_no_bathrooms = $row_Views['property_no_of_bathrooms'];
			$property_no_of_toilets = $row_Views['property_no_of_toilets'];
			
		if ($property_no_of_bedrooms >= 1 ) {
			$property_no_of_bedrooms = $property_no_of_bedrooms.' Bedroom (s)';
		}
		else {
			$property_no_of_bedrooms = '';
		}
		
		if ($property_no_bathrooms >= 1) {
			$property_no_bathrooms = ' | '.$property_no_bathrooms.' Bathroom (s)';
		}
		else {$property_no_bathrooms = '<br />';}
		
		if($property_no_of_toilets >= 1) {
			$property_no_of_toilets = ' | '.$property_no_of_toilets.' Toilet (s)';
		}
		else {
			$property_no_of_toilets = '<br />';
		}				

    	$statusMsg = '<li><a href="propertyDetails.php?prop='.$prop_ID.'"><img src="smartpro/uploads/photos/'.$imgPath.'" alt="image" /></a><span class="tickerHead"><a href="propertyDetails.php?prop='.$prop_ID.'">'.$name.'</a></span><br />
        <font style="font-size: 14px; font-weight: bold;"><font class="orange">&#8358 </font> <span class="tickerPrice">'.$price.'</span></font><br />
        <font style="font-weight: bold;">'.$city.', '.$state.'</font><br /><br />
		<font>'.$property_no_of_bedrooms.''.$property_no_bathrooms.''.$property_no_of_toilets.'</font>
        </li>';
		
		echo $statusMsg;
	}



?>	
    </ul>
    </div>   
<div class="clear"></div>
<div class="read">     
<a href="sale.php" class="viewMore">VIEW MORE &#9654 </a>
</div>
</div><!--End of prop_listing-->
					
</div><!--End of bottom_content-->

    <script type="text/javascript">
	
 $('.readMore').click(function(){
	var newsNum = $(this).val();
	$.ajax({
		type: 'POST',							
		url: 'getNews.php', 
		data: { newsNum: newsNum },
		dataType: 'json',
		success: function(data){
		//alert('what is this '+data);
		
		if (data)
		{
			newsTitle = JSON.stringify(data.newsTitle);
			newsTitle = newsTitle.replace(/"/g,'');
			//newsTitle +="\n";
			newsDetails = JSON.stringify(data.newsDetails);
			
			newsDetails = newsDetails.replace(/"/g,'');
			
			$('#light #newsHead').text(newsTitle);
			$('#light #newsBody').text(newsDetails);
		
		}
			
	},
	
	});
});

 
 
 </script>


					
<?php
include('includes/footer.php');
?>