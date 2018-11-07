<?php
include("../XownCMS/link.php");
include("functions.php");

include('SimpleImage.php');

$sql = mysql_query("SELECT * FROM prt_property_images");
//echo $sql;
while($row = mysql_fetch_array($sql)){
    $image_im = $row['imageURL'];
	$image_im = get_basename($image_im);
	echo $image_im.'<br />';
    $imageID = $row['imageID'];
	$image = new SimpleImage();
    $image->load("uploads/photos/".$image_im);
    $image->resize(600,400);
    $msg = $image->save("uploads/photos/".$image_im);
}
$msg -> output();

echo $msg;

?>