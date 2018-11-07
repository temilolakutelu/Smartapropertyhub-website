<?php
function buildEmailMessage($message){
	$file = file_get_contents('mailMessage.html');
	$emailMsg=preg_replace('{{mailBody}}', $message, $file);
return $emailMsg;
}
function buildOrderEmailMessage($message){
	$file = file_get_contents('mailMessage2.html');
	$emailMsg=preg_replace('{{mailBody}}', $message, $file);
return $emailMsg;
}

function getMonthWord($aDate) {
	$month=date("M-y", strtotime($aDate));
return $month;
}
function getLastDayofMonth($aDate){
	$lastDaty=date("Y-m-t", strtotime($aDate));
	return $lastDaty;
}


function feedbackCounter($pageID, $response, $link){
$counter=0;
//echo 'Segun';
$qry="select count(*) from contentrating where pageID=". $pageID ." and answer= '".$response. "'";
//echo $qry;
$result = mysql_query($qry, $link);
$array = mysql_fetch_array($result);
$counter=$array['count(*)'];
return $counter;
}

function pageName ($pageID, $link) {
$pageName="";
$qry= "select * from pagecontent where pageID='".$pageID."'";
$result= mysql_query($qry, $link);
if (!$result) {
	echo "Error";
}
else
{
$arr = mysql_fetch_array($result);
$pageName=$arr['PageName'];
}
return $pageName;
}
/*
function getSalesFigure($link, $startDate, $endDate){
	$qry="select sum(total_amount) "
	return $salesFigure;
}
*/

function insertDetails($tableName, $field, $values, $link){
	$query="insert into ". $tableName . " ".$field ." values ". $values;
	//echo $query;
		if (mysql_query($query, $link)) {
		return 'success';
		}
		else {
		return 'fail';
		}
}


function loadCategory($link){
	$categoryOptions="<select name=\"page_category\" id=\"page_category\" class=\"textbox rounded\">";
     
	$query="select * from pagecategory";
	$result = mysql_query($query, $link);

	//echo $query;
	//echo $categoryOptions;
	while ($array = mysql_fetch_array($result)){
		$categoryOptions.="<option value=".$array['CategoryID'].">".$array['categoryID']."</option>";
	}
	
	$categoryOptions.="</select>";
	return $categoryOptions;
}

