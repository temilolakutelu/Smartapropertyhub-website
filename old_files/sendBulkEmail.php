<?php

include('XownCMS/link.php');
include('functions.php');



if (isset($_POST['submit'])){
	
$from="Propertyhub <noreply@propertyhub.com.ng>";

$fromName="Propertyhub Administrator";
$subject=$_POST['subject'];

$contact=$_POST['category'];

$emailAddArray=getEmailAddresses($contact, $link);

//$template=$_POST['templateFile'];
$template = 'welcome.html'	;
$emailMsg=buildEmailMessageFromTemplate($template);

$webURL="http://propertyhub.com.ng".$template;

$emailMsg=preg_replace('{WebURL}', $webURL, $emailMsg );

require_once("lib/mailer.php");

$mailerclass = new mailer();
	
	
$kount=count($emailAddArray);

	for ($i=0; $i<$kount; $i++)
	 {
		$emailAdd=$emailAddArray[$i];
		
		
		$daysRem = getExpiry($emailAdd, $link);
		
		
		//$customerName = getContactName($emailAdd, $link);
		
		$customerName = 'Olaide';
		
		$companyName = getCompanyName($emailAdd, $link);
		
		$customerName = ucwords($customerName);

		$htmlMsg =preg_replace('{FirstName}', $customerName, $emailMsg);
		
		$htmlMsg =preg_replace('{CompanyName}', $companyName, $htmlMsg);
		
		$htmlMsg=preg_replace('{NumberOfDays}', $daysRem, $htmlMsg);
		
		echo $htmlMsg;
		
		$bcc_address = "";
		
		$cc_address = "";
		
		$cc_name="";
		
		$bcc_name = "";
		
		$address = $emailAdd;
		
		$to_name = "";
	
		$mailerclass->send_mail($from, $from_name, $subject, $bcc_address, $bcc_name, $cc_address, $cc_name, $to_name, $address, $htmlMsg);
	
	
	
	}
	
	$displayMsg= 'Message has been successfully sent to '.$kount.' client(s)';
}

?>




<form action="" method="post" name="form1" id="form1">
  <table width="75%" border="0" cellspacing="0" cellpadding="0">
    <!--DWLayoutTable-->
    <tr>
      <td width="4">&nbsp;</td>
      <td colspan="2" class="pageTitle">SEND EMAIL</td>
      
    </tr>
    <tr>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td colspan="4"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
    <tr>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td colspan="4" align="center"><table><tr><!--<td><div ><a href="?page=sendSMS.php" class="activeSub">Send SMS</a></div></td>-->
      <td><div class="menuItem">PhoneBook</div></td>
      <td><div class="menuItem">History</div></td>
      <td><div class="menuItem">Drafts</div></td></tr></table></td>
    </tr>
    <tr>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td colspan="4"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
    <tr>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td colspan="4"><?php echo $displayMsg; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td colspan="3"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td colspan="3"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="175"> Template:</td>
      <td colspan="3"><select name="templateFile" id="templateFile" class="textbox rounded">
      	
       <?php
        		$query="SELECT * FROM  newsletterdocs order by fileID DESC";
				$r = mysql_query($query, $link);
				while ($result = mysql_fetch_array($r,MYSQL_ASSOC))	
					{
						echo'<option value="'.$result["filePath"].'">'.$result["title"].'</option>';
					}
				
		?>
	
        
       
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td colspan="3"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Client:</td>
      <td colspan="3"><label for="category"></label>
      <?php // echo contact($link); ?>
      <select name="category" class="textbox rounded">
      <option value="expire">Soon To Expire</option>
      <option value="prospect">Prospects</option>
      <option value="general">Send To All</option>
      
      </select>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td colspan="3"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Subject:</td>
      <td colspan="3"><input name="subject" type="text" class="textbox rounded" id="subject" value="" size="60" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td colspan="3"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td colspan="3"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td width="275" colspan="2"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="218"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td colspan="2"><input name="submit" type="submit" class="greenBtn rounded" value="Send ..." id="submit" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td colspan="3"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="4"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
  </table>
      
      
</form>
