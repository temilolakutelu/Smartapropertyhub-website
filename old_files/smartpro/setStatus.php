<?php
include ('../XownCMS/link.php');
header('Content-Type: application/json');
if(isset($_POST['btnvalue']))
{
	$propID = $_POST['btnvalue'];
	$status = $_POST['status'];
	$query = "Update agt_property set status_Details='".$status."' where property_ID = '".$propID."'";
	$result = mysql_query($query);
	if (!$result)
	{
        $data = "Error";
        echo json_encode($data);
	}
	else
	{
        $data= "Property status set successfully";		
		echo json_encode($data);
	}
}

?>