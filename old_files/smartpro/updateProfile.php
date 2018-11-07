<?php
include('header.php');
include("../XownCMS/link.php");
include('functions.php');

$query = "Select * from smart_agents where agent_ID='".$_SESSION["agentID"]."'";
$res = mysql_query($query);
$arr = mysql_fetch_array($res);
$agent_ID = $arr["agent_ID"];
$firstName = $arr["agent_FirstName"];
$lastName = $arr["agent_LastName"];
$website = $arr["agent_Website"];
$mobile = $arr["agent_Mobile"];
$office_Line = $arr["agent_Office_Line"];
$companyName = $arr["agent_CompanyName"];
$streetAddress = $arr["agent_StreetAddress"];


if (isset($_POST["update"])) {
	
	$compLogoFileName=$_FILES["compLogo"]["name"];
	$compLogoFileType=$_FILES["compLogo"]["type"];
	$compLogoFileSize=$_FILES["compLogo"]["size"];
	$compLogoTempName=$_FILES["compLogo"]["tmp_name"];
	//$bannerFileError=0;
	$compLogoFileError=$_FILES["file"]["error"];
	$compLogoFileKind="Image"; // we can only have Image or Doc
	$ext = explode(".", $compLogoFileName);
	$extension = end($ext);	
	$compLogoSavingPath="uploads/logo/img". date('Ymd'). time(). ".".$extension;
		
$uploadStatus=fileUpload($compLogoFileName, $compLogoFileSize, $compLogoFileType, $compLogoFileKind,$compLogoTempName, $compLogoFileError, $compLogoSavingPath);

//echo $uploadStatus;

if ($uploadStatus=='Success') {

	$sql = "UPDATE smart_agents SET
agent_FirstName = '" . $_POST['firstName'] . "',
agent_LastName = '".$_POST['lastName']."',
agent_Email = '".$_POST['email']."',
agent_Mobile = '".$_POST['mobile']."',
agent_Office_Line = '".$_POST['officeLine']."',
agent_CompanyName = '".$_POST['compName']."',
agent_StreetAddress = '".$_POST['street']."',
agent_Logo = '".$compLogoSavingPath."' WHERE agent_ID ='" . $agent_ID . "'";
//echo $sql;
		if (!$result = mysql_query($sql, $link))	
			{ 
			$statusMsg= '<div class="response error">'.mysql_error().'</div>';
		//	echo $err;
			}
			else
			{
				updateUserAgent($_SESSION["agentID"], $_POST['firstName'], $_POST['lastName'], $_POST['mobile'], $_POST['email']);
				$statusMsg="<div class='response success'>Profile updated Successfully! Your Changes will be effected when next you log in.</div>";
			}
}
else
{
			$sql = "UPDATE smart_agents SET
agent_FirstName = '" . $_POST['firstName'] . "',
agent_LastName = '".$_POST['lastName']."',
agent_Email = '".$_POST['email']."',
agent_Mobile = '".$_POST['mobile']."',
agent_Office_Line = '".$_POST['officeLine']."',
agent_CompanyName = '".$_POST['compName']."',
agent_StreetAddress = '".$_POST['street']."' WHERE agent_ID = '" . $agent_ID . "'";
//echo $sql;
		if (!$result = mysql_query($sql, $link))	
			{ 
			$statusMsg= '<div class="response error">'.mysql_error().'</div>';
		//	echo $err;
			}
			else
			{
				updateUserAgent($_SESSION["agentID"], $_POST['firstName'], $_POST['lastName'], $_POST['mobile'], $_POST['email']);
				$statusMsg="<div class='response success'>Profile updated Successfully! Your Changes will be effected when next you log in.</div>";
			}
}
}

?>
<div id="form_small">
	<div class="form_small_head">UPDATE PROFILE</div>
    <div class="clear"></div>
    <?php echo $statusMsg; ?>
    <div class="clear"></div>
<table width="600px" class="form_small_table">
<form action="" method="post" enctype="multipart/form-data">
	<tr>
    <td><label>First Name:</label><br />
    <input type="text" name="firstName" id="firstName" value="<?php  echo $firstName; ?>" /></td>
    <td><label>Last Name: </label><br />
    <input type="text" name="lastName" id="lastName" value="<?php  echo $lastName; ?>" /></td>
    <td><label>Email:</label><br />
    <input readonly="readonly" name="email" type="text" id="email"  value="<?php  echo $_SESSION['email']?>" size="40" /></td>
    </tr>
	<tr>
      <td width="224"><label>Website:</label><br />
		<input name="website" type="text" id="website" value="<?php echo $website; ?>" /></td>
      <td><label>Phone Number:</label><br />
      <input type="tel"  name="mobile" required pattern='(([0-9\-+]).{0}|.{9,})' oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid phone number is required' : '');" maxlength="15" value="<?php echo $mobile; ?>" /></td>  
    <td><label>Office Line:</label><br />
    <input type="tel"  name="officeLine" required pattern='(([0-9\-+]).{0}|.{9,})' oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid phone number is required' : '');" maxlength="15" value="<?php echo $office_Line; ?>" />
    </td>
    </tr>
    <tr>
      <td><label>Comapny Name:</label><br />
      <input name="compName" readonly type="text" id="compName" value="<?php echo $companyName; ?>" /></td>
      <td><label>Street:</label><br />
      <input name="street" type="text" id="street" size="40" value="<?php echo $streetAddress; ?>" /></td>
      <td><label>Comapny Logo:</label><br />
      <input type="file" name="compLogo" id="compLogo" /></td>          
    </tr>
    <tr>
    <td colspan="3">&nbsp;</td>    
    </tr>
    <tr>
    <td colspan="3"><button type="submit" name="update">UPDATE PROFILE</button></td>    
    </tr>    
</form>
</table>        
    
    
</div><!--End of form_small-->
<?php
include('footer.php');
?>