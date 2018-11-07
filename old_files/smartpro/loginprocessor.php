<?php
session_start();

include("../XownCMS/link.php");

$passwordHash = sha1($_POST["password"]);
$username=$_POST["username"];

$query="select * from smart_agent_users where username='".$username."' and password ='". $passwordHash."'";


if (!$result = mysql_query($query, $link))
{
$err=mysql_error();
echo "<br> $err";
}
else
{
	$num=mysql_num_rows($result);
	$array=mysql_fetch_array($result);
//	echo $num;
	
		if ($num==1){
		$_SESSION["login"]=$array["username"];
		$_SESSION["email"]=$array["email_Address"];
		$_SESSION["lastname"]=$array["lastName"];
		$_SESSION["firstname"]=$array["firstName"];
		$_SESSION["role"]=$array["user_priviledge"];
		$_SESSION["agentID"] = $array["agent_ID"];
		$host= $_SERVER['HTTP_HOST'];
		$url=rtrim(dirname($_SERVER['PHP_SELF']), '/\\/');
		if ($_SESSION["login_status"] =="unchanged") {
			
			}
			else {
			$ext='main.php';
			header("Location: http://$host$url/$ext");
			}
			}
			else {
	header("Location: index.php?status=Invalid+Username+/+Password");
			}
		
}
?>