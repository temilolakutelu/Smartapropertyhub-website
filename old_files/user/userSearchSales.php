<?php
ob_start();
if(isset($_POST['searchSale']))
{
	$loc = $_POST['searchCriteria'];
	$minPrice = getInteger($_POST['minPrice']);
	$maxPrice = getInteger($_POST['maxPrice']);
	$propType = $_POST['propertyType'];
	$rooms = $_POST['numberOfRooms'];
	$propCategory = 1 ;
	
	$part = "?page=searchProp.php&stringy=$loc&propType=$propType&rooms=$rooms&mini=$minPrice&maxi=$maxPrice&propCat=$propCategory";
	
	header("Location:".$part);
}


?>

<div id="salesRent" >SEARCH PROPERTIES FOR SALE</div>
            
					  	<div id="rentSale" >
						 <?php
							include('../includes/sales.php');
						?>
					  
					  <p>&nbsp;</p>
					</div>
                    