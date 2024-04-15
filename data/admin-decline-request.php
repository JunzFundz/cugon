<?php

include('../class/Booking.php');

if (isset($_POST['decline_request'])) {
    $id = $_POST['id'];
    $res_id = $_POST['res_id'];
    $res_number = $_POST['res_number'];
    $reason = $_POST['reason'];

    $decline = new Booking();
    $result = $decline->declineReq($id, $res_id, $res_number, $reason);
}
