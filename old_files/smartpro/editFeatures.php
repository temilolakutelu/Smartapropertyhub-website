<?php
include('header.php');

include("../XownCMS/link.php");
include('functions.php');

if (!(isset($_SESSION["ref_num_Edit"]))){
echo '<script>window.location = "listProperty.php"</script>';
}

//echo $_SESSION["ref_num_Edit"];

$property_ID = getPropertyID($_SESSION["ref_num_Edit"]);

$statusMsg = "";

if (isset($_POST["update"])) {
	
	$bedrooms = $_POST["noOfBed"];
	$squareMeter = $_POST["squareMeter"];
	$squareFoot = $_POST["squareFoot"];
	$bathrooms = $_POST["noOfBathrooms"];
	//echo $bathrooms;
	$toilet = $_POST["noOfToilets"];
	$units = $_POST["noOfUnit"];
	$nature = $_POST["nature"];
	$property_Purpose = $_POST["purpose"];
	$structure_Type = $_POST["structureType"];
	
	updatePropertyDetails($property_Purpose,$structure_Type,$_SESSION["ref_num_Edit"]);

//code to update selected checkboxes	
$feat_array= $_POST['features'];
$tag_string="";
while (list ($key,$val) = @each ($feat_array)) {
//echo "$val,";
$tag_string.=$val.",";
}
$tag_string=substr($tag_string,0,(strLen($tag_string)-1));// remove the last , from string
$sql_feat =$dbo->prepare("update agt_property set property_Features=:tag_string where  property_ID='".$property_ID."' ");
$sql_feat->bindParam(':tag_string',$tag_string,PDO::PARAM_STR);
if($sql_feat->execute()){
//echo "Data Updated<br>"; 
}

	
	
	$sql = "Update prt_facilities Set no_Of_Bedrooms = '".$bedrooms."',
	no_Of_Bathrooms = '".$bathrooms."',
	no_Of_Toilets = '".$toilet."',
	nature_Of_Property = '".$nature."',
	square_Meter = '".$squareMeter."',
	square_Foot = '".$squareFoot."'
	Where property_ID = '".$property_ID."'";
	
	$res = mysql_query($sql);
	
	if ($res) {
		$statusMsg = '<div class="response success">Property facilities updated successfully!</div>';
	}
	else
	{
		$statusMsg = '<div class="response error">Error: '.mysql_error().'</div>';
	}	

		
}

if (isset($_POST["continue"])) {
	echo '<script>window.location = "editPhotos.php"</script>';
}



$sql_Purpose = "Select * from agt_property where property_Reference = '".$_SESSION["ref_num_Edit"]."'";
$res_Purpose = mysql_query($sql_Purpose);
$row_Purpose = mysql_fetch_array($res_Purpose);
$prop_Purpose = $row_Purpose["property_Purpose"];
$struc_Type = $row_Purpose["structure_Type"];

//get old values for property facilities
$pfQuery = mysql_query("SELECT * FROM prt_facilities WHERE property_ID='".$property_ID."'");
$pfArray = mysql_fetch_array($pfQuery);
$no_of_bedrooms = $pfArray['no_Of_Bedrooms'];
$no_of_bathrooms = $pfArray['no_Of_Bathrooms'];
$no_of_toilets = $pfArray['no_Of_Toilets'];
$sqrMtr = $pfArray['square_Meter'];
$sqrFoot = $pfArray['square_Foot'];
$natureOfProp = $pfArray['nature_Of_Property'];


//code to get if serviced appartment or Furnished Appartment was checked
$que1 = "select property_Features from agt_property where property_ID = '".$property_ID."'";
$res1 = mysql_query($que1);

//code to check for the features checked
$count=$dbo->prepare("select property_Features from agt_property where property_ID= '".$property_ID."'");
if($count->execute()){
$row = $count->fetch(PDO::FETCH_OBJ);
}
$features_array= split(",",$row->property_Features);

$qt_feat="select *  from prt_features";
$st_feat="";



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

<?php
	echo $statusMsg;
?>
<div class="prop_Name">
	<?php
		echo getPropertyName($_SESSION["ref_num_Edit"]);
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
        <td colspan="3"><input type="radio" name="purpose" value="Commercial" <?php if ($prop_Purpose  == "Commercial")	
			{  echo "checked=\"checked\"";} else{}?> class="commercial" required /><label style="margin-right: 70px;">Commercial</label>    
        <input type="radio" name="purpose" value="Residential" <?php if ($prop_Purpose  == "Residential")	
			{  echo "checked=\"checked\"";} else{}?> class="residential" /><label>Residential</label>  
        </td>   
    </tr>  
    <tr>
        <td colspan="3"><label>Property Type</label><br />
        	<select name="structureType" id="structureType">        
