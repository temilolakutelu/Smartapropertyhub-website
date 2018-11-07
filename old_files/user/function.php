<?php

function curPageURL() {
 $pageURL = 'http';
// if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

function getArticleDetails($articleID) {
	$query="select * from article where articleID=".$articleID."";
	$result= mysql_query($query);
	if (!$result) {
		echo "Error".mysql_error();
	}
	$row= mysql_fetch_array($result);
	$articleDetails= html_entity_decode($row['articleDetails']);
	
	return $articleDetails;
}

function getSidelink1($articleID) {
	$query="select * from article where articleID=".$articleID."";
	$result= mysql_query($query);
	if (!$result) {
		echo "Error".mysql_error();
	}
	$row= mysql_fetch_array($result);
	$sideLink1= html_entity_decode($row['sideLink1']);
	
	return $sideLink1;
}

function getSidelink2($articleID) {
	$query="select * from article where articleID=".$articleID."";
	$result= mysql_query($query);
	if (!$result) {
		echo "Error".mysql_error();
	}
	$row= mysql_fetch_array($result);
	$sideLink2= html_entity_decode($row['sideLink2']);
	
	return $sideLink2;
}

function getter($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    //curl_setopt($ch, CURLOPT_POST, 1);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

?>