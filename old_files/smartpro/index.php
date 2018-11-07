<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="favicon.png" type="image/png" />
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<title>SMARTPRO</title>
</head>

<body class="body_bg">
<div id="container">
	<div class="logo"><a href="index.php"></a></div>
<div class="clear"></div>
	<?php if (isset($_GET['status'])) {
		echo " <div class=\"response error\"> ";
		echo $_GET['status'];	
		echo "</div>";
		} ?>
<div class="clear"></div>
<div class="form_container">
<form action="loginprocessor.php" method="post" enctype="multipart/form-data">
	<table width="350px" cellspacing="0" class="table_form">
    	<tr>
        	<td width="101"><label>Username:</label></td>
            <td width="313" align="right"><input type="text" name="username" id="username" /></td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    	<tr>
        	<td width="101"><label>Password:</label></td>
            <td width="313" align="right"><input type="password" name="password" id="password" /></td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr> 
    	<tr>
        	<td width="101">&nbsp;</td>
            <td width="313" align="right"><button type="submit" name="submit">LOGIN</button></td>
        </tr>
        <tr>

            <td colspan="2" align="right">
            <table width="97%">
            	<tr>
                	<td align="right"><font class="remember">Remember Me</font>
		<input type="checkbox" id="checkbox-1-1" class="regular-checkbox" /><label for="checkbox-1-1"></label></td>
<td align="right"><font class="forgot"><a href="forgotPassword.php">Forgot Password?</a></font></td>
                </tr>
            </table>
            </td>
        </tr>                       
    </table>
</form>    
</div><!--End of form_container-->
    
</div><!--End of container-->

<div class="bottom_contact">
	<font class="bt_text">Having Difficulty?</font>
    <font class="bt_text"><i class="fa fa-envelope"></i> <a href="mailto:support@propertyhub.com.ng">support@propertyhub.com.ng</a></font>
</div><!--End of bottom_contact--

</body>
</html>
