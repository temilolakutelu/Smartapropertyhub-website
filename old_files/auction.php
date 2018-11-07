<?php
session_start();
include('includes/header.php');
$display = 5;
if (isset($_GET['s']) && is_numeric($_GET['s']))
{
 $start = $_GET['s'];
} else 
{
 $start = 0;
}

?>
<div class="wrapper">
    	<div class="content">
<div id="salesRent" style="font-family: Dax; font-size: 20px;">PROPERTIES FOR AUCTION</div>
<?php



	//To get the number of properties that can be fetched with the search query
	$query = "SELECT COUNT(*) FROM agt_property ".
	"WHERE category_ID = 3 ";
		//echo $query;
		
 	$res = mysql_query($query);
	$row = mysql_fetch_array($res,MYSQL_NUM);
 	$fetchedProperties = $row[0];




	//Query to fetch properties
	$query = "SELECT p.property_ID AS property_ID, p.property_Name AS property_Name, p.property_Street AS property_Street,".
	" p.property_City AS property_City, p.property_State AS property_State, p.property_Country AS property_Country,".
	" p.property_Price AS property_Price, p.property_Description AS property_Description,".
	" f.no_Of_Bedrooms AS property_no_of_rooms, f.no_Of_Bathrooms AS property_no_of_bathrooms, f.no_Of_Toilets AS property_no_of_toilets, i.imageURL AS imgPath FROM agt_property AS p INNER JOIN".
	" prt_property_images AS i USING (property_ID) INNER JOIN prt_facilities AS f USING (property_ID) ".
	"WHERE category_ID = 3 GROUP BY p.property_ID ORDER BY p.property_ID DESC LIMIT $start, $display";
	
		//echo $query;
		
		
 $result = mysql_query($query);
if(mysql_num_rows($result) == 0)
{
	echo '<h2>No properties found.</h2>';
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
		
		
		
		echo'<div class="propListing">'.
			'<div class="propImg left"><a href="propertyDetails.php?prop='.$propID.'"><img src="smartpro/'.$imgPath.'" alt="image" /></a></div><div class="propDet left"><font class="pricing">&#8358</font>
			<span class="pricing">'.
			$price.'</span><p><font class="title_head">'.
			$row['property_Name'].'</p></font><i class="fa fa-map-marker"></i>'.
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
        
		<div class="updates">
        <div id="nt-example1-container">	
                   			
		     <ul id="nt-example1">
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
					$details = html_entity_decode($row['newsDetails']);
					$details = strip_tags($details);
					$details = substr($details, 0, 60);
					$newsID = $row['newsID'];
			
		
		
	              	$newsContent .='<li>';
					$newsContent .='<div class="left"><img src="'.$img.'" width="97" height="89" /></div>';
					$newsContent .='<p class="right">';
					$newsContent .='<p class="tit">'.$title.'</p>';
					$newsContent .='<p class="newsCon">'.$details.'...<br />';
					$newsContent .='<button class="readMore" onclick="lightbox_open();" value="'.$newsID.'"> Read More </button>';
					$newsContent .='</p></p><br/></li>';
				}
				}
				echo $newsContent;
			 ?>
			 
			</ul>
           </div>
		</div><!--End of updates-->
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
							<input type="text" required  name="subscribe" id ="subscribe"  placeholder="Enter your email address.."/>
							<input type="submit"  name="subSubscribe" id ="subSubscribe" value="SUBSCRIBE &#9654"  />
						</form>
					</div>


		
	</div><!--End of sidebar--> 
         
         
        
</div><!--End of wrapper-->
	
 <div class="clear"></div>
<?php
include('includes/footer.php');
?>