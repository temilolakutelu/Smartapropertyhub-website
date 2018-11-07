<?php

	function sendHTMLMail($from, $to, $message, $subject){
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	 $headers  .= "From:". $from. "\r\n";
	 // $headers  .= "CC:". $from. "\r\n";

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
function buildEmailMessageFromTemplate($templateFile){
//	echo $templateFile;
	$emailMsg = file_get_contents($templateFile);
	//$emailMsg=preg_replace('{{emailAdd}}', $message, $file);
return $emailMsg;
}

function buildEmailMessage($message){
	$file = file_get_contents('mailMessage.html');
	$emailMsg=preg_replace('{{mailBody}}', $message, $file);
return $emailMsg;
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


function send_sms($from,$msg,$typeOfAlert)
    {
	$sql = "SELECT * from tbl_subscription where subscriptionType='".$typeOfAlert."'";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)) {
		$to = $row["phoneNumber"] . ",";
	            
        //$to = preg_replace("/[^0-9,]/", "", $to); //Remove all "illegal" xters

        $request = 'user=security'.
                '&pass=qwas_098@'.
                '&from='.rawurlencode($from).
                '&to='.rawurlencode($to).
                '&msg='.rawurlencode($msg); //initialize the request variable
    
        $url = 'http://api.xownsolutions.com/api/send/?'.$request.''; //this is the nuObjects url of the gateway's interface
        
        $ch = curl_init(); //initialize curl handle 
        curl_setopt($ch, CURLOPT_URL, $url); //set the url
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //return as a variable 
        curl_setopt($ch, CURLOPT_POST, 1); //set POST method 
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $request); //set the POST variables
        $response = curl_exec($ch); // grab URL and pass it to the browser. Run the whole process and return the response
        curl_close($ch); //close the curl handle
}
        return $response;
    }   

function loadStructure($link){
	$structureOptions="<select name=\"structure\" id=\"structure\">";
     
	$query="select * from prt_structures order by structure_ID ASC";
	$result = mysql_query($query, $link);

	//echo $query;
	//echo $categoryOptions;
	while ($array = mysql_fetch_array($result)){
		$structureOptions.="<option value=".$array['structure_ID'].">".$array['structure_Type']."</option>";
	}
	
	$structureOptions.="</select>";
	return $structureOptions;
}

function loadState($link){
	$catOptions="<select name=\"state\" id=\"state\">";
     
	$query="select * from prt_state order by stateID ASC";
	$result = mysql_query($query, $link);

	while ($array = mysql_fetch_array($result)){
		$state_Code = $array["state_Code"];
		if ($state_Code == 24) {
			$catOptions.= "<option value='".$array["state_Name"]."' selected='selected'>".$array['state_Name']."</option>";
		}
		else
		{
		$catOptions.= "<option value='".$array["state_Name"]."'>".$array['state_Name']."</option>";
		}
	}
	
	$catOptions.="</select>";
	return $catOptions;
}

function loadStateEdit($link,$old){
    $catOptions="<select name=\"state\" id=\"state\">";

    $query="select * from prt_state order by stateID ASC";
    $result = mysql_query($query, $link);

    while ($array = mysql_fetch_array($result)){
        $state_Code = $array["state_Code"];
        $state_name = $array['state_Name'];
        if ($state_name == $old) {
            $catOptions.= "<option value='".$array["state_Name"]."' selected='selected'>".$array['state_Name']."</option>";
        }
        else
        {
            $catOptions.= "<option value='".$array["state_Name"]."'>".$array['state_Name']."</option>";
        }
    }

    $catOptions.="</select>";
    return $catOptions;
}

function loadPropertyCategory($link){
	$propCatOptions="<select name=\"propCat\" id=\"propCat\">";
     
	$query="select * from prt_category order by category_ID ASC";
	$result = mysql_query($query, $link);

	while ($array = mysql_fetch_array($result)){
		$propCatOptions.="<option value='".$array["category_ID"]."'>".$array['category_Name']."</option>";
	}
	
	$propCatOptions.="</select>";
	return $propCatOptions;
}

function loadPropertyCategoryEdit($link, $oldValue){
	$propCatOptions="<select name=\"propCat\" id=\"propCat\">";
     
	$query="select * from prt_category order by category_ID ASC";
	$result = mysql_query($query, $link);

	while ($array = mysql_fetch_array($result)){
        $category_Name = $array['category_Name'];
        if ($category_Name == $oldValue) {
            $propCatOptions.= "<option value='".$array["category_ID"]."' selected='selected'>".$array['category_Name']."</option>";
        }
		else
		{		
		$propCatOptions.="<option value='".$array["category_ID"]."'>".$array['category_Name']."</option>";
		}
	}
	
	$propCatOptions.="</select>";
	return $propCatOptions;
}

