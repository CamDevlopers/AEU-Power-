<?php

include 'config.php';

if (isset($_GET['status']) && isset($_GET['bid'])) {
    $status = $_GET['status'];
    $uid = $_GET['bid'];
    if (isset($_GET['room_id'])) {
        if ($status == 'off') {
            $room_id = $_GET['room_id'];
            $up = "UPDATE box SET status = 0  , status_air = 0 WHERE is_lamp = 0 AND room_id = " . $room_id . "";
            $con->query($up);
            ?>

            <?php

            $room_id = $_GET['room_id'];
            $up = "UPDATE box SET status = 0  , status_air = 0 WHERE is_lamp = 1 AND room_id = " . $room_id . "";
            $con->query($up);
        }
    }else if(isset($_GET['off'])){
        $up = "UPDATE box SET status_air = 0 WHERE bid = " . $uid . "";
        $con->query($up);
    } else {

        if ($status == 'on') {
            $up = "UPDATE box SET status = 1 , status_air = 1 WHERE bid = " . $uid . "";
        } else {
            $up = "UPDATE box SET status = 0 , status_air = 1 WHERE bid = " . $uid . "";
        }
        $con->query($up);
    }
}
?>