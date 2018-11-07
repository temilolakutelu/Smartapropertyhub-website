<div id="salesRent">ADD PROPERTIES TO FAVOURITES LIST</div>
<?php
if(isset($_GET['prop']) && is_numeric($_GET['prop']))
{
	$prop = $_GET['prop'];
	$pid = $_SESSION["pid"];
	$query = "SELECT * FROM pst_saved_favourites WHERE (prospect_ID ='$pid') AND (property_ID = '$prop')";
	$result = mysql_query($query,$link);
	if(mysql_num_rows($result)== 0)
	{
		$query = "INSERT INTO pst_saved_favourites (prospect_ID, property_ID) VALUES ('$pid','$prop')";
		$result = mysql_query($query,$link);
		if($result)
		{
			echo '<h2>Property has been added to your favourites list.</h2>';
		}
		else 
		{
		
			echo '<h2>Cannot Add As A Favourite</h2>';
							
		}
	}
	else
	{
		echo '<h2>Could not add property. </h2><h2> This property has already been added to your favourites list.</h2>';
	}
	
}


?>