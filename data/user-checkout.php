<?php

require('../class/Booking.php');

if (isset($_GET['i_id'])) {
    $i_id = $_GET['i_id'];
    $booking = new Booking();
    $result = $booking->getItem($i_id);
    $row = $result->fetch_assoc();
}

if (isset($_POST['get-preffered-item'])) {
    $dateOptions = $_POST['dateOptions'];
    $users_id = $_POST['users_id'];
    $item_name = $_POST['item_name'];
    $item_id = $_POST['item_id'];
    $available = $_POST['available'];
    $payment = $_POST['payment'];

    if ($dateOptions == 'reg') {
        
        $regular_date = date("Y-m-d", strtotime($_POST['regular_date']));
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $totaldays = 1;
        $totalcost = number_format($price * $quantity);

    }else if ($dateOptions == 'stay') {

        $start = $_POST['start'];
        $end = $_POST['end'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $date1 = date_create($start);
        $date2 = date_create($end);
        $interval = date_diff($date1, $date2);

        // Kuhas value drekta
        $days = $interval->days;
        $days * 24;

        $totaldays = number_format($days);
        $totalcost = number_format(($price * $days) * $quantity);
    }
}