<?php
$options = array('Office Space', 'Hall', 'Studio Apartment', 'Shop', 'Ware House', 'Land', 'Showroom', 'Open Space', 'Duplex', 'Bungalow', 'Mansion', 'Flat', 'Self Contain', 'Boy\'s Quarter', 'Semi Detached House', 'Block of Flat');


	if (in_array($struc_Type,$options)) {
	echo '<option value="'.$struc_Type.'" selected="selected" />'.$struc_Type.'</option>';
		foreach($options as $ind_opt) {
			echo '<option value="'.$ind_opt.'" />'.$ind_opt.'</option>';
		}
	}
	else {
		foreach($options as $ind_opt) {
			echo '<option value="'.$ind_opt.'" />'.$ind_opt.'</option>';
		}		
	}
?>        
            </select>      
        </td>     
    </tr>
    <tr>
    	<td><label>No of Bedroom (s)</label><br />
							<select id="noOfBed" name="noOfBed">
								<option value="" selected="selected">-Select-</option>
								<option value="10">10+</option>
								<?php
								for($i=0;$i<10;$i++){ 
								if($i==$no_of_bedrooms){ ?>
									<option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
								<?php } else { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } 
								} ?>
							</select>         
        </td>
        <td><label>Square Meters</label><br />
        <input type="text" name="squareMeter" id="squareMeter" value="<?php echo $sqrMtr; ?>" />
        </td>
        <td><label>Square Foot</label><br />
        <input type="text" name="squareFoot" id="squareFoot" value="<?php echo $sqrFoot; ?>" />
        </td>
    </tr>
    <tr>
    	<td><label>No of Bathroom (s)</label><br />
							<select id="noOfBathrooms" name="noOfBathrooms">
								<option value="" selected="selected">-Select-</option>
								<option value="10">10+</option>
								<?php
								for($i=0;$i<10;$i++){ 
								if($i==$no_of_bathrooms){ ?>
									<option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
								<?php } else { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } 
								} ?>
							</select>       
        </td>
        <td><label>No of Toilet (s)</label><br />
							<select id="noOfToilets" name="noOfToilets">
								<option value="" selected="selected">-Select-</option>
								<option value="10">10+</option>
								<?php
								for($i=0;$i<10;$i++){ 
								if($i==$no_of_toilets){ ?>
									<option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
								<?php } else { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } 
								} ?>
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
<?php
$options_Nature = array('new', 'old', 'renovated', 'other');
	if (in_array($natureOfProp,$options_Nature)) {
	echo '<option value="'.$natureOfProp.'" selected="selected" />'.$natureOfProp.'</option>';
		foreach($options_Nature as $ind_nature) {
			echo '<option value="'.$ind_nature.'" />'.$ind_nature.'</option>';
		}
	}
	else {
		foreach($options_Nature as $ind_nature) {
			echo '<option value="'.$ind_nature.'" />'.$ind_nature.'</option>';
		}		
	}
?> 
              </select>

	<div class="feature_select">
<?php

$arr1 = mysql_fetch_array($res1);
	$property_Feat = $arr1["property_Features"];
	$property_Feat = explode(",", $property_Feat);
	$feature_old = "Serviced Apartment"; 
	
		if (in_array($feature_old,$property_Feat))
		{
			echo '<input type="checkbox" name="features[]" value="Serviced Apartment" checked="checked" /><label style="margin-right: 50px;">Serviced Apartment</label>';
		}
		else
		{
			echo '<input type="checkbox" name="features[]" value="Serviced Apartment" /><label style="margin-right: 40px;">Serviced Apartment</label>';			
		}
		
	$feature_Name  = "Furnished Apartment";
			//echo count($property_Feat);
		if (in_array($feature_Name,$property_Feat))
		{
			echo '<input type="checkbox" name="features[]" value="Furnished Apartment" checked="checked" /><label>Furnished Apartment</label>';
		}
		else
		{
			echo '<input type="checkbox" name="features[]" value="Furnished Apartment" /><label>Furnished Apartment</label>';			
		}		
?>    
    </div>                                        
        </td>
        <td><button id="add_btn" style="margin-top: -40px;" type="button">ADD MORE FEATURES</button>       
        </td>
    </tr>
    <tr>
    <tr>
    	<td width="17"><button type="submit" name="update">Update Feature</button></td>
        <td width="588">&nbsp;</td>
        <td width="179" style="text-align: right;"><button type="submit" name="continue">Continue to Photos</button></td>
    </tr>
    </tr>
</table>
 <div id="feature_frm">
<?php
foreach ($dbo->query($qt_feat) as $ind_feat) {
if(in_array($ind_feat['features_Name'],$features_array)){$st_feat="checked";}
else{$st_feat="";}

echo "<div class='feat_check'><input type='checkbox' name='features[]' value='$ind_feat[features_Name]' $st_feat /> 
<label class='label'>$ind_feat[features_Name]<label></div>";

}


?>
<p>&nbsp;</p>
<div class="clear"></div>
<button id="ok_btn" type="button" class="btn_ok">OK</button>    
    </div><!--End of Feature_frm-->
</form>
    
</div><!--End of div-->
    

<?php
include('footer.php');
?>