<?php

//To get the number of properties that can be fetched with the search query
	$query = "SELECT COUNT(*) FROM agt_property ".
	"WHERE user_ID = $user_ID AND property_status_id=0";
		//echo $query;
		
 	$res = mysql_query($query);
	$row = mysql_fetch_array($res,MYSQL_NUM);
 	$fetchedProperties = $row[0];




	//Query to fetch properties
	$query = "SELECT p.property_ID AS property_ID, p.property_Name AS property_Name, p.property_Reference AS property_Reference, p.property_status_id AS property_status_id, p.property_Street AS property_Street,".
	" p.property_City AS property_City, p.property_State AS property_State, p.property_Country AS property_Country,".
	" p.property_Price AS property_Price, p.category_ID as propCatID, p.status_Details AS status, p.property_Description AS property_Description,".
	" f.no_Of_Bedrooms AS property_no_of_rooms, f.no_Of_Bathrooms AS property_no_of_bathrooms, f.no_Of_Toilets AS property_no_of_toilets, i.imageURL AS imgPath FROM agt_property AS p INNER JOIN".
	" prt_property_images AS i USING (property_ID) INNER JOIN prt_facilities AS f USING (property_ID) ".
	"WHERE user_ID = $user_ID AND property_status_id= 0  GROUP BY p.property_ID ORDER BY p.property_ID DESC LIMIT $start, $display";
	
	//echo $query;		
		
 $result = mysql_query($query);
