<?php
session_start();

include('includes/header.php');

require_once("XownCMS/lib/mailer.php");

$mailerclass = new mailer();

$from="Propertyhub <info@propertyhub.com.ng>";

$fromName="Propertyhub Administrator";

$subject='Welcome To Property Hub';



if (isset($_POST['registerUser']))

{
		$firstName = $_POST["firstName"];
	
		$lastName = $_POST["lastName"];
	
		$emailAddress = $_POST["mail"];
	
		$mobile = $_POST["mobile"];
		
		$password= $_POST["password"];
		
		$confirmPassword = $_POST["confirmPassword"];

		if ($password != $confirmPassword)
	
			{
				$errors = "Passwords do not match!\n";
			}
			
		if(empty($firstName) OR empty($lastName) OR empty($emailAddress) OR empty($mobile) OR empty($password))
		{
			$errors = 'Form fields are not correctly filled.\n';
		}
		
		
		if(isset($_POST["referral"]))
		{
			$referral = $_POST["referral"];
		}
		else
		{
			$errors = 'Indicate how you heard about us.\n';
		}
	
		
		//	check captcha
		if(empty($_SESSION['6_letters_code'] ) || strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	
		{
			$errors = "The captcha code does not match!";
		}
		
		if(empty($errors))
		
		{
			
			$password = SHA1($password);
			
						
			$query="INSERT INTO smart_prospects ( prospect_FirstName,prospect_LastName,prospect_Password,prospect_Mobile,prospect_Email,prospect_Referal,prospect_RegTime)
		
						 VALUES ('$firstName','$lastName','$password', '$mobile','$emailAddress','$referral',NOW())";
						 
			$result = mysql_query($query,$link);
		
			if (mysql_affected_rows($link) != 1 )	
	
				{ 
	
					//$msg .= mysql_error();
					$msg .='<div class="errorMsg"> Unable to add user </div>';
		
				}
	
			else
				{
					
					$firstName = ucfirst($firstName);
					
					$lastName = ucfirst($lastName);
					
					$customerName = $firstName.' '.$lastName;

					$template = 'welcome.html'	;
					
					$emailMsg=buildEmailMessageFromTemplate($template);
					
					$webURL="http://propertyhub.com.ng".$template;
					
					$emailMsg=preg_replace('{WebURL}', $webURL, $emailMsg );
					
										
					$htmlMsg =preg_replace('{cName}', $customerName, $emailMsg);
					
					$bcc_address = "";
		
					$cc_address = "";
					
					$cc_name="";
					
					$bcc_name = "";
					
					$address = $emailAddress;
					
					$to_name = "";
				
					$mailerclass->send_mail($from, $from_name, $subject, $bcc_address, $bcc_name, $cc_address, $cc_name, $to_name, $address, $htmlMsg);

					$msg .= '<div class="errorMsg">You have been sucessfully registered. <a href="user/index.php" style="color:#FF8000;">Click here </a> to login to your account</div>';
	
				}




	}
	else
	
	{
	
		$msg .=  '<div class="errorMsg">'. $errors.'</div>';

	
	}


}


if (isset($_POST['registerAgent']))

{
		$firstName = $_POST["firstName"];
	
		$lastName = $_POST["lastName"];
	
		$emailAddress = $_POST["mail"];
	
		$mobile = $_POST["mobile"];
		
		$phone = $_POST["phone"];
		
		$companyName = $_POST["companyName"];
	
		$street = $_POST["Address"];
		
		$state = $_POST["state"];
	
		$website = $_POST["website"];
		
		$country = $_POST["country"];
	
		$password= $_POST["password"];
		
		$confirmPassword = $_POST["confirmPassword"];
		
		$profileName = $_POST["profileName"];

		if ($password != $confirmPassword)
	
			{
				$errors = "Passwords do not match!\n";
			}
			
		if(empty($firstName) OR empty($lastName) OR empty($emailAddress) OR empty($mobile) OR empty($password) OR empty($street) OR empty($state) OR empty($country))
		{
			$errors = 'Form fields are not correctly filled.\n';
		}
		
		
		if(isset($_POST["referral"]))
		{
			$referral = $_POST["referral"];
		}
		else
		{
			$errors = 'Indicate how you heard about us.\n';
		}
	
		
		//	check captcha
		if(empty($_SESSION['6_letters_code_2'] ) || strcasecmp($_SESSION['6_letters_code_2'], $_POST['6_letters_code_2']) != 0)
	
		{
			$errors = "The captcha code does not match!\n";
		}
		
		if(empty($errors))
		
		{
			
			$password = SHA1($password);
			
						
			$query="INSERT INTO smart_agents ( agent_FirstName,agent_LastName,agent_Office_Line,agent_Mobile,agent_Email,agent_CompanyName,agent_StreetAddress,agent_State,agent_Country,agent_Website,agent_Referal,agent_RegTime)
		
						 VALUES ('$firstName','$lastName','$phone','$mobile','$emailAddress','$companyName','$street','$state','$country','$website','$referral',NOW())";
						 
			$result = mysql_query($query,$link);
		
			if (mysql_affected_rows($link) != 1 )	
	
				{ 
					
					//$msg .= mysql_error();
		
					$msg .='<div class="errorMsg">Agent not successfully added.</div>';
					
	
				}
	
			else
				{
					
					$query = "SELECT agent_ID FROM smart_agents WHERE agent_Email = '$emailAddress'";
					$result = mysql_query($query,$link);
					if(mysql_num_rows($result) == 1)
					{
						$row = mysql_fetch_array($result,MYSQL_NUM);
						$agentID = $row[0];
						
						$query="INSERT INTO smart_agent_users ( agent_ID,firstName,lastName,password,mobile,username,email_Address,user_Status,user_Level,user_Priviledge)
			
							 VALUES ('$agentID','$firstName','$lastName','$password','$mobile','$profileName','$emailAddress','Active','Primary','Admin')";
						
						$result = mysql_query($query,$link);
			
						if (mysql_affected_rows($link) != 1 )	
				
							{ 
								
								//$msg .= mysql_error();
					
								 $msg .='<div class="errorMsg">Unable to add agent.</div>'; 
								 
				
							}
						else
							{
						
							
								
								$firstName = ucfirst($firstName);
					
								$lastName = ucfirst($lastName);
								
								$customerName = $firstName.' '.$lastName;
								
								$profileName = $profileName;
			
								$template = 'welcomeAgent.html'	;
								
								$emailMsg=buildEmailMessageFromTemplate($template);
								
								$webURL="http://propertyhub.com.ng".$template;
								
								$emailMsg=preg_replace('{cUserName}', $profileName, $emailMsg );
								
								$htmlMsg =preg_replace('{cName}', $customerName, $emailMsg);
																
								$bcc_address = "";
					
								$cc_address = "";
								
								$cc_name="";
								
								$bcc_name = "";
								
								$address = $emailAddress;
								
								$to_name = "";
							
								$mailerclass->send_mail($from, $from_name, $subject, $bcc_address, $bcc_name, $cc_address, $cc_name, $to_name, $address, $htmlMsg);

											
								$msg .= '<div class="errorMsg">You have been sucessfully registered. <a href="smartpro/index.php" style="color:#FF8000;">Click here </a> to login to your account</div>';
							}
					}
					
					else
					{
						$errors = '<div class="errorMsg">Unable to add agent.Please contact the administrator</div>';	
					}
	
				}




	}
	else
	
	{
	
		$msg .='<div class="errorMsg">'. $errors.'</div>';
	
	}


}

?>



<section class="wrapper">
    	<article class="content">

    <div id="salesRent">REGISTER</div>
     <div id="tabs">
        <ul>
          <li><a href="#tabs-1">USER</a></li>
          <li><a href="#tabs-2">AGENT/LANDLORD</a></li>
       </ul>
        <div id="tabs-1">
        <div id="rentSale">
       <?php echo '<br/>'. $msg; ?>
       
     <form name="formRegLog" action="" method="post" >
              <input type="text" name="firstName" placeholder="First Name" class="textbox rightMargin30" required pattern="(([A-Za-z_\-\.]){2,})" oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid name is required' : '');"  />  <input type="text" name="lastName" placeholder="Last Name" class="textbox" required pattern="(([A-Za-z_\-\.]){2,})" oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid name is required' : '');" />   <br />
              
              <input type="text" name="mail" placeholder="Email" required class="textbox rightMargin30" pattern="([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,6})"  oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid email is required' : '');"/> 
             
                   
                   <input type="tel"  name="mobile" placeholder="Phone Number" class="textbox" required pattern='(([0-9\-+]).{0}|.{9,})' oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid phone number is required' : '');" maxlength="15" />	
             
      				

                      <br/>
                      
              <input type="password" name="password" placeholder="Password"  class="textbox rightMargin30" id="pswd" required  pattern='.{8,}' oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Password Must Be At Least 8 Characters Long' : '');" />  <input type="password" name="confirmPassword" id="conPswd" placeholder="Confirm Password" class="textbox" required oninput="checkPassword(this);" /><br />
            
              

                   

                           
						<div class="captchaImage"><img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg2'/></div><input id="6_letters_code" placeholder="Enter the verification code shown here" name="6_letters_code" type="text" class="textbox" required/> <br/>
                      
    
						 <select name="referral" class="rightMargin30" required> 
              <option value="">How did you hear about us?</option>
              <option value="Journals">Journals</option>
              <option value="Newspapers">Newspapers</option>
              <option value="Radio Jingles">Radio Jingles</option>
              <option value="Tv Adver">Tv Advert</option>
              <option value="Facebook">Facebook</option>
              <option value="Instagram">Instagram</option>
              <option value="Google">Google</option>
              <option value="Signages">Signages</option>
              <option value="Other Websites">Other Websites</option>
              
                   </select>
                        <br />
                        <div class="clear"></div>  
                        <small>Can't read the verification code displayed?  <a href='javascript: refreshCaptcha();'> click here</a> to refresh</small>

                           

                    

            <div class="clear"></div>  
            <br />
                <input type="submit" name="registerUser" value="REGISTER &#9654" class="search left" />
            
          </form>
 
