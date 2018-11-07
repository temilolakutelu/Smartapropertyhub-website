<?php
session_start();
ob_start();
include('../XownCMS/link.php');
require_once('../XownCMS/functions.php');
$host= $_SERVER['HTTP_HOST'];
$url=rtrim(dirname($_SERVER['PHP_SELF']), '/\\/');
//echo $name;
if (!(isset($_SESSION['cmslogin']))){
header("Location: index.php");
}

$pid = $_SESSION["pid"];
$name= $_SESSION['firstname']." ".$_SESSION['lastname'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="images/favicon.ico" rel="shortcut icon" type="image/ico"/>
<link rel="stylesheet" href="css/layout.css" />
<link rel="stylesheet" href="../css/layout.css" type="text/css" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link rel="stylesheet" href="css/user.css" />
  <script src="js/jquery-1.9.1.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script type="text/javascript">
			$(function() {
				$("#area1").find("#startDate").datepicker();
				$("#area2").find("#endDate").datepicker();
				$("#area3").find("#expiryDate").datepicker();
			});
		</script>
  <script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
mode : "textareas",
theme : "advanced",
theme_advanced_buttons1 : "bold,italic,underline,formatselect,fontsizeselect",
theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,undo,redo,link,unlink,anchor,image,cleanup,code,|,insertdate,inserttime,preview,forecolor",
theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
theme_advanced_resizing : false
	});
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Propertyhub -User</title>
<script src="lightbox/js/jquery-1.4.2.min.js"></script>
<script src="lightbox/js/jquery.prettyPhoto.js"></script>
<script src="lightbox/js/portfolio.js"></script>

<link href="lightbox/css/prettyPhoto.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=134360026676331";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="headerTop">
    	<div class="blueStripe"></div>
        <div class="headerContent">
        	<div class="wrapper">
            	<div class="logoHolder">
                    <div class="logo">
                    	
                    		<img src="../images/logo.png" alt="logo">
                        
                    </div>
                 </div>
                    <div class="contactDetails">
                    	<p><i class="fa fa-phone fa-rotate-90 fa-2x"></i>&nbsp;+234 1 293 1012<br/>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+234 817 204 3789 <br/><br/>
                        <i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;&nbsp; info@propertyhub.com.ng
                        </p>
                    </div>  
					
                <div class="like">
                	<div class="fb-like" data-href="https://www.facebook.com/pages/Propertyhub/234415650016031" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                </div>
                
                <div class="topTabSet" >
                <ul class="loggers">
                	<li><a href="main.php"> My PropertyHub </a> </li>
                    					
								 |   
								 
						<li><a href="logout.php">Logout </a></li>
                  </ul>
								  
									 
                	
  			  </div>
            </div>
        </div>
      <p>&nbsp;</p>
        <div class="greyStripe"></div> 
    
  
</div><!--End of headerTop-->

<div class="clear"></div>

<div class="wrapper" style="margin-top: 20px;">

    	<div class="userContent">
<div class="innerContainer">
<div class="topBg"><div id='cssmenu'>
<ul>
   <li class='dash'> <a href='#'><span>Dashboard</span></a></li>
       
   <li class='reports'> <a href='#'><span>Reports</span></a> </li>
   
   <li class='logout'> <a href='logout.php'><span>Logout</span></a> </li>
</ul>
</div><!--End of cssmenu-->
</div><!--End of topBg-->
<div class="clear"></div>

<div class="bginner">
<div id="mainContent">
<div class="left"><div class="innerLeft"><div id="menu8">
  <ul>
    
 	 <li><a href="main.php" title="My Propertyhub">My Propertyhub</a></li>
     <li><a href="?page=userSearchRent.php" title="Properties To Let">Properties To Let</a></li>
    <li><a href="?page=userSearchSales.php" title="Properties For Sales">Properties For Sales</a></li>
    <li><a href="?page=userSearchAuction.php" title="Properties For Auction">Properties For Auction</a></li>
    <li><a href="?page=userSavedSearch.php&pID=<?php echo $pid; ?>" title="Saved Search">Saved Search</a></li>
     <li><a href="?page=favourite.php&pID=<?php echo $pid; ?>" title="Saved Favourites">Favourite Properties</a></li>
    <li><a href="?page=getPropertyAlert.php" title="Property Alerts">Get Property Alerts</a></li>
     <li><a href="?page=editProfile.php&action=edit&pID=<?php echo $pid; ?>" title="Edit Profile">Edit My Profile</a></li> 
 <li><a href="?page=changePassword.php" title="Change Password">Change Password</a></li>
    <li><a href="logout.php" title="Log Out">Log Out</a></li>
    
    
  </ul>
</div></div></div>

    <div class="right" style=" overflow:auto; height:700px;">
    
      <?php
	  //load page
	  if (isset($_GET['page'])) {
		  $page=$_GET['page'];
		   include($page);
	  }
	  else {
		  	 // include('dashboard.php');
			 $name = ucwords($name);
			 $msg = '<div class="userArea">'.
			 		'<h2>Welcome, '.
					'<strong>'.$name.'</strong>.</h2>
					</div>';
					
			 echo $msg;
			
	  }
	  ?>
    </div>

</div></div>
</div>


</div>
</div><!--End of wrapper-->
         
         
         <div class="clear"></div>
   
    <div class="bottomBG">Copyright &copy; <?php echo date('Y'); ?> Property Hub. An initiative of <a href="http://xownsolutions.com">Xown Solutions Limited</a>.</div> 
      <div class="clear"></div>
    
</body>
	<!-- PRETTYPHOTO SCRIPT INICIALITATION -->
	<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$("a[rel^='prettyPhoto']").prettyPhoto();
	});
	</script>
	<!-- END PRETTYPHOTO SCRIPT INICIALITATION -->
	<script type="text/javascript"> Cufon.now(); </script> 
    <div class="chat" style="margin-top:-850px;">
<script type="text/javascript" src="https://mylivechat.com/chatbutton.aspx?hccid=73917267"></script></div>
</html>


