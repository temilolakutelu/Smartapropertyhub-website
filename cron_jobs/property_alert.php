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

function send_notification($id, $pid, $uid)
{
    $conn = config();

    $query1 = "SELECT * FROM tbl_properties WHERE property_ID='$pid'  LIMIT 1 ";
    $result = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_assoc($result);
    $prop = $row1['property_Name'];

    $message1 = 'Property Alert Match!!! Your property,  ' . $prop . ' matches a property Alert Request';

    $message2 = 'Property Alert Match!!! Property Alert submitted with id-' . $id .
        '  have got a match. The Property name is ' . $prop . '';

    $date = date("Y-m-d H:i:s");

    $query2 = "INSERT INTO tbl_agent_messages(agent_ID, message,date)
     VALUES ('$uid','$message1','$date')";
    mysqli_query($conn, $query2);

    $query3 = "INSERT INTO tbl_admin_messages(message,date)
     VALUES ('$message2','$date')";
    mysqli_query($conn, $query3);

}

function alert()
{
    $conn = config();
    $query = "SELECT * FROM tbl_property_alert";
    $result = mysqli_query($conn, $query);

    if (!empty($result) && mysqli_num_rows($result) > 0) {
        $x = 1;
        // output data of each row
        while ($data = mysqli_fetch_assoc($result)) {

            $query2 = "SELECT * FROM tbl_properties JOIN tbl_prt_facilities
                     ON tbl_properties.property_ID=tbl_prt_facilities.property_ID
                     WHERE (tbl_properties.delete='0' AND tbl_properties.status_Details='published'
                     AND tbl_properties.stat='unsold'
                     AND  tbl_properties.category_ID='" . $data["category"] . "'

              )";
            $result2 = mysqli_query($conn, $query2);
            if (!empty($result2) && mysqli_num_rows($result2) > 0) {
                while ($prop = mysqli_fetch_assoc($result2)) {
                    $query2 = "UPDATE tbl_property_alert  SET matchID ='" . $prop["property_ID"] . "' WHERE id='" . $data["id"] . "' ";
                    mysqli_query($conn, $query2);

                    send_notification($data['id'], $prop['property_ID'], $prop['user_ID']);

                }

            }

        }
    }

}

alert();

//   AND tbl_properties.subtype='" . $data["subtype"] . "'
//                AND tbl_properties.country='" . $data["country"] . "'
//    AND tbl_properties.state='" . $data["state"] . "'
//     AND tbl_properties.price >= '" . $data["max-price"] . "'
//      AND tbl_prt_facilities.bedroom='" . $data["beds_no"] . "'
