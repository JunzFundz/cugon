<?php

require_once('../class/Booking.php');

if (isset($_POST['approve_request'])) {

    $userID = $_POST['userID'];
    $itemID = $_POST['itemID'];
    $item = $_POST['item_name'];
    $resID = $_POST['resID'];
    $resNumber = $_POST['resNumber'];
    $total = $_POST['total'];
    $quantity = $_POST['quantity'];
    $date_booked = $_POST['date'];
    $transaction_number = rand(99999,10000);
    $status = 'Paid';

    date_default_timezone_set('Asia/Manila');
    $date = new DateTime();
    $date_approved = $date->format('Y:m:d h:i:s');

    $approve = new Booking();
    $result = $approve->approveReq($userID, $itemID, $item, $resID, $resNumber, $total, $date_booked, $transaction_number, $status, $quantity);
}