function fileUpload($fileName, $fileSize, $fileType, $fileKind, $fileTempName, $fileError, $savingPath){
// file kind should be image or document
//echo "Filename: ". $fileName;
$imagesAllowedExts = array("gif", "jpeg", "jpg", "png");
$docAllowedExts= array("pdf", "doc", "docx", "xls", "xlsx", "ppt", "pptx");
//$temp = explode(".", $_FILES["file"]["name"]);
$temp = explode(".", $fileName);
$extension = end($temp);	
//echo "extension: ". $extension;
	
if ($fileKind=="Image"){
//echo "fileKind: ". $fileKind;
	
		if ((($fileType == "image/gif")
		|| ($fileType == "image/jpeg")
		|| ($fileType == "image/jpg")
		|| ($fileType == "image/pjpeg")
		|| ($fileType == "image/x-png")
		|| ($fileType == "image/png"))
		&& ($fileSize < 1000000)
		&& in_array($extension, $imagesAllowedExts))
		  {
			//  echo "<br>fileType: ". $fileType;
		//	  echo "<br>fileSize: ". $fileSize;
			  
				  if ($fileError > 0)
					{
					$statuMsg= "Return Code: " . $fileError . "<br>";
					}
					  else
						{
					   // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
					   // echo "Type: " . $_FILES["file"]["type"] . "<br>";
					   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
					   // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
					
					//	echo "<br>fileTempName: ". $fileTempName;
						
						  move_uploaded_file($fileTempName, $savingPath);
						//  echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
						//echo "<br>savingPath: ". $savingPath;
						
						  $statuMsg="Success";
					//	  echo "StatusFunction: ". $statuMsg;
					   
						}
  			}
	else
	  {
		 $statuMsg="Invalid file Format";
	  }
	
}
else {

	if ((($fileType == "application/doc")
		|| ($fileType == "application/msword")
		|| ($fileType == "application/xls")
		|| ($fileType == "application/pdf")
		|| ($fileType == "application/xlsx")
		|| ($fileType == "application/ppt")
		|| ($fileType == "application/pptx"))
		&& ($fileSize < 400000)
		&& in_array($extension, $docAllowedExts))
		  {
				  if ($fileError > 0)
					{
					$statuMsg= "Return Code: " . $fileError . "<br>";
					}
					  else
						{
					   // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
					   // echo "Type: " . $_FILES["file"]["type"] . "<br>";
					   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
					   // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
					
						
						  move_uploaded_file($fileTempName, $savingPath);
						//  echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
						  $statuMsg="Success";
					   
						}
  			}
	else
	  {
		 $statuMsg="Invalid file Format";
	  }



}
  return $statuMsg;
}
function generateTransID(){
	
	$num=mt_rand(1, 9);
	$num1=mt_rand(0, 9);
	$transID=$num.$num1.time();
	return $transID;
}
function generatePass($length)
		{
		$random= "";
		
		srand((double)microtime()*1000000);
		
		$data = "AbcDE123IJKLMN67QRSTUVWXYZ";
		$data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
		$data .= "0FGH45OP89";
		
		for($i = 0; $i < $length; $i++)
		{
		$random .= substr($data, (rand()%(strlen($data))), 1);
		}
		
		return $random;
		}

function checkValues($value)
	{
		 $value = trim($value);
		 
		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}
		
		 $value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));
		
		 $value = strip_tags($value);
		$value = mysql_real_escape_string($value);
		$value = htmlspecialchars ($value);
		return $value;
		
	}
	
function sendHTMLMail($from, $to, $message, $subject){
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	 $headers  .= "From:". $from. "\r\n";
	  $headers  .= "CC:". $from. "\r\n";

	if (mail($to, $subject, $message, $headers))
	{
		$status=1;
	}
	else{
		$status=0;
	}
	return $status;
	//mail($to, $subject, $message, $header);
}

function logOrderHistory($transID, $productID, $productSize, $quantity, $productPrice, $totalAmt, $link){
	$qry="insert into tb_order_history (trans_id, product_id, quantity, product_size, product_price, line_total) 
	values ('$transID', '$productID', $quantity, '$productSize', $productPrice, $totalAmt)";
	//echo $qry;
	if (!$result = mysql_query($qry, $link))	
			{ 
			//$status= mysql_error();
			//echo mysql_error();
			$status= "failed";
			}
			else
			{
				$status="success";
			}

	return $status;
}

function sendPasswordAsEmail($firstname, $password, $emailAddress, $from, $subject, $link){
	$staus=0;
	
	$msg="Dear ". $firstname."<p> Thank you for shopping at www.pitterpatterng.com</p><br>Your username/email is ".
	$emailAddress.  "<br>Your password is ".
	$password. "<p>Kindly keep this for easy shopping on our website in the near future.</p><p> Thank you for your patronage.</p>";
	//echo $msg;
	$mailMessage=buildEmailMessage($msg);
	if (sendHTMLMail($from, $emailAddress, $mailMessage, $subject)==1) {
	$status=1;
	}
	
	return $status;
	
}

function send_sms($from, $to, $msg)
    {
            
        $to = preg_replace("/[^0-9,]/", "", $to); //Remove all "illegal" xters

        $request = 'user=ppatter'.
                '&pass=qazwsx_098'.
                '&from='.rawurlencode($from).
                '&to='.rawurlencode($to).
                '&msg='.rawurlencode($msg); //initialize the request variable
    
        $url = 'http://api.xownsolutions.com/'; //this is the nuObjects url of the gateway's interface
        
        $ch = curl_init(); //initialize curl handle 
        curl_setopt($ch, CURLOPT_URL, $url); //set the url
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //return as a variable 
        curl_setopt($ch, CURLOPT_POST, 1); //set POST method 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request); //set the POST variables
        $response = curl_exec($ch); // grab URL and pass it to the browser. Run the whole process and return the response
        curl_close($ch); //close the curl handle

        return $response;
    }    

