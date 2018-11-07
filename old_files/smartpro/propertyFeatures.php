<?php
include('header.php');

include("../XownCMS/link.php");
include('functions.php');

if (!(isset($_SESSION["ref_num"]))){
echo '<script>window.location = "postProperty.php"</script>';
}


$statusMsg = "";
if (isset($_POST["submit"])) {
	
	$bedrooms = $_POST["noOfBed"];
	$squareMeter = $_POST["squareMeter"];
	$squareFoot = $_POST["squareFoot"];
	$bathrooms = $_POST["noOfBathrooms"];
	$toilet = $_POST["noOfToilets"];
	$units = $_POST["noOfUnit"];
	$nature = $_POST["nature"];
	$property_Purpose = $_POST["purpose"];
	$structure_Type = $_POST["structureType"];

	$property_ID = getPropertyID($_SESSION["ref_num"]);
	
	$features_array = $_POST["features"];
	$feat_string="";
	while (list ($key,$val) = @each ($features_array)) {
	//echo "$val,";
	$feat_string.=$val.",";
	}
	$feat_string=substr($feat_string,0,(strLen($feat_string)-1));// remove the last , from string	
	//echo $feat_string;
	
	updatePropertyDetails($property_Purpose,$structure_Type, $feat_string, $_SESSION["ref_num"]);
	
	$sql = "Insert into prt_facilities(property_ID, no_Of_Bedrooms, no_Of_Bathrooms, no_Of_Toilets, nature_Of_Property, square_Meter, square_Foot)
	Values('$property_ID', '$bedrooms', '$bathrooms', '$toilet', '$nature', '$squareMeter', '$squareFoot')";
	$res = mysql_query($sql);
	
	if ($res) {
		echo '<script>window.location = "propertyPhotos.php"</script>';
	}
	else
	{
		$statusMsg = '<div class="response error">Error: '.mysql_error().'</div>';
	}
		
}
?>

<script>
$(document).ready(function(){
  $("#ok_btn").click(function(){
	$("#feature_frm").slideUp();
  });
  $("#add_btn").click(function(){
    $("#feature_frm").slideToggle();
	$("#feature_frm").addClass('visible');
  });

});
</script>

<script>
$(document).ready(function(){
  $(".commercial").click(function(){
	  $("#structureType").empty();
	  $("#structureType").append("<option>--Select--</option>");
	  $("#structureType").append("<option value='Office Space'>Office Space</option>");
	  $("#structureType").append("<option value='Hall'>Hall</option>");
	  $("#structureType").append("<option value='Studio Apartment'>Studio Apartment</option>");
	  $("#structureType").append("<option value='Shop'>Shop</option>");
	  $("#structureType").append("<option value='ware house'>Ware House</option>");
	  $("#structureType").append("<option value='Land'>Land</option>");
	  $("#structureType").append("<option value='Showroom'>Showroom</option>");
	  $("#structureType").append("<option value='Open Space'>Open Space</option>");
  });
  
    $(".residential").click(function(){
	  $("#structureType").empty();
	  $("#structureType").append("<option>--Select--</option>");
	  $("#structureType").append("<option value='Duplex'>Duplex</option>");
	  $("#structureType").append("<option value='Bungalow'>Bungalow</option>");
	  $("#structureType").append("<option value='Mansion'>Mansion</option>");
	  $("#structureType").append("<option value='Flat'>Flat</option>");
	  $("#structureType").append("<option value='Bungalow'>Self Contain</option>");
	  $("#structureType").append("<option value='Boys Quarter'>Boy's Quarter</option>");
	  $("#structureType").append("<option value='Semi Detached House'>Semi Detached House</option>");
	  $("#structureType").append("<option value='Block of Flat'>Block of Flat</option>");
	  $("#structureType").append("<option value='Land'>Land</option>");
  });

});
</script>
<?php
	echo $statusMsg;
?>
<div class="prop_Name">
	<?php
		echo getPropertyName($_SESSION["ref_num"]);
	?>
</div><!--End of prop_Name--> 
<div id="prop_div">    
	<div class="prop_step">PROPERTY FEATURES</div>
    <div class="prop_step_liner clear"></div>
    <div class="prop_step_ball">3</div>
    <div class="clear"></div>
    
