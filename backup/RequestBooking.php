<?php

include '../database/Connection.php';

if (isset($_POST['book'])) {
    $users_id = $_POST['users_id'];

    // Check if naa cyay reservation
    $checkSql = "SELECT * FROM res_tb WHERE users_id = '$users_id' AND status = 'Pending'";
    $checkResult = mysqli_query($conn, $checkSql);

    //if naa d na mu sulod iyang request
    if (mysqli_num_rows($checkResult) > 0) {
        echo 'You already have a pending reservation. Please wait for confirmation.';
    } else {
        // Proceed with the reservation
        $res_number = isset($_POST['res_number']) ? $_POST['res_number'] : rand(999999999, 10000000);
        $booking_email = $_POST['booking_email'];
        $numAdults = $_POST['numAdults'];
        $numChild = $_POST['numChild'];
        $date = $_POST['date'];
        $payment = $_POST['payment'];
        $status = isset($_POST['status']) ? $_POST['status'] : 'Pending';

        $sql = "INSERT INTO res_tb (users_id, res_number, booking_email, numAdults, numChild, date, payment, status) 
        VALUES ('$users_id','$res_number', '$booking_email', '$numAdults', '$numChild', '$date', '$payment', 'Pending')";

        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo 'Reservation submitted. Please wait for confirmation.';
        } else {
            die('Error: ' . mysqli_error($conn));
        }
    }
}
