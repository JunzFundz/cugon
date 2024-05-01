<?php
session_start();

require('../class/Booking.php');

if (isset($_POST['get-booking'])) {

    if (empty($_POST['get_item_id']) || empty($_POST['email']) || empty($_POST['get_item_name']) || empty($_POST['get_user_id']) || empty($_POST['get_quantity']) || empty($_POST['get_price']) || empty($_POST['get_payment']) || empty($_POST['total_in_days']) || empty($_POST['get_option'])) {
        $response['success'] = false;
        $response['error'] = 'All fields are required';
    } else {
        $itemId = filter_input(INPUT_POST, 'get_item_id', FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $item = filter_input(INPUT_POST, 'get_item_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $userId = filter_input(INPUT_POST, 'get_user_id', FILTER_SANITIZE_NUMBER_INT);
        $quantity = filter_input(INPUT_POST, 'get_quantity', FILTER_SANITIZE_NUMBER_INT);
        $price = filter_input(INPUT_POST, 'get_price', FILTER_SANITIZE_NUMBER_INT);
        $payment = filter_input(INPUT_POST, 'get_payment', FILTER_SANITIZE_SPECIAL_CHARS);
        $total_in_day = filter_input(INPUT_POST, 'total_in_days', FILTER_SANITIZE_NUMBER_INT);
        $message = filter_input(INPUT_POST, 'get_msg', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
        $options = filter_input(INPUT_POST, 'get_option', FILTER_SANITIZE_SPECIAL_CHARS);

        $status = 'Pending';
        $res_number = rand(999999999, 10000000);

        date_default_timezone_set('Asia/Manila');
        $date = new DateTime();
        $created_at = $date->format('Y:m:d H:i:s');
        $get_date = $date->format('Y-m-d');

        if ($options === 'reg') {
            $reg_date = filter_var($_POST['get_reg_date'], FILTER_SANITIZE_SPECIAL_CHARS);
            $reg_date = date('Y-m-d', strtotime($_POST['get_reg_date']));

            $response = array();

            $getbooking = new Booking();
            $result = $getbooking->regBooking($res_number, $itemId, $email, $item, $userId, $quantity, $price, $payment, $total_in_day, $reg_date, $created_at, $status, $message);

            if ($result) {
                if ($payment == 'counter') {
                    $response['success'] = "Thank you for choosing Cugon your request is being sent";
                    $response['redirect'] = '../User/transactions.php?userId=' . urlencode($userId);
                } else {
                    $response['success'] = 'Information will be sent via email for payment';
                    $response['redirect'] = '../User/transactions.php?userId=' . urlencode($userId);
                }
            } else {
                $response['error'] = 'An error occur. Please try again later!';
            }
            echo json_encode($response);
            exit();
        } else {
            $end_date = filter_var($_POST['get_end_date'], FILTER_SANITIZE_SPECIAL_CHARS);
            $start_date = filter_var($_POST['get_start_date'], FILTER_SANITIZE_SPECIAL_CHARS);
            $end_date = date('Y-m-d', strtotime($end_date));
            $start_date = date('Y-m-d', strtotime($start_date));

            $getbooking = new Booking();
            $result = $getbooking->stayBooking($res_number, $itemId, $email, $item, $userId, $quantity, $price, $payment, $total_in_day, $start_date, $end_date, $created_at, $status, $message);

            $response = array();
            if ($result) {
                if ($payment == 'counter') {
                    $response['success'] = "Thank you for choosing Cugon your request is being sent";
                    $response['redirect'] = '../User/transactions.php?userId=' . urlencode($userId);
                } else {
                    $response['success'] = 'Information will be sent via email for payment';
                    $response['redirect'] = '../User/transactions.php?userId=' . urlencode($userId);
                }
            } else {
                $response['error'] = 'An error occur. Please try again later!';
            }
        }
    }
    echo json_encode($response);
    exit();
}
