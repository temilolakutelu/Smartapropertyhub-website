<?php
session_start();
include ('XownCMS/link.php');
require_once('XownCMS/functions.php');
$agentID = $_GET['agentID'];

session_start();

$contact_email ='info@propertyhub.com.ng';
$errors = '';
$name = '';
$mobile='';
$visitor_email = '';
$user_message = '';
$msg="";

$prop = $_SESSION['propID'] ;

$query = "SELECT property_Name, property_Street, property_City, property_State, property_Country, user_ID FROM agt_property WHERE property_ID = '$prop' ";
$result = mysql_query($query, $link);
$row = mysql_fetch_array($result);

$propName = $row['property_Name'];
$propStreet = $row['property_Street'];
$propCity = $row['property_City'];
$propState = $row['property_State'];
$propCountry = $row['property_Country'];
$agentID = $row['user_ID'];

$query= "SELECT email_Address FROM smart_agent_users WHERE user_ID = '$agentID'";
$result = mysql_query($query, $link);
$row = mysql_fetch_array($result);
$agentMail = $row['email_Address'];
$contact_email .=', '.$agentMail;

if(isset($_POST['send']))
{
	
	$name = trim($_POST['name']);
	$visitor_email = trim($_POST['email']);
	$mobile = trim($_POST['mobile']);
	$user_message =trim($_POST['message']);
	
	///------------Do Validations-------------
	if(empty($name)||empty($visitor_email))
	{
		$errors .= "\n Name and Email are required. ";	
	}
	else if(empty($user_message))
	{
		$errors .= "\nYou can not send an empty message. ";	
	}
	if(IsInjected($visitor_email))
	{
		$errors .= "\n Bad email value!";
	}
	else if(IsInjected($subject))
	{
		$errors .= "\n Message <b>subject</b> contains unpermitted characters! Please make appropriate corrections.";
	}
	else if(IsInjected($user_message))
	{
		$errors .= "\n Message contains unpermitted characters! Please make appropriate corrections.";
	}
	if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors .= "\n The captcha code does not match!";
	}
	
	if(empty($errors))
	{
		//send the email
		$to = $contact_email;
		$from = $visitor_email;
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		
		$body = 'Name: '.ucfirst($name).'<br/>
		Email: '.$visitor_email .'<br/><br/>
		Property Name: '.$propName.'
		Property Address: '.$propStreet .', '.$propCity.', '.$propState.', '.$propCountry .'<br/>
		Message: <br/>'.
		$user_message.'<br/><br/>'.
		'Property Link : http://www.propertyhub.com.ng/propertyDetails.php?prop= '.$prop.'<br/><br/>'.
		'IP: '.$ip.'<br/>';	
		
		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $visitor_email \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		mail($to, $subject, $body,$headers);
		$msg = "<div  class='errorMsg'>  Thank you ".ucfirst($name).". Your message for an enquiry on this Property has been sent. You will be contacted shortly.</div>";
		 
		 $_POST = array();
	}
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="The right place to get the best property at the most appropriate fee at a click!"/>
<meta name="keywords" content="propertyhub, property, lagos property, properties in nigeria, apartments, houses, land, real estate "/>
<meta name="viewport" content="width=device-width" />
<link href="images/favicon.ico" rel="shortcut icon" type="image/ico"/>
<link href="css/layout.css" rel="stylesheet" type="text/css">
<link href="css/media.css" rel="stylesheet" type="text/css">
<title>Message Agent - <?php echo getAgencyName($agentID); ?></title>
<script src="js/utilize.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script> 
<script src="js/jquery-1.8.3.min.js"></script>
</head>

<body>
<section class="wrapper" style="padding-left: 5px;">
    	<article>
<div id="rentSale"> 
 <form action="messageAgent.php" method="post">
<div id="salesRent" style="font-family: Dax; font-size: 25px;">MESSAGE AGENT</div>
<?php
if((!empty($errors)) AND (sizeOf($errors)> 1))
{
echo "<div class='errorMsg'>".nl2br($errors)."</div>";
}
else if((!empty($errors)) AND (sizeOf($errors) == 1))
{
echo "<div class='errorMsg'>$errors</div>";
}
echo '<p>'.$msg.'</p>';
?> 
<textarea name="message" class="txtArea" value="<?php if (isset($_POST['message'])) {echo $user_message;} ?>" required >Hi <?php  
echo getAgencyName($agentID);
?>, I found this listing on PropertyHub and would like more information.</textarea><br/>
 <input type="text" name="name" class="textbox2 rightMargin30"  placeholder="Your Name (required)" value="<?php if (isset($_POST['name'])) {echo $name;} ?>" required />
<input type="text" name="email" class="textbox2 rightMargin30"  placeholder="Email (required)" pattern="([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})"  oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid email is required' : '');" value="<?php if (isset($_POST['email'])) {echo $visitor_email;} ?>" required />
<input type="tel" name="mobile" class="textbox2"  placeholder="Phone Number" pattern='\d{11}' oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid Phone Number with ELEVEN digits is required' : '');" maxlength="11" value="<?php if (isset($_POST['mobile'])) {echo $mobile;} ?>" />
 <div class="captchaImage_Msg"><img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg'/></div><input id="6_letters_code" placeholder="Enter the verification code shown here" name="6_letters_code" type="text" class="textbox2" required/> <br/>
   
   <small>Can't read the verification code displayed?  <a href='javascript: refreshCaptcha();'> click here</a> to refresh</small><br/><br/>
       
 <input type="submit" name="send" value="SEND MESSAGE &#9654" class="search left" /><br/><br/><br/>
 
 </form>
 <div class="clear"></div>
 
 </div>
 
 </article>
         
         
         <div class="clear"></div>
        
    </section>
</body>
</html>