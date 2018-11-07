<?php
ob_start();
if(isset($_POST['searchAuction']))
{
	
	$loc = $_POST['searchCriteria'];
	$minPrice = getInteger($_POST['minPrice']);
	$maxPrice = getInteger($_POST['maxPrice']);
	$propType = $_POST['propertyType'];
	$rooms = $_POST['numberOfRooms'];
	$propCategory = 3 ;
	
	$part = "?page=searchProp.php&stringy=$loc&propType=$propType&rooms=$rooms&mini=$minPrice&maxi=$maxPrice&propCat=$propCategory";
	
	header("Location:".$part);

}


?>
<div id="salesRent" >SEARCH PROPERTIES FOR AUCTION</div>
            
					  	<div id="rentSale" >
						 <?php
						 
							include('../includes/auction.php');
							

						?>
					  
					  <p>&nbsp;</p>
					</div>
                    