<?php
include('header.php');
?>
<?php
include("../XownCMS/link.php");
include("functions.php");

if (!(isset($_GET["refNum"]))){
echo '<script>window.location = "listProperty.php"</script>';
}


$_SESSION["ref_num_Edit"] = $_GET['refNum'];

$statusMsg = "";


if (isset($_POST["update"])) {
	$country = $_POST["country"];
	$state = $_POST["state"];
	$city = $_POST["city"];
	$street = $_POST["street"];
	$propertyName = $_POST["propName"];
	$currency = $_POST["currency"];
	$price = $_POST["propPrice"];
	$price = str_replace( ',', '', $price );
	$propertyDesc = $_POST["propertyDesc"];
	$propertyCat = $_POST["propCat"];
	
	$sql = "Update agt_property Set 
	property_Name = '" .$propertyName. "',
	property_Street = '".$street. "',
	property_City = '".$city."',
	property_State = '".$state."',
	property_Country = '".$country."',
	property_Price = '".$price."',
	currency = '".$currency."',
	property_Description = '".$propertyDesc."',
	category_ID = '".$propertyCat."'
	Where property_Reference = '".$_SESSION["ref_num_Edit"]."'";
	
			if (!$result = mysql_query($sql, $link))	
			{ 
			$statusMsg= '<div class="response error">'.mysql_error().'</div>';
		//	echo $err;
			}
			else
			{
				$statusMsg='<div class="response success">Property Details Updated Successfully</div>';
			}	
		
}


if (isset($_POST["continue"])) {
	echo '<script>window.location = "editFeatures.php"</script>';
}


switch ($_GET['action']) {
case "edit":
$query = "SELECT * FROM agt_property " .
"WHERE property_Reference = '" . $_GET['refNum'] . "'";
//echo $query;
$result = mysql_query($query)
or die("Invalid query: " . mysql_error());
$row = mysql_fetch_array($result);
$prop_ID = $row['property_ID'];
$property_Name = $row['property_Name'];
$property_Street = $row['property_Street'];
$property_State = $row['property_State'];
$property_City = $row['property_City'];
$property_Price = number_format($row['property_Price'], 0);
$property_Description = $row['property_Description'];
$cat_ID = $row["category_ID"];

$que_cat = "Select * from prt_category where category_ID = '".$cat_ID."'";
$res_cat = mysql_query($que_cat);
$arr_cat = mysql_fetch_array($res_cat);
$old_value = $arr_cat["category_Name"];


break;
default:
$prop_ID = "";
$property_Name = "";
$property_Street = "";
$property_State = "";
$property_City = "";
$property_Price = "";
$property_Description = "";

break;
}

?>
<script type="text/javascript">
function formatNumber(number, digits, decimalPlaces, withCommas)
{
        number       = number.toString();
    var simpleNumber = '';

    // Strips out the dollar sign and commas.
    for (var i = 0; i < number.length; ++i)
    {
        if ("0123456789.".indexOf(number.charAt(i)) >= 0)
            simpleNumber += number.charAt(i);
    }

    number = parseFloat(simpleNumber);

    if (isNaN(number))      number     = 0;
    if (withCommas == null) withCommas = false;
    if (digits     == 0)    digits     = 1;

    var integerPart = (decimalPlaces > 0 ? Math.floor(number) : Math.round(number));
    var string      = "";

    for (var i = 0; i < digits || integerPart > 0; ++i)
    {
        // Insert a comma every three digits.
        if (withCommas && string.match(/^\d\d\d/))
            string = "," + string;

        string      = (integerPart % 10) + string;
        integerPart = Math.floor(integerPart / 10);
    }

    if (decimalPlaces > 0)
    {
        number -= Math.floor(number);
        number *= Math.pow(10, decimalPlaces);

        string += "." + formatNumber(number, decimalPlaces, 0);
    }

    return string;
}
</script>

<?php
	echo $statusMsg;
?> 
<div id="prop_div">
	<div class="prop_step">PROPERTY LOCATION</div>
    <div class="prop_step_liner clear"></div>
    <div class="prop_step_ball">1</div>
    <div class="clear"></div>
    
<table width="800px" class="prop_table">
<form action="" method="post" enctype="multipart/form-data">  
    <tr>
        <td><label>Country</label><br />
        <select name="country" id="country" disabled="disabled">
        	<option>Nigeria</option>
        </select>      
        </td>    
    	<td><label>State</label><br />
		<?php echo loadStateEdit($link, $property_State); ?>
        </td>
        <td><label>City</label><br />
        <input type="text" name="city" id="city" required="required" value="<?php echo $property_City; ?>" />
        </td>
    </tr>
    <tr>
    	<td colspan="3"><label>Street</label><br />
        <input type="text" name="street" id="street" style="width: 615px;" value="<?php echo $property_Street; ?>" />
        </td>
    </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
	<div class="prop_step">PROPERTY DESCRIPTION</div>
    <div class="prop_step_liner clear"></div>
    <div class="prop_step_ball">2</div>
    <div class="clear"></div>
<table width="1000px" class="prop_table">
    <tr>
    <td colspan="2"><label>Property Name/Title</label><br />
    <input type="text" name="propName" id="propName" style="width: 600px;" value="<?php echo $property_Name; ?>" />
    </td>
    <td><label>Category</label><br />
		<?php
			echo loadPropertyCategoryEdit($link, $old_value);
		?>
    </td>
    </tr>
    <tr>
    	<td colspan="3"><label>Price of Property</label><br />
	<select name="currency" id="currency">
								<option value="NAIRA" selected="selected">Naira</option>
								<option value="DOLLAR">Dollar</option>    
    </select>
    <input type="text" name="propPrice" placeholder="Enter price in numbers" onkeyup="this.value = formatNumber(this.value, 0, 0, true)" required="required" value="<?php echo $property_Price; ?>" />        
        </td>
    </tr>
    <tr>
		<td colspan="3"><label>Description of Property</label><br />
        <textarea name="propertyDesc" cols="63" rows="10" required="required"><?php echo $property_Description; ?></textarea>
        </td>    
    </tr>
    <tr>
    	<td width="17"><button type="submit" name="update">UPDATE</button></td>
        <td width="588">&nbsp;</td>
        <td width="179"><button type="submit" name="continue">EDIT FACILITIES</button></td>
    </tr>
</table>        
</form>    
</div><!--End of prop_div-->

<?php
include('footer.php');
?>