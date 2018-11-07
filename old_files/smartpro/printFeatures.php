<?php
include("link.php");

$query = "select * from agt_property_facilities where property_Reference = 9096183650";
$result = mysql_query($query);

while($row = mysql_fetch_array($result)){
	echo $features = $row["facility_Name"].',';

$que = "select * from prt_features where features_Name = '".$features."'";
$res = mysql_query($que);
$arr = mysql_fetch_array($res);

$feat_ID = $arr["features_ID"];	
	//echo $feat_ID;

}
?>