if(mysql_num_rows($result) == 0)
{
	echo '<h2>No properties found.</h2>';
}
else
{
	if ($fetchedProperties > $display) 
	{ 
	 	$pages = ceil ($fetchedProperties/$display);
	}
	else
	{
		$pages = 1;
		//echo $pages ."is pages";
	}
		

	if ($pages > 1) 
	{
		echo '<p class="pagination">';
		$currentPage = ($start / $display) + 1;
		if ($currentPage != 1)
		 {
			echo '<a href="?s='. ($start - $display) . '&p=' . $pages . '" class="otherPage" >Previous </a> ';
		 }
		 for ($i = 1; $i <= $pages; $i++)
		  {
			if ($i != $currentPage)
			 {
				echo '<a href="?s=' . (($display *($i - 1))) . '&p=' .$pages . '" class="otherPage" >' . $i .'</a> ';
			 } 
			else 
			{
				echo'<span class="curPage">'. $i. ' </span>';
			}
		  }
		  
		  if ($currentPage != $pages) 
		  {
				echo '<a href="?s=' . ($start + $display). '&p=' . $pages . '" class="otherPage" >Next</a>';
		  }
echo "</p><br/>";
	}
	
	//$_SESSION['stringy'] = $searchString;
	//$_SESSION['propType'] = $propType;
	//$_SESSION['rooms'] = $rooms;
	//$_SESSION['mini'] = $minPrice;
	//$_SESSION['maxi'] = $maxPrice;
	//$_SESSION['propCat'] = $propCategory;
	
echo '<img src="images/status_loader.gif" id="status_loading" /><font class="status_msg_loader"></font>';	

	while($row = mysql_fetch_array($result))
	{
		$price = $row['property_Price'];
		$price = number_format($price);
		$propID = $row['property_ID'];
		$property_Reference = $row['property_Reference'];
		$propertyDescription = $row['property_Description'];
		$propertyDescription = substr($propertyDescription, 0, 80);
		$imgPath = $row['imgPath'];
		$property_no_of_bedrooms = $row["property_no_of_rooms"];
		$property_no_bathrooms = $row["property_no_of_bathrooms"];
		$property_no_of_toilets = $row["property_no_of_toilets"];
		$pStatus = $row["property_status_id"];
		$propCatID = $row["propCatID"];
		$status = $row["status"];
		
		if (!empty($status))
		{
			$status_Div = "<div class='prop_status_div_sale'>".$status."</div>";
		}
		else
		{
		$status_Div = "";
			
		if ($propCatID == 1)
		{
			$btn_status = '<button id="btn_status_sale" value ="'.$propID.'" class="view_det_smart" style="margin-right: 10px; height: 25px;">SET SOLD &#9654 </button>';
		}
		else if($propCatID == 2)
		{
			$btn_status = '<button id="btn_status_rent" value="'.$propID.'" class="view_det_smart" style="margin-right: 10px; height: 25px;">SET RENTED &#9654 </button>';
		}
		else
		{
			$btn_status = '';
		}			
			
		}
		
		
		if ($property_no_of_bedrooms >= 1 ) {
			$property_no_of_bedrooms = '<div class="fac_ind"><img src="../images/bedroom.png" />'.$property_no_of_bedrooms.'Bedroom (s)</div>';
		}
		else {
			$property_no_of_bedrooms = '';
		}
		
		if ($property_no_bathrooms >= 1) {
			$property_no_bathrooms = '<div class="fac_ind"><img src="../images/shower.png" />'.$property_no_bathrooms.'Bathroom (s)</div>';
		}
		else {$property_no_bathrooms = '';}
		
		if($property_no_of_toilets >= 1) {
			$property_no_of_toilets = '<div class="fac_ind"><img src="../images/toilet.png" />'.$property_no_of_toilets.'Toilet (s)</div>';
		}
		else {
			$property_no_of_toilets = '';
		}			
		
		$saleDetails = '<div class="propListing_smart">'.
			'<div class="propImg_smart left"><a href="editProperty.php?refNum='.$property_Reference.'&action=edit">
			<img src="uploads/photos/'.$imgPath.'" alt="image" /></a>
			'.$status_Div.'
			</div><div class="propDet left" style="width: 600px;"><font class="pricing">&#8358</font>
			<span class="pricing">'.
			$price.'</span><p>&nbsp;</p><p><font class="title_head">'.
			$row['property_Name'].'</font></p><br><i class="fa fa-map-marker"></i>'.
			$row['property_Street'].', '.
			$row['property_City'].'. '.
			$row['property_State'].'. '.
			$row['property_Country'].'.<br><br><p>'.
			$propertyDescription.'...</p>
			</div>';
$saleDetails .=	'<div class="status_div">
			Status: ';
			if($pStatus=='1'){
$saleDetails .='<input type="checkbox" id="s_status.php?pid='.$propID.'" class="switch switch-small" data-off-text="OFF" data-on-text="ON" data-size="mini" checked />';
             } else{
$saleDetails .='<input type="checkbox" id="s_status.php?pid='.$propID.'" class="switch switch-small" data-off-text="OFF" data-on-text="ON" data-size="mini" />';
          }


$saleDetails .= '<p>&nbsp;</p><p>&nbsp;</p><br /><p>
<a href="editProperty.php?refNum='.$property_Reference.'&action=edit" class="view_det_smart" style="margin-right: 10px;">EDIT &#9654 </a>
'.$btn_status.'
<a href="editPhotos.php?refNum='.$property_Reference.'" class="view_det_smart">DELETE &#9654 </a>

</p>';			
			
$saleDetails .=	'</div>
			
			<div class="clear"></div>
			<div class="feat_property">
			'.$property_no_of_bedrooms.'
			'.$property_no_bathrooms.'
			'.$property_no_of_toilets.'
			</div>
			
			</div>';
			
echo $saleDetails;
			
	}
	
}
?>

<script type="text/javascript">
 $('#btn_status_sale').click(function(){
	var btnvalue = $(this).val();
	$(".status_msg_loader").empty();
	$('#status_loading').show();
	$.ajax({
		type: 'POST',							
		url: 'setStatus.php', 
		data: { btnvalue: btnvalue, status: 'Sold' },
		dataType: 'json',
		success: function(data){
		//alert('what is this '+data);
		$('#status_loading').hide();
		response = (JSON.stringify(data));
		$(".status_msg_loader").text(data);
	},
	
	});
});

 $('#btn_status_rent').click(function(){
	var btnvalue = $(this).val();
	$(".status_msg_loader").empty();
	$('#status_loading').show();
	$.ajax({
		type: 'POST',							
		url: 'setStatus.php', 
		data: { btnvalue: btnvalue, status: 'Rented' },
		dataType: 'json',
		success: function(data){
		//alert('what is this '+data);
		$('#status_loading').hide();
		response = (JSON.stringify(data));
		$(".status_msg_loader").text(data);
	},
	
	});
}); 
</script>
