<?php
include('../XownCMS/link.php');

$statusMsg="";
if (isset($_POST["changePassword"])) {
$email=$_POST["email"];
$passwordhash=sha1($_POST['oldpassword']);
$newpassword=$_POST['newpassword'];
$cnewpassword=$_POST['cnewpassword'];

$query="select * from smart_prospects where prospect_Email='". $email ."' and prospect_Password ='". $passwordhash ."'";

	if (!$result = mysql_query($query, $link))
	{
		$statusMsg= "<div class='errorMsg'>Invalid Password </div>";
	}
		else
	{
		$num=mysql_num_rows($result);
		$array=mysql_fetch_array($result);

		if (($newpassword !="") and ($cnewpassword!="") and ($newpassword==$cnewpassword) and ($num==1) ) {
			
			
			$newpasswordhash= sha1($_POST["newpassword"]);
		//	echo $newpasswordhash;
				$query = "UPDATE smart_prospects set prospect_Password= '$newpasswordhash' WHERE prospect_Email='$email'";
				
					if (!$resultp = mysql_query($query, $link))	
						{ 
							/*$err= mysql_error();
							echo $err;*/
							$statusMsg= "<div class='errorMsg'>Password could not be changed.</div>";
						}
						else
						{
						//echo "changed";
						
							$statusMsg= "<div class='errorMsg'>Password Changed Successfully </div>";
						}		
		
		
		
		
		}
		else {
			$statusMsg= "<div class='errorMsg'>Invalid or Inconsitent Password! </div>";
		}
	}

}


?>



<div id="salesRent">CHANGE MY PASSWORD</div>
 <?php
 	echo $statusMsg;
 ?>
 <div id="rentSale">
<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="form1" id="form1">
 
  <span class="txtLabel">Email:</span> <input type="text" name="email"  class="textbox" readonly value="<?php  echo $_SESSION['cmslogin']?>" />  <br />
  
  <span class="txtLabel">Old Password:</span> <input type="text" name="oldpassword"   class="textbox" pattern='.{8,}' oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Incorrect Password' : '');" required /> <br />
  
  <span class="txtLabel">New Password:</span> <input type="text" name="newpassword"   class="textbox" pattern='.{8,}' oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Password Must Be At Least 8 Characters Long' : '');" required />  <br />
  
  <span class="txtLabel">Confirm Password:</span> <input type="text" name="cnewpassword"  class="textbox" pattern='.{8,}' oninvalid="this.setCustomValidity(this.validity.patternMismatch ? 'Password Must Be At Least 8 Characters Long' : '');" required />  <br />
  
  <span class="txtLabel">&nbsp;</span> <input type="submit" name="changePassword" value="SUBMIT &#9654" class="search" />
  
  
     
</form>
</div>