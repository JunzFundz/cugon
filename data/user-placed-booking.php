<?php
session_start();

require('../class/Booking.php');


if (isset($_POST['get-booking'])) {

    $res_number = isset($_POST['res_number']) ? $_POST['res_number'] : rand(999999999, 10000000);
    $itemId = $_POST['get_item_id'];
    $userId = $_POST['get_user_id'];
    $quantity = $_POST['get_quantity'];
    $price = $_POST['get_price'];

    $payment = $_POST['get_payment'];
    $total_in_day = $_POST['total_in_days'];
    $reg_date = $_POST['get_reg_date'];
    $start_date = $_POST['get_start_date'];
    $end_date = $_POST['get_end_date'];
    $created_at = date('Y-m-d H:i:s');
    $status = 'Pending';

    $getbooking = new Booking();
    $result = $getbooking->placedBooking($res_number, $itemId, $userId, $quantity, $price, $payment, $total_in_day, $reg_date, $start_date, $end_date, $created_at, $status);

    if ($result === 'success') {
        $_SESSION['status'] = "Request sent. Please wait for confirmation.";
        $_SESSION['status_code'] = "success";
        header('location: ../User/home.php');
    } else {
        $_SESSION['status'] = "Request not sent";
        $_SESSION['status_code'] = "error";
    }

}
