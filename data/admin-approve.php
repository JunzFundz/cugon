<?php

require_once('../class/Booking.php');

if (isset($_POST['approve_request'])) {

    $userID = filter_input(INPUT_POST, 'userID', FILTER_SANITIZE_NUMBER_INT);
    $itemID = filter_input(INPUT_POST, 'itemID', FILTER_SANITIZE_NUMBER_INT);
    $item = filter_input(INPUT_POST, 'item_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $resID = filter_input(INPUT_POST, 'resID', FILTER_SANITIZE_NUMBER_INT);
    $resNumber = filter_input(INPUT_POST, 'resNumber', FILTER_SANITIZE_SPECIAL_CHARS);
    $total = filter_input(INPUT_POST, 'total', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);
    $date_booked = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);
    
    $transaction_number = rand(99999,10000);
    $status = 'Paid';

    date_default_timezone_set('Asia/Manila');
    $date = new DateTime();
    $date_approved = $date->format('Y:m:d h:i:s');

    $approve = new Booking();
    $result = $approve->approveReq($userID, $itemID, $item, $resID, $resNumber, $total, $date_booked, $transaction_number, $status, $quantity);


    if ($result) {
        $response = array(
            'success' => "Request Approved",
        );
    } else {
        $response = array(
            'error' => 'Error in request approval',
        );
    }
    echo json_encode($response);
    exit();
}

if(isset($_POST['setDelivered'])){
    $orderId = filter_input(INPUT_POST, 'orderId', FILTER_SANITIZE_NUMBER_INT);
    $userid = filter_input(INPUT_POST, 'userid', FILTER_SANITIZE_NUMBER_INT);

    if($orderId !== false && $userid !== false) {
        require_once('../database/Connection.php');
        $db = new Dbh;
        $conn = $db->connect();

        $stmt = $conn->prepare("UPDATE orders SET status = 'Delivered' WHERE order_id=?");
        $stmt->bind_param('i', $orderId);

        if($stmt->execute()){
            $notification = $conn->prepare("INSERT INTO notifications (user_id, updates, date_posted) VALUES (?, 'Delivered', NOW())");
            $notification->bind_param('i', $userid);
            
            if($notification->execute()){
                $response = array(
                    'success' => "Food has been delivered",
                );
            } else {
                $response = array(
                    'error' => 'Error occurred while inserting notification',
                );
            }
        } else {
            $response = array(
                'error' => 'Error occurred while updating order status',
            );
        }
    } else {
        $response = array(
            'error' => 'Invalid orderId or userid',
        );
    }
    
    echo json_encode($response);
    exit();
}
