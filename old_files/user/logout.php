<?php
error_reporting(0);
session_start();
$_SESSION = array();
session_unset();
// Finally, destroy the session.
session_destroy();
header("Location: index.php");
//		echo "Please Click <a href=\"index.php\">here </a> to login again";	
?>