function loadFeatureEdit($link, $feature_old) {
$query = "select * from prt_features ORDER BY features_ID ASC";
$result = mysql_query($query);
$feature_old = explode(",", $feature_old);
while ($row = mysql_fetch_array($result))
{	
	$feature = $row["features_Name"];
	if (in_array($feature,$feature_old)){
	echo '<div class="feat_check"><input type="checkbox" name="features[]" value="'.$row["features_Name"].'" checked = "checked" /><label class="label">'.$row["features_Name"].'</label></div>';
	}
	else
	{
	echo '<div class="feat_check"><input type="checkbox" name="features[]" value="'.$row["features_Name"].'" /><label class="label">'.$row["features_Name"].'</label></div>';		
	}
	}
}

//clean url for all pages
    function clean($string){
        $string = strtolower(trim($string));
        $string = html_entity_decode($string);
        $string = str_replace(' ', '-', $string);
        $string =  preg_replace('/[^A-Za-z0-9\-]/', '', $string);
        $string = strtolower($string);
        return preg_replace('/-+/', '-', $string);
    }
	
function get_basename($filename)
{
    return preg_replace('/^.+[\\\\\\/]/', '', $filename);
}

function updateBaseName($image_ID, $imgPath){
	$query = "Update prt_property_images SET 
	imageURL = '".$imgPath."'
	WHERE imageID = '".$image_ID."'";
	$result = mysql_query($query);
	
	if(!$result) {
		$statusMsg = "Error".mysql_error();
	}
	else {
		$statusMsg = "Database Updates Successful";
	}
	
	return $statusMsg;
}


function generateUniqueRefNo($length){
                srand((double)microtime()*1000000);
                $data="0123456789";
                for($i = 0; $i < $length; $i++)
                                {
                                $random .= substr($data, (rand()%(strlen($data))), 1);
                                }
                return $random;
}

function saveFeatures($features, $propRef) {
	if(is_array($features))	
			{
			foreach ($features as $sub)	
			{
				//echo $sub;
				$sql = "Insert into agt_property_facilities(property_Reference, facility_Name) 
				Values('$propRef', '$sub')";
				$result = mysql_query($sql);				
			}
		}	
}

function updateFeatures($features, $facility_ID) {
	if(is_array($features))	
			{
			foreach ($features as $new)	
			{
				//echo $sub;
				$sql = "Update agt_property_facilities SET facility_Name = '".$new."'
				Where property_Reference = '".$facility_ID."'";
				$result = mysql_query($sql);
				if (!$result) {
					$statusMsg = "Error".mysql_error();
				}
				else
				{
					$statusMsg = "Success";
				}
			}
		}
		return $statusMsg;	
}


function updatePropertyDetails($propertyPurpose, $structure_Type, $property_Features, $ref_num) {
	$query = "Update agt_property Set property_Purpose ='".$propertyPurpose."',
	structure_Type='".$structure_Type."',
	property_Features = '".$property_Features."' where property_Reference='".$ref_num."'";
	
		if (!$result = mysql_query($query))	
			{ 
				$statusMsg= mysql_error();
			}
			else
			{
				$statusMsg="<div id='statusMsg' class='rounded'>Updated Successfully</div>";
			}
	return $statusMsg;
}

function savePropertyImage($property_ID, $imageURL, $imageDesc) {
	$query = "Insert into prt_property_images(property_ID, imageURL, imageDesc)
				Values('$property_ID', '$imageURL', '$imageDesc')";
	$result = mysql_query($query);
	
	if ($result) {
		$statusMsg = "Image uploaded successfully";
	}
	else
	{
		$statusMsg = "Error : Image could not be uploaded".mysql_error()."";
	}
	
	return $statusMsg;
}

function editPropertyImage($imageID, $imageURL) {
	$query = "Update prt_property_images SET imageURL = '".$imageURL."'
	Where imageID = '".$imageID."'";
	$result = mysql_query($query);
	
	if($result) {
		$statusMsg = "Image Update Successful";
	}
	else
	{
		$statusMsg = "Error in Uploading Image : ".mysql_error();
	}
	return $statusMsg;
}

function getUserID($agent_ID) {
	$query = "select * from smart_agent_users where agent_ID='".$agent_ID."'";
	$res = mysql_query($query);
	$arr = mysql_fetch_array($res);
	$user_ID = $arr["user_ID"];	
	
	return $user_ID;
}

function getPropertyID($ref_num) {
	$query = "Select * from agt_property where property_Reference='".$ref_num."'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$property_ID = $row["property_ID"];
	
	return $property_ID;
}

