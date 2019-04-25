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

function send_notification($recipient)
{
    $conn = config();
    $query = "SELECT * FROM tbl_agents WHERE agent_ID='$recipient'  LIMIT 1 ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $agent = $row['firstname'] . ' ' . $row['lastname'];

    $date = date("Y-m-d H:i:s");
    $message1 = 'Dear Consultant, Your Subscription Plan has expired Please click the link below to subscribe';
    $message2 = 'Dear admin, ' . $agent . ' \'s Subscription Plan has expired';

    $query2 = "INSERT INTO tbl_agent_notification(agent_id, content,date)
     VALUES ('$recipient','$message1','$date')";
    mysqli_query($conn, $query2);

    $query3 = "INSERT INTO tbl_admin_notification(content,date)
     VALUES ('$message2','$date')";
    mysqli_query($conn, $query3);

}

function check_remaining_sub()
{
    $conn = config();
    $query = "SELECT * FROM tbl_plan_sub";
    $result = mysqli_query($conn, $query);
    if (!empty($result) && mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {

            //to check remaining subscription days
            $recipient = $data['no_sub_days'];
            if ($data['no_sub_days'] == '7' || $data['no_sub_days'] == '2') {
                $query = "SELECT * FROM tbl_agents WHERE agent_ID='$recipient'  LIMIT 1 ";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $agent = $row['firstname'] . ' ' . $row['lastname'];

                $date = date("Y-m-d H:i:s");
                $message1 = 'Your Subscription Plan will expire in ' . $data['no_sub_days'] . ' days Please click the link below to subscribe';

                $query2 = "INSERT INTO tbl_agent_notification(agent_id, content,date)
     VALUES ('$recipient','$message1','$date')";
                mysqli_query($conn, $query2);

            }
        }}

}

function check_sub()
{
    check_remaining_sub();

    $conn = config();
    $query = "SELECT * FROM tbl_plan_sub";
    $result = mysqli_query($conn, $query);

    if (!empty($result) && mysqli_num_rows($result) > 0) {
        $x = 1;
        // output data of each row
        while ($data = mysqli_fetch_assoc($result)) {

            if ((date("Y-m-d") === $data['end_date']) && $data['no_sub_days'] === '0') {
                //update table only  if not expired
                $id = $data['id'];
                $check = mysqli_query($conn, "select * from tbl_plan_sub where id='$id' and status='expired'");
                $checkrows = mysqli_num_rows($check);
                if (!$checkrows > 0) {

                    $query = "UPDATE tbl_plan_sub  SET status ='expired' WHERE id='$id'";
                    mysqli_query($conn, $query);

                    send_notification($data['agent_id']);
                }
            } else {
                $int = (int) $data['no_sub_days'];
                $new_count = $int - 1;
                $query = 'UPDATE tbl_plan_sub SET no_sub_days =' . $new_count . '';
                mysqli_query($conn, $query);

            }

        }
    }
}

check_sub();
