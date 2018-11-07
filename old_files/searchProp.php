<?php
session_start();
ob_start();
include('includes/header.php');
$display = 5;
?>
<div class="wrapper_div">
    	<div class="content_div">

<div id="tabs" style="margin-left: -20px;">
					<ul class="tabs">
					  <li class="border-radius-left"><a href="#tab1" class="border-radius-left">TO LET</a></li>
					  <li><a href="#tab2">FOR SALE</a></li>
					  <li class="border-radius-right"><a href="#tab3" class="border-radius-right">ON AUCTION</a></li>
                      <br/>
                      </ul>
                      
                    <!--<p>&nbsp;</p> should be used when prop quick search is removed-->
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
           
<?php
//To accept variables for the on-page search form
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






//Normal search form processing
if (isset($_GET['s']) && is_numeric($_GET['s']))
{
 $start = $_GET['s'];
} else 
{
 $start = 0;
}

$searchString = mysql_real_escape_string($_GET['stringy']);
$minPrice = mysql_real_escape_string($_GET['mini']);
$maxPrice = mysql_real_escape_string($_GET['maxi']);
$propType = mysql_real_escape_string($_GET['propType']);
$rooms = mysql_real_escape_string($_GET['rooms']);
$propCategory = mysql_real_escape_string($_GET['propCat']);

$thisString ='';//used to hold search string while building query


	//To get the number of properties that can be fetched with the search query
	$query = "SELECT COUNT(*) FROM agt_property ".
	"WHERE (";
	if(!empty($searchString) AND ($searchString != 'NULL'))
	{
		$query .="( property_Street LIKE '%{$searchString}%' OR property_City LIKE '%{$searchString}%' OR property_State LIKE '%{$searchString}%' OR property_Country LIKE '%{$searchString}%'  OR property_ID LIKE '%{$searchString}%')";
		$thisString .=$searchString;
	}
	
	if($minPrice != 0  AND ($minPrice != 'NULL') AND $maxPrice == 0)
	{
		if($thisString !='')
		{
			$query .= " AND ( property_Price >= '$minPrice' )";
		}
		else
		{
			$query .= " property_Price >= '$minPrice'";
		}
		$thisString .=$minPrice;
	}
	
	else if($maxPrice != 0 AND ($maxPrice != 'NULL') AND $minPrice == 0)
	{
		if($thisString !='')
		{
			$query .= " AND ( property_Price <= $maxPrice)";
		}
		else
		{
			$query .= " property_Price <= $maxPrice";
		}
		$thisString .=$maxPrice;
	}
	
	else
	{
		 if ($maxPrice == 0 AND $minPrice == 0)
		{
			$query .='';
			$thisString .='';
		}

		else if($thisString !='')
		{
			$query .= " AND ( property_Price BETWEEN '$minPrice' AND '$maxPrice')";
			$thisString .=$minPrice.$maxPrice;
		}
				else
		{
			$query .= " property_Price BETWEEN '$minPrice' AND '$maxPrice'";
			$thisString .=$minPrice.$maxPrice;
		}
		
	}
	
	if(!empty($propType) AND ($propType != 'NULL'))
	{
		if($thisString !='')
		{
			$query .= " AND ( purpose_ID = '$propType')";
		}
		else
		{
			$query .= " purpose_ID = '$propType'";
		}
		$thisString .=$propType;
	}
	
	if(!empty($rooms) AND ($rooms != 'NULL'))
	{
		$roomPlus = $rooms + 1;
		if($thisString !='')
		{
			$query .=" AND ( property_no_of_rooms BETWEEN '$rooms' AND '$roomPlus')";
		}
		else
		{
			
			$query .=" property_no_of_rooms BETWEEN '$rooms' AND '$roomPlus')";
		}
	}
	
		$query .=" AND ( category_ID = '$propCategory'))";
		//echo $query;
		
 	$res = mysql_query($query);
	$num_row = mysql_fetch_array($res,MYSQL_NUM);
 	$fetchedProperties = $num_row[0];




	//Query to fetch properties
	$query = "SELECT p.property_ID AS property_ID, p.property_Name AS property_Name, p.property_Street AS property_Street,".
	" p.property_City AS property_City, p.property_State AS property_State, p.property_Country AS property_Country,".
	" p.property_Price AS property_Price, p.property_Description AS property_Description,".
	" f.no_Of_Bedrooms AS property_no_of_rooms, f.no_Of_Bathrooms AS property_no_of_bathrooms, f.no_Of_Toilets AS property_no_of_toilets, i.imageURL AS imgPath FROM agt_property AS p INNER JOIN".
	" prt_property_images AS i USING (property_ID) INNER JOIN prt_facilities AS f USING (property_ID) ".
	"WHERE (";
	if(!empty($searchString) AND ($searchString != 'NULL'))
	{
		$query .="( property_Street LIKE '%{$searchString}%' OR property_City LIKE '%{$searchString}%' OR property_State LIKE '%{$searchString}%' OR property_Country LIKE '%{$searchString}%')";
		$thisString .=$searchString;
	}
	
	if($minPrice != 0  AND ($minPrice != 'NULL') AND $maxPrice == 0)
	{
		if($thisString !='')
		{
			$query .= " AND ( property_Price >= '$minPrice' )";
		}
		else
		{
			$query .= " property_Price >= '$minPrice'";
		}
		$thisString .=$minPrice;
	}
	
	else if($maxPrice != 0 AND ($maxPrice != 'NULL') AND $minPrice == 0)
	{
		if($thisString !='')
		{
			$query .= " AND ( property_Price <= $maxPrice)";
		}
		else
		{
			$query .= " property_Price <= $maxPrice";
		}
		$thisString .=$maxPrice;
	}
	
	else
	{
		 if ($maxPrice == 0 AND $minPrice == 0)
		{
			$query .='';
			$thisString .='';
		}

		else if($thisString !='')
		{
			$query .= " AND ( property_Price BETWEEN '$minPrice' AND '$maxPrice')";
			$thisString .=$minPrice.$maxPrice;
		}
				else
		{
			$query .= " property_Price BETWEEN '$minPrice' AND '$maxPrice'";
			$thisString .=$minPrice.$maxPrice;
		}
		
	}
	
	if(!empty($propType) AND ($propType != 'NULL'))
	{
		if($thisString !='')
		{
			$query .= " AND ( property_Purpose = '$propType')";
		}
		else
		{
			$query .= " property_Purpose = '$propType'";
		}
		$thisString .=$propType;
	}
	
	if(!empty($rooms) AND ($rooms != 'NULL'))
	{
		$roomPlus = $rooms + 1;
		if($thisString !='')
		{
			$query .=" AND ( no_Of_Bedrooms BETWEEN '$rooms' AND '$roomPlus')";
		}
		else
		{
			
			$query .=" no_Of_Bedrooms BETWEEN '$rooms' AND '$roomPlus')";
		}
	}
	
		$query .=" AND ( category_ID = '$propCategory')) GROUP BY p.property_ID ORDER BY p.property_ID ASC LIMIT $start, $display";
	
		//echo $query;
		
		
 $result = mysql_query($query);
