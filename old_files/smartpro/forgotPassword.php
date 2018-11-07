<?php
include("../XownCMS/link.php");
include('functions.php');

if ((isset($_POST['submit']))){
	$emailAddress=$_POST['email'];
	$sql= "select * from smart_agent_users where email_Address='$emailAddress'";
	$res= mysql_query($sql);
	if (!$res){
		echo "Error".mysql_error();
	}
	$row= mysql_fetch_array($res);
	$count= mysql_num_rows($res);
if ($count == 0) {
	$statusMsg= "<div class='response error'>User does not exist on the System! Contact the Admin.</div>";
}	
else
{	
	$username= $row["username"];
	$password=generatePass(8);
	$passwordHash= sha1($password);
	$query = "UPDATE smart_agent_users SET password='$passwordHash' WHERE email_Address='".$_POST['email']."' LIMIT 1";
	if (!$result = mysql_query($query, $link))	
			{ 
			$statusMsg= mysql_error();
		//	echo $err;
			}
			else
			{
				$message="Please be informed your password reset was successfully done on SMARTPRO".
				" Kindly Login with the new details below".
					
				  "\n\nUsername: ".$username.
				  "\n\nPassword: ". $password.
				  "\n\nFor any enquries, please contact the administrator".
				  "\n\nThank you.";
				//echo $message;
				mail ($emailAddress, "Password Reset on SMAARTPRO", $message, "From: no_reply@proprtyhub.com.ng" );
				
$statusMsg= "<div class='response success'>Password Changed and sent to e-mail!</div>";
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="favicon.png" type="image/png" />
<link href="css/pages.css" rel="stylesheet" type="text/css" />
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<title>Forgot Password - SmartPro</title>
</head>

<body class="body_bg">
<div id="container" class="padding_in">
	<div class="logo"><a href="index.php"></a></div>
<div class="clear"></div>
<?php echo $statusMsg ?>
<div class="clear"></div>
<p>&nbsp;</p>
<div class="form_small_head">Forgot Password?</div>
<table width="400px" class="form_small_table">
<form action="" method="post" enctype="multipart/form-data">
	<tr>
      <td width="224"><label>Email:</label></td>
      <td><input name="email" type="text" id="email" size="40" /></td>
    </tr>
    <tr>
    	<td>&nbsp;</td>
        <td><button type="submit" name="submit">RESET</button></td>
    </tr>
    <tr>
    	<td colspan="2">&nbsp;</td>
    </tr>
    <tr>
		<td colspan="2"><font class="forgot"><a href="index.php">Back to Login</a></font></td>    
    </tr>
</form>
</table>    

</div>
</body>
</html>