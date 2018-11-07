<div id="salesRent">MY FAVOURITE PROPERTIES</div>
<?php

$display = 5;
if (isset($_GET['s']) && is_numeric($_GET['s']))
{
 $start = $_GET['s'];
} else 
{
 $start = 0;
}


if((isset($_GET['propDelCode'])) AND (isset($_GET['action'])) AND ((isset($_GET['action']))=='delete') AND (isset($_GET['prosp'])))
	{
		$prospID = $_GET['prosp'];
		$query = "DELETE FROM 	pst_saved_favourites WHERE property_ID ='". $_GET['propDelCode'] ."' LIMIT 1";
		$result = mysql_query($query,$link);
		echo'
			<h2>Property has been removed.</h2>
			<a href="?page=favourite.php&pID='.$prospID.'" class="search">BACK &#9654 </a>
		';
	}

$query = "SELECT COUNT(*) FROM pst_saved_favourites WHERE prospect_ID ='". $_GET['pID'] ."'";
$result = mysql_query($query,$link);
$row = mysql_fetch_array($result,MYSQL_NUM);
$fetchedProperties = $row[0];


if ($fetchedProperties > $display) 
	{ 
	 	$pages = ceil ($fetchedProperties/$display);
		
	}
	else
	{
		$pages = 1;
		
	}

$query = "SELECT f.property_ID AS property_ID, f.prospect_ID AS prospect_ID, p.property_Name AS property_Name, p.property_Street AS property_Street,".
	" p.property_City AS property_City, p.property_State AS property_State, p.property_Country AS property_Country,".
	" p.property_Price AS property_Price, p.property_Description AS property_Description,".
	" p.property_no_of_rooms AS property_no_of_rooms, i.imageURL AS imgPath ".
	" FROM pst_saved_favourites AS f INNER JOIN agt_property AS p USING (property_ID) INNER JOIN prt_property_images AS i USING (property_ID) ".
	"WHERE prospect_ID ='". $_GET['pID'] ."' LIMIT $start, $display ";

$result = mysql_query($query,$link);


if ($result)
{
	//echo $query;
	while($row = mysql_fetch_array($result,MYSQL_ASSOC))
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
			'<a href="../propertyDetails.php?prop='.$propID.'" class="search">VIEW &#9654 </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="?page=favourite.php&action=delete&propDelCode='.$row['property_ID'].'&prosp='.$row['prospect_ID'].'" class="search">REMOVE &#9654 </a>
			</div></div>';
		}
		
		
		if ($pages > 1) 
		{
			echo '<br/><p class="pagination">';
			$currentPage = ($start / $display) + 1;
			if ($currentPage != 1)
			 {
				echo '<a href="?page=favourite.php&pID='.$pid.'&s='. ($start - $display) . '&p=' . $pages . '" class="otherPage" >Previous </a> ';
			 }
			 for ($i = 1; $i <= $pages; $i++)
			  {
				if ($i != $currentPage)
				 {
					echo '<a href="?page=favourite.php&pID='.$pid.'&s=' . (($display *($i - 1))) . '&p=' .$pages . '" class="otherPage" >' . $i .'</a> ';
				 } 
				else 
				{
					echo'<span class="curPage">'. $i. ' </span>';
				}
			  }
			  
			  if ($currentPage != $pages) 
			  {
					echo '<a href="?page=favourite.php&pID='.$pid.'&s=' . ($start + $display). '&p=' . $pages . '" class="otherPage" >Next</a>';
			  }

	}

		
		
}
else
{
	echo"<h2>You have no saved favourite properties.</h2><h2>Make a search and add properties to your favourite list.</h2>";
	
		
}


?>