<?php
session_start();
include('includes/header.php');
$display = 10;
if (isset($_GET['s']) && is_numeric($_GET['s']))
{
 $start = $_GET['s'];
} else 
{
 $start = 0;
}

?>
<section class="wrapper">
    	<article class="content">

<?php



	//To get the number of properties that can be fetched with the search query
	$query = "SELECT COUNT(*) FROM agt_property ".
	"WHERE category_ID = 2 ";
		//echo $query;
		
 	$res = mysql_query($query);
	$row = mysql_fetch_array($res,MYSQL_NUM);
 	$fetchedProperties = $row[0];




	//Query to fetch properties
	$query = "SELECT p.property_ID AS property_ID, p.property_Name AS property_Name, p.property_Street AS property_Street,".
	" p.property_City AS property_City, p.property_State AS property_State, p.property_Country AS property_Country,".
	" p.property_Price AS property_Price, p.property_Description AS property_Description,".
	" p.property_no_of_rooms AS property_no_of_rooms, i.imageURL AS imgPath FROM agt_property AS p INNER JOIN".
	" prt_property_images AS i USING (property_ID) ".
	"WHERE category_ID = 2 LIMIT $start, $display";
	
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
	
	
	while($row = mysql_fetch_array($result))
	{
		$price = $row['property_Price'];
		$price = number_format($price);
		$propID = $row['property_ID'];
		$propertyDescription = $row['property_Description'];
		$propertyDescription = substr($propertyDescription, 0, 80);
		$imgPath = $row['imgPath'];
		echo'<div class="propListing">'.
			'<div class="propImg left"><img src="XownCMS/images/properties/'.$imgPath.'" alt="image" /></div><div class="propDet left"><span class="pricing">'.
			$price.'</span><br/>'.
			$row['property_Name'].'<br/>'.
			$row['property_Street'].', '.
			$row['property_City'].'. '.
			$row['property_State'].'. '.
			$row['property_Country'].'.<br/>'.
			$propertyDescription.'...<br/>'.
			$row['property_no_of_rooms'].' rooms.<br/><br/>'.
			'<a href="propertyDetails.php?prop='.$propID.'" class="search">VIEW PROPERTY &#9654 </a></div></div>';
			
	}
}
?>
</article>
         
         
         <div class="clear"></div>
        
</section>
	
 
<?php
include('includes/footer.php');
?>