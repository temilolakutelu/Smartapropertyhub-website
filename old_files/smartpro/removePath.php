<?php
include("../XownCMS/link.php");
include("functions.php");


$query = "SELECT * from prt_property_images";

$result = mysql_query($query);	

//echo $query;

while($row = mysql_fetch_array($result)){

    $imageURL = $row['imageURL'];
	$image_ID = $row['imageID'];
	
	$new_file_name = get_basename($imageURL);
	
	updateBaseName($image_ID, $new_file_name);
	
	echo $new_file_name."<br />";
	
	
}


?>