<?php

    include "db/db_class_new.php";
    $db_action = new crudClass();
	
    $pid = $_GET['pid'];
	
    $status = $_GET['status'];
	
//convert status to 1/0
    if ($status == 'true') {
        $status = '1';
    } else if ($status == 'false')
        $status = '0';
    if (isset($_GET['pid']) AND isset($_GET['status'])) {
        $result = $db_action->smartUpdate("agt_property", "property_status_id=$status", "property_ID=$pid");
		
    }