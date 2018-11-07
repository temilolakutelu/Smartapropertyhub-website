<?php
if (!(isset($_SESSION['cmslogin'])))
{
	header("Location: index.php");
}

$searchString = mysql_real_escape_string($_GET['stringy']);
$minPrice = mysql_real_escape_string($_GET['mini']);
$maxPrice = mysql_real_escape_string($_GET['maxi']);
$propType = mysql_real_escape_string($_GET['propType']);
$rooms = mysql_real_escape_string($_GET['rooms']);
$propCategory = mysql_real_escape_string($_GET['propCat']);

if(empty($searchString))
{
	$searchString ='NULL';
}

if(empty($propType))
{
	$propType ='NULL';
}

if(empty($rooms))
{
	$rooms ='NULL';
}


if(empty($minPrice))
{
	$minPrice ='NULL';
}
else if($minPrice == 0)
{
	$minPrice ='NULL';	
}

if(empty($maxPrice))
{
	$maxPrice ='NULL';
}
else if($maxPrice == 0)
{
	$maxPrice ='NULL';	
}


$query = "INSERT INTO prt_search_criteria (prospect_ID, min_Price, max_Price, number_Of_Rooms, property_Type, property_Location, property_Category) VALUES ( '$pid', '$minPrice', '$maxPrice', '$rooms', '$propType','$searchString', (SELECT category_Name FROM prt_category WHERE category_ID = '$propCategory'))";
$result = mysql_query($query, $link);
if($result)
{
	echo'<h2>Your search query has been saved.</h2>';
}

else
{
	echo'<h2>Could not save your search query. <br/>Please contact the administrator for more information.</h2>';	
	/*echo $query;
	echo '<br/>'.mysql_error();*/
}

?>