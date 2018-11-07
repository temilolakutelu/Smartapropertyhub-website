<?php
include('includes/header.php');

if ((isset($_POST['resetUserPassword']))){

	$emailAddress=$_POST['userResetEmail'];

	$sql= "select * from smart_prospects where prospect_Email='$emailAddress'";

	$res= mysql_query($sql);

	if (!$res){

		//echo "Error".mysql_error();
		$statusMsg .='Unable to fetch your email address';

	}

	$row= mysql_fetch_array($res);

	$count= mysql_num_rows($res);

if ($count == 0) {

	$statusMsg= "<div id='statusMsg' class='errorMsg'>User does not exist on the System! Contact the Admin.</div>";

}	

else

{	 

	$username= $row["prospect_FirstName"];

	$password=generatePass(8);

	//echo $password;

	$passwordHash= sha1($password);

	$query = "UPDATE smart_prospects SET prospect_password='$passwordHash' WHERE prospect_Email='$emailAddress' LIMIT 1";

	if (!$result = mysql_query($query, $link))	

			{ 

				//$statusMsg= mysql_error();

				$statusMsg = 'Cannot complete this process. Please contact the administrator.';
			}

			else

			{

				$message="Please be informed your password reset was successfully done on propertyhub".

				" Kindly Login with the new details below".

					

				  "\n\nE-mail: ".$username.

				  "\n\nPassword: ". $password.

				  "\n\nFor any enquries, please contact the administrator".

				  "\n\nThank you.";

				//echo $message;

				mail ($emailAddress, "Password Reset on propertyhub", $message, "From: no_reply@propertyhub.com.ng" );

				

$statusMsg= "<div id='statusMsg' class='errorMsg'>Password changed and sent to e-mail!</div>";

}

}

}

?>

<br/>
  <p>&nbsp;</p>
	<aside class="sideBar">
		<div class="socials">
			<ul>
				<li><a href="#" class="gplus" target="_blank"></a></li>
				<li><a href="#" class="twitter" target="_blank"></a></li>
				<li><a href="#" class="facebook" target="_blank"></a></li>
				<li><a href="#" class="socialLove" target="_blank"></a></li>
				
				
				
			</ul>
		</div>
		<div class="updates">
			<div id="nt-example1-container">	
                   			
		     <ul id="nt-example1">
			  <li>
				<div class="left"><img src="../images/img1.jpg" width="97" height="89" /></div>
				<p class="right">
					<p class="tit" style="color:#139AC9; font-family:Candara; font-weight: bold; font-size:15px;">PropertyHub Mobile - Smart Search</p>
					<p style="color:#666666; font-family:Candara; font-size:14px;">Search for Property and book for <br />
					inspection on the go on your mobile.<br />
					<a href="#" style="color:#FF7F00; font-family:Myriad Pro; font-weight: bold; font-size:15px;">DOWNLOAD NOW</a></p>
				</p>
				<br/>
				</li>
				<li>
				<div class="left"><img src="../images/img2.jpg" class="rightImg" /> </div>
				<p class="right">
					<p class="tit" style="color:#139AC9; font-family:Candara; font-weight: bold; font-size:15px;">PropertyHub Mobile - Smart Search</p>
					<p style="color:#666666; font-family:Candara; font-size:14px;">Search for Property and book for <br />
					inspection on the go on your mobile.<br />
					<a href="#" style="color:#FF7F00; font-family:Myriad Pro; font-weight: bold; font-size:15px;">MORE DETAILS</a></p>
				</p>
				<br/>
				</li>
				<li>
				<div class="left"><img src="../images/img1.jpg" width="97" height="89" class="rightImg" /></div>
				<p class="right">
					<p class="tit" style="color:#139AC9; font-family:Candara; font-weight: bold; font-size:15px;">PropertyHub Mobile - Smart Search</p>
					<p style="color:#666666; font-family:Candara; font-size:14px;">Search for Property and book for <br />
					inspection on the go on your mobile.<br />
					<a href="#" style="color:#FF7F00; font-family:Myriad Pro; font-weight: bold; font-size:15px;">MORE DETAILS</a></p>
				</p>
				<br/>
				</li>
				
			</ul>
           </div>
           <div class="ticker_next_prev" style="margin-right:100px;"><a id="nt-example1-prev"><img src="../images/previous.png" alt="Previous" /></a>
                   <a id="nt-example1-next"><img src="../images/next.png" alt="Next" /></a></div>	
		</div>
		<div class="clear"></div>
		<br/>
		<br/>
		<div class="stakeholdersLog">
			<div class="accordion_example">
                <div class="accordion_in" style="border-radius:8px;">
                  <div class="acc_head heading" ><br/>LOGIN FOR STAKEHOLDERS </div>
                  <div class="acc_content firstcontent">
                  <li><a href="#">Agent Login/Landlord Login</a></li>
				  <br/>
				  <li><a href="user/index.php">User Login</a></li>
                  <br/>
                  </div>
                </div>  
            </div>
		
		</div>
		
	</aside>
    
    
<section class="wrapper">

    	<article class="content">

<div id="salesRent">FORGOT PASSWORD</div>
  <div id="rentSale">

    <?php echo $statusMsg ?>

  
			<form action='forgotPassword.php' method="post">

				

						<input required type="text" name="userResetEmail" pattern="([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})"  oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Invalid E-mail Address' : '');" placeholder="Type Your E-mail Address Here" id="emailAddress" class="bigSearchBox"/>
						
                        <br/>
					<input value="RESET &#9654" type="submit" name="resetUserPassword" class="search" />
                   
                   					    <input id="rememberme" value="yes" alt="Remember Me" name="rememberme" class="chkBx" type="checkbox" >

                            <label style="display: inline; font-size: 18px; color: #999" for="rememberme">Remember Me</label>
							
                                          
					<p class="linRels"><a href="index.php">Click here </a> to sign in to your account</p>

					

			</form>

		

 </div>
</article>
         
         
         <div class="clear"></div>
        
    </section>

    

 <?php
 include('includes/footer.php');
 ?>