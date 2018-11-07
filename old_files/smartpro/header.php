<?php
session_start();

if (!(isset($_SESSION["login"]))){
header("Location: index.php");
}

$name=$_SESSION['firstname']." ".$_SESSION['lastname'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="favicon.png" type="image/png" />
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<link href="css/pages.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/layout.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" />
<link href="css/bootstrap-switch.css" />
<title>SMARTPRO</title>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.1.3.0.js"></script>
<script src="js/jquery.1.11.js"></script>

    <script type='text/javascript'
            src='js/jquery-2.0.2.js'></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-switch.css" />
    <script type='text/javascript' src="js/bootstrap-switch.js"></script>
    <script type='text/javascript'>//<![CDATA[
    $(window).load(function(){
        $("input.switch").bootstrapSwitch();
    });//]]>
	
        //image thumbnail and status switch
        $( document ).ready(function() {
            //status switch
            $('input[type="checkqqbox"]').click(function () {
                var pageName = this.id;
                $('.s_action').load(pageName);
            });

            //a small test
            $('input[type="checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) {
                var pageName = this.id;
                $('.s_action').load(pageName+'&status='+state);
            });

        });
        $(function(){
            $('ul.tabs_smart').each(function(){
                // For each set of tabs, we want to keep track of
                // which tab is active and it's associated content
                var $active, $content, $links = $(this).find('a');

                // If the location.hash matches one of the links, use that as the active tab.
                // If no match is found, use the first link as the initial active tab.
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                // Hide the remaining content
                $links.not($active).each(function () {
                    $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    // Make the old tab inactive.
                    $active.removeClass('active');
                    $content.hide();

                    // Update the variables with the new link and content
                    $active = $(this);
                    $content = $(this.hash);

                    // Make the tab active.
                    $active.addClass('active');
                    $content.show();

                    // Prevent the anchor's default click action
                    e.preventDefault();
                });
            });
        });	
	
	
    </script>
<script src="js/script.js"></script>
<script src="js/script2.js"></script>    
</head>

<body>
<div id="header">
	<div class="head_container">
	<div class="logo_main">
    <a href="main.php"></a>
    </div>
    
    <div class="rightcont">
    <font class="capital">Welcome <?php echo $name; ?></font>
    <p>&nbsp;</p>
    <p><a href="logout.php" class="button_logout">Log Out </a></p>
    </div><!-- End of rightcont-->
	</div><!--End of head_container-->
</div><!--End of Header-->
<div class="clear"></div>

<div class="menu_container">
	      <div id="cssmenu">
  <ul>
    <li class="dashboard"><a href="main.php" title="Dashboard"><span>DASHBOARD</span></a></li>
    <li class="setting"><a href="#" title="Settings"><span>SETTINGS</span></a></li>    
    <li class="property"><a href="#" title="Property Mgt"><span>PROPERTIES</span></a>
    	<ul>	
        	<li><a href="postProperty.php">Upload Property</a></li>
            <li><a href="listProperty.php">List Property</a></li>
        </ul>
    </li>
    <li class="user"><a href="#">TENANTS</a></li>
    <li class="user"><a href="#">LANDLORDS</a></li>
    <li class="user"><a href="#" title="Users Management"><span>USERS</span></a>
    	<ul>
        	<li><a href="userManagement.php">Add New user</a></li>
            <li><a href="#">List User</a></li>
        </ul>
    </li>
	<li class="profile"><a href="#" title="Profile"><span>MY PROFILE</span></a>
    	<ul>
        	<li><a href="updateProfile.php">Update Profile</a></li>
            <li><a href="changePassword.php">Change Password</a></li>
        </ul>
    </li>
    <li class="report"><a href="#" title="Report"><span>REPORTS</span></a></li>    
    </ul>
    </div><!--End of cssmenu-->
</div><!--End of menu_container-->
<div class="clear"></div>