<div id="salesRent">MY SAVED SEARCH</div>
 
<?php
$query = "SELECT * FROM prt_search_criteria WHERE prospect_ID = '". $_GET['pID'] ."'";
$result = mysql_query($query);
if(mysql_num_rows($result) > 0)
{

echo'
<div id="rentSale">
<form action="" method="post" name="form1" id="form1">
<table class="userTable">
<thead>
<tr class="userTableHeader">
<td>LOCATION</td>
<td>PROPERTY TYPE</td>
<td>NO. OF ROOMS</td>
<td>MIN. PRICE</td>
<td>MAX PRICE</td>
<td>CATEGORY</td>
<td><img src="images/search1.png"></td>
</tr>
</thead>
<tfoot>
</tfoot>
<tbody>
';

while($row = mysql_fetch_array($result))
{
$loc = $row['property_Location'];
$loc = ucwords($loc);
$propType = $row['property_Type'];
$propType = ucwords($propType);
$rooms = $row['number_Of_Rooms'];
$minPrice = $row['min_Price'];
$maxPrice = $row['max_Price'];
$propCat = $row['property_Category'];

$query = "SELECT category_ID FROM prt_category WHERE category_Name ='$propCat'";
$res = mysql_query($query,$link);
$row = mysql_fetch_array($res,MYSQL_ASSOC);
$propCatCode = $row['category_ID'];

/*if(empty($loc))
{
	$loc ='NULL';
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
if(empty($maxPrice))
{
	$maxPrice ='NULL';
}*/
echo'
<tr class="innerRow">
<td class="innerField">'.$loc.'</td>
<td class="innerField">'.$propType.'</td>
<td class="innerField">'.$rooms.'</td>
<td class="innerField">'.$minPrice.'</td>
<td class="innerField">'.$maxPrice.'</td>
<td class="innerField">'.$propCat.'</td>
<td class="innerField"><a href="?page=searchProp.php&stringy='.$loc.'&propType='.$propType.'&rooms='.$rooms.'&mini='.$minPrice.'&maxi='.$maxPrice.'&propCat='.$propCatCode.'">Search</a></td>
</tr>
';

}
echo'
</tbody>
</table>
</form>
';
}
else
{
	echo'<h2>You do not have any saved search queries.</h2>';
}

?>

</div>