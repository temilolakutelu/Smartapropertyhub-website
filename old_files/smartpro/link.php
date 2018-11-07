<?php
error_reporting(0);

$database="propertyhub_db";
$db_host="www.propertyhub.com.ng";
$db_password="wZdd3*18";
$db_user="property_user";

//$db_host="localhost";
//$db_user="root";
//$db_password="";


$link = mysql_connect($db_host, $db_user, $db_password);
if (!mysql_select_db($database, $link))
	{
	echo "Error : ".mysql_error();
	}
else
	{
	//echo "Connected to Database. <br> Ready to process SQL statements.<br>";
	}

?>