<form action="" method="post" enctype="multipart/form-data">
<table width="800px" class="prop_table">
    <tr>
        <td colspan="3"><input type="radio" name="purpose" value="Commercial" class="commercial" required /><label style="margin-right: 70px;">Commercial</label>    
        <input type="radio" name="purpose" value="Residential" class="residential" /><label>Residential</label>  
        </td>   
    </tr>  
    <tr>
        <td colspan="3"><label>Property Type</label><br />
        	<select name="structureType" id="structureType">
            	<option selected>--Select--</option>
            </select>      
        </td>     
    </tr>
    <tr>
    	<td><label>No of Bedroom (s)</label><br />
							<select id="noOfBed" name="noOfBed">
								<option value="" selected="selected">-Select-</option>
								<option value="10">10+</option>
								<option value="9">9</option>
								<option value="8">8</option>
								<option value="7">7</option>
								<option value="6">6</option>
								<option value="5">5</option>
								<option value="4">4</option>
								<option value="3">3</option>
								<option value="2">2</option>
								<option value="1">1</option>
                                <option value="0">0</option>
							</select>        
        </td>
        <td><label>Square Meters</label><br />
        <input type="text" name="squareMeter" id="squareMeter" />
        </td>
        <td><label>Square Foot</label><br />
        <input type="text" name="squareFoot" id="squareFoot" />
        </td>
    </tr>
    <tr>
    	<td><label>No of Bathroom (s)</label><br />
							<select id="noOfBathrooms" name="noOfBathrooms">
								<option value="" selected="selected">-Select-</option>
								<option value="10">10+</option>
								<option value="9">9</option>
								<option value="8">8</option>
								<option value="7">7</option>
								<option value="6">6</option>
								<option value="5">5</option>
								<option value="4">4</option>
								<option value="3">3</option>
								<option value="2">2</option>
								<option value="1">1</option>
                                <option value="0">0</option>
							</select>        
        </td>
        <td><label>No of Toilet (s)</label><br />
							<select id="noOfToilets" name="noOfToilets">
								<option value="" selected="selected">-Select-</option>
								<option value="10">10+</option>
								<option value="9">9</option>
								<option value="8">8</option>
								<option value="7">7</option>
								<option value="6">6</option>
								<option value="5">5</option>
								<option value="4">4</option>
								<option value="3">3</option>
								<option value="2">2</option>
								<option value="1">1</option>
                                <option value="0">0</option>
							</select>         
        </td>
        <td><label>No of Units</label><br />
							<select id="noOfUnit" name="noOfUnit">
                            		<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>				
									<option value="15">15</option>						
									<option value="16">16</option>							
									<option value="17">17</option>							
									<option value="18">18</option>								
									<option value="19">19</option>
									<option value="20">20</option>
							</select>         
        </td>
    </tr>
    <tr>
    	<td colspan="2"><label>Nature of Property</label><br />
							<select id="nature" name="nature">
								<option value="">- select -</option>
                                <option value="new">new</option>
                                <option value="old">old</option>
                                <option value="renovated">renovated</option>
                                <option value="other">other</option>
                                </select>
	<div class="feature_select">
    <input type="checkbox" name="features[]" value="Serviced Apartment" /><label style="margin-right: 50px;">Serviced Apartment</label>
    <input type="checkbox" name="features[]" value="Furnished Apartment" /><label>Furnished Apartment</label>
    </div>                                        
        </td>
        <td><button id="add_btn" style="margin-top: -40px;" type="button">ADD MORE FEATURES</button>       
        </td>
    </tr>
    <tr>
    <tr>
    	<td width="17"><button type="submit" name="submit">CONTINUE TO PHOTOS</button></td>
        <td width="588">&nbsp;</td>
        <td width="179">&nbsp;</td>
    </tr>
    </tr>
</table>
 <div id="feature_frm">
<?php
$query = "select * from prt_features ORDER BY features_ID ASC";
$result = mysql_query($query);
while ($row = mysql_fetch_array($result))
{
	$feature = $row["features_Name"];
	echo '<div class="feat_check"><input type="checkbox" name="features[]"  value="'.$feature.'" /><label class="label">'.$feature.'</label></div>';
}
?>
<p>&nbsp;</p>
<div class="clear"></div>
<button id="ok_btn" type="button" class="btn_ok">OK</button>
<p>&nbsp;</p>    
    </div><!--End of Feature_frm-->
</form>
    
</div><!--End of div-->
    

<?php
include('footer.php');
?>