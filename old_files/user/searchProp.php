<?php

$display = 10;
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
	$row = mysql_fetch_array($res,MYSQL_NUM);
 	$fetchedProperties = $row[0];
	
	//Query to fetch properties
	$query = "SELECT p.property_ID AS property_ID, p.property_Name AS property_Name, p.property_Street AS property_Street,".
	" p.property_City AS property_City, p.property_State AS property_State, p.property_Country AS property_Country,".
	" p.property_Price AS property_Price, p.property_Description AS property_Description,".
	" p.property_no_of_rooms AS property_no_of_rooms, i.imageURL AS imgPath FROM agt_property AS p INNER JOIN".
	" prt_property_images AS i USING (property_ID) ".
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
	
		$query .=" AND ( category_ID = '$propCategory')) LIMIT $start, $display";
		//echo $query;
		
 $result = mysql_query($query);
if(mysql_num_rows($result) == 0)
{
	echo '<div class="notFound">
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
			
				<li><a href="#">Properties to rent</a></li>
				<li><a href="#">Properties to let</a></li>
				<li><a href="#">Locating agents</a></li>
			
		</p>
		<p>If you experience any difficulties or need further assistance, please <a href="../contact.php"> Contact us</a>.</p>	
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
		
	echo'<br/><br/><a href="?page=saveSearch.php&stringy='.$searchString.'&propType='.$propType.'&rooms='.$rooms.'&mini='.$minPrice.'&maxi='.$maxPrice.'&propCat='.$propCategory.'" id="saveSearch" class="search"> SAVE SEARCH &#9654 </a><br/><br/>';
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
	while($row = mysql_fetch_array($result))
	{
		$price = $row['property_Price'];
		$price = number_format($price);
		$propID = $row['property_ID'];
		$propertyDescription = $row['property_Description'];
		$propertyDescription = substr($propertyDescription, 0, 80);
		$imgPath = $row['imgPath'];
		echo'<div class="propListing">'.
			'<div class="propImg left"><img src="../XownCMS/images/properties/'.$imgPath.'" alt="image" /></div><div class="propDet left"><span class="pricing">'.
			$price.'</span><br/>'.
			$row['property_Name'].'<br/>'.
			$row['property_Street'].', '.
			$row['property_City'].'. '.
			$row['property_State'].'. '.
			$row['property_Country'].'.<br/>'.
			$propertyDescription.'...<br/>'.
			$row['property_no_of_rooms'].' rooms.<br/><br/>'.
			'<a href="../propertyDetails.php?prop='.$propID.'" class="search">VIEW PROPERTY &#9654 </a></div></div>';
			/*<button name="addFave" id="addFave" class="search" value="'.$row['property_ID'].'">VIEW PROPERTY &#9654 </button>*/
	}
	
	
}

?>



  
