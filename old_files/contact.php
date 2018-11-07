<?php
session_start();
include('includes/header.php');
$contact_email ='info@propertyhub.com.ng';
$errors = '';
$name = '';
$subject='';
$mobile='';
$visitor_email = '';
$user_message = '';
$msg="";
if(isset($_POST['sendMail']))
{
	
	$name = trim($_POST['name']);
	$visitor_email = trim($_POST['email']);
	$mobile = trim($_POST['mobile']);
	$subject = trim($_POST['subject']);
	$user_message =trim($_POST['message']);

	///------------Do Validations-------------
	if(empty($name)||empty($visitor_email))
	{
		$errors .= "\n Name and Email are required. ";	
	}
	else if(empty($subject))
	{
		$errors .= "\n Your message requires a subject. ";	
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
		
		$body = "A user  <em>$name</em> submitted this contact form:\n".
		"Name: $name\n".
		"Email: $visitor_email \n".
		"Subject: $subject \n".
		"Message: \n ".
		"$user_message\n".
		"IP: $ip\n";	
		
		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $visitor_email \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		mail($to, $subject, $body,$headers);
		
		 $msg = "<div  class='msgSent'>Thank you ".ucfirst($name).", we would get in touch shortly!</div>";
		 
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


<div class="wrapper_div">
    	<div class="content_div">
<div id="contactForm"> 
 <form action="contact.php" method="post">
<p id="contactFormHeader">SEND US A MAIL</p>
<?php
if((!empty($errors)) AND (sizeOf($errors)> 1))
{
echo "<div class='msgSent'>".nl2br($errors)."</div>";
}
else if((!empty($errors)) AND (sizeOf($errors) == 1))
{
echo "<div class='msgSent'>$errors</div>";
}
echo $msg;
?> 

 <p><input type="text" name="name"   placeholder="Name (required)" value="<?php if (isset($_POST['name'])) {echo $name;} ?>" required="required" />
  <input type="text" name="subject"  placeholder="Subject (required)" value="<?php if (isset($_POST['subject'])) {echo $subject;} ?>"  required="required"/></p>
<p><input type="text" name="email"   placeholder="Email (required)" pattern="([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})"  oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid email is required' : '');" value="<?php if (isset($_POST['email'])) {echo $visitor_email;} ?>" required="required" />
  <input type="tel" name="mobile"   placeholder="Phone Number" pattern='\d{11}' oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid Phone Number with ELEVEN digits is required' : '');" maxlength="11" value="<?php if (isset($_POST['mobile'])) {echo $mobile;} ?>" /></p>
<p><textarea  name="message"  placeholder="Message" value="<?php if (isset($_POST['message'])) {echo $user_message;} ?>" required="required" ></textarea></p>

 <div><img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg'/>
   <br/><label>Enter the code shown:</label>
   <br/>
   <input id="6_letters_code" class="" name="6_letters_code" type="text" />
   <small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
 </div>
   
       
<p ><input type="submit" name="sendMail" id="contactFormSend" class="search" value="SEND &#9654" style="margin:auto; color:#ffffff; float:left" /></p> 
</form> 
 </div>
 
 </div><!--End of content-->



	<div class="sideBar">
		<div class="socials">
			<ul>
				<li><a href="#" class="gplus" target="_blank"></a></li>
				<li><a href="#" class="twitter" target="_blank"></a></li>
				<li><a href="#" class="facebook" target="_blank"></a></li>
				<li><a href="#" class="socialLove" target="_blank"></a></li>
			</ul>
		</div>
        
   <div class="clear"></div>
        
		<div class="vticker">
                   			
		     <ul id="ticker_02" class="ticker">
        <?php
			$newsContent='';
			$query = "SELECT newsID, newsTitle, newsDetails, newsImage FROM  news";
			$result = mysql_query($query,$link);
			if(mysql_num_rows($result) > 0)
			{
				while($row = mysql_fetch_array($result,MYSQL_ASSOC))
				{	
					$img = $row['newsImage'];
					$img = 'XownCMS/'.$img;
					$title  = $row['newsTitle'];
					$title = substr($title, 0, 30);
					$details = html_entity_decode($row['newsDetails']);
					$details = strip_tags($details);
					$details = substr($details, 0, 60);
					$newsID = $row['newsID'];
			
		
		
	              	$newsContent .='<li>';
					$newsContent .='<div class="left"><img src="'.$img.'" width="97" height="89" /></div>';
					$newsContent .='<p class="right">';
					$newsContent .='<p class="tit">'.strtolower(ucwords(($title))).'</p>';
					$newsContent .='<p class="newsCon">'.$details.'...<br />';
					$newsContent .='<button class="readMore" onclick="lightbox_open();" value="'.$newsID.'"> Read More </button>';
					$newsContent .='</p></p></li>';
				}
				}
				echo $newsContent;
			 ?>
			 
			</ul>
		</div><!--End of vticker-->
        
        <div id="light">
        <button id="closeBox" onclick="lightbox_close();"> </button>
        <br/>
            <p id="newsHead"> </p>
            <p id="newsBody"></p>
            </div>
        <div id="fade" onClick="lightbox_close();"></div>
         


		<div class="stakeholdersLog">
			<div class="accordion_example">
                <div class="accordion_in" style="border-radius:8px;">
                  <div class="acc_head" >LOGIN AREA FOR STAKEHOLDERS </div>
                  <div class="acc_content firstcontent">
                  <li><a href="smartpro/index.php">Agent Login/Landlord Login</a></li>
				  <br/>
				  <li><a href="user/index.php">User Login</a></li>
                  <br/>
                  </div>
                </div>  
            </div>
		
		</div><!--End of stakeholdersLog-->
        
                   <div class="subscriberForm">
						<form name="subForm" class="subForm" action="" method="post">
							<input type="text" required  name="subscribe" id ="subscribe"  placeholder="Newsletter Email Address..."/>
							<input type="submit"  name="subSubscribe" id ="subSubscribe" value="GO &#9654"  />
						</form>
					</div>


		
	</div><!--End of sidebar-->
    <script type="text/javascript">
	
 $('.readMore').click(function(){
	var newsNum = $(this).val();
	$.ajax({
		type: 'POST',							
		url: 'getNews.php', 
		data: { newsNum: newsNum },
		dataType: 'json',
		success: function(data){
		//alert('what is this '+data);
		
		if (data)
		{
			newsTitle = JSON.stringify(data.newsTitle);
			newsTitle = newsTitle.replace(/"/g,'');
			//newsTitle +="\n";
			newsDetails = JSON.stringify(data.newsDetails);
			
			newsDetails = newsDetails.replace(/"/g,'');
			
			$('#light #newsHead').text(newsTitle);
			$('#light #newsBody').text(newsDetails);
		
		}
			
	},
	
	});
});

 
 
 </script>  
 
 
 <div class="clear"></div>
 
 
 </div><!--End of wrapper-->
 
  

<?php
include('includes/footer.php');
?>