<?php
include('header.php');
include("../XownCMS/link.php");
include("functions.php");

$user_ID = getUserID($_SESSION["agentID"]);

require "../XownCMS/KoolControls/KoolChart/koolchart.php";

?>
<div id="wrapper">
	<div class="notification">
    	<div class="noti_head">
        <div class="noti_text">NOTIFICATIONS</div>
        <div class="noti_count">[1 of 200 Unread Notifications] 
        <div class="noti_image">
        <img src="images/prev_noti.png" align ="left" alt="previous" /><img src="images/next_noti.png" alt="next" /></div>
        </div>
        </div><!--End of Noti_head-->
<div class="clear"></div>
<div class="noti_full_text">
Merchant Registration - Email Verification. Your mobile number has been changed
</div><!--End of noti_full_text-->       
    </div><!--End of Notification-->
<div class="clear"></div>
<div class="report_container">
	<div class="report_sub">
    	<div class="report_sub_head">PROPERTY LISTING</div>
        <div class="report_div">
        <?php include('listingReport.php') ?>
        </div><!--End of report_div-->
<div class="clear"></div>
<table width="370" class="table_report">
	<tr>
    	<td><font class="_white">Total Posted Property</font></td>
        <td><div class="btn_notification"><?php echo getTotalPostedProperty($user_ID); ?></div></td>
    </tr>
    
	<tr>
    	<td><font class="_blue">Posted this Month</font></td>
        <td><div class="btn_notification"><?php echo getPropertyPostedThisMonth($user_ID); ?></div></td>
    </tr>
    
	<tr>
    	<td><font class="_white">For Sale</font></td>
        <td><div class="btn_notification"><?php echo getPropertyTypePosted($user_ID, '1'); ?></div></td>
    </tr>
    
	<tr>
    	<td><font class="_blue">Auction</font></td>
        <td><div class="btn_notification"><?php echo getPropertyTypePosted($user_ID, '3'); ?></div></td>
    </tr>
    
	<tr>
    	<td><font class="_white">Rent</font></td>
        <td><div class="btn_notification"><?php echo getPropertyTypePosted($user_ID, '2'); ?></div></td>
    </tr>                  
</table>  
    </div><!--End of report_sub-->
    
	<div class="report_sub __marginleft">
    	<div class="report_sub_head">APPLICATIONS  STATUS DISTRIBUTION</div>
        <div class="report_div">
        <?php //include('applicationsReport.php') ?>
        </div><!--End of report_div-->        
<div class="clear"></div>
<table width="370" class="table_report">
	<tr>
    	<td><font class="_white">Total Application</font></td>
        <td><div class="btn_notification">6,393</div></td>
    </tr>
    
	<tr>
    	<td><font class="_blue">Shortlisted for Test/Interview</font></td>
        <td><div class="btn_notification">20</div></td>
    </tr>
    
	<tr>
    	<td><font class="_white">Applicants on OnScreening</font></td>
        <td><div class="btn_notification">12</div></td>
    </tr>
    
	<tr>
    	<td><font class="_blue">Recommended for Employment</font></td>
        <td><div class="btn_notification">5,360</div></td>
    </tr>
    
	<tr>
    	<td><font class="_white">Inactive Applicants</font></td>
        <td><div class="btn_notification">12</div></td>
    </tr>                  
</table>         
    </div><!--End of report_sub-->
    
	<div class="report_sub __marginleft">
    	<div class="report_sub_head">RESUME REPORT</div>
        <div class="report_div">
        <?php //include('resumeReport.php') ?>
        </div><!--End of report_div-->        
<div class="clear"></div>
<table width="370" class="table_report">
	<tr>
    	<td><font class="_white">Total Registered  TD</font></td>
        <td><div class="btn_notification">6,393</div></td>
    </tr>
    
	<tr>
    	<td><font class="_blue">Registered Today</font></td>
        <td><div class="btn_notification">20</div></td>
    </tr>
    
	<tr>
    	<td><font class="_white">Registered Last Month</font></td>
        <td><div class="btn_notification">12</div></td>
    </tr>
    
	<tr>
    	<td><font class="_blue">Registered MONTH TD</font></td>
        <td><div class="btn_notification">5,360</div></td>
    </tr>
    
	<tr>
    	<td><font class="_white">Registered YEAR TD</font></td>
        <td><div class="btn_notification">12</div></td>
    </tr>                  
</table>         
        
        
    </div><!--End of report_sub-->        
</div><!--End of report_container-->
    
</div><!--End of wrapper-->
<?php
include('footer.php');
?>