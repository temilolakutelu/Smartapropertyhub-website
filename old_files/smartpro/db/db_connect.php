<?php
//db configuration modify before usage
//$localhost="localhost";
$localhost = "www.propertyhub.com.ng";
$dbuser="property_user";
$dbpass="property_098@@";
$dbname="propertyhub_db";
//$dbuser="root";
//$dbpass=""; //db configuration ends here

//make connection to db
mysql_connect($localhost, $dbuser, $dbpass)or die("could not connect to the server");
mysql_select_db($dbname)or die("could not connect to the Database");//connection ends here
?>