</div>
    <div class="clear"></div>    
              
  </div>
  
    <div id="tabs-2">
    
		 <div id="rentSale">
           	 <?php echo '<br/>'. $msg ; ?>
             
            <form name="formRegLog" action="" method="post" id="agentForm">
           <input type="text" name="firstName" placeholder="First Name" class="textbox rightMargin30" required pattern="(([A-Za-z_\-\.]){2,})" oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid name is required' : '');" />  <input type="text" name="lastName" placeholder="Last Name" class="textbox"  required pattern="(([A-Za-z_\-\.]){2,})" oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid name is required' : '');" />   <br />
          <input type="text" name="mail" placeholder="Email" required  class="textbox rightMargin30" pattern="([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,6})"  oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid email is required' : '');"/>
          
          <input type="text" name="website" pattern="([A-Za-z0-9_\-])+\.([A-Za-z]{2,6})+(\.([A-Za-z]{2,6}))?" oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid website address is required' : '');" class="textbox" placeholder="Your Website" />
          
               <br/>
          <input type="password" name="password" placeholder="Password" class="textbox rightMargin30" id="pswd2" required pattern='.{8,}' oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Password Must Be At Least 8 Characters Long' : '');" />  <input type="password" name="confirmPassword" class="textbox" placeholder="Confirm Password" id="conPswd" required oninput="checkPassword2(this);" /><br />
          <input type="tel"  name="mobile" placeholder="Phone Number" class="textbox rightMargin30" required pattern='(([0-9\-+]).{0}|.{9,})' oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid phone number is required' : '');" maxlength="15" />
             <input type="tel"  name="phone" placeholder="Office Line" class="textbox" pattern="(([0-9\-+]).{0}|.{9,})" oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Valid office line is required' : '');" maxlength="15" />
          <br/>
            <input type="text" name="companyName" id="companyName" class="textbox rightMargin30" placeholder="Company Name"/>
             <input type="text" name="Address" id="agentStreet" class="textbox" placeholder="Street Address"  required/>
          <br/>
           <select name="state" id="state"  class="rightMargin30" required="required">
                  <option value="">State</option>
                  <option value="Abia">Abia</option>
                  <option value="Abuja">Abuja</option>
                  <option value="Adamawa">Adamawa</option>
                  <option value="Akwa Ibom">Akwa Ibom</option>
                  <option value="Anambra">Anambra</option>
                  <option value="Bauchi">Bauchi</option>
                  <option value="Bayelsa">Bayelsa</option>
                  <option value="Benue">Benue</option>
                  <option value="Borno">Borno</option>
                  <option value="Cross River">Cross River</option>
                  <option value="Delta">Delta</option>
                  <option value="Ebonyi">Ebonyi</option>
                  <option value="Edo">Edo</option>
                  <option value="Ekiti">Ekiti</option>
                  <option value="Enugu">Enugu</option>
                  <option value="Gombe">Gombe</option>
                  <option value="Imo">Imo</option>
                  <option value="Jigawa">Jigawa</option>
                  <option value="Kaduna">Kaduna</option>
                  <option value="Kano">Kano</option>
                  <option value="Katsina">Katsina</option>
                  <option value="Kebbi">Kebbi</option>
                  <option value="Kogi">Kogi</option>
                  <option value="Kwara">Kwara</option>
                  <option value="Lagos">Lagos</option>
                  <option value="Nasarawa">Nasarawa</option>
                  <option value="Niger">Niger</option>
                  <option value="Ogun">Ogun</option>
                  <option value="Ondo">Ondo</option>
                  <option value="Osun">Osun</option>
                  <option value="Oyo">Oyo</option>
                  <option value="Plateau">Plateau</option>
                  <option value="Rivers">Rivers</option>
                  <option value="Sokoto">Sokoto</option>
                  <option value="Taraba">Taraba</option>
                  <option value="Yobe">Yobe</option>
                  <option value="Zamfara">Zamfara</option>
              </select>
                <select name="country" id="country">
                <option value=''>Country</option>
                <option value='NG'>Nigeria</option>
                </select>
          <br/>
          
               		<div class="captchaImage "><img src="captcha_code_file2.php?rand=<?php echo rand(); ?>" id='captchaimg'/></div>
                     
                     <input id="6_letters_code_2" class="textbox" name="6_letters_code_2" type="text" placeholder="Enter the verification code shown here" required />

                        
               
               <br/>
         		
                           
					<select required name="referral" class="rightMargin30"> 
                      <option value="">How did you hear about us?</option>
                      <option value="Journals">Journals</option>
                      <option value="Newspapers">Newspapers</option>
                      <option value="adio Jingles">Radio Jingles</option>
                      <option value="Tv Advert">Tv Advert</option>
                      <option value="Facebook">Facebook</option>
                      <option value="Instagram">Instagram</option>
                      <option value="Google">Google</option>
                      <option value="Signages">Signages</option>
                      <option value="Other Websites">Other Websites</option>
              
                   </select>
                   <input type="text" name="profileName" class="textbox" id="profileName" placeholder="Profile Name" readonly />
						<!--<font style="color:#14B0E4"><i class="fa fa-cog fa-spin fa-2x"></i></font>-->
        <br />
                <div class="clear"></div>          
                        <small>Can't read the verification code displayed?  <a href='javascript: refreshCaptcha();'> click here</a> to refresh</small>
						
                        
				<div class="clear"></div>  	
                <br/>
             <input type="submit" name="registerAgent" id="registerAgent" value="CREATE ACCOUNT &#9654" class="left search" />
        	<div class="clear"></div>  	
                
            
            
          </form>
        </div>  		
            <div class="clear"></div>
         
  
    
    
     </div>
    </div>
 
 
 </article>
         
         
         <div class="clear"></div>
        
