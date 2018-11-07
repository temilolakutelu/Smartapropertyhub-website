<?php
include('header.php');
?>
<?php
include("../XownCMS/link.php");
include("functions.php");

$statusMsg = "";

//echo getPropCode($link);

if (isset($_POST["continue"])) {
	
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
	$user_ID = getUserID($_SESSION["agentID"]);
	
	$_SESSION["ref_num"] = generateUniqueRefNo(10);
	
	$sql = "Insert into agt_property(property_Name, property_Street, property_City, property_State, property_Country, property_Price, currency, property_Description, structure_ID, category_ID, purpose_ID, property_status_id, property_Reference, user_ID, date_Added)
			values('$propertyName', '$street', '$city', '$state', '$country', '$price', '$currency', '$propertyDesc', '','$propertyCat', '', '1', '".$_SESSION["ref_num"]."', '$user_ID', NOW())";
	$result = mysql_query($sql);
	
	if ($result) {
		echo '<script>window.location = "propertyFeatures.php"</script>';
	}
	else
	{
		$statusMsg = '<div class="response error">Error: '.mysql_error().'</div>';
	}
	
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
 
	<?php if (isset($_GET['status'])) {
		echo " <div class=\"response success\"> ";
		echo $_GET['status'];	
		echo "</div>";
		} ?>
<p>&nbsp;</p>        
<div id="prop_div">
	<div class="prop_step">PROPERTY LOCATION</div>
    <div class="prop_step_liner clear"></div>
    <div class="prop_step_ball">1</div>
    <div class="clear"></div>
    
<table width="800px" class="prop_table">
<form action="" method="post" enctype="multipart/form-data">  
    <tr>
        <td><label>Country</label><br />
        <select name="country" id="country">
        	<option>Nigeria</option>
        </select>      
        </td>    
    	<td><label>State</label><br />
		<?php
			echo loadState($link);
		?>
        </td>
        <td><label>City</label><br />
        <input type="text" name="city" id="city" required="required" />
        </td>
    </tr>
    <tr>
    	<td colspan="3"><label>Street</label><br />
        <input type="text" name="street" id="street" style="width: 615px;" />
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
    <input type="text" name="propName" id="propName" style="width: 600px;" />
    </td>
    <td><label>Category</label><br />
		<?php
			echo loadPropertyCategory($link);
		?>
    </td>
    </tr>
    <tr>
    	<td colspan="3"><label>Price of Property</label><br />
	<select name="currency" id="currency">
								<option value="NAIRA" selected="selected">Naira</option>
								<option value="DOLLAR">Dollar</option>    
    </select>
    <input type="text" name="propPrice" placeholder="Enter price in numbers" onkeyup="this.value = formatNumber(this.value, 0, 0, true)" required="required" />        
        </td>
    </tr>
    <tr>
		<td colspan="3"><label>Description of Property</label><br />
        <textarea name="propertyDesc" cols="63" rows="10" required="required"></textarea>
        </td>    
    </tr>
    <tr>
    	<td width="17">&nbsp;</td>
        <td width="588">&nbsp;</td>
        <td width="179"><button type="submit" name="continue">ADD FACILITIES</button></td>
    </tr>
</table>        
</form>    
</div><!--End of prop_div-->

<?php
include('footer.php');
?>