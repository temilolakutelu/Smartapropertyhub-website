<?php
include("../XownCMS/link.php");
include("functions.php");


$sql = mysql_query("SELECT * FROM prt_property_images");
//echo $sql;
while($row = mysql_fetch_array($sql)){
    $filename = $row['imageURL'];
	$Path = 'uploads/photos/';
	$imgpath = $Path.$filename;
	
	//function to watermark pictures
	waterMark_Img($imgpath);
	
}

?>