function loadPages($link){
	$pageOptions="<select name=\"page\" id=\"page\" class=\"textbox rounded\">";
     
	$query="select * from pagecontent order by pageID ASC";
	$result = mysql_query($query, $link);

	//echo $query;
	//echo $categoryOptions;
	while ($array = mysql_fetch_array($result)){
		$pageOptions.="<option value=".$array['pageID'].">".$array['pageID']." - ".$array['PageName']."</option>";
	}
	
	$pageOptions.="</select>";
	return $pageOptions;
}
function loadPagesLink($link){
	$pageOptions="<select name=\"link\" id=\"link\" class=\"textbox rounded\">";
     
	$query="select * from pagecontent order by pageID ASC";
	$result = mysql_query($query, $link);

	//echo $query;
	//echo $categoryOptions;
	while ($array = mysql_fetch_array($result)){
		$linkType =$array['linkType'];
		if ($linkType == 'IDLink') {
		$pageOptions.="<option value=innerPages.php?pageID=".$array['pageID'].">".$array['pageID']." - ".$array['PageName']."</option>";
		}
		else
		{
			$pageOptions.="<option value=".$array['URL'].">".$array['pageID']." - ".$array['PageName']."</option>";
		}
	}
	
	$pageOptions.="</select>";
	return $pageOptions;
}
function loadRegion($link){
	$pageOptions="<select name=\"region\" id=\"region\" class=\"textbox rounded\">";
     
	$query="select * from tb_region order by regionID ASC";
	$result = mysql_query($query, $link);

	//echo $query;
	//echo $categoryOptions;
	while ($array = mysql_fetch_array($result)){
		$pageOptions.="<option value=".$array['regionID'].">".$array['regionID']." - ".$array['regionName']."</option>";
	}
	
	$pageOptions.="</select>";
	return $pageOptions;
}

function loadPageLinkEdit($link, $pageID){
	$pageOptions="<select name=\"pageLinkEdit\" id=\"pageLinkEdit\" class=\"textbox rounded\">";
     
	$query="select * from banners where pageID='".$pageID."'";
	$result = mysql_query($query, $link);

	//echo $query;
	//echo $categoryOptions;
	while ($array = mysql_fetch_array($result)){
		$pageOptions.="<option value='selected'>".$array['link']."</option>";
		
	$query="select * from pagecontent order by pageID ASC";
	$result = mysql_query($query, $link);

	//echo $query;
	//echo $categoryOptions;
	while ($array = mysql_fetch_array($result)){
		$linkType =$array['linkType'];
		if ($linkType == 'IDLink') {
		$pageOptions.="<option value=innerPages.php?pageID=".$array['pageID'].">".$array['pageID']." - ".$array['PageName']."</option>";
		}
		else
		{
			$pageOptions.="<option value=".$array['URL'].">".$array['pageID']." - ".$array['PageName']."</option>";
		}
	}
	}
	$pageOptions.="</select>";
	return $pageOptions;
}

function loadFundName($link){
	$pageOptions="<select name=\"fundName\" id=\"fundName\" class=\"textbox rounded\">";
     
	$query="select * from tb_fund order by fundID ASC";
	$result = mysql_query($query, $link);

	//echo $query;
	//echo $categoryOptions;
	while ($array = mysql_fetch_array($result)){
		$pageOptions.="<option value=".$array['fundID'].">".$array['fund_name']."</option>";
	}
	
	$pageOptions.="</select>";
	return $pageOptions;
}

?>