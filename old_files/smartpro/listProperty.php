<?php
include('header.php');
include("../XownCMS/link.php");
include("functions.php");

$user_ID = getUserID($_SESSION["agentID"]);

$display = 10;
if (isset($_GET['s']) && is_numeric($_GET['s']))
{
 $start = $_GET['s'];
} else 
{
 $start = 0;
}

?>
<div class="s_action"></div>
<p>&nbsp;</p>
<div id="prop_div">

        <div id="tabs_smart">
            <ul class="tabs_smart">
                <li>
                    <a href="#tab1">Available</a></li>
                <li><a href="#tab2">Unavailable</a></li>
            </ul>
            <div id="tab1">
            <p>&nbsp;</p> 
                <p>
                <?php
                    include "prop_on.php";
        ?>  </p>
            </div>
        <div id="tab2">
            <p>&nbsp;</p>
            <p>&nbsp;</p>      
            <p>
                <?php include "prop_off.php"; ?>
            </p>
        </div>
            </div>
</div><!--End of prop_div-->

<?php
include('footer.php');
?>