function getPropertyName($ref_num) {
	$query = "Select * from agt_property where property_Reference='".$ref_num."'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$property_Name = $row["property_Name"];
	
	return $property_Name;
}

function savePhoneNumber ($mobile){
	$query = "INSERT into tbl_contact_number (phoneno) VALUES('$mobile')";
	$result = mysql_query($query);
	if (!$result) {
		$statusMsg= mysql_error();
	}
	else
	{
		$statusMsg="<div id='statusMsg' class='rounded'>Updated Successfully</div>";
	}
	return $statusMsg;
}

function subscriberCount($link){
$counter=0;
//echo 'Segun';
$qry="select count(*) from tbl_subscribers_alert";
//echo $qry;
$result = mysql_query($qry, $link);
$array = mysql_fetch_array($result);
$counter=$array['count(*)'];
return $counter;
}

function getPropCode($link) {
	$sql = "Select  * from agt_property ORDER BY property_ID DESC LIMIT 1";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	
			$propCode = $row['property_Code'];
			$propCode = substr($propCode, 2,4);
			$propCode = $propCode + 1;
			
if ($propCode <= 9) { 
  $propCode = str_pad($propCode, 4, "0", STR_PAD_LEFT); 
	}
	else
	if ($propCode > 9 && $propCode <= 99) {
		$propCode = str_pad($propCode, 4, "0", STR_PAD_LEFT);
	}
	else
	if ($propCode > 99 && $propCode >= 999) {
		$propCode = str_pad($propCode, 4, "0", STR_PAD_LEFT);
	}	
	return $propCode;
}

function getAgentCompany($id) {
	$query = "Select * from smart_agents where agent_ID='".$id."'";
	$result = mysql_query($query);
	$row = mysql_fetch_array ($result);
	$agent_Company = $row["agent_CompanyName"];
	
	return $agent_Company;
}

function saveUserActivity ($name,$activity_Desc,$agent_ID,$companyName) {
	$query = "Insert into agt_activity(fullname, activity_Desc, agent_ID, company_Name) 
	Values('$name', '$activity_Desc', '$agent_ID', '$companyName')";
	$result = mysql_query($query);
	if (!$result) {
		$statusMsg = "Error : ".mysql_error();
	}
	else
	{
		$statusMsg = "Success";
	}
	return $statusMsg;
}

function updateUserAgent($agent_ID, $firstName, $lastName, $mobile, $email_Address) {
	$query = "Update smart_agent_users SET
firstName = '" . $firstName . "',
lastName = '".$lastName."',
email_Address = '".$email_Address."',
mobile = '".$mobile."' WHERE agent_ID = '" . $agent_ID . "'";

$result = mysql_query($query);
	if (!$result) {
		$statusMsg = "Error : ".mysql_error();
	}
	else
	{
		$statusMsg = "Success";
	}
	return $statusMsg;
}

function noOfBedrooms($num) {
			foreach ($num as $sub)	
			{
				if ($sub == '10'){
					echo '<strong>'.$sub.'</strong>';
				}
				else
				{
					echo $sub;
				}
		}
	
}

function waterMark_Img($imagePath) {
$stamp = imagecreatefrompng('images/watermark.png');
$im = imagecreatefromjpeg($imagePath);
$save_watermark_photo_address = $imagePath;

// Set the margins for the stamp and get the height/width of the stamp image

$marge_right = 200;
$marge_bottom = 180;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 

imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), 
imagesy($stamp));

// Output and free memory
//header('Content-type: image/png');

imagejpeg($im, $save_watermark_photo_address, 80); 
imagedestroy($im);

}

function getTotalPostedProperty($user_ID) {
	$query = "Select count(*) from agt_property where user_ID = '".$user_ID."'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$total = $row["count(*)"];
	
	return $total;
}

function getPropertyPostedThisMonth($user_ID) {
$thisMonth = date('Y-m',time());
$thisStart = "$thisMonth-01 00:00:01 <br>";
$thisNow = date('Y-m-d',time());
$nowString = "$thisNow 23:59:00";

$query = "select count(*) from agt_property WHERE user_ID = '".$user_ID."' AND 
(date_Added BETWEEN  '".$thisStart."' AND '".$nowString."' )";

$result = mysql_query($query);
$row = mysql_fetch_array($result);
$posted = $row["count(*)"];

return $posted;
	
}

function getPropertyTypePosted($user_ID, $category_ID) {
	$query = "Select count(*) from agt_property Where user_ID = '".$user_ID."' AND category_ID = '".$category_ID."'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$typePosted = $row["count(*)"];
	
	return $typePosted;
}

?>
