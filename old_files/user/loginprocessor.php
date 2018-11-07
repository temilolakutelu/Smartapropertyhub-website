<?php
ob_start();
session_start();

include ("../XownCMS/link.php");

if(isset($_POST['userLogin']))
	{
		$userPassword = sha1($_POST["userPassword"]);
		
		$userEmail=$_POST["userEmail"];
		$query="select * from smart_prospects where prospect_Email='$userEmail' and prospect_Password ='$userPassword'";
		  //and del_flag= '". N . "'
		//echo $query;
		
		
		if (!$result = mysql_query($query, $link))
		{
			$err=mysql_error();
			//echo "<br> $err";
		}
		else
		{
			$num=mysql_num_rows($result);
			$array=mysql_fetch_array($result);
		
			
			if ($num==1)
				{
					$_SESSION["pid"]=$array["prospect_ID"];
					$_SESSION["cmslogin"]=$array["prospect_Email"];
					$_SESSION["lastname"]=$array["prospect_LastName"];
					$_SESSION["firstname"]=$array["prospect_FirstName"];
					$host= $_SERVER['HTTP_HOST'];
					$url=rtrim(dirname($_SERVER['PHP_SELF']), '/\\/');
					if (!isset($_SESSION["cmslogin"]))
					 {
					//		header("Location: index2.php");
						
					 }
					else
					 {
						$ext='main.php';
						
						header("Location: http://$host$url/$ext");
						
					  }
					
					
					}
				else 
					{
					
						header("Location: index.php?status=Invalid Email or Password");
					
					}
				
	}
}
?>