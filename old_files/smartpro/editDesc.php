<?php
include("../XownCMS/link.php");
include("functions.php");
session_start();


$name=$_SESSION['firstname']." ".$_SESSION['lastname'];
$companyName = getAgentCompany($_SESSION["agentID"]);
$activity_Desc = "Edited a Property";

$imageID = $_GET['imageID'];
$propDesc= $_GET['propDesc'];

	saveUserActivity($name, $activity_Desc, $_SESSION["agentID"], $companyName);
	
			foreach ($imageID as $key => $value)	
			{
				//echo $key;
				$sql = "Update prt_property_images Set imageDesc='".$propDesc[$key]."' Where imageID='".$value."'";
				//echo $sql;
				$result = mysql_query($sql);
				if ($result) {
					//unset($_SESSION["ref_num"]);					
					echo '<script>window.location = "listProperty.php"</script>';
				}
				else
				{
					$msg = "Error in Updating : ".mysql_error();
				}
		}

?>