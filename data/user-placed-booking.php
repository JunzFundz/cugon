<?php
session_start();

if (isset($_POST['get-booking'])) {

    require('../class/Booking.php');
    $res_number = rand(999999999, 10000000);
    $itemId = $_POST['get_item_id'];
    $userId = $_POST['get_user_id'];
    $quantity = $_POST['get_quantity'];
    $price = $_POST['get_price'];

    $payment = $_POST['get_payment'];
    $total_in_day = $_POST['total_in_days'];
    $reg_date = $_POST['get_reg_date'];
    $start_date = $_POST['get_start_date'];
    $end_date = $_POST['get_end_date'];
    $status = 'Pending';

    date_default_timezone_set('Asia/Manila');
    $date = new DateTime();
    $created_at = $date->format('Y:m:d H:i:s');

    header('Content-Type: application/json');

    $getbooking = new Booking();
    $result = $getbooking->placedBooking($res_number, $itemId, $userId, $quantity, $price, $payment, $total_in_day, $reg_date, $start_date, $end_date, $created_at, $status, $message);

    $response = array();

    $paymentPreffered = $_SESSION['payment'];
    $userId = $_SESSION['payment'];

    if ($paymentPreffered === 'gcash') {
        if ($result) {
            $response['success'] = 'Information will be sent via email for payment';
            $response['redirect'] = '../User/Transactions.php?userId=' . urlencode($userId);
        } else {
            $response['error'] = 'An error occur. Please try again later!';
        }
    }else{
        if ($result) {
            $response['error'] = 'Information will be sent via email';
        } else {
            $response['error'] = 'An error occur. Please try again later!';
        }
    }
    echo json_encode($response);
    exit();
}
