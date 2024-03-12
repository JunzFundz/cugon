<?php

include('../class/Booking.php');

if (isset($_POST['decline_request'])) {
    $id = $_POST['id'];
    $reason = $_POST['reason'];

    $decline = new Booking();
    $result = $decline->declineReq($id, $reason);
}
