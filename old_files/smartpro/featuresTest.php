<?php
include("../XownCMS/link.php");
include("functions.php");

if(isset($_POST["submit"])){
$property = $_POST["propRef"];
$stat = "Done";
//echo $property;
$que = "Select * from agt_property_facilities Where property_Reference = '".$property."'";
$res = mysql_query($que);
while($arr = mysql_fetch_array($res)){
	$facility_Name = $arr["facility_Name"].",";
	$property_Refe = $arr["property_Reference"]."<br>";
	$facility_old .= "$facility_Name";
	//echo $property_Ref."".$facility_Name."<br>";
}
$facility_old = rtrim($facility_old, ",");
//echo $facility_old;

$que_upd = "Update agt_property Set property_Features = '".$facility_old."',
 feat_Status = '".$stat."'
 Where property_Reference = '".$property."'";
//echo $res_upd;
$res_upd = mysql_query($que_upd);
if(!$res_upd) {
	echo "Error : ".mysql_error();
}
else
{
	echo "Success. Thank God.";
}
}
?>
<form action="" method="post">
	<select name="propRef" id="propRef" style="width: 200px;">
    <?php
	$status = "Undone";
	$query_se = "Select * from agt_property where feat_Status = '".$status."'";
	$res_se = mysql_query($query_se);
	while($arr2 = mysql_fetch_array($res_se)){
		echo '<option value="'.$arr2["property_Reference"].'">'.$arr2["property_Reference"].'</option>';
	}
	?>
    </select>
    <input type="submit" name="submit" value="Update" />
</form>