<?php
function config()
{
    $servername = "propertyhub.com.ng";
    $username = "property_user";
    $password = "H8iml16@";
    $database = "propertyhub_db";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        echo 'error in conection';
    }
    return $conn;
}

function send_notification($recipient, $pid, $did)
{
    $conn = config();
    $query1 = "SELECT * FROM tbl_agents WHERE agent_ID='$recipient'  LIMIT 1 ";
    $result = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_assoc($result);
    $agent = $row1['firstname'] . ' ' . $row1['lastname'];

    $query2 = "SELECT * FROM tbl_plan_details WHERE plan_id='$pid' and plan_detail_id='$did'   LIMIT 1 ";
    $result = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_assoc($result);
    $detail = $row2['detail'];
    $message1 = 'Dear Consultant, Your Plan ' . $detail . ' Permission has been exhausted. Please click the link below to subscribe';
    $message2 = 'Dear admin, ' . $agent . ' \'s  Plan ' . $detail . ' Permission has been exhausted';

    $date = date("Y-m-d H:i:s");
    $query2 = "INSERT INTO tbl_agent_notification(agent_id, content,date)
     VALUES ('$recipient','$message1','$date')";
    mysqli_query($conn, $query2);

    $query3 = "INSERT INTO tbl_admin_notification(content,date)
     VALUES ('$message2','$date')";
    mysqli_query($conn, $query3);

}

function check_permission()
{

    $conn = config();
    $query = "SELECT * FROM tbl_plan_sub_detail";
    $result = mysqli_query($conn, $query);

    if (!empty($result) && mysqli_num_rows($result) > 0) {
        $x = 1;
        // output data of each row
        while ($data = mysqli_fetch_assoc($result)) {

            if ($data['permission'] === $data['count']) {
                $id = $data['id'];

                $check = mysqli_query($conn, "select * from tbl_plan_sub_detail where status='0'");
                $checkrows = mysqli_num_rows($check);
                if (!$checkrows > 0) {
                    mysqli_query($conn, "UPDATE tbl_plan_sub_detail SET status ='0' WHERE id=$id");

                    send_notification($data['agent_id'], $data['plan_sub_id'], $data['plan_detail_id']);
                }
            }
        }
    }

}

check_permission();
