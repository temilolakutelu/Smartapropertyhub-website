<?php
include('header.php');
?>
<?php
include("../XownCMS/link.php");

$statusMsg="";
if (isset($_POST["submit"])) {
$email=$_POST["email"];
$passwordhash=sha1($_POST['oldpassword']);
$newpassword=$_POST['newpassword'];
$cnewpassword=$_POST['cnewpassword'];

$query="select * from smart_agent_users where email_Address='". $email ."' and password ='". $passwordhash ."';";

	if (!$result = mysql_query($query, $link))
	{
$statusMsg= "<div class='response error'>Invalid Password </div>";
	}
		else
	{
		$num=mysql_num_rows($result);
		$array=mysql_fetch_array($result);

		if (($newpassword !="") and ($cnewpassword!="") and ($newpassword==$cnewpassword) and ($num==1) ) {
			
			
			$newpasswordhash= sha1($_POST["newpassword"]);
		//	echo $newpasswordhash;
				$populatestock = "UPDATE smart_agent_users set password= '$newpasswordhash' WHERE email_Address='$email'";
					if (!$resultp = mysql_query($populatestock, $link))	
						{ 
						$err= mysql_error();
						echo $err;
						}
						else
						{
						//echo "changed";
						
$statusMsg= "<div class='response success'>Password Changed Successfully </div>";
						}		
		}
		else {
			$statusMsg= "<div class='response error'>Invalid or Inconsitent Password! </div>";
		}
	}

}


?>
<div id="form_small">
	<div class="form_small_head">Change Password</div>
    <div class="clear"></div>
    <?php echo $statusMsg; ?>
    <div class="clear"></div>
<table width="600px" class="form_small_table">
<form action="" method="post" enctype="multipart/form-data">
	<tr>
      <td width="224"><label>Email:</label></td>
      <td><input readonly="readonly" name="email" type="text" class="textbox rounded" id="email"  value="<?php  echo $_SESSION['email']?>" size="40" /></td>
    </tr>
    <tr>
      <td><label>Old Password:</label></td>
      <td><input name="oldpassword" type="password" class="textbox rounded" id="oldpassword" size="40" /></td>    
    </tr>
    <tr>
      <td><label>New Password:</label></td>
      <td><input name="newpassword" type="password" class="textbox rounded" id="newpassword" size="40" /></td>    
    </tr>
    <tr>
      <td><label>Confirm New Password:</label></td>
      <td><input name="cnewpassword" type="password" class="textbox rounded" id="cnewpassword" size="40" /></td>    
    </tr>
    <tr>
    	<td colspan="2">&nbsp;</td>
    </tr>
    <tr>
    	<td>&nbsp;</td>
        <td><button type="submit" name="submit">CHANGE PASSWORD</button></td>
    </tr>
</form>    
</table>    
</div><!--End of Form_small-->

<?php
include('footer.php');
?>