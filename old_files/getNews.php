<?php
include ('XownCMS/link.php');
header('Content-Type: application/json');
if(isset($_POST['newsNum']))
{
	$newsNum = $_POST['newsNum'];
	$query = "SELECT newsTitle, newsDetails FROM news WHERE newsID = '$newsNum'";
	$result = mysql_query($query,$link);
	if(mysql_num_rows($result) == 1)
	{
		$rowNews = mysql_fetch_array($result,MYSQL_ASSOC);
			
		$newsTitle= $rowNews['newsTitle'];
		
		$newsDetails= html_entity_decode ($rowNews['newsDetails']);
		
		$newsDetails = preg_replace('/\r\n/', '<br/>', $newsDetails);

		$newsDetails= html_entity_decode ($newsDetails);
		
		$newsDetails= strip_tags($newsDetails);
				
		$data = array ( 'newsTitle' => $newsTitle,
						
						'newsDetails' => $newsDetails
						
						);
		echo json_encode($data);	
	}
	
}

?>