// echo $result;
if(mysql_num_rows($result) == 0)
{
	echo '<div class="notFound" style="margin-left: 20px;">
	<h2>We could not find any property that matches your search criteria.</h2>
		<p> You can make another search with the form above.</p>
		<p>Our search recognizes the following:
		
			<li><a> Street, city, state or country names e.g Toyin, Ikeja, Lagos, Nigeria etc.</a></li>
			<li><a> Property code.</a></li>
			<li><a> Price e.g 50000000 or 50000000.00</a></li>
			<li><a> Property type e.g warehouse, residential etc.</a></li>
			<li><a> Number of rooms e.g 4,5,6 etc.</a></li>
		</p>
		<p>
			You might be interested in any of the following links:
			
				<li><a href="sale.php">Properties for Sale</a></li>
				<li><a href="rent.php">Properties to let</a></li>
				<li><a href="findAgent.php">Locating agents</a></li>
			
		</p>
		<p>If you experience any difficulties or need further assistance, please <a href="contact.php"> Contact us</a>.</p>	
		</div>
	';
}
else
{
	if ($fetchedProperties > $display) 
	{ 
	 	$pages = ceil ($fetchedProperties/$display);
	}
	else
	{
		$pages = 1;
		//echo $pages ."is pages";
	}
		
	echo'<a href="user/index.php" id="saveSearch" class="search"> SAVE SEARCH &#9654 </a><br/><br/>';
	if ($pages > 1) 
	{
		echo '<br/><p class="pagination">';
		$currentPage = ($start / $display) + 1;
		if ($currentPage != 1)
		 {
			echo '<a href="?page=searchProp.php&stringy='.$searchString.'&propType='.$propType.'&rooms='.$rooms.'&mini='.$minPrice.'&maxi='.$maxPrice.'&propCat='.$propCategory.'&s='. ($start - $display) . '&p=' . $pages . '" class="otherPage" >Previous </a> ';
		 }
		 for ($i = 1; $i <= $pages; $i++)
		  {
			if ($i != $currentPage)
			 {
				echo '<a href="?page=searchProp.php&stringy='.$searchString.'&propType='.$propType.'&rooms='.$rooms.'&mini='.$minPrice.'&maxi='.$maxPrice.'&propCat='.$propCategory.'&s=' . (($display *($i - 1))) . '&p=' .$pages . '" class="otherPage" >' . $i .'</a> ';
			 } 
			else 
			{
				echo'<span class="curPage">'. $i. ' </span>';
			}
		  }
		  
		  if ($currentPage != $pages) 
		  {
				echo '<a href="?page=searchProp.php&stringy='.$searchString.'&propType='.$propType.'&rooms='.$rooms.'&mini='.$minPrice.'&maxi='.$maxPrice.'&propCat='.$propCategory.'&s=' . ($start + $display). '&p=' . $pages . '" class="otherPage" >Next</a>';
		  }

	}
	
	$_SESSION['stringy'] = $searchString;
	$_SESSION['propType'] = $propType;
	$_SESSION['rooms'] = $rooms;
	$_SESSION['mini'] = $minPrice;
	$_SESSION['maxi'] = $maxPrice;
	$_SESSION['propCat'] = $propCategory;
	
	/*$arr = mysql_fetch_array($result);
	$imgPath = $arr['imgPath'];*/
	
	while($row = mysql_fetch_array($result))
	{
		$price = $row['property_Price'];
		$price = number_format($price);
		$propID = $row['property_ID'];
		$propertyDescription = $row['property_Description'];
		$propertyDescription = substr($propertyDescription, 0, 80);
		$imgPath = $row['imgPath'];
		$property_no_of_bedrooms = $row["property_no_of_rooms"];
		$property_no_bathrooms = $row["property_no_of_bathrooms"];
		$property_no_of_toilets = $row["property_no_of_toilets"];
		
		if ($property_no_of_bedrooms >= 1 ) {
			$property_no_of_bedrooms = '<div class="fac_ind"><img src="images/bedroom.png" />'.$property_no_of_bedrooms.'Bedroom (s)</div>';
		}
		else {
			$property_no_of_bedrooms = '';
		}
		
		if ($property_no_bathrooms >= 1) {
			$property_no_bathrooms = '<div class="fac_ind"><img src="images/shower.png" />'.$property_no_bathrooms.'Bathroom (s)</div>';
		}
		else {$property_no_bathrooms = '';}
		
		if($property_no_of_toilets >= 1) {
			$property_no_of_toilets = '<div class="fac_ind"><img src="images/toilet.png" />'.$property_no_of_toilets.'Toilet (s)</div>';
		}
		else {
			$property_no_of_toilets = '';
		}
				
		echo $searchDetails = '<div class="propListing" id="propDiv">'.
			'<div class="propImg left"><a href="propertyDetails.php?prop='.$propID.'"><img src="smartpro/uploads/photos/
			'.$imgPath.'" alt="image" /></a>
			<div class="camera_div"><i class="fa fa-camera"></i><font class="num_font">'.getNumOfImage($propID).'</font></div>
			<div class="propCatName_new">'.getPropertyCategoryName($propCategory).'</div>			
			</div><div class="propDet left"><font class="pricing">&#8358</font><span class="pricing">'.
			$price.'</span><p><font class="title_head">'.
			strtolower(ucwords($row['property_Name'])).'</font></p><i class="fa fa-map-marker"></i>'.
			$row['property_Street'].', '.
			$row['property_City'].'. '.
			$row['property_State'].'. '.
			$row['property_Country'].'.<p>'.
			$propertyDescription.'...</p>'.
			'<a href="propertyDetails.php?prop='.$propID.'" class="view_det">VIEW PROPERTY &#9654 </a></div>
			
			<div class="clear"></div>
			<div class="feat_property">
			'.$property_no_of_bedrooms.'
			'.$property_no_bathrooms.'
			'.$property_no_of_toilets.'
			</div>
						
			</div>';
		//echo $searchDetails;	
	}
	
}
?>
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
					$newsContent .='<div class="left"><img src="'.$img.'" width="97" height="89" class="newsImage" /></div>';
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
        
        
        <div class="clear"></div> 


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
        
</div><!--End of wrapper-->

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