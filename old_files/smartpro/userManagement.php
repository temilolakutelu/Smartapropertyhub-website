<?php
include('header.php');
?>
<?php
include("../XownCMS/link.php");
include("functions.php");

$statusMsg="";

if (isset($_POST["submit"])) {
	$username = $_POST["username"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$mobile = $_POST["mobile"];
	$emailAddress = $_POST["emailAddress"];
	$userLevel = $_POST["userlevel"];
	$userPriviledge = $_POST["userpriviledge"];
	$agent_ID = $_SESSION["agentID"];
	$password=generatePass(8);
	$passwordHash= sha1($password);
	
	$sql = "select * from smart_agent_users where username='".$username."'";
	$res = mysql_query($sql);
	$num_row = mysql_num_rows($res);
	
	if ($num_row == 1) {
		$statusMsg= "<div class='response error'>Username Already in use.</div>";
	}
	else
	{
		$query="Insert into smart_agent_users (firstName,lastName, username, password, mobile, email_Address, agent_ID, user_Level, user_Priviledge) 
		values ('$firstname','$lastname','$username', '$passwordHash','$mobile', '$emailAddress', '$agent_ID', '$userLevel', '$userPriviledge')";
		if (!$result = mysql_query($query, $link))	
			{ 
			$statusMsg= "<div class='response error'>Error: ".mysql_error()."</div>";
			}
			else
			{
				$message="Dear ".$firstname. " ". $lastname.
				"\n\nPlease be informed your profile is successfully created on SMARTPRO System".
				" to update the website and maintain other web applications".
				"\n\nKindly Login with the details below".
					
				  "\n\nURL: ".		$URL.
				 "\n\nUsername: ". $username.
				  "\n\nPassword: ". $password.
				  "\n\nFor any enquries, please contact the administrator".
				  "\n\nThank you.";
				//echo $message;
				mail ($emailAddress, "Login Details from SMARTPRO", $message, "From: no_reply@propertyhub.com.ng" );
				$statusMsg= "<div class='response success'>Account created successfully!</div>";
			}
	}

}
?>

<div id="form_small">
	<div class="form_small_head">Create Account for New User</div>
    <div class="clear"></div>
    <?php echo $statusMsg; ?>
    <div class="clear"></div>
<table width="600px" class="form_small_table">
<form action="" method="post" enctype="multipart/form-data">
	<tr>
      <td width="224"><label>Username:</label> <br />
      <input type="text" name="username" id="username" style="width: 270px;" />
      </td>
      <td><label>Firstname:</label> <br />
      <input type="text" name="firstname" id="firstname" style="width: 270px;" />      
      </td>
    </tr>
	<tr>
      <td width="224"><label>Lastname:</label> <br />
      <input type="text" name="lastname" id="lastname" style="width: 270px;" />
      </td>
      <td><label>Mobile:</label> <br />
      <input type="text" name="mobile" id="mobile" style="width: 270px;" />      
      </td>
    </tr>
	<tr>
      <td width="224"><label>Email Address:</label> <br />
      <input type="text" name="emailAddress" id="emailAddress" style="width: 270px;" />
      </td>
      <td><label>User Level:</label> <br />
      <select name="userlevel" style="width: 280px;">
      	<option>Primary</option>
        <option>Secondary</option>
      </select>     
      </td>
    </tr>
	<tr>
      <td><label>User Priviledge:</label> <br />
      <select name="userpriviledge" style="width: 280px;">
      	<option>Admin</option>
        <option>User</option>
      </select>     
      </td>
    </tr>
    <tr>
    	<td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td><button type="submit" name="submit">CREATE</button></td>
    	<td>&nbsp;</td>        
    </tr>            

</form>
</table>            

</div><!--End of form_small-->

<?php
include('footer.php');
?>