</section>
<script type="text/javascript">
String.prototype.capitalizeFirstLetter = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

	
	
	$('#companyName').on('keyup',function(e)
{	
	
		var cName = $(this).val();
		if( cName !='')
		{
			var profName ='';
			if(/\s/.test(cName)==0)//to test if its just a one-word company name
			{
				cName =  cName.capitalizeFirstLetter();
				$('#profileName').val(cName);
				$('#profileName').css("border-color","#14B0E4");
				$('#profileName').css("color","#FF8000");	
			}
			else
			{
				var temp = cName.split(" ",2);
				var temp2 = temp[1];
				if (temp2 == 'and' || temp2 == '&')
				{
					var temp = cName.split(" ",3);	
				}
				for( var i = 0; i < temp.length; i++) 
				{
					var capt = temp[i].capitalizeFirstLetter();
					 profName += capt;
				}
				
				$('#profileName').val(profName);
				$('#profileName').css("border-color","#14B0E4");
				$('#profileName').css("color","#FF8000");
				
			}
		}
		
});



$('#agentStreet').focus(function(){
	var profName = $('#profileName').val();
	$.ajax({
		type: 'POST',							
		url: 'chkUser.php', 
		data: { profileName: profName },
		dataType: 'json',
		success: function(data){
		//alert('what is this '+data);
		
		if (data)
		{
			userName = JSON.stringify(data.userName);
			userName = userName.replace(/"/g,'');
			$('#profileName').val(userName);
			
		
		}
			
	},
	
	});
});


/*function ProfileName()
{
		$('#registerAgent').click(function(){
				var profName = document.getElementById('profileName').value;	
				confirm('Your profile name is: '+ profName+'. You can choose another name if you do not want this.');
		})
		return false;
}*/

</script>
<?php
include('includes/footer.php');
?>
