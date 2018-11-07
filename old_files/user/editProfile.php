<?php
include('../XownCMS/link.php');


if (isset($_POST["editProfile"])) {
	
	$sql = "UPDATE smart_prospects SET
prospect_LastName = '" . $_POST['lastName'] . "',
prospect_Mobile = '" . $_POST['mobile'] . "',
prospect_Email = '" . $_POST['email'] . "'
WHERE prospect_ID = '" . $_GET['pID'] . "'";
$result = mysql_query($sql, $link);
		if (mysql_affected_rows($link) == 0)	
			{ 
				$statusMsg="<div class='errorMsg'>No change has occured on your profile.</div>";
			}
			else if(mysql_affected_rows($link) == 1)
			{
				$statusMsg="<div class='errorMsg'>Your profile has been successfully modified.</div>";
			}
			else
			{ 
				$statusMsg="<div class='errorMsg'>Your profile could not be modified.</div>";
				//mysql_error();
			//	echo $err;
			}


	}

switch ($_GET['action']) {
case "edit":
$query = "SELECT * FROM smart_prospects ".
"WHERE prospect_ID = '". $_GET['pID'] ."'";
$result = mysql_query($query)
or die("You can not acccess this page.");
$row = mysql_fetch_array($result);
$firstName = $row['prospect_FirstName'];
$lastName = $row['prospect_LastName'];
$mobile = $row['prospect_Mobile'];
$email = $row['prospect_Email'];


break;
default:
$firstName = "";
$lastName = "";
$mobile = "";
$email = "";


break;
}


?>
 <div id="salesRent">EDIT MY PROFILE</div>
 <?php
 	echo $statusMsg;
 ?>
 <div id="rentSale">
<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="form1" id="form1">
 
  <span class="txtLabel">First Name:</span> <input type="text" name="firstName"  class="textbox" readonly value="<?php echo $firstName; ?>" />  <br />
  
  <span class="txtLabel">Last Name:</span> <input type="text" name="lastName"   class="textbox" pattern="(([A-Za-z_\-\.]){2,})" oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid name is required' : '');" value="<?php echo $lastName; ?>" /> <br />
  
  <span class="txtLabel">Mobile:</span> <input type="text" name="mobile"   class="textbox" pattern='\d{11}' oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid Phone Number with ELEVEN digits is required' : '');" maxlength="11" value="<?php echo $mobile; ?>" />  <br />
  
  <span class="txtLabel">Email:</span> <input type="text" name="email"  class="textbox" pattern="([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})"  oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid email is required' : '');" value="<?php echo $email; ?>" />  <br />
  
  <span class="txtLabel">&nbsp;</span> <input type="submit" name="editProfile" value="UPDATE &#9654" class="search" />
  
  
     
</form>
</div>