<?php
session_start();

if (isset($_POST['get-booking'])) {

    require('../class/Booking.php');

    $res_number = rand(999999999, 10000000);
    $itemId = $_POST['get_item_id'];
    $email = $_POST['email'];
    $item = $_POST['get_item_name'];
    $userId = $_POST['get_user_id'];
    $quantity = $_POST['get_quantity'];
    $price = $_POST['get_price'];
    $payment = $_POST['get_payment'];
    $total_in_day = $_POST['total_in_days'];
    $message = $_POST['get_msg']  ?? '';
    $status = 'Pending';

    $options = $_POST['get_option'];

    date_default_timezone_set('Asia/Manila');
    $date = new DateTime();
    $created_at = $date->format('Y:m:d H:i:s');

    if ($options === 'reg') {
        $reg_date = date('Y-m-d', strtotime($_POST['get_reg_date']));

        header('Content-Type: application/json');
        $getbooking = new Booking();
        $result = $getbooking->regBooking($res_number, $itemId, $email, $item, $userId, $quantity, $price, $payment, $total_in_day, $reg_date, $created_at, $status, $message);

        $response = array();
        if ($result) {
            $response['success'] = 'Information will be sent via email for payment';
            $response['redirect'] = '../User/Transactions.php?userId=' . urlencode($userId);
        } else {
            $response['error'] = 'An error occur. Please try again later!';
        }
        echo json_encode($response);
        exit();
    } else {
        $end_date = date('Y-m-d', strtotime($_POST['get_end_date']));
        $start_date = date('Y-m-d', strtotime($_POST['get_start_date']));

        header('Content-Type: application/json');
        $getbooking = new Booking();
        $result = $getbooking->stayBooking($res_number, $itemId, $email, $item, $userId, $quantity, $price, $payment, $total_in_day, $start_date, $end_date, $created_at, $status, $message);

        $response = array();
        if ($result) {
            $response['success'] = "Thank you for choosing Cugon we'll be waiting for your departure";
            $response['redirect'] = '../User/Transactions.php?userId=' . urlencode($userId);
        } else {
            $response['error'] = 'An error occur. Please try again later!';
        }

        echo json_encode($response);
        exit();
    }
}
